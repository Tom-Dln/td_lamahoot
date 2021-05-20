<?php
include 'config.php';
// Appel de la DB CONTROLE
function call_to_db()
{
    try {
        $options = [
            // Permet à PDO de lever des exceptions en cas d'erreur SQL
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        // data source name
        $dsn = "mysql:host=" . HOST . ";dbname=" . DB_NAME . ";charset=utf8";
        // instance de la base de données (pdo)
        $dbh = new PDO($dsn, USER, PWD, $options);
        // echo 'connecté !';
        return $dbh;
    } catch (PDOException $ex) {
        // message d'erreur
        printf("La connexion à la base de donnée à échouer avec le code %s", $ex->getCode());
        // arrêter l'exécution du script
        die();
    }
}


// LES REQUETES 

// ========
// LECTURE
// ========
// Obtenir les 10 questions aléatoires.
function get_the_questions()
{
    $the_db = call_to_db();
    // Requête SQL
    $sql =
        <<<'EOD'
        SELECT * FROM questions NATURAL JOIN themes ORDER BY RAND() LIMIT 10;
EOD;
    // Exécuter la requête
    $categoryStmt = $the_db->query($sql);
    // Récuperer les données :
    $category = $categoryStmt->fetchAll();
    return $category;
}
function add_new_score($username, $score)
{
    $dbh = call_to_db();
    $sql = <<<'EOD'
        INSERT INTO `lamahoot`.`score` (username, value)
            VALUES (:username, :value)
EOD;

    $Stmt = $dbh->prepare($sql);

    $Stmt->bindValue(':username', $username);
    $Stmt->bindValue(':value', $score);
    $Stmt->execute();
}   

// // Obtenir les users avec tout les détails.
// function get_precise_user($id)
// {
//     $the_db = call_to_db();
//     // Requête SQL
//     $sql =
//         <<<'EOD'
//         SELECT first_name, last_name, birth_date FROM users WHERE user_id = :id;
// EOD;
//     // Exécuter la requête
//     $userStmt = $the_db->prepare($sql);
//     $userStmt->bindValue(':id', $id);
//     $userStmt->execute();
//     // Récuperer les données :
//     $user = $userStmt->fetchAll();
//     return $user;
// }