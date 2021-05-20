  <!-- Body Score final -->
  <?php
    include 'assets\php_func\sanitize_score.php'
    ?>

  <body id="result_body" class="background">
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
      <script src="assets/js/random-bg.js"></script>