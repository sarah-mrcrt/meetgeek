<?php
// Voici la liste des actions possibles avec la page à charger associée

$listeDesActions = array(
    //*********** treatment ***********//
    // CONNEXION
    "connexion" => "treatment/login/sign-in.php",
    "store-compte" => "treatment/login/sign-up.php",
    "deconnexion" => "treatment/login/logout.php",
    // POST
    "new-post" => "treatment/post/post-new.php",
    "update-post" => "treatment/post/post-update.php",
    "del-post" => "treatment/post/post-delete.php",
    "post-du-mur"=>"treatment/post/post-du-mur.php",
    // FRIENDS
    "tous-amis" => "treatment/friends/tous-amis.php",
    "accept-invit" => "treatment/friends/accept-invit.php",
    "refuser-invit"=>"treatment/friends/refuser-invit.php",
    "bloquer-ami"=>"treatment/friends/bloquer-ami.php",
    "invit-ami"=>"treatment/friends/invit-ami.php",
    "annuler-invit"=>"treatment/friends/annuler-invit.php",
    // RECHERCHE
    "recherche"=>"treatment/search.php",
    //*********** VIEWS ***********//
    // CONNEXION
    "login" => "views/login/sign-in.php",
    // ERROS
    "error-404" => "views/errors/404.php",
    // PAGES
    // "accueil" => "views/home.php",
    "apropos" => "views/about.php",
    "missions" => "views/missions.php",
    // 
    "accueil" => "views/actualites.php",
    "page2" => "views/page2.php",
    "mur" => "views/mur.php",    
    "gestion-ami" => "views/gestion-ami.php",
);