<div class="container ami">
    <?php


    echo "<div class='ami-fond-noir'>";

    if($_GET['id'] == $_SESSION['id']){
        echo "<h3>Tous mes amis</h3>";
    }else{
        echo "<h3>Tous ses amis</h3>";
    }

    $sql = "SELECT DISTINCT  lien.*, user.* FROM user JOIN lien ON user.id=lien.idUtilisateur1 OR user.id=lien.idUtilisateur2 WHERE lien.etat='ami' AND (lien.idUtilisateur1 = ? OR lien.idUtilisateur2 = ?) AND user.id != ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($_GET['id'],$_GET['id'],$_GET['id']));



    echo "<div>";
    while($l = $q->fetch()){
        echo "<div class='ami-fond-blanc'>";
        $idp = $l['id'];
        echo "<span class='ami-fond-bleu'></span>";
        echo "<a href='index.php?action=mur&id=".$idp."'><img class='avatar avatar-rond' src='". $l['avatar'] ."' alt=''></a>";
        echo "<a class='prenom Player-typo' href='index.php?action=mur&id=".$idp."'> ".$l['login']." </a>";
        echo "</div>";


    }
    echo "</div>";
    echo "</div>";

    ?>
</div>