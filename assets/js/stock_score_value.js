$(document).ready(function(){
let player_score = 0;
player_score = localStorage.getItem('score');
// Définition du score
if (player_score != null){
    $('#score_value_input').attr('value', player_score);
} else {
    $('#score_value_input').attr('value', 0);
}
})