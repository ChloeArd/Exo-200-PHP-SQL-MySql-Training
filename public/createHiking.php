<?php

include "../lib/functions.php";
require "../Classes/DB.php";

if (issetPostParams('name', 'difficulty', 'distance', 'duration', 'height_difference', 'available')) {
    $bdd = DB::getInstance();

    // Données du formulaire :
    $name = sanitize($_POST['name']);
    $difficulty = sanitize($_POST['difficulty']);
    $distance = sanitize($_POST['distance']);
    $duration = sanitize($_POST['duration']);
    $height_difference = sanitize($_POST['height_difference']);
    $available = sanitize($_POST['available']);

    $sql = "INSERT INTO hiking VALUES (null, '$name', '$difficulty', '$distance', '$duration', '$height_difference', '$available')";

    $bdd->exec($sql);

    echo "<div> La randonnée a bien été ajoutée !</div>";

    echo "<a href='../read.php'> Les randonnées </a>";
}