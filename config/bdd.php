<?php
$host = "127.0.0.1";
$db = "meetgeek";
$user = "root";
$pass = "";

try {
    // On essaie de créer une instance de PDO.
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    exit("Erreur dans la connexion BDD ".$e->getMessage());
}

    include('./treatment/date.php');
?>