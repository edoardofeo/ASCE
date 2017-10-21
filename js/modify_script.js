
$('document').ready(function() {

    $("#modify-btt").click(function () {


        $("#mod_user").html("<input class='form-control' placeholder='Insert a new Username'>");
        $("#mod_nation").html("<input class='form-control' placeholder='Insert a new Nation'>");
        $("#mod_name").html("<input class='form-control' placeholder='Insert a new Name'>");
        $("#mod_surname").html("<input class='form-control' placeholder='Insert a new Surname'>");
        $("#td_user").removeClass("well");
        $("#td_nation").removeClass("well");
        $("#td_name").removeClass("well");
        $("#td_surname").removeClass("well");

        $("#modify-btt").prop('value','Confirm');
    })

    $("#mod_user").click(function () {
        $("#change_user").prop("disabled",false);
    })
     $("#mod_nation").click(function () {
        $("#change_nation").prop("disabled",false);
    })
     $("#mod_name").click(function () {
        $("#change_name").prop("disabled",false);
    })
     $("#mod_surname").click(function () {
        $("#change_surname").prop("disabled",false);
    })

    });