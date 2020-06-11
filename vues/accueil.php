<?php
include('./traitement/date.php');  
?>

<div class="container">
    <div class="accueil">
        <p id="ensemble-publi" class='Player-typo'>Fil d'actualité</p>

        <?php
        $sql = "SELECT  ecrit.*,user.* FROM ecrit JOIN user ON user.id=idAuteur WHERE  idAmi=? or idAuteur=? or idAmi IN (SELECT idUtilisateur1 FROM lien WHERE idUtilisateur2=? and etat='ami') or idAmi IN (SELECT idUtilisateur2 FROM lien WHERE idUtilisateur1=? and etat='ami') ORDER BY ecrit.id DESC";

        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['id'],$_SESSION['id'],$_SESSION['id'],$_SESSION['id']));
        while($l = $q->fetch()) {
            $id = $l['idAuteur'];
            $idp = $l['id'];
            $date = $l['dateEcrit'];
            $avatar = $l['avatar'];

            $sql = "SELECT * FROM user WHERE id=?";
            $q2 = $pdo->prepare($sql);

            $q2->execute([$l['idAmi']]);
            $ami = $q2->fetch();


            echo "<div class='post actu'>";
            echo "<div class='entete'>";
            echo "<div class='ss-entete'>";
            echo "<a href='index.php?action=mur&id&id=$id'><img class='avatar avatar-rond' src='".$avatar."' alt=''></a>";

            echo "<div class='info-users'>";
            echo "<div class='publier-qq'>";
            echo "<a class='Player-typo prenom' href='index.php?action=mur&id=$id'>".$l['login']." </a>";
            if($l['id'] != $l['idAmi']){
                echo "<span><i class='fa fa-caret-square-o-right' aria-hidden='true'></i>";
                echo "<a class='prenom Player-typo' href='index.php?action=mur&id=".$l['idAmi']."'> ". $ami['login']."</a></span>";
            }
            echo "</div>";

            //Afficher la date
            echo "<span class='date'>".getRelativeTime($date)."</span>";
            echo "</div>";
            echo "</div>";
            echo "<div>";

            //Possibilité de supprimer le post si c'est son mur ou si on a mis le post
            if($l['idAuteur'] == $_SESSION['id']) {
            }
            echo "</div>";
            echo "</div>";

            echo "<p class='Player-typo titre'>". $l['titre'] . "<p>";
            echo "<p class='contenu'>" .$l['contenu'] ."</p>";

            //Si le formulaire de l'image n'est pas vide alors je l'affiche
            if(!empty($l['image'])){
                echo "<img class='upload-image' src='" .$l['image'] ."'  alt=''/> ";
            }
            echo "</div>";
        } 
        ?>

    </div>
</div>
<?php

if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la page de login
    header("Location:index.php?action=login");
}
?>