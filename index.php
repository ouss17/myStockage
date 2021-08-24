<?php
// session_start();

echo '<script>let slider;
slider = setInterval(()=>{
window.location.href = "index.php";
}, 3000000);</script>';



// if ((array_key_exists('role', $_SESSION) === false) || $_SESSION['role'] !== "admin") {
//     Header('Location: login.php');
//     exit();
// }
include 'database/Database.class.php';
if (empty($_POST) === false) {
    $name = $_POST["name"];
    $url = $_POST["url"];
    $bdd = $_POST["bdd"];

    //Ajout site + bdd
    $suery = $pdo->prepare(
        'INSERT INTO site (Site_Url, Site_Name, Database_Mdp)
     VALUES (?, ?, ?)'
    );
    $suery->execute([$url, $name, $bdd]);


    Header('Location: index.php');
    exit();
}
$query = $pdo->prepare(
    'SELECT *
      FROM site
      ORDER BY Site_Name'
);
$query->execute();

$sites = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($sites as $site) {
$check = $site["Site_Url"];
$header_response = get_headers($check, 1);
//var_dump($header_response[0]);
//var_dump(strpos($header_response[0], "404"));
if (strpos($header_response[0], "404") === false) {
    //var_dump(strpos($header_response[0], "503"));
    if (strpos($header_response[0], "503") === false) {
        $contents = file_get_contents($site["Site_Url"]);
        //var_dump($contents);
        $search   = "aaaJIs6584Mhisbc88)!{";
        var_dump(strpos($contents, $search));
        if (strpos($contents, $search) !== false) {
            echo "En construction";
        } else if (strpos($contents, "mJiedskn547!:feu(LJsjdn") !== false) {
            //var_dump(strpos($contents, "mJiedskn547!:feu(LJsjdn"));
            echo "En ligne";
                $very = $pdo->prepare(
                    'UPDATE site 
                    SET Online = "Oui"
                    WHERE Id = ?'
                );
                $very->execute([$site["Id"]]);
        } else if(strpos($contents, "mJiedskn547!:feu(LJsjdn") === false && strpos($contents, $search) === false){
                echo "Hors ligne";
                $ery = $pdo->prepare(
                  'UPDATE site 
                    SET Online = "Non"
                    WHERE Id = ?'
                );
                $ery->execute([$site["Id"]]);
        }
    }else {
        echo 'En maintenance';
    }
}
}


include 'phtml/index.phtml';
