<?php
unset($_SESSION['id']);
unset($_SESSION['login']);

// URL vers laquelle rediriger une page + Alerte personnalisée
header('Location: index.php');
$_SESSION['info'] ="Vous êtes bien déconnecté";
?>