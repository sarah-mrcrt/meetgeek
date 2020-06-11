<?php

//J'annule l'invitation que j'ai envoyé
if(isset($_GET['id'])){
    $sql = "DELETE FROM lien WHERE idUtilisateur2=? AND idUtilisateur1=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($_GET['id'],$_SESSION['id']));
}

header("Location:".$_SERVER['HTTP_REFERER']);

?>