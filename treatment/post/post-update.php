<?php
    // id du lien
    $id = $_GET['id'];
    $session = $_SESSION['id'];
    $sql = "SELECT * FROM user where id=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($_GET['id']));

    $personne = $q->fetch();

    $profil = $_GET['id'];
    echo $id;
    echo $personne['login'];
    echo $personne['email'];
    echo "marche";




// $titre = $_POST['titre'];
// $contenu = $_POST['contenu'];

// echo $id;
// echo $titre;
// echo $contenu;


// $sql = "UPDATE ecrit SET titre = '$titre', contenu = '$contenu' WHERE id = $id";
// $q = $pdo->prepare($sql);
// $q->execute(array($_POST['titre'], $_POST['contenu'], $_SESSION['id']));

?>
