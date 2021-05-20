<?php
// Nettoyage complet des deux valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_name']) && isset($_POST['user_score'])) {
    $user_score = $_POST['user_score'];
    $user_name = $_POST['user_name'];
    if (!empty($user_name)) {
        $user_name_clean = test_input($user_name);
        $user_score_clean = test_input($user_score);
        if (check_if_username($user_name_clean) && check_if_number($user_score_clean)) {
            // Variables finales, la valeur est nettoyé et prête.
            $sql_username = $user_name_clean;
            $sql_score = $user_score_clean;
            // Déclencher la requête de sauvegarde ICI
            add_new_score($sql_username, $sql_score);
            header('Location: index.php?pg=menu');
        }
    }
    // echo $sql_score;
    // echo $sql_username;
    if (!isset($sql_username) || !isset($sql_score)) {
        echo 'uh uh...? something went wrong !';
    }
}



function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function check_if_username($value)
{
    return preg_match("/^[a-zA-Z0-9]+([_ -]?[a-zA-Z0-9])*$/", $value);
}
function check_if_number($value)
{
    echo $value;
    return preg_match("/^[0-9]*$/", $value);
}
