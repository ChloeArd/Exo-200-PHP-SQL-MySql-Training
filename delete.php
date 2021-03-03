<?php
try {
    $server = "localhost";
    $db = "database/reunion_island";
    $user = "root";
    $psw = "";

    $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $psw);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $id = $_GET['id'];

    $sql = "DELETE FROM hiking WHERE id = $id";
    if ($bdd->exec($sql) !== false) {
        echo "l'id " . $id . " a bien été supprimé !";
        header("Location: read.php");
    }

}
catch (PDOException $e) {
    echo $e->getMessage();
}