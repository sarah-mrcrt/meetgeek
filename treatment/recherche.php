
<div class='container ami'>
    <?php
    if (isset($_POST['recherche'])){
        $sql = "SELECT * FROM user WHERE login LIKE '%' ? '%'";
        $q = $pdo->prepare($sql);
        $q->execute(array($_POST['recherche']));

        echo "<div class='ami-fond-noir'>";
        echo "<h3>Résultats de votre recherche</h3>";
        echo "<br/>";

        echo "<div>";
        while($l = $q->fetch()){
            $idp = $l['id'];
            echo "<div class='ami-fond-blanc'>";
            echo "<span class='ami-fond-bleu'></span>";
            echo "<a href='index.php?action=mur&id&id=$idp'><img class='avatar avatar-rond' src='". $l['avatar'] ."' alt=''></a>";
            echo "<a class='prenom Player-typo' href='index.php?action=mur&id=$idp'>". $l['login'] ." </a>";
            echo "</div>";
        }
        echo "</div>";
        echo "</div>";
    }
    ?>
</div>