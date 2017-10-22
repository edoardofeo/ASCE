
$('document').ready(function() {

    $("#modify-btt").click(function () {

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