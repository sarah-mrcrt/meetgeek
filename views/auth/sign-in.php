<?php 
    if (!isset($_SESSION['id'])) {
?>

    <form action="index.php?action=connexion" method="POST">
        <input type="text" name="email" placeholder="email" required>
        <input type="password" name="mdp" placeholder="Password" required>
        <input type="submit" placeholder="Se connecter" value="Connexion" />
    </form>
    </div>

    <div>
        <p>S'incrire</p>
        <form action="index.php?action=inscription" method="POST" enctype='multipart/form-data'>
            <input type="text" name="login" placeholder="Login" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="mdp" placeholder="Password" required>
            <input type='file' name='fileToAvatar' id='fileToAvatar' accept='image/png, image/jpeg, image/gif, image/jpg'
                required />
            <label for='fileToAvatar'>Choisir un avatar</label>
            <input type="submit" placeholder="S'inscrire" action="index.php?action=accueil">
        </form>

<?php
    }
?>