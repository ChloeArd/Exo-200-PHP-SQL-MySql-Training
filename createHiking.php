<?php

if (issetPostParams('name', 'difficulty', 'distance', 'duration', 'height_difference', 'available')) {

    require "Classes/DB.php";

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

    echo "<a href='read.php'> Les randonnées </a>";
}



/**
 * Return true if all params are set, false if at least one is missing.
 * @param string ...$params
 * @return bool
 */
function issetPostParams(string ...$params): bool {
    foreach ($params as $param) {
        if (!isset($_POST[$param])) {
            // Si un seul paramètres donnés n'est pas là, alors je retourne false.
            return false;
        }
    }
    //Si on arrive jusqu'ici, ca signifie que tous les paramètres sont présents.
    return true;
}

/**
 * Assainit le contenu d'une variable
 * @param $data
 * @return string
 */
function sanitize($data) {
    // Supprime les espaces superflus en début et fin de chaine.
    $data = trim($data);
    // Supprime les antislashes que les hackers pourraient utiliser pour échapper des caractères spéciaux.
    $data = stripslashes($data);
    // Transforme certains caractères spéciaux en entités HTML pour les rendre innofensifs.
    $data = htmlspecialchars($data);
    return $data;
}