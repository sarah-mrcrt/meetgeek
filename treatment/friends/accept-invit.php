<?php

//Dans ma BDD, je modifie le statut "état" de la personne qui peut possiblement devenir mon ami
// idUtilisateur1 = la personne qui envoye l'invition
//idUtilisateur2 = la personne qui reçoit l'invitation

if(isset($_GET['id'])){
    $sql = "UPDATE lien set etat='ami' WHERE idUtilisateur1=? AND idUtilisateur2=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($_GET['id'], $_SESSION['id']));
}

header("Location:".$_SERVER['HTTP_REFERER']);

?>