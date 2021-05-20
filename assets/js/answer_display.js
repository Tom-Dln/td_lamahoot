$(document).ready(function(){
    let player_score = 0;
    let question_number = 1;
    // Définition du score
    if (player_score != null){
        $('#score_value').text(player_score);
    } else {
        $('#score_value').text(0);
    }
    console.log(question_number)
    $("#" + question_number + ".question_div").css('display', 'flex');
$("#question_page .container-buttons .kahoot-button").click(function(){
    $(this).addClass("clicked");
    if ($(this).data("answer") == true){
        console.log("good")
        // Action si Bonne réponse
        $("#question_page .container-buttons .kahoot-button").addClass("wrong").attr("disabled", "true");
        $("#question_page .container-buttons .kahoot-button[data-answer='true']").addClass("answer").removeClass("wrong")
        $("#next-button").css('visibility', 'visible');
        // Score qui augmente
        player_score++;
        $('#score_value').text(player_score);
    } else {
        console.log("bad")
        // Action si mauvaise réponse
        $("#question_page .container-buttons .kahoot-button").addClass("wrong").attr("disabled", "true");
        $("#question_page .container-buttons .kahoot-button[data-answer='true']").addClass("answer").removeClass("wrong")
        $("#next-button").css('visibility', 'visible');;
    }
});  
$("#next-button").click(function(){
    $(".container-buttons .kahoot-button")
    .removeClass("wrong")
    .removeClass("clicked")
    .removeClass("answer")
    .removeAttr("disabled")
    $(this).css('visibility', 'hidden');
    $("#" + question_number + ".question_div").hide();
    question_number++;
    $("#" + question_number + ".question_div").css('display', 'flex');
    console.log(question_number)
    if (question_number >= 11){
        $('#question_page').hide();
        $('#result_body').show();
        console.log($(player_score))
    }
});
});
