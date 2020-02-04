<?php
$id = $_GET["id"];
$connect = mysqli_connect("localhost", "root", "", "forum");
$requeteid = "SELECT conv_id FROM message WHERE id = $id";
$queryid = mysqli_query($connect, $requeteid);
$resultat = mysqli_fetch_assoc($queryid);
$idconv = $resultat["conv_id"];
$requetedelete = "DELETE FROM message WHERE id = $id";
$query = mysqli_query($connect, $requetedelete);
header("location:../message.php?id=$idconv");

?>