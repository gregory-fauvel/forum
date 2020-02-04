<?php
session_start();
if (isset($_SESSION["login"])) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion - Forum</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include 'include/header.php' ?>

    <main>

        <h1> Connexion </h1>

        <form class='module_co' method='POST' action='connexion.php'>

            <article>
                <label> Login </label>
                <input type='text' name='login' required />
            </article>

            <article>
                <label> Mot de passe </label>
                <input type='password' name='password' required />
            </article>

            <input type='submit' name='connexion' value='Connexion' />

            <?php include 'include/traitement-connexion.php' ?>

        </form>
    </main>

    <?php include 'include/footer.php' ?>

</body>

</html>