<?php
    include("vues/header.php");
    if($_SESSION['id'] == $_GET['page']){
    echo "<div id='modification'>";
        echo "<form method='post' action='index.php?action=change&quoi=pseudo'>";
            echo "<label for='pseudo'>Nouveau Pseudo</label><br>";
            echo "<input type='text' name='pseudo'><br>";
            echo "<input type='hidden' name='redirection' value='index.php?action=profil&page=".$_GET['page']."&actionprofil=journal'/>";
            echo "<button type='input'>Confirmer</button>";
        echo "</form>";
        echo "<form method='post' action='index.php?action=change&quoi=avatar' enctype='multipart/form-data'>";
            echo "<label for='avatar'>Nouvel avatar</label><br>";
            echo "<input type='hidden' name='MAX_FILE_SIZE' value='1000000000'>";
            echo "<input type='hidden' name='redirection' value='index.php?action=profil&page=".$_GET['page']."&actionprofil=journal'/>";
            echo "<input type='file' name='nouvel_avatar' required accept='accept/png, image/jpeg'><br>";
            echo "<button type='input'>Confirmer</button>";
        echo "</form>";
        echo "<form id='change_couverture' method='post' action='index.php?action=change&quoi=couverture' enctype='multipart/form-data'>";
            echo "<label for='couvertoure'>Nouvelle couverture</label><br>";
            echo "<input type='hidden' name='MAX8FILE_SIZE' value='1000000000'>";
            echo "<input type='hidden' name='redirection' value='index.php?action=profil&page=".$_GET['page']."&actionprofil=journal'/>";
            echo "<input type='file' name='couverture' required accept='accept/png, image/jpeg'><br>";
            echo "<button type='input'>Confirmer</button>";
        echo "</form>";
    echo "</div>";
    }
?>