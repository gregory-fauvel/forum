<?php
session_start();

$connexion = mysqli_connect("localhost", "root", "", "forum");
date_default_timezone_set('europe/paris');


	    
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

}
?>
<form action="" method="post" class="ajout">
                <label>Conversation</label>
                <input type="text" name="titre" required>
                <label>Description</label>
                <input type="text" name="description" required>
                </select>
                <input type="submit" value="Envoyer" name="submit">
            </form>


