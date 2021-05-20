  <!-- Body Questions -->
  <!-- Obtenir les 10 questions -->
  <?php
    $the_list_of_questions = get_the_questions();

    // Id du thème de la question [REQUETE SQL]
    $theme_id = $the_list_of_questions[$question_number - 1][0];
    // Id de la question dans la DB [REQUETE SQL]
    $question_id = $the_list_of_questions[$question_number - 1][1];
    // Valeur qui définie la bonne réponse ( Entre 1 et 4 ) [REQUETE SQL]
    $right_answer = $the_list_of_questions[$question_number - 1][9];
    // Type de question [REQUETE SQL]
    $question_type = $the_list_of_questions[$question_number - 1][3];
    // La question
    $question_label = $the_list_of_questions[$question_number - 1][4];
    // Les réponses
    if ($question_type == 1) {
        $answer_1 = "Vrai";
        $answer_2 = "Faux";
    } else if ($question_type == 2) {
        $answer_1 = $the_list_of_questions[$question_number - 1][5];
        $answer_2 = $the_list_of_questions[$question_number - 1][6];
        $answer_3 = $the_list_of_questions[$question_number - 1][7];
        $answer_4 = $the_list_of_questions[$question_number - 1][8];
    }
    // =================
    // Choisir la couleur de fond en fonction de l'id
    $theme_label;
    switch ($theme_id) {
        case 1:
            $theme_label = "history";
            break;
        case 2:
            $theme_label = "geography";
            break;
        case 3:
            $theme_label = "sports";
            break;
        case 4:
            $theme_label = "litterature";
            break;
        case 5:
            $theme_label = "science";
            break;
        case 6:
            $theme_label = "entertainement";
            break;
    }
    ?>


  <!-- Changer la classe en fonction du thème -->

  <body id="question_page" class="background <?= $theme_label ?>">
      <!-- Bouton retour au menu -->
      <a href="index.php?pg=menu" class="return-button">Quitter le jeu</a>
      <div class="question"><?= $question_label ?></div>
      <div class="container-buttons">
          <!-- Appliquer le DATA à la bonne réponse -->
          <!-- 2 ou 4 réponses en fonction du type de question -->
          <div id="container-question-1">

              <button id="anwser-1" class="kahoot-button" <?php if ($right_answer == 1) {
                                                                echo 'data-answer="true"';
                                                            } ?>>
                  <?= $answer_1 ?>
              </button>
              <button id="anwser-2" class="kahoot-button" <?php if ($right_answer == 2) {
                                                                echo 'data-answer="true"';
                                                            } ?>>
                  <?= $answer_2 ?>

              </button>
          </div>
          <?php if ($question_type == 2) { ?>
              <div id="container-question-2">
                  <button id="anwser-3" class="kahoot-button" <?php if ($right_answer == 3) {
                                                                    echo 'data-answer="true"';
                                                                } ?>>
                      <?= $answer_3 ?>

                  </button>
                  <button id="anwser-4" class="kahoot-button" <?php if ($right_answer == 4) {
                                                                    echo 'data-answer="true"';
                                                                } ?>>
                      <?= $answer_4 ?>

                  </button>
              </div>
          <?php } ?>
      </div>
      <!-- Numéro de la question -->
      <div class="question_number">Question n°<?= $question_number ?></div>
      <!-- Score du joueur -->
      <div class="score">Votre score : <span id="score_value">0</span></div>
      <a href="index.php?pg=questions&question_number=<?= $question_number + 1 ?>" class="kahoot-button" id="next-button">
          Suivant
      </a>