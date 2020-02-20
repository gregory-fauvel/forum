
<!-- Affichage message profil -->

<?php

if (isset($_POST['profil'])) {
    if (!empty($_FILES["fileToUpload"]) && $uploadOk == 0) {
        ?> 
        <span> Image non prise en compte !</span>
    <?php }
    if ($erreur_oldpassword == 1) { ?>
        <span> /!\ Mot de passe actuel incorrect </span>

        <?php } else {
        if ($erreur_log == 1) { ?>
            <span> <?php echo $login ?> est déjà utilisé ! </span>

        <?php } elseif ($erreur_password == 1) { ?>
            <span> /!\ Les deux mots de passe sont différents ! </span>

            <?php } elseif ($modif_log == 1) {
            if ($modif_password == 1) { ?>
                <span> Validation des différentes modifications ! </span>

            <?php } else { ?>
                <span> Validation du nouveau login. </span>

            <?php }
        } elseif ($modif_password == 1) { ?>
            <span> Validation du nouveau mot de passe. </span>
<?php }
    }
}
?>