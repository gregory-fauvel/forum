
<!-- Traitement connexion -->

<?php

if (isset($_POST['connexion'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $connexion = mysqli_connect('localhost', 'root', '', 'forum');
    $recup_inscri = "SELECT * FROM utilisateurs WHERE login = '" . $login . "'";
    $query_check_base = mysqli_query($connexion, $recup_inscri);
    $resultat_recup = mysqli_fetch_assoc($query_check_base);

    if (!empty($resultat_recup)) {
        if (password_verify($password, $resultat_recup['password'])) {
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $resultat_recup['id'];
            $_SESSION['rank'] = $resultat_recup['rank'];
            header('Location:index.php');
        } else { ?>
            <span> /!\ Erreur de mot de passe /!\ </span>
        <?php }
    } else { ?>
        <span> Cet utilisateur n'existe pas ! </span>
<?php }
    mysqli_close($connexion);
} ?>