<?php

session_start();
?>
<html>
<head>
    <title>Conversations</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="forum.css">

</head>
<body class="inscription">
    <header class="header">
    <?php include 'bar-nav.php'?>

    </header>
    <section class="conteneur">
       
<?php
$connexion = mysqli_connect("localhost", "root", "", "forum");
date_default_timezone_set('europe/paris');

$id = $_GET['id'];

$requete= "SELECT * FROM topics WHERE id = $id";
$query = mysqli_query( $connexion,$requete);
$resultat = mysqli_fetch_all($query);


 if (isset($_POST['submit']))
{       

        $titro = $_POST['titre'];
        $descrip = $_POST['description'];
        $private = $_SESSION['rank'];
        $iduser = $_SESSION["id"];
        
		$requete2= "INSERT INTO conversations (title, description, user_id, date, topic_id, private) VALUES ('$titro', '$descrip', '$iduser', NOW(), '$id', '$private')";
		$query2= mysqli_query($connexion, $requete2);
        header("location:conversation.php?id=$id");

}
$requet = "SELECT title FROM topics WHERE id = $id";
$quer= mysqli_query($connexion, $requet);
while($row = mysqli_fetch_assoc($quer))
{
    echo "<h1 class=titre>Nos Conversations de Topic: ".$row['title']."</h1>";
}


$requete1 = "SELECT conversations.id, conversations.title, conversations.description,conversations.date,utilisateurs.id,login, topics.title, topics.id FROM conversations INNER JOIN utilisateurs ON user_id = utilisateurs.id INNER JOIN topics ON topics.id = conversations.topic_id WHERE topic_id = $id ORDER BY conversations.id DESC ";
$query1 = mysqli_query($connexion, $requete1);

$resultat1 = mysqli_fetch_all($query1);
foreach ($resultat1 as list($idco, $titreco, $descco, $dateco, $idu, $loginu, $titreto)) 
{
    
?>
<div id="formulaire">
    <h1 class="titre">Titre: <a class="titre" href="message.php?id=<?php echo $idco?>"><?php echo $titreco ?></a></h1>

    <?php echo $descco ?></br>

    <p>Posté le: <?php echo $dateco ?></p>
    <p>Par: <a href="users.php?id=<?php echo $idu ?>"><?php echo $loginu ?></a></p>
</div>

<?php
}

 if (isset($_SESSION["login"])) 
{

?>    <div class ="form">
         <h2 class="titre">Poster une Conversation</h2>
         <form action="conversation.php?id=<?php echo $id ?>" method="post" class="ajout">
                <label>Conversation</label></br>
                <input type="text" name="titre" required></br>
                <label>Description</label></br>
                <input type="text" name="description" required></br>
                <input class="bouton" type="submit" value="Poster" name="submit">
        </form>
     </div>
<?php
}
?>
   </section>
   <footer class="footer">
         <aside> Copyright 2020 Coding School | All Rights Reserved | Project by Anthony,Mohamed,Grégory. </aside>
   </footer>
    
</body>
</html>
