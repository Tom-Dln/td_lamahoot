<?php
// Récupération Header
require_once __DIR__ . '/inc/header.php';
// Fonction Suppression Utilisateur
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    delete_question($_POST["question_id"]);
}
// Récupération Questions
$questions = get_questions();
// Réinitialisation Session Formulaire
$_SESSION["form_action"] = 'ready';
?>

<!-- ----------------------------------------- -->
<!-- Début du Main -->
<!-- ----------------------------------------- -->


<div class="row mb-5">
    <div class="col-6 d-flex justify-content-center">
        <a class="btn btn-light btn-lg" href="index.php" role="button">Retour Acceuil</a>
    </div>
    <div class="col-6 d-flex justify-content-center">
        <a class="btn btn-light btn-lg" href="new_question.php" role="button">Ajouter une Question</a>
    </div>
</div>
<h1 class="mb-5 text-center">
    Liste des questions
</h1>
<div class="row">
    <div class="col table-responsive-sm">
        <table class="table table-dark table-striped shadow rounded text-center">
            <thead>
                <tr>
                    <th scope="col">Culture</th>
                    <th scope="col">Thème</th>
                    <th scope="col">Type</th>
                    <th scope="col">Question</th>
                    <th scope="col">Réponse</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <form action="" method="POST">
                    <?php
                    foreach ($questions as $key) {
                    ?>
                        <tr>
                            <td class="align-middle"><?= $key['culture']; ?></td>
                            <td class="align-middle">
                                <?php
                                if ($key['theme_id'] == 1) {
                                    echo 'Histoire';
                                } elseif ($key['theme_id'] == 2) {
                                    echo 'Géographie';
                                } elseif ($key['theme_id'] == 3) {
                                    echo 'Sports et Loisirs';
                                } elseif ($key['theme_id'] == 4) {
                                    echo 'Arts et Littérature';
                                } elseif ($key['theme_id'] == 5) {
                                    echo 'Sciences et Nature';
                                } elseif ($key['theme_id'] == 6) {
                                    echo 'Divertissement';
                                }
                                ?>
                            </td>
                            <td class="align-middle"><?= $key['type'] == 1 ? 'V/F' : 'QCM'; ?></td>
                            <td class="align-middle"><?= $key['question_name']; ?></td>
                            <td class="align-middle"><?= $key['type'] == 1 ? ($key['right_answer'] == 1 ? 'Vrai' : 'Faux') : $key['answer_' . $key['right_answer']]; ?></td>
                            <td class="align-middle">
                                <a class="btn my-0 py-0 px-1" href="modify_question.php?id=<?= $key['question_id']; ?>" role="button">
                                    <i class="fas fa-edit text-white"></i>
                                </a>
                                <button name="question_id" type="submit" value="<?= $key['question_id']; ?>" class="btn my-0 py-0 px-1">
                                    <i class="fas fa-trash-alt text-white"></i>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </form>
            </tbody>
        </table>
    </div>
</div>


<!-- ----------------------------------------- -->
<!-- Fin du Main -->
<!-- ----------------------------------------- -->

<?php
// Récupération Header
require_once __DIR__ . '/inc/footer.php';
?>