<?php
				$connexion=mysqli_connect('localhost', 'root', '', 'forum');
				$id=$_GET['id'];
				$user = $_SESSION['id'];
				$requete="SELECT * FROM `interaction` WHERE message_id=$idmsg AND user_id=$user ";
				$query=mysqli_query($connexion,$requete);
				$resultat=mysqli_fetch_array($query);
				


		if (isset($_POST["jaime$i"])) 
		{
			
			 if(empty($resultat))  //si il na pas fait de jaime
			
			{
				$jaime = $_POST["jaime$i"];
				$aime = $resultat[3];
				$aimepas= $resultat[4];
				$update= "INSERT INTO interaction (user_id, message_id, aime, aimepas) VALUES ($user, $idmsg, 1, 0)";
				$query2=mysqli_query($connexion,$update);
			
			}
			elseif ( !empty($resultat) && $resultat[3] == -1 ) {
				$jaime = $_POST["jaime$i"];
				$aime = $resultat[3];
				$aimepas= $resultat[4];
				// var_dump($aime);
				$updatepas= "UPDATE interaction SET aime = 1 WHERE message_id= $idmsg AND user_id= $user";
				$querypas=mysqli_query($connexion,$updatepas);
				// var_dump($querypas);
			}
		else{
				$aime = $resultat[3];
				$aimepas= $resultat[4];
				$updatepas2= "DELETE FROM interaction WHERE message_id= $idmsg AND user_id= $user";
				$query3=mysqli_query($connexion,$updatepas2);
			
		
			}

		}
	
		// si il a fait un jaime pas
		if (isset($_POST["jaimepas$i"])) 
		{
			//si il na pas fait de jaime pas
			 if(empty($resultat))
			{
				$jaimepas = $_POST["jaimepas$i"];
				$aime = $resultat[3];
				$aimepas= $resultat[4];
				// var_dump($aime);
				$updatepas= "INSERT INTO interaction (user_id, message_id, aime, aimepas) VALUES ($user, $idmsg, -1, 0)";
				$querypas=mysqli_query($connexion,$updatepas);
				// var_dump($querypas);
			
			}
			elseif ( !empty($resultat) && $resultat[3] == 1 ) {
				$jaimepas = $_POST["jaimepas$i"];
				$aime = $resultat[3];
				$aimepas= $resultat[4];
				// var_dump($aime);
				$updatepas= "UPDATE interaction SET aime = -1 WHERE message_id= $idmsg AND user_id= $user";
				$querypas=mysqli_query($connexion,$updatepas);
				// var_dump($querypas);
			}
		else
			{

				$aime = $resultat[3];
				$aimepas= $resultat[4];
				$updatepas2= "DELETE FROM interaction WHERE message_id= $idmsg AND user_id= $user";
				$querypas2=mysqli_query($connexion,$updatepas2);
				// var_dump($querypas2);
				
			}	
		}


				 $count="SELECT COUNT(*) FROM interaction WHERE message_id= $idmsg AND  aime = 1";
				 $countquery=mysqli_query($connexion,$count);
				 $resultataime= mysqli_fetch_all($countquery);
				 // var_dump($resultataime);

				 $count2="SELECT COUNT(*) FROM interaction WHERE message_id= $idmsg AND aime = -1" ;
				 $countquery2=mysqli_query($connexion,$count2);
				 $resultataime2= mysqli_fetch_all($countquery2);
				  // var_dump($resultataime2);



?>

<form method='POST' action="message.php?id=<?php echo $id; ?>">
	<label>(<?php echo $resultataime[0][0] ?>)</label>
	<input type="submit" name="jaime<?php echo $i ?>" value="jaime"></br>
	<label>(<?php echo $resultataime2[0][0] ?>)</label>
	<input type="submit" name="jaimepas<?php echo $i ?>" value="jaimepas"></br>
</form>