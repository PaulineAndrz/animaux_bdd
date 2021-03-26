<?php

/** CAS AVEC 1 TABLE chien avec 3 colonnes (id, nom, type) */

// $pdo = new PDO('mysql:host=localhost; dbname=animaux', 'visiteur', 'root');

// function select() {
//     global $pdo;
//     $select = $pdo -> query('SELECT * FROM animaux.chien');
//     $select = $select -> fetchAll(PDO::FETCH_OBJ);
//     return $select;
// };

// $chien = select();

// function add($nom, $type) {
//     global $pdo;
//     $add = $pdo -> prepare("INSERT INTO animaux.chien (`nom`, `type`) VALUE (?, ?)");
//     $add->bindParam(1, $nom);
//     $add->bindParam(2, $type);
//     $add->execute(); 
// };

// if(isset($_REQUEST['nom']) && !empty($_REQUEST['nom']) && isset($_REQUEST['type']) && !empty($_REQUEST['type'])) {
//     add($_REQUEST['nom'], $_REQUEST['type']);
//     $animaux = select(); // rafraichir l'affichage
// };

?>

<?php

/** CAS AVEC 2 TABLES (chien et race) */


$pdo = new PDO('mysql:host=localhost; dbname=animaux', 'visiteur', 'root');

// Récupération des noms des chiens et de leur type
function selectChienEtRace() {
    global $pdo;
    $select = $pdo -> query('SELECT nom, type FROM animaux.chien AS chien INNER JOIN animaux.race AS race ON chien.race_id = race.id');
    $select = $select -> fetchAll(PDO::FETCH_OBJ);
    return $select;
};

// Récupération des types de races de chien et de leur id 
function selectRace() {
    global $pdo;
    $select = $pdo -> query('SELECT * FROM animaux.race;');
    $select = $select -> fetchAll(PDO::FETCH_OBJ);
    return $select;
};

// Ajout d'un nouveau chien dans la base de données
function add($nom, $raceId) {
    global $pdo;
    $add = $pdo -> prepare("INSERT INTO animaux.chien (`nom`, `race_id`) VALUE (?, ?)");
    $add->bindParam(1, $nom);
    $add->bindParam(2, $raceId);
    $add->execute(); 
};


// Appel des methodes select() et add()

$chien = selectChienEtRace();
$race = selectRace();

if(isset($_REQUEST['nom']) && !empty($_REQUEST['nom']) && isset($_REQUEST['raceId']) && !empty($_REQUEST['raceId'])) {
    add($_REQUEST['nom'], $_REQUEST['raceId']);
    $chien = selectChienEtRace(); // rafraichir l'affichage
};

?>