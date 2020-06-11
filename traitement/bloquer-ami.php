<?php

if(isset($_GET['id'])){
    //Ami -> Si c'est moi qui est envoyé une invitation
    $sql = "UPDATE lien set etat='banni' WHERE idUtilisateur1=? AND idUtilisateur2=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($_GET['id'],$_SESSION['id']));

    //Ami -> Si c'est l'utilisateur une personne qui m'a demandé en ami -> idUtilisateur 
    $sql2 = "UPDATE lien set etat='banni' WHERE idUtilisateur2=? AND idUtilisateur1=?";
    $q2 = $pdo->prepare($sql2);
    $q2->execute(array($_GET['id'],$_SESSION['id']));
}

header("Location:".$_SERVER['HTTP_REFERER']);

?>