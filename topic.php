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
	<header class="header">
		
    <?php 
    include("bar-nav.php");
    ?>
   
    <?php
    if (isset($_SESSION['login'])==false)
    {
       echo "<h3>Connectez vous et postez vos topics maintenant";
    }
    elseif(isset($_SESSION['login'])==true)

    {
       if($_SESSION['login'] =="admin")
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté.</b></h3>";
       }
       else
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté vous pouvez posté des messages maintenant.</b></h3>"; 
       }
    }
    ?>
	</header>



				<section id="conteneur">
								<h1 class="titre">Nos Topics</h1>
						<?php
						
								date_default_timezone_set('Europe/Paris');
								$connexion = mysqli_connect ("localhost","root","","forum");
								$requete1 = "SELECT *FROM topics INNER JOIN utilisateurs WHERE utilisateurs.id=topics.user_id";
								$query1 = mysqli_query($connexion,$requete1);
								$resultat1 = mysqli_fetch_all($query1);

						foreach($resultat1 as list($idto, $titreto,$descripto, $user, $dateto,$privateto))
						{
							if (isset($_SESSION['login'])){

							  if ($_SESSION['rank']=='Admin'|| $_SESSION['rank']=='Moderateur') {
							
							  ?>
								<div id="formulaire"><a href="conversation.php?id=<?php echo $idto?>">
									<h1 class="titre"><?php echo $titreto?></h1></a>
									<p><?php echo $descripto?></p>
									<p><?php echo $dateto?></p>
								</div>
							

						<?php
					       }
					       if ($_SESSION['rank']=='Membre' && $privateto =="public") {
					       	?>
					       	<div id="formulaire"><a href="conversation.php?id=<?php echo $idto ?>">
					       	        <p class="titre"><?php echo $titreto?></p></a>
									<p><?php echo $descripto?></p>
									<p><?php echo $dateto?></p>
								
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
					  		
									if (isset($_POST['valider'])) {
							
												if (!empty($_POST['titre']) && !empty($_POST['description']) && !empty($_POST['private']))
										 			{

										 			$titre = $_POST['titre'];
									                $description = $_POST['description'];
									                $private = $_POST['private'];
									                $id = $_SESSION['id'];
													$requete = "INSERT INTO topics( title, description, user_id, date, private) VALUES ('$titre','$description','$id',NOW(),'$private')";
													$query = mysqli_query($connexion,$requete);
													header('Location: topic.php');
																	
							
													}

											}
					if (isset($_SESSION['login'])) {

					  		if ($_SESSION['rank'] == "Admin"){								

						?>
			<h1 class="titre">Panneau de commandes</h1>
			<div id="conteneurform">
				
							<div class ="form">
									<h1 class="titre">Ajout de topic</h1>
								  <form method="post" class="ajout">
							                    <label>Titre</label></br>
							                    <input type="text" name="titre" required></br>
							                    <label>Description</label></br>
							                    <input type="text" name="description" required></br>
							                    <select name="private" id=""></br>
							                        <option value="">--choisir--</option>
							                        <option value="prive">Privé</option>
							                        <option value="public">Public</option>
							                    </select>
							                    <input type="submit" value="Envoyer" name="valider"></br>
							      </form>
							</div>

				   <?php
				}
			}
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
				   		if (isset($_SESSION['login'])) {

					  		if ($_SESSION['rank'] == "Admin"){
				   ?>
				   		<div class ="form">
				   			<h1 class="titre">Modifier le topic</h1>
								  <form method="post" class="ajout">
								  				<label>Recherche Topics</label></br>
							                    <input type="text" name="titre3" required></br>
							                    <label>Modifier Titre</label></br>
							                    <input type="text" name="titre2" required></br>
							                    <label>Description</label></br>
							                    <input type="text" name="description" required></br>
							                    <select name="private"></br>
							                        <option value="">--choisir--</option>
							                        <option value="prive">Privé</option>
							                        <option value="public">Public</option>
							                       
							                    <input type="submit" value="modifier" name="modifier"></br>
							      </form>
							</div>
				   	  <?php
				   	}
				   }
				   	  				if (isset($_POST['effacer'])) 
				   	  				{
					   	  								if (!empty($_POST['titre4']))
											 			{
											 			$titre4 = $_POST['titre4']; 
										                $id = $_SESSION['id'];
									        			$requete3= "DELETE FROM `topics` WHERE title='$titre4'";
														$query3 = mysqli_query($connexion,$requete3);
														header('Location: topic.php');
		
				   										}
				  					}
				  				
				  			
				  		
				if (isset($_SESSION['login'])) {

					  if ($_SESSION['rank'] == "Admin"){
				   ?>
				    <div class ="form">
				    	<h1 class="titre">Suprimer le topic</h1>
								  <form method="post" class="ajout">
							                    <label>Titre</label></br>
							                    <input type="text" name="titre4" required></br>

							                    <input type="submit" value="effacer" name="effacer"></br>
							      </form>
							</div>
						</div>
							<?php
                          }
                      }
                          if(isset($_SESSION['login']))
                          {
							if ($_SESSION['rank'] == "moderateur"){
							include("moderateur.php");
						}
					  }

						

					
				?>

				</section>
				<footer class="footer">
					 <aside> Copyright 2020 Coding School | All Rights Reserved | Project by Anthony,Mohamed,Grégory. </aside>
				</footer>
	
		</body>
</html>