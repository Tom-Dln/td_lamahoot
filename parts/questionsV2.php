  <!-- Body Questions -->
  <!-- Obtenir les 10 questions -->
  <?php
    include 'assets\php_func\sanitize_score.php';
    $the_list_of_questions = get_the_questions();




    // =================
    // Choisir la couleur de fond en fonction de l'id
    $theme_label;
    ?>


  <!-- Changer la classe en fonction du thème -->

  <body class="background">
      <div id="question_page">
          <!-- Bouton retour au menu -->
          <a href="index.php?pg=menu" class="return-button">Quitter le jeu</a>
          <?php
            foreach ($the_list_of_questions as $question) {
                $question_number++;
                // Id du thème de la question [REQUETE SQL]
                $theme_id = $question[0];
                // Id de la question dans la DB [REQUETE SQL]
                $question_id = $question[1];
                // Valeur qui définie la bonne réponse ( Entre 1 et 4 ) [REQUETE SQL]
                $right_answer = $question[9];
                // Type de question [REQUETE SQL]
                $question_type = $question[3];
                // La question
                $question_label = $question[4];
                // Les réponses
                if ($question_type == 1) {
                    $answer_1 = "Vrai";
                    $answer_2 = "Faux";
                } else if ($question_type == 2) {
                    $answer_1 = $question[5];
                    $answer_2 = $question[6];
                    $answer_3 = $question[7];
                    $answer_4 = $question[8];
                }

            ?>
              <div id="<?= $question_number ?>" class="question_div">
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

              </div>
          <?php
            }
            ?>
          <div class="score">Votre score : <span id="score_value">0</span></div>
          <div class="kahoot-button" id="next-button">
              Suivant
          </div>

      </div>

      <div id="result_body" class="background" style="display:none">
          <div class="question">Bravo !</div>
          <div class="question">Votre score : <span id="score_value">0</span></div>
          <div class="container-buttons">

              <form method="post">
                  <input class="input-username" type="text" placeholder="Pseudonyme" required name="user_name" />
                  <input id="score_value_input" type="hidden" value="0" name="user_score">
                  <button type="input" class="kahoot-button">
                      <!-- <button type="submit">Jouer</button> -->
                      Sauvegarder mon score
                  </button>

                  <!-- Retour au menu CHANGER LE HREF A TERME !!!! -->
                  <a href="index.php?pg=menu" class="kahoot-button">Retour au menu
                  </a>
              </form>
          </div>
      </div>
      <script src="assets/js/random-bg.js"></script>
      <script src="assets\js\stock_score_value.js"></script>