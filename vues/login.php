<?php 
if (!isset($_SESSION['id'])) {
    echo "<nav id='login'>
            <h1>Bienvenue !</h1>
            <h2>Chargement de la page ...</h2>
            <div>
                <div>
                    <p class='Player-typo noir'>Se connecter</p>
                    <form action=\"index.php?action=connexion\" method=\"POST\">
                        <input type=\"text\" name=\"login\" placeholder=\"Login\" required>
                        <input type=\"password\" name=\"mdp\" placeholder=\"Password\" required>
                        <input class='Player-typo bleu' type=\"submit\" placeholder=\"Se connecter\" value=\"Connexion\" />
                    </form>
                </div>

                <div>
                    <p class='Player-typo noir'>S'incrire</p>
                    <form action=\"index.php?action=store-compte\" method=\"POST\" enctype='multipart/form-data'>
                        <input type=\"text\" name=\"login\" placeholder=\"Login\" required>
                        <input type=\"email\" name=\"email\" placeholder=\"Email\" required>
                        <input type=\"password\" name=\"mdp\" placeholder=\"Password\" required>
                        <input type='file' name='fileToAvatar' id='fileToAvatar' accept='image/png, image/jpeg, image/gif, image/jpg' required/>
                        <label for='fileToAvatar'>Choisir un avatar</label>
                        <input class='Player-typo bleu' type=\"submit\" placeholder=\"S'inscrire\" action=\"index.php?action=accueil\" \"Inscription\"/>
                    </form>
                </div>
            </div>
        </nav>";
}
?>