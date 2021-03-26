<?php
    require 'method.php'
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animaux</title>
</head>
    <body>
        <h2>Ajouter un nouveau chien</h2>
        <form action="" method="post">
            <input type="text" name="nom" placeholder="Nom">
            <!-- Affichage des types de races et récupération de leur id grâce à value -->
            <select name="raceId">
                <?php foreach ($race as $key => $value) { ?>
                    <option value="<?= $value->id ?>"><?= $value->type ?></option>
                <?php } ?>  
            </select>
            <input type="submit" value="Ajouter">
        </form>
        <h2>Liste des chiens</h2>
        <ul>
            <?php foreach ($chien as $key => $value) { ?>
                <li><?= $value->nom ?> - <?= $value->type ?></li>
            <?php } ?>
        </ul>
    </body>
</html>