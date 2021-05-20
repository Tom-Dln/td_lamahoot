<?php
// Récupération Header
require_once __DIR__ . '/inc/header.php';
// Infos Modification Question
$question = get_qestion($_GET["id"]);
// Fonction Ajout Question
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION["form_action"] != 'done') {
    if ($_POST["qstn_type"] == 1) {
        modify_question($_GET["id"], $_POST["qstn_cult"], $_POST["qstn_theme"], $_POST["qstn_type"], $_POST["qstn_text"], 'NULL', 'NULL', 'NULL', 'NULL', $_POST["qstn_type_1_answer"]);
    } else {
        modify_question($_GET["id"], $_POST["qstn_cult"], $_POST["qstn_theme"], $_POST["qstn_type"], $_POST["qstn_text"], $_POST["qstn_type_2_answer_1"], $_POST["qstn_type_2_answer_2"], $_POST["qstn_type_2_answer_3"], $_POST["qstn_type_2_answer_4"], $_POST["qstn_type_2_answer"]);
    }
    $_SESSION["form_action"] = 'done';
}
?>

<!-- ----------------------------------------- -->
<!-- Début du Main -->
<!-- ----------------------------------------- -->


<h1 class="mb-5 text-center">
    Formulaire Modifier Question
</h1>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/inc/confirmation.php';
} else { ?>
    <form method="POST" action="">
        <div class="row">
            <div class="form-group col-8 col-md-4 mx-auto">
                <label class="d-block text-center" for="qstn_type">Type de Question :</label>
                <select class="form-control" name="qstn_type" id="qstn_type" required>
                    <option value="1" <?= $question[0]["type"] == 1 ? "selected" : '' ; ?>>Vrai Faux</option>
                    <option value="2" <?= $question[0]["type"] == 2 ? "selected" : '' ; ?>>Choix Multiples</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="form-group col-8 col-md-4 mx-auto ml-md-auto mr-md-0 mb-2">
                <label for="qstn_cult">Culture :</label>
                <select class="form-control" name="qstn_cult" id="qstn_cult" required>
                    <option value="Culture iranienne" <?= $question[0]["culture"] == 'Culture iranienne' ? "selected" : '' ; ?>>Culture iranienne</option>
                    <option value="Culture turque" <?= $question[0]["culture"] == 'Culture turque' ? "selected" : '' ; ?>>Culture turque</option>
                    <option value="Culture israelienne" <?= $question[0]["culture"] == 'Culture israelienne' ? "selected" : '' ; ?>>Culture israelienne</option>
                    <option value="Culture des pays d’Asie du Sud-Est" <?= $question[0]["culture"] == 'Culture des pays d’Asie du Sud-Est' ? "selected" : '' ; ?>>Culture des pays d’Asie du Sud-Est</option>
                    <option value="Culture japonaise" <?= $question[0]["culture"] == 'Culture japonaise' ? "selected" : '' ; ?>>Culture japonaise</option>
                    <option value="Culture coréenne" <?= $question[0]["culture"] == 'Culture coréenne' ? "selected" : '' ; ?>>Culture coréenne</option>
                    <option value="Culture d’Amérique du Sud" <?= $question[0]["culture"] == 'Culture d’Amérique du Sud' ? "selected" : '' ; ?>>Culture d’Amérique du Sud</option>
                    <option value="Culture indienne" <?= $question[0]["culture"] == 'Culture indienne' ? "selected" : '' ; ?>>Culture indienne</option>
                    <option value="Culture des pays d’Afrique du Nord" <?= $question[0]["culture"] == 'Culture des pays d’Afrique du Nord' ? "selected" : '' ; ?>>Culture des pays d’Afrique du Nord</option>
                    <option value="Culture des pays d’Afrique subsaharienne" <?= $question[0]["culture"] == 'Culture des pays d’Afrique subsaharienne' ? "selected" : '' ; ?>>Culture des pays d’Afrique subsaharienne</option>
                    <option value="Culture des pays d’Europe de l’Est" <?= $question[0]["culture"] == 'Culture des pays d’Europe de l’Est' ? "selected" : '' ; ?>>Culture des pays d’Europe de l’Est</option>
                    <option value="Culture des pays d’Europe du Nord" <?= $question[0]["culture"] == 'Culture des pays d’Europe du Nord' ? "selected" : '' ; ?>>Culture des pays d’Europe du Nord</option>
                </select>
            </div>
            <div class="form-group col-8 col-md-4 mx-auto mr-md-auto ml-md-0">
                <label for="qstn_theme">Thème :</label>
                <select class="form-control" name="qstn_theme" id="qstn_theme" required>
                    <option value="1" <?= $question[0]["theme_id"] == 1 ? "selected" : '' ; ?>>Histoire</option>
                    <option value="2" <?= $question[0]["theme_id"] == 2 ? "selected" : '' ; ?>>Géographie</option>
                    <option value="3" <?= $question[0]["theme_id"] == 3 ? "selected" : '' ; ?>>Sports et Loisirs</option>
                    <option value="4" <?= $question[0]["theme_id"] == 4 ? "selected" : '' ; ?>>Arts et Littérature</option>
                    <option value="5" <?= $question[0]["theme_id"] == 5 ? "selected" : '' ; ?>>Sciences et Nature</option>
                    <option value="6" <?= $question[0]["theme_id"] == 6 ? "selected" : '' ; ?>>Divertissement</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="form-group col-8 mx-auto">
                <label for="qstn_text">Question :</label>
                <input class="form-control" type="text" name="qstn_text" id="qstn_text" value="<?= $question[0]["question_name"]; ?>" required>
            </div>
        </div>
        <div id="qstn_type_1_block" class="row">
            <div class="form-group col-8 mx-auto">
                <label for="qstn_type_1_answer">Réponse :</label>
                <select class="form-control" name="qstn_type_1_answer" id="qstn_type_1_answer" required>
                    <option value="1" <?= $question[0]["right_answer"] == 1 ? "selected" : '' ; ?>>Vrai</option>
                    <option value="2" <?= $question[0]["right_answer"] == 2 ? "selected" : '' ; ?>>Faux</option>
                </select>
            </div>
        </div>
        <div id="qstn_type_2_block">
            <div id="qstn_type_2_block" class="row mt-3">
                <div class="form-group col-8 col-md-4 mx-auto ml-md-auto mr-md-0 mb-2">
                    <label for="qstn_type_2_answer_1">Réponse 1 :</label>
                    <input class="form-control" type="text" name="qstn_type_2_answer_1" id="qstn_type_2_answer_1" value="<?= $question[0]["answer_1"]; ?>">
                </div>
                <div class="form-group col-8 col-md-4 mx-auto mr-md-auto ml-md-0 mb-2">
                    <label for="qstn_type_2_answer_2">Réponse 2 :</label>
                    <input class="form-control" type="text" name="qstn_type_2_answer_2" id="qstn_type_2_answer_2" value="<?= $question[0]["answer_2"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-8 col-md-4 mx-auto ml-md-auto mr-md-0 mb-2">
                    <label for="qstn_type_2_answer_3">Réponse 3 :</label>
                    <input class="form-control" type="text" name="qstn_type_2_answer_3" id="qstn_type_2_answer_3" value="<?= $question[0]["answer_3"]; ?>">
                </div>
                <div class="form-group col-8 col-md-4 mx-auto mr-md-auto ml-md-0">
                    <label for="qstn_type_2_answer_4">Réponse 4 :</label>
                    <input class="form-control" type="text" name="qstn_type_2_answer_4" id="qstn_type_2_answer_4" value="<?= $question[0]["answer_4"]; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-8 mx-auto">
                    <label for="qstn_type_2_answer">Réponse :</label>
                    <select class="form-control" name="qstn_type_2_answer" id="qstn_type_2_answer">
                        <option value="1" <?= $question[0]["right_answer"] == 1 ? "selected" : '' ; ?>>Réponse 1</option>
                        <option value="2" <?= $question[0]["right_answer"] == 2 ? "selected" : '' ; ?>>Réponse 2</option>
                        <option value="3" <?= $question[0]["right_answer"] == 3 ? "selected" : '' ; ?>>Réponse 3</option>
                        <option value="4" <?= $question[0]["right_answer"] == 4 ? "selected" : '' ; ?>>Réponse 4</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-light btn-lg d-block mx-auto mt-4">Valider</button>
    </form>
<?php } ?>


<!-- ----------------------------------------- -->
<!-- Fin du Main -->
<!-- ----------------------------------------- -->

<?php
// Récupération Header
require_once __DIR__ . '/inc/footer.php';
?>