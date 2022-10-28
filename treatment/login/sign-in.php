<?php

$sql = "SELECT * FROM user WHERE email=? AND mdp=PASSWORD(?)";

// Etape 1  : preparation
$query = $pdo->prepare($sql);

// Etape 2 : execution : 2 paramètres dans la requêtes !!
$query->execute(array($_POST['email'], $_POST['mdp']));

// Etape 3 : ici le login est unique, donc on sait que l'on peut avoir zero ou une  seule ligne soit une seule FETCH.
if ($line = $query->fetch()) {
    //Si une ligne de la BDD corespond à la donnée entrée
    $_SESSION['id'] = $line['id'];
    $_SESSION['login'] = $line['login'];
    header('Location: index.php?action=accueil');
}
// Si $line est faux le couple login mdp est mauvais, on retourne au formulaire
else {
    header('Location: index.php?action=login');
}

// sinon on crée les variables de session $_SESSION['id'] et $_SESSION['login'] et on va à la page d'accueil

?>
