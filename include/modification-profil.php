
<!-- Modification profil php -->

<?php

$connexion = mysqli_connect('localhost', 'root', '', 'forum');
$recup_utilisateur = "SELECT * FROM utilisateurs WHERE login = '" . $_SESSION['login'] . "'";
$query_recup_utilisateur = mysqli_query($connexion, $recup_utilisateur);
$resultat_recup_utilisateur = mysqli_fetch_assoc($query_recup_utilisateur);

if (isset($_POST['profil'])) {

    //Création des variables
    $login = $_POST['login'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $old_password = $_POST['old_password'];
    $password = $_POST['password'];
    $password_conf = $_POST['password_conf'];

    // Création des booléens 
    $modif_log = false;
    $modif_name = false;
    $modif_surname = false;
    $modif_password = false;
    $erreur_log = false;
    $erreur_oldpassword = false;
    $erreur_password = false;
    $uploadOk = 1;

    if (password_verify($old_password, $resultat_recup_utilisateur['password'])) {
        // Update login 
        if ($login != $resultat_recup_utilisateur['login']) {
            $verif_log = "SELECT login FROM utilisateurs WHERE login = '" . $login . "'";
            $query_verif = mysqli_query($connexion, $verif_log);
            $resultat_verif = mysqli_fetch_assoc($query_verif);

            if (!empty($resultat_verif)) {
                $erreur_log = true;
            } else {
                $update_log = "UPDATE utilisateurs SET login = '$login' WHERE id= '" . $resultat_recup_utilisateur['id'] . "'";
                $query_updatelog = mysqli_query($connexion, $update_log);
                $resultat_recup_utilisateur['login'] = $login;
                $_SESSION['login'] = $login;
                $modif_log = true;
            }
        }
        // Update name
        if ($name != $resultat_recup_utilisateur['name']) {
            $update_name = "UPDATE utilisateurs SET name = '$name' WHERE id= '" . $resultat_recup_utilisateur['id'] . "'";
            $query_updatename = mysqli_query($connexion, $update_name);
            $resultat_recup_utilisateur['name'] = $name;
            $modif_name = true;
        }

        // Update surname
        if ($surname != $resultat_recup_utilisateur['surname']) {
            $update_surname = "UPDATE utilisateurs SET surname = '$surname' WHERE id= '" . $resultat_recup_utilisateur['id'] . "'";
            $query_updatesurname = mysqli_query($connexion, $update_surname);
            $resultat_recup_utilisateur['surname'] = $surname;
            $modif_surname = true;
        }

        // Update avatar
        if (!empty($_FILES["fileToUpload"]["name"])) {
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
            $target_dir = "img/profil/";
            $target_file = $target_dir . $_SESSION['login'] . '.' . $imageFileType;
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            ) {
                $uploadOk = 0;
            }

            if ($uploadOk == 1 && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $requeteavatar = "UPDATE utilisateurs SET avatar = '$target_file'";
                $queryavatar = mysqli_query($connexion, $requeteavatar);
                header("Location: profil.php");
            }
        }
        // Update password
        if (!empty($password)) {
            if ($password == $password_conf) {
                $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
                $update_password = "UPDATE utilisateurs SET password = '$password' WHERE id = '" . $resultat_recup_utilisateur['id'] . "'";
                $query_updatepassword = mysqli_query($connexion, $update_password);
                $modif_password = true;
            } else {
                $erreur_password = true;
            }
        }
    } else {
        $erreur_oldpassword = true;
    }
    mysqli_close($connexion);
}
