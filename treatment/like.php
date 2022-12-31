<?php
    $sql = "SELECT * FROM leslike where idUtilisateur = ? and idPoste = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($_SESSION['id'],$_GET['poste']));
    if($line=$query->fetch()) {
        if($line['Statut'] == 'like'){
            $sql2 = "UPDATE leslike SET Statut = 'unlike' WHERE id = ?";
            $query2 = $pdo->prepare($sql2);
            $query2->execute(array($line['id']));
            header('Location:'.$_POST['redirection']);
        }
        else{
            $sql2 = "UPDATE leslike SET Statut = 'like' WHERE id = ?";
            $query2 = $pdo->prepare($sql2);
            $query2->execute(array($line['id']));
            header('Location:'.$_POST['redirection']);
        }
    }
    else{
        $sql = "INSERT INTO leslike values(NULL,?,?,'like')";
        $query = $pdo->prepare($sql);
        $query->execute(array($_SESSION['id'],$_GET['poste']));
        header('Location:'.$_POST['redirection']);
    }
?>