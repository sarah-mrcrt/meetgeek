<?php

/*
if(isset($_GET['id'])){
    //Si c'est un autre utilisateur qui m'a demandé en ami
    $sql = "UPDATE lien set etat='' WHERE idUtilisateur1=? AND idUtilisateur2=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($_GET['id'],$_SESSION['id']));

    //Si c'est moi qui est envoyé une demande d'ami
    $sql2 = "UPDATE lien set etat='' WHERE idUtilisateur2=? AND idUtilisateur1=?";
    $q2 = $pdo->prepare($sql2);
    $q2->execute(array($_GET['id'],$_SESSION['id']));

}
*/

//Je refuse l'invitation que j'ai envoyé
if(isset($_GET['id'])){
    $sql = "DELETE FROM lien WHERE idUtilisateur2=? AND idUtilisateur1=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($_GET['id'],$_SESSION['id']));
}

header("Location:".$_SERVER['HTTP_REFERER']);

?>