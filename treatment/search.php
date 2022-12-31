
<?php
if (isset($_POST['recherche'])){
    $sql = "SELECT * FROM user WHERE login LIKE '%' ? '%'";
    $q = $pdo->prepare($sql);
    $q->execute(array($_POST['recherche']));

    echo "<h3>Résultats de votre recherche</h3>";

    while($l = $q->fetch()){
        $idp = $l['id'];

        echo "<a class='prenom Player-typo' href='index.php?action=mur&id=$idp'>". $l['login'] ." </a>";
    }
}
?>
