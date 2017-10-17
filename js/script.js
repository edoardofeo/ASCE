$('document').ready(function()
{
    /* validation */
    $("#registration_form").validate({
        rules:
            {
                username: {
                    required: true,
                    minlength: 4,
                    maxlength: 20
                },
                email: {
                    required: true,
                    email: true
                },
                pw: {
                    required: true,
                    minlength: 8,
                    maxlength: 15
                },
                confirm_pw: {
                    required: true,
                    equalTo: '#form_pw'
                }
            },
        messages:
            {
                form_username: {
                    required:"Enter a Username",
                    minlength: "Minimum is 4 Characters"
                },
                form_email: {
                    required: "Enter an Email",
                    email: "Enter a Valid Email"
                },
                form_pw:{
                    required: "Enter a Password",
                    minlength: "Minimum is 8 Characters"
                },
                form_confirm:{
                    required: "Retype Your Password",
                    equalTo: "Password Mismatch! Retype"
                }
            },
        submitHandler: submitForm
    });

    /* form submit */
    function submitForm()
    {
        $.ajax({
            type : 'POST',
            url  : './account_creation.php',
            data : {
                nation : $("#form_nation").val(),
                name : $("#form_name").val(),
                surname : $("#form_surname").val(),
                username : $("#form_username").val(),
                email : $("#form_email").val(),
                pw : $("#form_pw").val(),
                confirm_pw : $("#form_confirm").val()
            },

           /*
            beforeSend: function()
            {

            },
            */
            success :  function(data)
            {
               //var newdata = data.replace(/[^A-Z]/ig, "");
                //alert(data);

                //se la risposta di account_creation.php è "ok" (ultimo echo) allora-> msg di successo  e redirect
                if(data.toString() === "ok") {
                    $("#success").fadeIn(100, function() {
                        $("#success").html('<div class="alert alert-success"><span class="glyphicon glyphicon-ok-sign"></span> &nbsp; Success! Now you can log in! </div>');
                        setTimeout(function () {location.href = "./login2.php";}, 4000);
                    });
                }

                else{
                   $("#success").fadeIn(1000, function(){

                        $("#success").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+'</div>');
                    });
                }
            }
        });
        return false;
    }

});