<?php
$id = $_GET["id"];
$connect = mysqli_connect("localhost", "root", "", "forum");
$requeteid = "SELECT topic_id FROM conversations WHERE id = $id";
$queryid = mysqli_query($connect, $requeteid);
$resultat = mysqli_fetch_assoc($queryid);
$idconv = $resultat["topic_id"];
$requetedelete = "DELETE FROM conversations WHERE id = $id";
$query = mysqli_query($connect, $requetedelete);
header("location:../conversation.php?id=$idconv");

?>