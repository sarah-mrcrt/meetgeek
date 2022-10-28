<div class="container ami">
    <?php
    if(isset($_SESSION["id"])) {

        echo "<div class='ami-fond-noir'>";
        echo "<h3>Mes demandes envoyées</h3>";

        echo "<div>";
        $sql = " SELECT user.* FROM user INNER JOIN lien ON user.id=idUtilisateur2 AND etat='attente' AND idUtilisateur1=? ";
        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['id']));

        while($l = $q->fetch()){
            $idp = $l['id'];
            echo "<div class='ami-fond-blanc'>";
            echo "<span class='ami-fond-bleu'></span>";
            echo "<a href='index.php?action=mur&id&id=$idp'><img class='avatar avatar-rond' src='". $l['avatar'] ."' alt=''></a>";
            echo "<a class='prenom Player-typo' href='index.php?action=mur&id=$idp'>". $l['login'] ." </a>";
            echo "<div>";
            echo "<a class='bouton-ami' href='index.php?action=annuler-invit&id=$idp'>Annuler</a>";
            echo "</div>";
            echo "</div>";
        }

        echo "</div>";
        echo "</div>";


        echo "<div class='ami-fond-noir'>";
        echo "<h3>Mes demandes en attente</h3>";
        $sql = "SELECT user.* FROM user WHERE id IN(SELECT idUtilisateur1 FROM lien WHERE idUtilisateur2=? AND etat='attente')";
        //Accepter ou refuserla demande
        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['id']));

        echo "<div>";
        //FETCH car que un unique id qu'on veut
        while($l = $q->fetch()){
            echo "<div class='ami-fond-blanc'>";
            $idp = $l['id'];
            echo "<span class='ami-fond-bleu'></span>";
            echo "<a href='index.php?action=mur&id&id=$idp'><img class='avatar avatar-rond' src='". $l['avatar'] ."' alt=''></a>";
            echo "<a class='prenom Player-typo' href='index.php?action=mur&id=$idp'>". $l['login'] ." </a>";
            echo "<div>";
            echo "<a class='bouton-ami' href='index.php?action=accept-invit&id=$idp'>Accepter</a>";
            echo "<a class='bouton-ami' href='index.php?action=refuser-invit&id=$idp'>Refuser</a>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
        echo "</div>";


        echo "<div class='ami-fond-noir'>";
        echo "<h3>Tous mes amis</h3>";
        $sql = "SELECT DISTINCT user.* FROM user JOIN lien ON user.id=lien.idUtilisateur1 OR user.id=lien.idUtilisateur2 WHERE lien.etat='ami' AND (lien.idUtilisateur1 = ? OR lien.idUtilisateur2 = ?) AND user.id != ?";
        //Pouvoir supp l'ami
        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['id'],$_SESSION['id'],$_SESSION['id']));

        echo "<div>";
        while($l = $q->fetch()){
            echo "<div class='ami-fond-blanc'>";
            $idp = $l['id'];
            echo "<span class='ami-fond-bleu'></span>";
            echo "<a href='index.php?action=mur&id&id=$idp'><img class='avatar avatar-rond' src='". $l['avatar'] ."' alt=''></a>";
            echo "<a class='prenom Player-typo' href='index.php?action=mur&id=$idp'> ".$l['login']." </a>";
            echo "<div>";

            echo "<a class='bouton-ami' href='index.php?action=refuser-invit&id=$idp'>Retirer</a>";
            echo "<a class='bouton-ami' href='index.php?action=bloquer-ami&id=$idp'>Bloquer</a>";
            echo "</div>";
            echo "</div>";


        }
        echo "</div>";
        echo "</div>";
        
        
        echo "<div class='ami-fond-noir'>";
        echo "<h3>Ma liste noire</h3>";
        $sql = "SELECT DISTINCT user.* FROM user JOIN lien ON user.id=lien.idUtilisateur1 OR user.id=lien.idUtilisateur2 WHERE lien.etat='banni' AND (lien.idUtilisateur1 = ? OR lien.idUtilisateur2 = ?) AND user.id != ?";
        //Pouvoir supp l'ami
        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['id'],$_SESSION['id'],$_SESSION['id']));

        echo "<div>";
        while($l = $q->fetch()){
            echo "<div class='ami-fond-blanc'>";
            $idp = $l['id'];
            echo "<span class='ami-fond-bleu'></span>";
            echo "<a href='index.php?action=mur&id&id=$idp'><img class='avatar avatar-rond' src='". $l['avatar'] ."' alt=''></a>";
            echo "<a class='prenom Player-typo' href='index.php?action=mur&id=$idp'> ".$l['login']." </a>";
            echo "<div>";
            echo "<a class='bouton-ami' href='index.php?action=refuser-invit&id=$idp'>Débloquer</a>";
            echo "</div>";
            echo "</div>";
        }
        
        echo "</div>";
        echo "</div>";
    }
    ?>
</div>