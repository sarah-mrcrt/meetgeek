<?php
include("config/config.php");
include("config/bd.php");
include("divers/balises.php");
include("config/actions.php");
session_start();
ob_start(); // Je démarre le buffer de sortie : les données à afficher sont stockées
?>

<!DOCTYPE html>
<html lang="fr" xml:lang="fr" xmlns:og="http://ogp.me/ns#">
        <head>
        <!-- Encondage -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Expérience utilisateur -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- MetaCard -->
        <title>MeetGeek - Rencontres entre geeks</title>
        <meta name="title" content="MeetGeek - Rencontres entre geeks" />
        <meta name="description" content="Faite de nouvelles connaissances avec meetgeek. Discutez de retrogaming, séries, ...">
        <meta name="keywords" content="Sarah Mauriaucourt, multimedia, facebook, design, web, mmi, geek, gamer, nerd">
        <meta name="copyright" content="© Sarah Mauriaucourt & Hélèna Herbaut" />
        <meta name="robots" content="index, follow, archive" />
        <!-- OpenG -->
        <meta property="og:type" content="website"/>
        <meta property="og:site_name" content="MeetGeek"/>
        <meta property="og:url" content="https://meetgeek.sarahmauriaucourt.fr"/>
        <meta property="og:title" content="MeetGeek - Rencontres entre geeks">
        <meta property="og:description" content="Faite de nouvelles connaissances avec meetgeek. Discutez de retrogaming,séries, ...">
        <meta property="og:locale" content="fr_FR"/>
        <!-- Icons -->
        <link rel="apple-touch-icon" sizes="57x57" href="Ressources/icons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="Ressources/icons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="Ressources/icons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="Ressources/icons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="Ressources/icons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="Ressources/icons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="Ressources/icons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="Ressources/icons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="Ressources/icons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="Ressources/icons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="Ressources/icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="Ressources/icons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="Ressources/icons/favicon-16x16.png">
        <link rel="manifest" href="Ressources/icons/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="Ressources/icons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!-- Font awesome -->
        <script src="https://kit.fontawesome.com/c51a60e485.js" crossorigin="anonymous" integrity="sha384-NBHAuYUNWKduo4crumSk720p46lSGmSF7SDtoMEmu+SnsanQ94l8NiUhAPI0UIqx"></script>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <!-- Stylesheets -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/style.css" rel="stylesheet">
        <link href="./normalize.css" rel="stylesheet">
        <!-- JavaScript -->
        <script src="js/jquery-3.2.1.min.js"></script>
		 <script type="application/ld+json">
		  {
			"@context": "https://schema.org",
			"@type": "Project",
			"name": "Meetgeek",
			"alternateName": "Meetgeek",
			"url": "http://meetgeek.sarahmauriaucourt.fr/",
			"logo": "http://meetgeek.sarahmauriaucourt.fr/Ressources/logomeetgeek.png",
			"sameAs": [
			  "https://sarahmauriaucourt.fr/",
			  "https://www.linkedin.com/in/sarah-m-067726180",
			  "https://www.youtube.com/channel/UCF7FwMyNoiMXHSgioSrgw5w",
			  "https://www.instagram.com/sarahmrcrt_photo/",
              "https://github.com/sarah-mrcrt",
              "https://www.pinterest.fr/sarahmrcrt/",
			]
		  }
		</script>
    </head>

    <body>
        <?php
        if (isset($_SESSION['info'])) {
            echo "<div class='alert alert-info alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span></button>
                <strong>Information : </strong> " . $_SESSION['info'] . "</div>";
            unset($_SESSION['info']);
        }
        ?>

        <header>
            <img id="logo" src="Ressources/logomeetgeek.png" alt="logomeetgeek"/>
            <h3><a href="index.php?action=accueil">MeetGeek</a></h3>
            <?php
            if (isset($_SESSION['id'])) {
            ?>
            <div>
                <form action='index.php?action=recherche' method='POST'>
                    <input type='search' placeholder='Rechercher des amis' name='recherche'>
                    <input type='submit'  placeholder='Rechercher'>
                </form>
            </div>

            <div id='header-connexion' class='Player-typo'>
                <?php
                echo "
                    <a href='index.php?action=mur&id=".$_SESSION['id']."'>" . $_SESSION['login'] ."</a>";
                ?>
                <a href='index.php?action=accueil'>Accueil</a>
                <a href='index.php?action=gestion-ami'>Mes amis</a>
                <a href='index.php?action=deconnexion'>Déconnexion</a>
            </div>
            <?php
            }
            ?>
        </header>

        <div class="container-fluid">
            <div class="row">
                <!--<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">-->
                <div class="col-md-12 main">
                    <?php
                    // Quelle est l'action à faire ?
                    if (isset($_GET["action"])) {
                        $action = $_GET["action"];
                    } else {
                        $action = "login";
                    }

                    // Est ce que cette action existe dans la liste des actions
                    if (array_key_exists($action, $listeDesActions) == false) {
                        include("vues/404.php"); // NON : page 404
                    } else {
                        include($listeDesActions[$action]); // Oui, on la charge
                    }

                    ob_end_flush(); // Je ferme le buffer, je vide la mémoire et affiche tout ce qui doit l'être
                    ?>
                </div>
                <div>
                    <?php
                    // Quelle est l'action à faire ?
                    if (isset($_GET["action"])) 
                    ?>

                </div>
            </div>
        </div>

        <footer>
		  <p>By <bold><a style="color:white;" href="https://helenaherbaut.wordpress.com/">Hélèna Herbaut</a></bold> and <bold><a style="color:white;" href="https://sarahmauriaucourt.fr/">Sarah Mauriaucourt</a></bold></p>
        </footer>
    </body>
</html>