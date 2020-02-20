
<!-- Traitement php et SQL membre.php -->

<?php

$connexion = mysqli_connect('localhost', 'root', '', 'forum');
$recup_profil = "SELECT * FROM utilisateurs WHERE utilisateurs.id = '" . $_GET['id'] . "'";
$query_recup_profil = mysqli_query($connexion, $recup_profil);
$profil = mysqli_fetch_assoc($query_recup_profil);

// var_dump($profil);

?>