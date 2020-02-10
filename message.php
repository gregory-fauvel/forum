<?php
session_start();
$connexion = mysqli_connect("localhost", "root", "", "forum");
date_default_timezone_set('europe/paris');
include 'bar-nav.php';

$id = $_GET['cnvid'];
$requete= "SELECT * FROM conversations";
$query = mysqli_query( $connexion,$requete);
$resultat = mysqli_fetch_all($query);
$idconv = $resultat[0][0];

 if (isset($_POST['envoyer']))
{     
   $requete= "SELECT * FROM conversations";
   $query = mysqli_query( $connexion,$requete);
   $resultat = mysqli_fetch_all($query); 

   $message = $_POST["message"];
   $iduser = $_SESSION["id"];
  

   $requete2 = "INSERT INTO message(user_id, message, date, conv_id) VALUES ($iduser, '$message', NOW(), $idconv)";
   $query2= mysqli_query($connexion, $requete2);
       

   $requetmes = "SELECT id FROM message WHERE date = NOW()";
   $querymes = mysqli_query($connexion, $requetmes);
   $resultatmes = mysqli_fetch_assoc($querymes);
   
   $idmessage = $resultatmes["id"];
   $requetelike = "INSERT INTO interaction (user_id, message_id, aime, aimepas) VALUES ($iduser, $idmessage, 0, 0)";
    $querylike = mysqli_query($connexion, $requetelike);
  
    header("location:message.php?id='" . $idconv . "'");
} 

$requete1 = "SELECT message, date, conv_id, login, utilisateurs.id, message_id, SUM(aime) AS like_total, SUM(aimepas) AS dislike_total FROM interaction INNER JOIN utilisateurs ON interaction.user_id = utilisateurs.id INNER JOIN message ON interaction.message_id = message.id WHERE message.conv_id = $id GROUP BY interaction.message_id ORDER BY message.id DESC";
$query1 = mysqli_query($connexion, $requete1);
$resultat1 = mysqli_fetch_all($query1);

foreach ($resultat1 as list($message, $date, $convid, $login, $iduser, $messid, $like, $dislike))
 {
    echo "<p>".$date."</p>";
    echo "<p>".$login."</p>";
    echo "<p>".$message."</p>";
    
 }
if (isset($_SESSION["login"])) {
        ?>

            <form action="" method="post" class="">
                <label>Envoyer un message</label>
                <input type="text" name="message" required>
                <input type="submit" value="envoyer" name="envoyer">
            </form>

        <?php
        }

        ?>
