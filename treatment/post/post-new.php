<?php
print_r($_FILES);
/* Je mets des br à chaque paragraphe de mon texte dans ma bdd*/
$_POST['contenu'] = nl2br($_POST['contenu'], false);

/*------------------ Uploader une IMAGE (+ textes s'il y en a) -------------------*/

/* Je crée le dossier uploads */
$dossier = "uploads/";

/* Je récupére le nom de l'image choisi */
$fichier = basename($_FILES["fileToUpload"]["name"]);

/* Si je demande à "choisir un fichier" */
if(!empty($_FILES["fileToUpload"]["name"])) {

    /*Si on demande d'uploader des images*/
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $dossier .$fichier)) {
        /* Je récupère le chemain "/uploads" que j'associe au nom de l'image choisi */
        echo "Le fichier : ". basename( $_FILES["fileToUpload"]["name"]). " est en ligne";

        /* J'ajoute le nom du chemin dans ma base de donnée*/
        $sql = "INSERT INTO ecrit VALUES(NULL, ?,?,NOW(),?, ?, ?);";
        $query = $pdo->prepare($sql);
        $query->execute(array($_POST['titre'],$_POST['contenu'], $dossier .$fichier, $_SESSION['id'], $_POST['id']));

    } else {
        /* Si la demande d'upload n'est pas une image */
        echo "Ceci n'est pas une image ! Par conséquent, on ne peut la publier";
    }
    /*------------------ Uploader que du TEXTE -------------------*/
}else{
    /* S'il n'y a pas d'image mais qu'il y a un titre ou un texte, je n'ajoute que le texte dans la bdd*/
    $sql = "INSERT INTO ecrit VALUES(NULL, ?,?,NOW(),NULL, ?, ?);";
    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['titre'],$_POST['contenu'], $_SESSION['id'], $_POST['id']));
}


header("Location:" . $_SERVER['HTTP_REFERER']);

