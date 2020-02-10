

<section id="conteneur2">
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

									if (isset($_POST['valider2'])) {
							
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
							                    <input type="submit" value="Envoyer" name="valider2"></br>
							      </form>
							</div>
					


				</section>
	
	
										

											

						
			
						