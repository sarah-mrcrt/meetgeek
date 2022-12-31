 <?php
    
    // Sur le mur d'un ami - Associer l'identifant de l'utilisateur au POST
    $sql = "SELECT ecrit.*,user.login, user.avatar FROM ecrit JOIN user ON idAuteur=user.id ORDER BY ecrit.id desc";

    $q = $pdo->prepare($sql);
    $q->execute(array($_GET['id']));

    // Afficher le mur d'actualité (exemple : http://localhost:8000/index.php?action=mur&id=9)
    while($l = $q->fetch()) {
        $id = $l['idAuteur'];
        $idp = $l['id'];
        $date = $l['dateEcrit'];
        $avatar = $l['avatar'];

        echo "<a href='index.php?action=mur&id&id=$id'><img src='".$avatar."' alt=''></a>";
        echo "<a class='Player-typo prenom' href='index.php?action=mur&id=$id'>" .$l['login'] ." </a>";
        //Afficher la date
        echo "<span class='date'>".getRelativeTime($date)."</span>";

        //Possibilité de supprimer le post si c'est son mur ou si on a mis le post
        if($_GET['id'] == $_SESSION['id'] || $l['idAuteur'] == $_SESSION['id']) {
            echo "<a href='index.php?action=del-post&id=$idp'>SUPPRIMER</a>";


            echo "<a href='index.php?action=update-post&id=$idp'>UPDATE</a>";
        }
    
        echo "<p class='Player-typo titre'>". $l['titre'] . "<p>";
        echo "<p class='contenu'>" .$l['contenu'] ."</p>";

        //Si le formulaire de l'image n'est pas vide alors je l'affiche
        if(!empty($l['image'])){
            echo "<img class='upload-image' src='" .$l['image'] ."'  alt=''/> ";


        }
    }

?>