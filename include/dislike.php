
<?php
session_start();

$id = $_GET["id"];
$idconv = $_GET["idconv"];
$iduser = $_SESSION["id"];

$connect = mysqli_connect("localhost", "root", "", "forum");

$requeteget = "SELECT user_id FROM interaction WHERE message_id = $id AND user_id = $iduser";
$queryget = mysqli_query($connect, $requeteget);
$resultatget = mysqli_fetch_assoc($queryget);


if($resultatget["user_id"] != $_SESSION["id"]){
    $requestlike = "INSERT INTO interaction(user_id, message_id, aime, aimepas) VALUES ($iduser, $id, 0, 1)";
    $querylike = mysqli_query($connect,$requestlike);
    header("Location:../message.php?id=$idconv");
}
if($resultatget["user_id"] == $_SESSION["id"]){
    $requestlikeupdate = "UPDATE `interaction` SET `aime`= 0,`aimepas`= 1 WHERE user_id = $iduser";
    $querylikeupdate = mysqli_query($connect, $requestlikeupdate);
    header("Location:../message.php?id=$idconv");
}
?>