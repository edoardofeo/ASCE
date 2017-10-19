$('document').ready(function() {


    $("#login_form").validate({
        //cambio i default dei msg di errore (sarebbero "label" e "error")
        errorElement: "td",
        errorClass: "error_form",
        //cambio la posizione di default dell'errore che si genera
        errorPlacement: function (error, element) {
            if (element.attr("name") === "email")
                error.appendTo('#email_error_msg');
            if (element.attr("name") === "pw")
                error.appendTo('#pw_error_msg');
        },
        rules: {

            email: {
                required: true,
                email: true
            },
            pw: {
                required: true,
                minlength: 8
            }
        },

        submitHandler: submitForm
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "Please fill this field",
        email: "Please enter a valid email",
        minlength: jQuery.validator.format("Enter at least {0} characters"),

    });

    function submitForm() {

        $.ajax({
            type: 'POST',
            url: './php/do_login.php',
            data: {
                email: $("#log_email").val(),
                pw: $("#log_pw").val(),
                checkbox: $("#log_checkbox").val()
            },

            success: function (data) {
                //se la risposta di do_signup.php è "ok" (ultimo echo) allora-> msg di successo  e redirect
                //alert(data);
                if (data.toString().includes("ok")) {
                    $("#login_result").fadeIn(100, function () {
                        $("#login_result").html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span> &nbsp;' +
                            ' Success! You\'ll be redirect to your homepage in 4secs </div>');
                        setTimeout(function () {window.location.href = "./memberarea.php";}, 4000);
                    });
                }

                else {
                    $("#login_result").fadeIn(1000, function () {

                        $("#login_result").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' +data+ '</div>');
                    });
                }
            }
        });
    }

    return false;


})