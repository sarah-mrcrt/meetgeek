<!-- Toutes les missions -->
<?php
    $sql = " SELECT * FROM ecrit ORDER BY id DESC";
    $req = $pdo->query($sql);
    
    while($ligne = $req->fetch()) {
?>

<?php echo $ligne['contenu'];?>
</br>

<?php
}
?>