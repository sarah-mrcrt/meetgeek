<?php

// Etape 1  : Je vérifie que mes variables sont remplies
//if(isset($_POST['email'], $_POST['login'], $_POST['mdp'], $_POST['avatar'])) {

//Etape 2 : Je regarde dans ma BDD
$sql = "SELECT * FROM user WHERE login=?";

// Etape 3  : Je prépare la requete
$query = $pdo->prepare($sql);

// Etape 4  : Je l'execute
$query->execute(array($_POST['login']));

// Etape 5 : Je parcours ma BDD
// FETCH = Récupérer des valeurs SQL avec la fonction fetch()
$result = $query->fetch();

// Je vérifie si le login existe déjà
//Si il n'existe pas alors :
if($result == false) {

    /*********** Je mets obligatoirement un avatar ********/
    /* Je crée le dossier AVATAR */
    $dossier = "avatar/";

    /* Je récupére le nom de l'image choisi */
    $fichier = basename($_FILES["fileToAvatar"]["name"]);
    /*Si on demande d'uploader des images*/
    if (move_uploaded_file($_FILES["fileToAvatar"]["tmp_name"], $dossier .$fichier)) {
        /* Je récupère le chemain "/uploads" que j'associe au nom de l'image choisi */
        echo "Le fichier est en ligne";



        // Il n'y a pas de login identique donc j'insere le nouvel utilisateur
        $sql = "INSERT INTO user VALUES(NULL,?,PASSWORD(?),?,NULL,?);";

        // Etape 1  : preparation
        $query = $pdo->prepare($sql);

        // Etape 2 : execution
        $query->execute(array($_POST['login'], $_POST['mdp'], $_POST['email'], $dossier .$fichier));
        //$_SESSION['info'] ="bravo, t'as créer ton compte, connectes toi mnt !";

        $_SESSION['id'] = $pdo->lastInsertId();
        $_SESSION['login'] = $_POST['login'];
        header('Location: index.php?action=accueil');
    }
    else{
        message('Dommage, le login existe déjà');
        header("Location:index.php?action=login");
    }
}
?>
