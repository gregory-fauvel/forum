<?php
session_start();
date_default_timezone_set('Europe/Paris');
$connexion = mysqli_connect ("localhost","root","","forum");
	if (isset($_SESSION['login'])) 
					{
						if ($_SESSION['rank'] == "Admin")
//var_dump($connexion);

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

					


<html>
<head>
	<title>admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="forum.css">
</head>
<body>
	<div id="form">

				<?php
								if (isset($_POST['valider']))
					{
										 			
								$titre = $_POST['titre'];
								$description = $_POST['description'];
								$id = $_SESSION['id'];
					 			$req = "INSERT INTO `topics`( `title`, `description`, `user_id`, `date`, `private`) VALUES ('$titre','$description','$id','NOW()','admin')";
								$query = mysqli_query($connexion,$req);
								var_dump ($query);
								echo $query;
																					
					}
					?>
								<form method="post">
								<label>Titre</label></br>
								<input type="text" name="titre" required></br>
								<label>Description</label></br>
								<input type="text" name="description"required></br>
								<input type="submit" value="Envoyer" name="valider"></br>
							    </form>
	
					
							
					<?php

								if (isset($_POST['effacer']))
					{
								$titre2 = $_POST['titre2'];
 								$req2 = "DELETE FROM topics WHERE title = '$titre2'";
								$query2 = mysqli_query($connexion,$req2);
								echo $query2;
								
					}
					?>
								<form method="post" class="ajout2">
							    <label>Supprimer le Topic </label></br>
							    <input type="text" name="titre2" placeholder="Supprimer topic"></br>
							    <input type="submit" value="effacer" name="effacer"></br>
							      </form>

			
					
					<?php
								if (isset($_POST['modifier']))
					{
								$titre3 = $_POST['titre3'];
								$req3 = "SELECT * FROM topics";
								$query3 =  mysqli_query($connexion,$req3);
								var_dump($query3);
								echo $query3;
 								$req4 = "UPDATE topics SET title= '$titre3',description= '$desc' WHERE user_id= '$id'";
								$query4 = mysqli_query($connexion,$req4);
								echo $query4;
					?>
							    <form method="post" class="ajout2">
							    <label>Supprimer le Topic </label></br>
							    <input type="text" name="titre2" placeholder="Supprimer topic"></br>
							    <input type="submit" value="effacer" name="modifier"></br>
							      </form>
							
			
					<?php
					}
				}
			}

					?>
			</div>

		</body>
</html>

