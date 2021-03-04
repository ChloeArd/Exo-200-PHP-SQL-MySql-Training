<?php

include "../lib/functions.php";
require "../Classes/DB.php";

if (issetPostParams('name', 'difficulty', 'distance', 'duration', 'height_difference', 'available')) {
    $bdd = DB::getInstance();

    // Données du formulaire :
    $id = $_GET['id'];
    $name = sanitize($_POST['name']);
    $difficulty = sanitize($_POST['difficulty']);
    $distance = sanitize($_POST['distance']);
    $duration = sanitize($_POST['duration']);
    $height_difference = sanitize($_POST['height_difference']);
    $available = sanitize($_POST['available']);

    $stm = $bdd->prepare("UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :height_difference, available = :available WHERE id = :id");

    $stm->bindParam(':name', $name);
    $stm->bindParam(':difficulty', $difficulty);
    $stm->bindParam(':distance', $distance);
    $stm->bindParam(':duration', $duration);
    $stm->bindParam(':height_difference', $height_difference);
    $stm->bindParam(':available', $available);
    $stm->bindParam(':id', $id);

    $stm->execute();

    echo "<div> La randonnée a bien été modifiée !</div>";

    echo "<a href='../read.php'> Les randonnées </a>";
}