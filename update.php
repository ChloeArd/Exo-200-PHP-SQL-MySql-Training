<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Randonnées, modification</title>
    <link rel="stylesheet" href="css/basics.css">
</head>
<body>

<form method="post" action="public/updateHicking.php?id=<?= $_GET['id'] ?>">
    <input type="text" name="name" placeholder="Nom de la randonnée" value="<?= base64_decode($_GET["name"]) ?>">
    <select name="difficulty" id="difficulty">
        <option value="<?= $_GET["difficulty"] ?>" autofocus><?= $_GET["difficulty"] ?></option>
        <option value="très facile">Très facile</option>
        <option value="facile">Facile</option>
        <option value="moyen">Moyen</option>
        <option value="difficile">Difficile</option>
        <option value="très difficile">Très difficile</option>
    </select>
    <input type="number" name="distance" placeholder="Distance (km)" value="<?= $_GET["distance"] ?>">
    <input type="time" name="duration" value="<?= $_GET["duration"] ?>">
    <input type="number" name="height_difference" placeholder="Dénivelé (m)" value="<?= $_GET["height_difference"] ?>">
    <input type="text" name="available" value="<?= base64_decode($_GET['available']) ?>" placeholder="Available">

    <input id="enter" type="submit" name="Enter" value="ajouter">
</form>
</body>
</html>