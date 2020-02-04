<?php
$id = $_GET["id"];
$connexion = mysqli_connect("localhost", "root", "", "forum");
$sup_users = "DELETE FROM utilisateurs WHERE id = '" . $id . "'";
$query_supusers = mysqli_query($connexion, $sup_users);
header("location:../profil.php");
?>