<?php 
    if (!isset($_SESSION['id'])) {
?>

    <p>Se connecter</p>
    <form action="<?php echo "index.php?action=connexion"?>" method="POST">
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="mdp" placeholder="Password" required>
        <input type="submit" placeholder="Connexion" value="Connexion">
    </form>

    <p>S'incrire</p>
    <form action="<?php echo "index.php?action=store-compte"?>" method="POST" enctype='multipart/form-data'>
        <input type="text" name="login" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="mdp" placeholder="Password" required>
        <input type="submit" placeholder="Inscription" value="Inscription">
    </form>

<?php
    }
?>