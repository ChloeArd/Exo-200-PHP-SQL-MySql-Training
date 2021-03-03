<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toutes les Randonnées</title>
    <link rel="stylesheet" href="css/basics.css">
</head>
<body>

</body>
</html>

<?php


$server = "localhost";
$db = "database/reunion_island";
$user = "root";
$psw = "";

try {
    $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $psw);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $stmt = $bdd->prepare("SELECT * from hiking");

    $state = $stmt->execute();

    if ($state) {
        echo "<table>
                <tr>
                    <th>Nom</th>
                    <th>Difficulté</th>
                    <th>Distance</th>
                    <th>Duration</th>
                    <th>Dénivelé</th>
                </tr>
             ";
        foreach ($stmt->fetchAll() as $user) {
            echo " <tr>
                        <td>" . $user['name'] . "</td> 
                        <td>" . $user['difficulty'] . "</td>
                        <td>" . $user['distance'] . " Km</td>
                        <td>" . $user['duration'] . "</td>
                        <td>" . $user['height_difference'] . " m</td>
                </tr>";
        }
    }
    echo "</table>";


} catch (PDOException $e) {
    echo $e->getMessage();
}
