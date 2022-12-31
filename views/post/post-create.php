<form action="index.php?action=new-post" method="POST" enctype="multipart/form-data">
    <input maxlength="25" class="input-titre Player-typo" type="text" name="titre" placeholder="Titre de votre message">
    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
    <textarea rows="4" maxlength="280" name="contenu" placeholder="Exprimez-vous"></textarea>

    <input type="file" name="fileToUpload" id="fileToUpload" accept="image/png, image/jpeg, image/gif, image/jpg" />
    <label for="fileToUpload">
        <i class="fa fa-image">&nbsp;</i>Photo
    </label>

    <input type="submit" name="submit" id="publier" placeholder="Publier" />
    <label for="publier">
        <i class="fa fa-paper-plane" aria-hidden="true"></i> Publier
    </label>
</form>