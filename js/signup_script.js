$('document').ready(function()
{



    $("#registration_form").validate({
        errorElement: "td",
        errorClass: "error_form",
        errorPlacement: function(error, element) {
            if (element.attr("name") === "name" )  //Id of input field
                 error.appendTo('#name_error_msg');
            if (element.attr("name") === "surname" )  //Id of input field
                 error.appendTo('#surname_error_msg');
            if (element.attr("name") === "username" )  //Id of input field
                error.appendTo('#username_error_msg');
            if (element.attr("name") === "email" )  //Id of input field
                error.appendTo('#email_error_msg');
            if (element.attr("name") === "pw" )  //Id of input field
                error.appendTo('#pw_error_msg');
            if (element.attr("name") === "confirm_pw" )  //Id of input field
                error.appendTo('#confirm_error_msg');
            },
        rules:
            {
                name:  {
                    rangelength: [2, 30]
                },
                surname: {
                    rangelength: [2, 30]
                },
                username: {
                    required: true,
                    rangelength: [4, 15]
                },
                email: {
                    required: true,
                    email: true
                },
                pw: {
                    required: true,
                    minlength: 8
                },
                confirm_pw: {
                   // equalTo: 'pw',
                    minlength: 8,
                    required: true
                }
            },


        submitHandler: submitForm
    });
    jQuery.extend(jQuery.validator.messages, {
        required: "Please fill this field",
        email: "Please enter a valid email",
        equalTo: "Password mismatch! Please retype",
        maxlength: jQuery.validator.format("Please enter no more than {0} characters"),
        minlength: jQuery.validator.format("Please enter at least {0} characters"),
        rangelength: jQuery.validator.format("Please stay between {0} and {1} characters")

    });


    function submitForm() {

        $.ajax({
            type: 'POST',
            url: './php/do_signup.php',
            data: {
                nation: $("#form_nation").val(),
                name: $("#form_name").val(),
                surname: $("#form_surname").val(),
                username: $("#form_username").val(),
                email: $("#form_email").val(),
                pw: $("#form_pw").val(),
                confirm_pw: $("#form_confirm").val()
            },

            success: function (data) {
                // alert(data.toString());
                //var newdata = data.replace(/[^A-Z]/ig, "");

                //se la risposta di do_signup.php è "ok" (ultimo echo) allora-> msg di successo  e redirect
                if (data.toString().includes("ok")) {
                    $("#signup_result").fadeIn(100, function () {
                        $("#signup_result").html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span> &nbsp;' +
                            ' Success! Now you can log in! </div>');
                        setTimeout(function () {window.location.href = "./login.php";}, 4000);
                    });
                }

                else {
                    $("#signup_result").fadeIn(1000, function () {

                        $("#signup_result").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + data + '</div>');
                    });
                }
            }
        });
    }
    return false;

    /*
    var err_username = false;
    var err_email = false;
    var err_pw = false;
    var err_confirm = false;
    var err_name = false;
    var err_surname = false;

    $("#form_name").focusout(function() {check_name();});
    $("#form_surname").focusout(function() {check_surname();});
    $("#form_username").focusout(function() {check_username();});
    $("#form_email").focusout(function() {check_email();});
    $("#form_pw").focusout(function() {check_pw();});
    $("#form_confirm").focusout(function() {check_confirm()});


    function check_username() {
        var username_length = $("#form_username").val().length;
        if (username_length < 5 || username_length > 15) {
            $("#username_err_msg").html("Username Must be Between 5-20 Characters");
            err_username = true;
            }
        }

        function check_name() {
        var name_length = $("#form_name").val().length;
        if (name_length < 2 || name_length > 30) {
            $("#name_err_msg").html("Name Must be Between 5-20 Characters");
            err_name = true;
            }
        }

        function check_surname() {
        var surname_length = $("#form_surname").val().length;
        if (surname_length < 2 || surname_length > 30) {
            $("#surname_err_msg").html("Surname Must be Between 5-20 Characters");
            err_surname = true;
            }
        }


    function check_pw() {
        var pw_length = $("#form_pw").val().length;
        if (pw_length < 8) {
            $("#pw_err_msg").html("Minimum 8 characters");
            err_pw = true;
        }
    }

    function check_confirm() {
        var pw = $("#form_pw").val();
        var confirm = $("#form_confirm").val();
        if (pw !== confirm) {
            $("#confirm_err_msg").html("Passwords don't match! Please Retype");
            err_confirm = true;
        }
    }

    function check_email() {
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        if (!pattern.test($("#form_email").val())) {
            $("#email_err_msg").html("Invalid Email address");
            err_email = true;
        }
    }

    function validation(){
        var err_username = false;
        var err_email = false;
        var err_pw = false;
        var err_confirm = false;
        var err_name = false;
        var err_surname = false;
        check_email(); check_name(); check_surname();
        check_username(); check_pw(); check_confirm();
        if(err_username===false && err_email===false && err_pw===false && err_confirm===false && err_name===false && err_surname===false)
            return true;
        else return false;
    }

    */
    /* form submit */
   /*
    $("#submit_btt").click(function() {
        if (validation() === true) {
*/


});