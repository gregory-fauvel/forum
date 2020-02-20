


<section class="conteneur">
	<link rel="stylesheet" type="text/css" href="forum.css">
	<h1>Nos Topics</h1>
						<?php
						date_default_timezone_set('Europe/Paris');
						$connexion = mysqli_connect ("localhost","root","","forum");
						$requete1 = "SELECT title,description,login,private FROM topics INNER JOIN utilisateurs WHERE utilisateurs.id=topics.user_id";
						$query1 = mysqli_query($connexion,$requete1);
						$resultat2 = mysqli_fetch_all($query1);
					

						//while ($info= mysqli_fetch_assoc($query1)) {
						foreach($resultat2 as list( $titreto,$descripto, $user,$privateto))
						{
							if (isset($_SESSION['login']))
							{
							if ( $_SESSION['rank']=='Moderateur'){
							?>
							<div id="formulaire"><a href="conversation.php?id=<?php echo $idto?>">
									<p><?php echo $titreto?></p></a>
									<p><?php echo $descripto?></p>
									<p><?php echo $dateto?></p>
									<p><?php echo $user?></p>
									
								
								</div>

						<?php
					     }
					  }
					   if(!isset($_SESSION['login']))
					     {
					     	if($privateto =="public")
					     	{
					     	   ?>
					       	<div id="formulaire"><a href="conversation.php?id=<?php echo $idto ?>">
					       	        <p><?php echo $titreto?></p></a>
									<p><?php echo $descripto?></p>
									<p><?php echo $dateto?></p>
								
							</div>
					     <?php  		
					     	}
					     }
					 }
				         	

									if (isset($_POST['valider2'])) {
							
												if (!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['private']))
										 			{

										 			$titre = $_POST['titre'];
									                $description = $_POST['description'];
									                $private = $_POST['private'];
									                $id = $_SESSION['id'];
													$requete = "INSERT INTO topics( title, description, user_id, date, private) VALUES ('$titre','$description','$id',NOW(),'$private')";
													$query = mysqli_query($connexion,$requete);
													header("location: topic.php");
																	
							
												}
											}



											?>
												<h1>Panneau de commandes</h1>
												<div class ="form">
								  				<form method="post" class="ajout" action="topic.php">
							                    <label>Titre</label></br>
							                    <input type="text" name="titre" required></br>
							                    <label>Description</label></br>
							                    <input type="text" name="description" required></br>
							                    <select name="private" id=""></br>
							                        <option value="">--Choisir--</option>
							                         <option value="">--choisir--</option>
							                        <option value="prive">Privé</option>
							                        <option value="public">Public</option>
							                       
							                    </select>
							                    <input type="submit" value="Envoyer" name="valider2"></br>
							      </form>
							</div>
					


				</section>
	
	
										

											

						
			
						