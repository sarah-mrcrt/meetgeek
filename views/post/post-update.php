<!-- RECUPERER l'ID du post -->
<?php
    $sql = "SELECT * FROM ecrit";
    $q
?>

<form action="index.php?action=update-post" method="POST" enctype="multipart/form-data">
    <input maxlength="25" type="text" name="titre" placeholder="">
    <textarea rows="4" maxlength="280" name="contenu" placeholder="afficher extrait du msg"></textarea>


    <input type="submit" name="submit" id="publier" placeholder="Publier" />
    <label for="publier">
        <i class="fa fa-paper-plane" aria-hidden="true"></i> Publier
    </label>

</form>