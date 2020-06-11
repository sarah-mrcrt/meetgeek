<div class="mur container">

    <div class="informations">
        <div>
            <?php
            /*---------------- Afficher la PDP & le NOM-------------*/
            // Associer l'utilisateur avec son identifiant ami ou utilisateur
            $sql = "SELECT * FROM user where id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($_GET['id']));

            $personne = $q->fetch();

            $profil = $_GET['id'];
            echo "<div class='ami-fond-blanc'>";
            echo "<span class='ami-fond-bleu'></span>";
            echo "<a href='index.php?action=mur&id&id=$profil'><img class='avatar avatar-rond' src='".$personne['avatar'] ."' alt=''></a>";
            echo "<a class='prenom Player-typo' href='index.php?action=mur&id=$profil'>" . $personne['login'] ." </a>";
            echo "</div>";
            ?>

            <div class="affichage-bouton">
                <?php
                $sql = "SELECT * FROM lien WHERE ((idUtilisateur1=? AND idUtilisateur2=?) OR (idUtilisateur1=? AND idUtilisateur2=?))";
                $q = $pdo->prepare($sql);
                $q->execute(array($_SESSION['id'],$_GET['id'],$_GET['id'],$_SESSION['id']));
                $ami = $q->fetch();    
                if($ami != false && $ami['etat']=='ami'){
                    $idp = $_GET['id'];
                    echo "<a class='bouton-ami' href='index.php?action=refuser-invit&id=$idp'>Retirer</a>";
                    echo "<a class='bouton-ami' href='index.php?action=bloquer-ami&id=$idp'>Bloquer</a>";
                }
                if($ami['etat']=='banni'){
                    $idp = $_GET['id'];
                    echo "<a class='bouton-ami' href='index.php?action=refuser-invit&id=$idp'>Débloquer</a>";
                }
                if($ami['etat']!='banni' && $ami['etat']!='attente' && $ami['etat']!='ami' && $_SESSION['id'] != $_GET['id'] ){
                    $idp = $_GET['id'];
                    echo "<a class='bouton-ami' href='index.php?action=invit-ami&id=$idp'>Inviter</a>";
                }
                ?>
            </div>
            <?php
            //Si c'est moi qui est envoyé une demande d'ami, je peux annuler
            $sqlAtt = "SELECT * FROM lien WHERE ((idUtilisateur1=? AND idUtilisateur2=?))";
            $qAtt = $pdo->prepare($sqlAtt);
            $qAtt->execute(array($_SESSION['id'],$_GET['id']));
            $att = $qAtt->fetch();  
            if($att['etat']=='attente') {
                $idp = $_GET['id'];
                echo "<div>";
                echo "<a class='bouton-ami' href='index.php?action=annuler-invit&id=$idp'>Annuler</a>";
                echo "</div>";
            }
            //Si c'est quelqu'un qui m'a envoyé une demande d'ami, je peux accepter ou refuser
            $sqlAttente = "SELECT * FROM lien WHERE ((idUtilisateur1=? AND idUtilisateur2=?))";
            $qAttente = $pdo->prepare($sqlAttente);
            $qAttente->execute(array($_GET['id'],$_SESSION['id']));
            $attente = $qAttente->fetch();  
            if($attente['etat']=='attente') {
                $idp = $_GET['id'];
                echo "<div>";
                echo "<a class='bouton-ami' href='index.php?action=accept-invit&id=$idp'>Accepter</a>";
                echo "<a class='bouton-ami' href='index.php?action=refuser-invit&id=$idp'>Refuser</a>";
                echo "</div>";
            }


            ?>
        </div>


        <div class='mur-fond-noir'>
            <?php
            /*---------------- Voir les AMIS de la personne -------------*/

            if($_GET['id'] == $_SESSION['id']){
                echo "<h3>Mes amis</h3>";
            }else{
                echo "<h3>Ses amis</h3>";
            }

            $sql = "SELECT DISTINCT user.* FROM user JOIN lien ON user.id=lien.idUtilisateur1 OR user.id=lien.idUtilisateur2 WHERE lien.etat='ami' AND (lien.idUtilisateur1 = ? OR lien.idUtilisateur2 = ?) AND user.id != ? LIMIT 0,4";
            $q = $pdo->prepare($sql);
            $q->execute(array($_GET['id'],$_GET['id'],$_GET['id']));

            echo "<div class='informations-amis'>";
            while($l = $q->fetch()){

                echo "<div>";

                echo "<a href='index.php?action=mur&id&id=".$l['id']."'><img class='avatar' src='". $l['avatar'] ."' alt=''></a>";
                echo "<a class='prenom' href='index.php?action=mur&id=".$l['id']."'> ".$l['login']." </a>";
                echo "<div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
            $idp = $l['id'];
            echo "<a id='suite' href='index.php?action=tous-amis&id=".$_GET['id']." '>Voir la suite ...</a>";
            ?>
        </div>
    </div>

    <div class="mur-vide"></div>

    <!-- L'utilisateur met la publicaton sur son mur ou celui de son ami -->
    <div class="publications">
        <?php
        /*---------------- Voir les publications QUE si la personne est notre AMI ou son PROFIL -------------*/
        include('./traitement/date.php');
        $sql = "SELECT * FROM lien WHERE  ((idUtilisateur1=? AND idUtilisateur2=?) OR (idUtilisateur1=? AND idUtilisateur2=?))";
        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['id'],$_GET['id'],$_GET['id'],$_SESSION['id']));
        $ami = $q->fetch();    
        if(($ami != false && $ami['etat']=='ami')  || $_SESSION['id'] == $_GET['id']){   
        ?>


        <form class='ami-fond-blanc' action="index.php?action=new-post" method="post" enctype="multipart/form-data">
            <input maxlength="25" class="input-titre Player-typo" type="text" name="titre" placeholder="Titre de votre message">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
            <textarea rows="4"  maxlength="280" name="contenu" placeholder="Exprimez-vous"></textarea>
            <div class="bouton-espace">

                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/png, image/jpeg, image/gif, image/jpg"/>
                <label for="fileToUpload">
                    <i class="fa fa-image">&nbsp;</i>Photo
                </label>

                <input class="bouton-ami" type="submit" name="submit" id="publier" placeholder="Publier"/>
                <label for="publier">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Publier
                </label>
            </div>
        </form>

        <p class="titre-publi Player-typo">Publications</p>


        <?php
            // Sur le mur d'un ami - Associer l'identifant de l'utilisateur au POST
            $sql = "SELECT ecrit.*,user.login, user.avatar FROM ecrit JOIN user ON idAuteur=user.id WHERE idAmi = ? ORDER BY ecrit.id desc";

            $q = $pdo->prepare($sql);
            $q->execute(array($_GET['id']));

            // Afficher le mur d'actualité (exemple : http://localhost:8000/index.php?action=mur&id=9)
            while($l = $q->fetch()) {
                $id = $l['idAuteur'];
                $idp = $l['id'];
                $date = $l['dateEcrit'];
                $avatar = $l['avatar'];

                echo "<div class='post'>";
                echo "<div class='entete'>";
                echo "<div class='ss-entete'>";
                echo "<a href='index.php?action=mur&id&id=$id'><img class='avatar avatar-rond' src='".$avatar."' alt=''></a>";
                echo "<div>";
                echo "<a class='Player-typo prenom' href='index.php?action=mur&id=$id'>" .$l['login'] ." </a>";
                //Afficher la date
                echo "<span class='date'>".getRelativeTime($date)."</span>";
                echo "</div>";

                echo "</div>";

                echo "<div>";
                //Possibilité de supprimer le post si c'est son mur ou si on a mis le post
                if($_GET['id'] == $_SESSION['id'] || $l['idAuteur'] == $_SESSION['id']) {
                    echo "<a href='index.php?action=del-post&id=$idp'><img class='trash' src='./Ressources/trash.png'></a>";
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


        } /*else {
            if($ami['etat']=='attente') {
                echo "En attente d'une réponse, voir les demandes";
            }
            elseif($ami['etat']=='banni'){
                $idp = $_GET['id'];
                echo "Vous avez bloquer cette personne";
                echo "<a class='bouton-ami' href='index.php?action=refuser-invit&id=$idp'>Débloquer</a>";
            }else{
                $idp = $_GET['id'];
                echo "<a class='bouton-ami' href='index.php?action=invit-ami&id=$idp'>Inviter</a>";
            }

        }*/

        if(!isset($_SESSION["id"])) {
            // On n est pas connecté, il faut retourner à la page de login
            header("Location:index.php?action=login");
        }
        ?>
    </div>
</div>