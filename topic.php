<?php
session_start();
?>

<html>
<head>
	<title>forumtopics</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="forum.css">

</head>
<body id="topic">
<section id="conteneur">
						<?php
						date_default_timezone_set('Europe/Paris');
						$connexion = mysqli_connect ("localhost","root","","forum");
						$requete1 = "SELECT title,description,date,login,private FROM topics INNER JOIN utilisateurs WHERE utilisateurs.id=topics.user_id";
						$query1 = mysqli_query($connexion,$requete1);

						while ($info= mysqli_fetch_assoc($query1)) {
							?>
								<div id="formulaire"><a href="conversation.php">
									<p><?php echo $info['title']?></p></a>
									<p><?php echo $info['description']?></p>
									<p><?php echo $info['date']?></p>
									<p><?php echo $info['login']?></p>
									<p><?php echo $info['private']?></p>
								</div>

						<?php

						}

					if (isset($_SESSION['login'])) {

					  		if ($_SESSION['rank'] == "Admin"){
					  		
									if (isset($_POST['valider'])) {
							
												if (!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['private']))
										 			{

										 			$titre = $_POST['titre'];
									                $description = $_POST['description'];
									                $private = $_POST['private'];
									                $id = $_SESSION['id'];
													$requete = "INSERT INTO topics( title, description, user_id, date, private) VALUES ('$titre','$description','$id',NOW(),'admin')";
													$query = mysqli_query($connexion,$requete);
													header('Location: topic.php');
																	
							
													}

											}		

						?>
			
							<div class ="form">
								  <form method="post" class="ajout">
							                    <label>Titre</label></br>
							                    <input type="text" name="titre" required></br>
							                    <label>Description</label></br>
							                    <input type="text" name="description" required></br>
							                    <select name="private" id=""></br>
							                        <option value="">--Choisir--</option>
							                        <option value="none">Tous</option>
							                        <option value="membre">Membre</option>
							                        <option value="admin">Admin</option>
							                    </select>
							                    <input type="submit" value="Envoyer" name="valider"></br>
							      </form>
							</div>

				   <?php
				   if (isset($_POST['modifier'])) {


												if (!empty($_POST['titre3']) &&!empty($_POST['titre2']) && !empty($_POST['description']) && !empty($_POST['private']))
										 			{

										 			$titre3 =  $_POST['titre3']; 
										 			$titre2 = $_POST['titre2'];
									                $description = $_POST['description'];
									                $private = $_POST['private'];
									                $id = $_SESSION['id'];

											        $requete2="UPDATE topics SET title= '$titre2', description= '$description', user_id= '$id', date= NOW(), private= '$private' WHERE title = '$titre3'";
													$query2 = mysqli_query($connexion,$requete2);
													header('Location: topic.php');
		
				   									}
				   								}
				   ?>
				   		<div class ="form">
								  <form method="post" class="ajout">
								  				<label>Recherche Topics</label></br>
							                    <input type="text" name="titre3" required></br>
							                    <label>Modifier Titre</label></br>
							                    <input type="text" name="titre2" required></br>
							                    <label>Description</label></br>
							                    <input type="text" name="description" required></br>
							                    <select name="private"></br>
							                        <option value="">--choisir--</option>
							                        <option value="none">Tous</option>
							                        <option value="membre">Membre</option>
							                        <option value="admin">Admin</option>
							                    </select>
							                    <input type="submit" value="modifier" name="modifier"></br>
							      </form>
							</div>
				   	  <?php
				   	  				if (isset($_POST['effacer'])) 
				   	  				{
					   	  								if (!empty($_POST['titre4'])  && !empty($_POST['description']) && !empty($_POST['private']))
											 			{
											 			$titre4 = $_POST['titre4']; 
										                $description = $_POST['description'];
										                $private = $_POST['private'];
										                $id = $_SESSION['id'];

									        			$requete3= "DELETE FROM `topics` WHERE title='$titre4'";
														$query3 = mysqli_query($connexion,$requete3);
														header('Location: topic.php');
		
				   										}
				  					}
				  				}
				
				   ?>
				    <div class ="form">
								  <form method="post" class="ajout">
							                    <label>Titre</label></br>
							                    <input type="text" name="titre4" required></br>
							                    <label>Description</label></br>
							                    <input type="text" name="description" required></br>
							                    <select name="private" id=""></br>
							                        <option value="">--choisir--</option>
							                        <option value="none">Tous</option>
							                        <option value="membre">Membre</option>
							                        <option value="admin">Admin</option>
							                    </select>
							                    <input type="submit" value="effacer" name="effacer"></br>
							      </form>
							</div>
							<?php
							if ($_SESSION['rank'] == "moderateur"){
							include("moderateur.php");
						}
						}

					
				?>

				</section>
	
		</body>
</html>