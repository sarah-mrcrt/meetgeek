HOME
<!-- Toutes les missions -->
<?php
    $sql = " SELECT * FROM ecrit ORDER BY id DESC";
    $req = $pdo->query($sql);
    
    while($ligne = $req->fetch()) {
?>

<?php echo $ligne['contenu'];?>
<?php
// if($_GET['id'] == $_SESSION["id"] || $ligne['idAuteur'] == $_SESSION['id']) {
//     $id = $_SESSION["id"];
//     $idA = $ligne['idAuteur'];
    // echo "<a href='index.php?action=del-post&id=$idA'><img class='trash' src='./Ressources/trash.png'></a>";
// }
?>
</br>

<?php
}
?>