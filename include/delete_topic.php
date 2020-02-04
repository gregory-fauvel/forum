<?php
$id = $_GET["id"];
$connect = mysqli_connect("localhost", "root", "", "forum");
$requetedelete = "DELETE FROM topics WHERE id = $id";
$query = mysqli_query($connect, $requetedelete);
header("location:../topic.php");

?>