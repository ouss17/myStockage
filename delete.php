<?php

// if((array_key_exists('role', $_SESSION)===false) || $_SESSION['role'] !== "admin") {
// Header('Location: login.php');
// exit();
// }
include 'database/Database.class.php';

$id = $_GET['id'];

$query = $pdo->prepare
(
  'DELETE
  FROM site
  WHERE Id = ?'
);
$query->execute([$id]);


Header('Location: index.php');
exit();
