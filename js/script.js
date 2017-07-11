$(function (){
  $("#username_error_msg").hide();
  $("#email_error_msg").hide();
  $("#pw_error_msg").hide();
  $("#confirm_error_msg").hide();

  var error_username = false;
  var error_email = false;
  var error_pw = false;
  var error_confirm = false;

    $("#form_username").focusout(function() {

        check_username();

    });


    $("#form_email").focusout(function() {
        check_email();
    });


    $("#form_pw").focusout(function() {
        check_pw();
    });


    $("#form_confirm").focusout(function() {
        check_confirm()
    });

    function check_username() {

        var username_length = $("#form_username").val().length;

        if(username_length < 5 || username_length > 20) {
            $("#username_error_msg").html("Should be between 5-20 characters");
            $("#username_error_msg").show();
            error_username = true;
        } else {
            $("#username_error_msg").hide();

        }

    }

    function check_pw() {

        var pw_length = $("#form_pw").val().length;

        if(pw_length < 8) {
            $("#pw_error_msg").html("At least 8 characters");
            $("#pw_error_msg").show();
            error_pw = true;
        } else {
            $("#pw_error_msg").hide();
        }

    }

    function check_confirm() {

        var pw = $("#form_pw").val();
        var confirm = $("#form_confirm").val();

        if(pw !==  confirm) {
            $("#confirm_error_msg").html("passwords don't match");
            $("#confirm_error_msg").show();
            error_confirm = true;
        } else {
            $("#confirm_error_msg").hide();
        }

    }

    function check_email() {

        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

        if(pattern.test($("#form_email").val())) {
            $("#email_error_msg").hide();
        } else {
            $("#email_error_msg").html("Invalid email address");
            $("#email_error_msg").show();
            error_email = true;
        }

    }


    $("#submit").click(function(){
        $.post(
            "./account_creation.php",
            {   username : $("#form_username").val(),
                email : $("#form_email").val(),
                pw : $("#form_password").val(),
                confirm_pw : $("#form_confirm").val()}), function(data){
                $("#success").html(data);
            };
    });

    $("#registration_form").submit(function() {

        error_username = false;
        error_pw = false;
        error_confirm = false;
        error_email = false;

        check_username();
        check_pw();
        check_confirm();
        check_email();

        if(error_username === false && error_pw === false && error_confirm === false && error_email === false) {
            return true;
        } else {
            return false;
        }
    });







/*
    ////inviare php a signup.php tramite jquery!!!!!!!
    $("#registration_form").submit(function() {
        var action = $(this).attr("action");
        $("#success").show(200, function(){

            $("#success").html("").hide();
            $("#submit").attr('disabled','disabled');

            $.post(action, {						//effettuo la richiesta http post sul server per inserire il nuovo utente
                    			                        //inviando i valori nel form
                    username: $("#form_username").val(),
                    email: $("#form_email").val(),
                    password: $("#form_pw").val(),
                    confirm: $("#form_confirm").val()
                },
                function(response) {
                    $("#success").html(response);
                    $("#submit").removeAttr('disabled');
                    if(response.indexOf("email") >=0 || (response.indexOf("username")) >=0){
                        setTimeout(function () {window.location.href = "login2.php";}, 2500);
                    }

            });

             });
        return false;
    })

 */
});