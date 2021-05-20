<?php
include 'inc/allan_header.php';

// La page a afficher :
if (isset($_GET['pg'])) {
    $page_to_display = $_GET['pg'];
} else {
    $page_to_display = 'menu';
}
// ==================
// Numéro de la question dans le quizz
if (isset($_GET['question_number'])) {
    $question_number = $_GET['question_number'];
} else {
    $question_number = 1;
} // ==================
// Choix de la page a afficher
switch ($page_to_display) {
    case 'menu':
        include 'parts/menu.php';
        break;
    case 'questions':
        if ($question_number >= 11) {
            include 'parts/result.php';
        } else {
            include 'parts/questions.php';
        }
        break;
    case 'credits':
        include 'parts/credits.php';
        // case 'dashboard':
        //   include 'parts/list-questions.php';
}
?>


<script src="assets/js/answer_display.js?time=<?= time() ?>"></script>
<!-- Fin du fichier PHP -->
<?php
include 'inc/allan_footer.php'
?>