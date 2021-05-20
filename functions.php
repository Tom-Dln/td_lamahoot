<!-- ---------------------------------------------
    Fichier de Fonctions
---------------------------------------------- -->

<?php

#################### Connexion BDD ####################


function bdd_connect()
{
    try {
        $options = [
            // Permet à PDO de lever des exceptions en cas d'erreur SQL
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        // data source name
        $dsn = 'mysql:host=' . BDD_HOST . ';dbname=' . BDD_NAME . ';charset=utf8';
        // instance de la base de données (pdo)
        $bdd_instance = new PDO($dsn, BDD_USER, BDD_PWD, $options);
        // printf('Connexion Base De Données - Active');
        return $bdd_instance;
    } catch (PDOException $ex) {
        printf('Connexion Base De Données - Erreur code "%s"', $ex->getCode());
        // arrêter l'exécution du script
        // die();
    }
}


function get_questions()
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        SELECT
            `question_id` ,`culture`, `theme_id`, `type`, `question_name`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `right_answer`
        FROM `questions`
        ORDER BY `culture`
EOD;
    $stmt = $bdd_instance->query($request);
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $questions;
}


function get_qestion($id)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        SELECT
            `culture`, `theme_id`, `type`, `question_name`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `right_answer`
        FROM `questions`
        WHERE `question_id` = :id;
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $question = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($question);
}


function new_question($culture, $theme_id, $type, $question_name, $answer_1, $answer_2, $answer_3, $answer_4, $right_answer)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        INSERT INTO `questions` (`culture`, `theme_id`, `type`, `question_name`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `right_answer`)
        VALUES (:culture, :theme_id, :type, :question_name , :answer_1 , :answer_2 , :answer_3 , :answer_4 , :right_answer)
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':culture', $culture);
    $stmt->bindValue(':theme_id', $theme_id);
    $stmt->bindValue(':type', $type);
    $stmt->bindValue(':question_name', $question_name);
    $stmt->bindValue(':answer_1', $answer_1);
    $stmt->bindValue(':answer_2', $answer_2);
    $stmt->bindValue(':answer_3', $answer_3);
    $stmt->bindValue(':answer_4', $answer_4);
    $stmt->bindValue(':right_answer', $right_answer);
    $stmt->execute();
}


function modify_question($id, $culture, $theme_id, $type, $question_name, $answer_1, $answer_2, $answer_3, $answer_4, $right_answer)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        UPDATE `questions`
        SET `culture` = :culture, `theme_id` = :theme_id, `type` = :type, `question_name` = :question_name, `answer_1` = :answer_1, `answer_2` = :answer_2, `answer_3` = :answer_3, `answer_4` = :answer_4, `right_answer` = :right_answer
        WHERE `question_id` = :id
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':culture', $culture);
    $stmt->bindValue(':theme_id', $theme_id);
    $stmt->bindValue(':type', $type);
    $stmt->bindValue(':question_name', $question_name);
    $stmt->bindValue(':answer_1', $answer_1);
    $stmt->bindValue(':answer_2', $answer_2);
    $stmt->bindValue(':answer_3', $answer_3);
    $stmt->bindValue(':answer_4', $answer_4);
    $stmt->bindValue(':right_answer', $right_answer);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}


function delete_question($question_id)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        DELETE FROM `questions`
        WHERE `question_id` = :question_id;
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':question_id', $question_id);
    $stmt->execute();
}

?>