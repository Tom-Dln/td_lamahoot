/* -----------------------------------------------
    Fichier JS
----------------------------------------------- */

// Vérification de la bonne connexion
console.log("Connexion JS - Ok");

let qstn_type = $("#qstn_type").val();

if (qstn_type == "1") {
    $("#qstn_type_1_block").show();
    $("#qstn_type_2_block").hide();
} else {
    $("#qstn_type_1_block").hide();
    $("#qstn_type_2_block").show();
}

$("#qstn_type").change(function () {
    qstn_type = $("#qstn_type :selected").val();
    console.log(qstn_type);
    if (qstn_type == "1") {
        $("#qstn_type_1_block").show();
        $("#qstn_type_2_block").hide();
        $("#qstn_type_1_answer").attr("required", "");
        $("#qstn_type_2_answer_1").removeAttr("required");
        $("#qstn_type_2_answer_2").removeAttr("required");
        $("#qstn_type_2_answer_3").removeAttr("required");
        $("#qstn_type_2_answer_4").removeAttr("required");
        $("#qstn_type_2_answer").removeAttr("required");
    } else {
        $("#qstn_type_1_block").hide();
        $("#qstn_type_2_block").show();
        $("#qstn_type_1_answer").removeAttr("required");
        $("#qstn_type_2_answer_1").attr("required", "");
        $("#qstn_type_2_answer_2").attr("required", "");
        $("#qstn_type_2_answer_3").attr("required", "");
        $("#qstn_type_2_answer_4").attr("required", "");
        $("#qstn_type_2_answer").attr("required", "");
    }
});

