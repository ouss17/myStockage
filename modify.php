<?php
include 'database/Database.class.php';
$id = $_GET["id"];
if (empty($_POST) === false) {
    $name = $_POST["name"];
    $url = $_POST["url"];
    $bdd = $_POST["bdd"];
    $postId = $_POST["id"];

    //Ajout site + bdd
    $suery = $pdo->prepare(
        'UPDATE site
     SET Site_Url = ?, Site_Name = ?, Database_Mdp = ?
     WHERE id=?'
    );
    $suery->execute([$url, $name, $bdd, $postId]);

//var_dump($name, $url, $bdd);
     Header('Location: index.php');
     exit();
}

$query = $pdo->prepare(
    "SELECT *
FROM site
WHERE Id = ?"
);
$query->execute([$id]);

$site = $query->fetch(PDO::FETCH_ASSOC);
//var_dump($site);
include 'phtml/modify.phtml';
