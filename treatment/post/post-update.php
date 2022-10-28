<?php

$sql = "UPDATE ecrit SET titre=?, contenu=? WHERE id=?";
$q= $pdo->prepare($sql);
$q->execute([$titre, $contenu]);    

//Je retourne sur le serveur où j'étais
header("Location:".$_SERVER['HTTP_REFERER']);



// if($_GET['quoi'] == 'avatar'){
//     $dossier = 'avatar/';
//     $fichier = basename($_FILES['nouvel_avatar']['name']);
//     $taille = filesize($_FILES['nouvel_avatar']['tmp_name']);
//     $extensions = array('.png', '.gif', '.jpg', '.jpeg');
//     $extension = strrchr($_FILES['nouvel_avatar']['name'], '.'); 
//     //Début des vérifications de sécurité...
//     if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
//     {
//         $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
//     }
//     if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
//     {   
//         //On formate le nom du fichier ici...
//      $str = mb_strtolower($str);
//     $str = utf8_decode($str);
//     $str = strtr($str, utf8_decode('àâäãáåçéèêëíìîïñóòôöõøùúûüýÿ'), 'aaaaaaceeeeiiiinoooooouuuuyy');
//     $str = preg_replace('`[^a-z0-9]+`', '-', $str);
//     $str = trim($str, '-');
//         if(move_uploaded_file($_FILES['nouvel_avatar']['tmp_name'], $dossier .$_SESSION['id']. $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
//         {
//           echo 'Upload effectué avec succès !';
//             $sql = "INSERT INTO images VALUES(NULL,?,?,NOW())";
//             $query = $pdo->prepare($sql);
//             $query->execute(array($_SESSION['id'],$dossier.$_SESSION['id'].$_FILES['nouvel_avatar']['name']));
//             $sql = "UPDATE user SET avatar = ? WHERE id = ?";
//             $query = $pdo->prepare($sql);
//             $query->execute(array($_SESSION['id'].$_FILES['nouvel_avatar']['name'], $_SESSION['id']));
//             header('Location:'.$_POST['redirection']);
//         }
//         else //Sinon (la fonction renvoie FALSE).
//         {
//           echo "Not uploaded because of error #".$_FILES["avatar"]["error"];
//         }
//     }
// }