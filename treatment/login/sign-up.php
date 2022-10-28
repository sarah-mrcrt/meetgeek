<?php
    //Etape 1 : Je regarde dans ma BDD
    $sql = "SELECT * FROM user WHERE email=?";

    // Etape 2  : Je prépare la requete
    $query = $pdo->prepare($sql);

    // Etape 3  : Je l'execute
    $query->execute(array($_POST['email']));

    // Etape 4 : Je parcours ma BDD
    // FETCH = Récupérer des valeurs SQL avec la fonction fetch()
    $result = $query->fetch();

    // Si l'email est unique : 
    if($result == false) {
            // Insertion d'un nouvel utilisateur
            $sql = "INSERT INTO user VALUES(NULL,?,PASSWORD(?),?,NULL, NULL);";

            // Etape 1  : preparation
            $query = $pdo->prepare($sql);

            // Etape 2 : execution
            $query->execute(array($_POST['login'], $_POST['mdp'], $_POST['email']));

            $_SESSION['id'] = $pdo->lastInsertId();
            $Session['login']= $line['login'];
            
            $_SESSION['info'] ="bravo, t'as créer ton compte";
            header('Location: index.php?action=accueil');
    }else {
        header('Location: index.php?action=login');
        $_SESSION['info'] ="user existe déjà";
    }
?>
