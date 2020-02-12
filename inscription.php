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
                <link rel="stylesheet" href="forum.css">
            </head>

    <body class="inscription">
            <header class="header">

                <?php include 'bar-nav.php' ?>

            </header>

    
                    <section class ="conteneur1">
                        <h1> Inscription </h1>

                        <form method='POST' action='inscription.php'>
                            <article>
                                <label> Login </label></br>
                                <input type="text" name='login' required />
                            </article>

                            <article>
                                <label> Name </label></br>

                                <input type="text" name='name' required />
                            </article>

                            <article>
                                <label> Surname </label></br>

                                <input type="text" name='surname' required />
                            </article>

                            <article>
                                <label> Mot de passe </label></br>

                                <input type="password" name='password' required />
                            </article>

                            <article>
                                <label> Confirmation de mot de passe </label></br>

                                <input type="password" name='password_conf' required />
                            </article>

                            <input class="bouton" type='submit' name='inscription' value='Inscription' />

                            <?php include 'include/traitement-inscription.php' ?>

                        </form>
                    </section>
 

                <footer class="footer">
                     <aside> Copyright 2020 Coding School | All Rights Reserved | Project by Anthony,Mohamed,Grégory. </aside>
                 </footer>

            </body>

        </html>