<body class="erreur">
    <div id="error" class="container">
        <div>
            <p class="Player-typo">ERREUR 404</p>
            <img src="./Ressources/404.jpg"/>
            <?php
            if (isset($_SERVER['HTTP_REFERER'])){
            $url = $_SERVER['HTTP_REFERER'];
            ?>
            <a class="bouton-ami" href="<?= $url ?>">Retournez à la page précédente</a>
            <?php
            }            
            ?>
            <a class="bouton-ami" href="index.php?action=accueil">Allez à l'accueil</a>

            <p class="Player-typo">Tu as l'air perdu ...</p>
        </div>
    </div>
</body>