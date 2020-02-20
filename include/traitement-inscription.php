
<!-- Traitement inscription -->

<?php

if (isset($_POST['inscription'])) {
    $login = $_POST['login'];

    /* Check le login dans la base de donnée */
    $connexion = mysqli_connect('localhost', 'root', '', 'forum');
    $check_log = "SELECT login FROM utilisateurs WHERE login = '" . $login . "'";
    $query_check_log = mysqli_query($connexion, $check_log);
    $resultat_check_log = mysqli_fetch_all($query_check_log);

    if (!empty($resultat_check_log)) { ?>
        <span> Ce login est déjà pris ! </span>
    <?php } elseif ($_POST['password'] != $_POST['password_conf']) { ?>
        <span> Les mots de passe sont différents ! </span>
<?php } else {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 12));

        $insert_utilisateur = "INSERT INTO utilisateurs (login,password,name,surname,rank) VALUES ('" . $login . "','" . $password . "','" . $_POST['name'] . "','" . $_POST['surname'] . "', 'Membre')";
        $query_insert = mysqli_query($connexion, $insert_utilisateur);
        header('Location:connexion.php');
    }

    mysqli_close($connexion);
}
?>