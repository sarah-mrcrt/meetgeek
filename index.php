<?php
include("config/bd.php");
include("config/actions.php");
session_start();
?>

<!doctype html>
<html lang="fr">

    <head>
        <!------------------- ENCODAGE ------------------->
        <meta charset="utf-8" />
        <!------------------- VIEWPORT ------------------->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <!------------------- CSS ------------------->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <!-- <link href="css/styles.css" rel="stylesheet"> -->
        <!------------------- FONT AWESOME ------------------->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
        <!------------------- GOOGLE FONT ------------------->
        <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <!------------------- META TAGS ------------------->
        <title>CINEMATIC</title>
        <meta name="description" content="blablabla">
        <meta name="author" content="Sarah Mauriaucourt">
        <!------------------- FAVICON ------------------->
    </head>

    <body>
        <!------------------- TOASTER ------------------->
        <?php
            if (isset($_SESSION['info'])) {
        ?>
        <strong>Information : </strong> <?php $_SESSION['info'] ?>
        <?php 
            unset($_SESSION['info']);
        }
        ?>

        <!------------------- HEADER ------------------->
        <?php include_once('./views/layouts/header.php'); ?>
        
        <!------------------- MAIN ------------------->
        <main>
            <?php
            // Quelle est l'action à faire ?
            if (isset($_GET["action"])) {
                $action = $_GET["action"];
            } else {
                $action = "login";
            }

            // Est ce que cette action existe dans la liste des actions
            if (array_key_exists($action, $listeDesActions) == false) {
                include("views/erros/404.php"); // NON : page 404
            } else {
                include($listeDesActions[$action]); // Oui, on la charge
            }
        ?>
        </main>


        <!------------------- FOOTER ------------------->
        <?php include_once('./views/layouts/footer.php'); ?>

        <!------------------- JavaScript ------------------->
        <!-- Bootstrap.js -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- WOW.js -->
        <script src="js/wow.min.js"></script>
        <!-- JS -->
        <!-- configuration de wow.js -->
        <script>
            new WOW({
                mobile: false,
                animateClass: 'animate__animated',
                offset: 80
            }).init();
        </script>
    </body>

</html>