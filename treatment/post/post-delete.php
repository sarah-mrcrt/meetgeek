<?php

$sql = "DELETE FROM ecrit WHERE id=?";
$q = $pdo->prepare($sql);
$q->execute(array($_GET['id']));

//Je retourne sur le serveur où j'étais
header("Location:".$_SERVER['HTTP_REFERER']);