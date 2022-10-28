<?php

if(isset($_GET['id'])){
    $sql = "INSERT INTO lien VALUES(NULL,? , ?, 'attente')";
    $q = $pdo->prepare($sql);
    $q->execute(array($_SESSION['id'],$_GET['id']));
}

header("Location:".$_SERVER['HTTP_REFERER']);

?>