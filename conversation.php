<?php
session_start();

$connexion = mysqli_connect("localhost", "root", "", "forum");
date_default_timezone_set('europe/paris');
include 'bar-nav.php';
	    
 if (isset($_POST['submit']))
{       
       $requete= "SELECT * FROM topics";
       $query = mysqli_query( $connexion,$requete);
        $resultat = mysqli_fetch_all($query);

        $titro = $_POST['titre'];
        $descrip = $_POST['description'];
        $private = $_SESSION['rank'];
        $iduser = $_SESSION["id"];
		$requete2= "INSERT INTO conversations (title, description, user_id, date, topic_id, private) VALUES ('$titro', '$descrip', '$iduser', NOW(), '".$resultat[0][0]."', '$private')";
		$query2= mysqli_query($connexion, $requete2);
        header("location:conversation.php");

}

$requete1 = "SELECT conversations.id, conversations.title, conversations.description,conversations.date,utilisateurs.id, utilisateurs.login, topics.title, topics.id FROM topics INNER JOIN utilisateurs ON topics.user_id = utilisateurs.id INNER JOIN conversations ON topics.id = conversations.topic_id  ORDER BY conversations.id DESC ";
$query1 = mysqli_query($connexion, $requete1);
$resultat1 = mysqli_fetch_all($query1);


foreach ($resultat1 as list($idco, $titreco, $descco, $dateco, $idu, $loginu, $titreto)) 
{
    echo "<p>".$titreto."</p>";
    echo "<p>".$titreco."</p>";
    echo "<p>".$descco."</p>";
    echo "<p>".$dateco."</p>";
    echo "<p>".$loginu."</p>";
}

 if (isset($_SESSION["login"])) 
{

?>
<form action="" method="post" class="ajout">
                <label>Conversation</label>
                <input type="text" name="titre" required>
                <label>Description</label>
                <input type="text" name="description" required>
                </select>
                <input type="submit" value="Envoyer" name="submit">
            </form>
<?php
}
?>


