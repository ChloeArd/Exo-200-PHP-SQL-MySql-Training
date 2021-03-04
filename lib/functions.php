<?php

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
    // Ajoute des slashes pour éviter de fermer les chaînes de caractères dans le formulaire.
    $data = addslashes($data);
    return $data;
}