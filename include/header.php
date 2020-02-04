<!-- Header -->

<header>

    <nav>

        <ul>
            <li><a href="index.php"> Accueil </a></li>
            <li><a href="topic.php"> Topics </a></li>
            <?php if (isset($_SESSION['login'])) { ?>
                
                <li><a href="profil.php"> Profil </a></li>
                <li><a href="include/deconnexion.php"> Deconnexion </a></li>

            <?php } else { ?>

                <li><a href="connexion.php"> Connexion </a></li>
                <li><a href="inscription.php"> Inscription </a></li>

            <?php } ?>
        </ul>

    </nav>
    
</header>