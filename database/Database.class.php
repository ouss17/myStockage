<?php

$pdo = new PDO('mysql:host=localhost;dbname=mystockage', 'root', 'marketplace');

// Paramétrage de la liaison PHP <-> MySQL, les données sont encodées en UTF-8.
$pdo->exec('SET NAMES UTF8');


?>
