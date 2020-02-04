<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accueil - Forum </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php include 'include/header.php' ?>

    <main>

        <?php if (isset($_SESSION['login'])) { ?>

            <section>
                <p> Bonjour <?php echo $_SESSION['login'] ?></p>
            </section>

        <?php } else { ?>

            <section>
                <p> Bonjour </p>
            </section>
        <?php } ?>

    </main>

    <?php include 'include/footer.php' ?>

</body>

</html>