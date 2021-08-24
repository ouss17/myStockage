<?php
    session_start();
include 'database/Database.class.php';
include 'database/lib.php';

if(empty($_POST) === false) {


    $hashPassword = hashPassword($_POST['password']);
    $query = $pdo->prepare(
            'INSERT INTO user (Password, Role, Name)
            VALUES (?, "admin", ?)'
        );
    $query->execute([ $hashPassword, $_POST['name']]);

    Header('Location: login.php');
    exit();
}


include 'phtml/register.phtml';
