<?php
session_start();
$connexion = mysqli_connect("localhost", "root", "", "forum");
date_default_timezone_set('europe/paris');
include 'bar-nav.php';

$id = $_GET["id"];

$requete= "SELECT * FROM conversations WHERE id = $id";
$query = mysqli_query( $connexion,$requete);
$resultat = mysqli_fetch_assoc($query);


 if (isset($_POST['envoyer']))
{     
   

   $message = $_POST["message"];
   $message2 = addslashes($message);
   $iduser = $_SESSION["id"];
  

   $requete2 = "INSERT INTO message(user_id, message, date, conv_id) VALUES ('$iduser', '$message2', NOW(), '$id')";
   $query2= mysqli_query($connexion, $requete2);
       

   $requetmes = "SELECT id FROM message WHERE date = NOW()";
   $querymes = mysqli_query($connexion, $requetmes);
   $resultatmes = mysqli_fetch_assoc($querymes);
   
   $idmessage = $resultatmes["id"];
   // $requetelike = "INSERT INTO interaction (user_id, message_id, aime, aimepas) VALUES ($iduser, $idmessage, 0, 0)";
    $querylike = mysqli_query($connexion, $requetelike);
  
    header("location:message.php?id=$id");
} 

$requete1 = "SELECT message.id, message, message.date, conv_id, login, utilisateurs.id FROM utilisateurs INNER JOIN message ON utilisateurs.id = message.user_id WHERE message.conv_id = $id ORDER BY message.id ASC";
$query1 = mysqli_query($connexion, $requete1);
$resultat1 = mysqli_fetch_all($query1);
$i = 0;

foreach ($resultat1 as list($test, $message, $date, $login, $iduser))
 {

  $idmsg = $resultat1[$i][0];
    echo "<p>".$date."</p>";
    ?>
    <a href="users.php?id=<?php echo $iduser ?>"><?php echo $login ?></a>
    <?php
    echo "<p>".$message."</p>";

    include("message2.php");
    
    $i += 1;
    
 }
if (isset($_SESSION["login"])) {
        ?>
        


<html>
<head>
  <title>forumtmessage</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="forum.css">

</head>

<body class="inscription">
  <header class="header">
    

  </header>

            <form action="message.php?id=<?php echo $id ?>" method="post" class="">
                <label>Envoyer un message</label>
                <input type="text" name="message" required>
                <input type="submit" value="envoyer" name="envoyer">
            </form>

        <?php
        }

        ?>
