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
    <title> Inscription - Forum </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include 'include/header.php' ?>

    <main>

        <h1> Inscription </h1>

        <form class='module_co' method='POST' action='inscription.php'>


            <article>
                <label> Login </label>
                <input type="text" name='login' required />
            </article>

            <article>
                <label> Name </label>
                <input type="text" name='name' required />
            </article>

            <article>
                <label> Surname </label>
                <input type="text" name='surname' required />
            </article>

            <article>
                <label> Mot de passe </label>
                <input type="password" name='password' required />
            </article>


            <article>
                <label> Confirmation de mot de passe </label>
                <input type="password" name='password_conf' required />
            </article>

            <input type='submit' name='inscription' value='Inscription' />

            <?php include 'include/traitement-inscription.php' ?>

        </form>

    </main>

    <?php include 'include/footer.php' ?>

</body>

</html>