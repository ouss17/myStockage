<?php
    session_start();
    include 'database/Database.class.php';
    include 'database/lib.php';

    $error = null;
    if(empty($_POST) === false) {

        $query = $pdo->prepare(
                'SELECT * FROM user WHERE Name = ?'
            );

        $query->execute([ $_POST['name'] ]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if($user === false) {
            $error = "Utilisateur introuvable";
        } else {
          if( verifyPassword($_POST['password'], $user['Password']) ) {
                $_SESSION['name'] = $user['Name'];
                $_SESSION['role'] = $user['Role'];
                Header('Location: index.php');
                exit();
            } else {
                $error = "Mauvais mot de passe";
            }

        }

    }
    include 'phtml/login.phtml';
?>
