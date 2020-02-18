<?php
session_start();
$connexion = mysqli_connect("localhost", "root", "", "forum");
date_default_timezone_set('europe/paris');
?>
<header class="header">
<?php include 'bar-nav.php'?>;
</header>
<h1 class="titre">Nos messages sont ici</h1>
<?php
$id = $_GET["id"];

$requete= "SELECT * FROM conversations WHERE id = $id";
$query = mysqli_query( $connexion,$requete);
$resultat = mysqli_fetch_assoc($query);


 if (isset($_POST['envoyer']))
{     
   

   $message = $_POST["message"];
   $iduser = $_SESSION["id"];
  

   $requete2 = "INSERT INTO message(user_id, message, date, conv_id) VALUES ($iduser, '$message', NOW(), $id)";
   $query2= mysqli_query($connexion, $requete2);
       

   $requetmes = "SELECT id FROM message WHERE date = NOW()";
   $querymes = mysqli_query($connexion, $requetmes);
   $resultatmes = mysqli_fetch_assoc($querymes);
   
   $idmessage = $resultatmes["id"];
   
    $querylike = mysqli_query($connexion, $requetelike);
  
    header("location:message.php?id=$id");
} 

$requete1 = "SELECT message.id, message, message.date, conv_id, login, utilisateurs.id FROM utilisateurs INNER JOIN message ON utilisateurs.id = message.user_id WHERE message.conv_id = $id ORDER BY message.id ASC";
$query1 = mysqli_query($connexion, $requete1);
$resultat1 = mysqli_fetch_all($query1);
//var_dump($resultat1);
$i = 0;

foreach ($resultat1 as list($test, $message, $date, $login, $iduser))
 {
 echo "<div class='contmessage'>";
  $idmsg = $resultat1[$i][0];
    echo "<p>".$date."</p>";
    ?>
    <a href="users.php?id=<?php echo $iduser ?>"><?php echo $login ?></a>
    <?php
    echo "<p>".$message."</p>";

    include("message2.php");
    
    $i += 1;
    echo "</div>";
    
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
  <div class="conteneur1">
  <h1 class="titre">Postez ici vos messages</h1>

            <form action="message.php?id=<?php echo $id ?>" method="post" class="">
                <label>Envoyer un message</label>
                <input type="text" name="message" required>
                <input class="bouton" type="submit" value="envoyer" name="envoyer">
            </form>

        <?php
        }

        ?>
      </div>

    <footer class="footer">
      <aside> Copyright 2020 Coding School | All Rights Reserved | Project by Anthony,Mohamed,Grégory. </aside>
      
    </footer>
  </body>
  </html>
