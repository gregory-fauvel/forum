<?php
session_start();
				$connexion=mysqli_connect('localhost', 'root', '', 'forum');
				$id=$_GET['id'];
				$user = $_SESSION['id'];
				$requete="SELECT * FROM `interaction` WHERE message_id=$id AND user_id=$user ";
				$query=mysqli_query($connexion,$requete);
				$resultat=mysqli_fetch_array($query);
				var_dump($resultat);

		if (isset($_POST['jaime'])) 
		{
			
			 if($resultat[3] == 0)  //si il na pas fait de jaime
			
			{
			
				$jaime1 = 0;
	            $jaimepas1 = 0;
				$jaime = $_POST['jaime'];
				$jaimepas = $_POST['jaimepas'];
				$aime = $resultat[3];
				$aimepas= $resultat[4];
				$update= "UPDATE interaction SET aime= 1  , aimepas= 0 WHERE message_id= $id AND user_id= $user";
				$query2=mysqli_query($connexion,$update);
			
			}
		else{
				$aime = $resultat[3];
				$aimepas= $resultat[4];
				$update3= "UPDATE interaction SET aime= 0  , aimepas= 0 WHERE message_id= $id AND user_id= $user";
				$query3=mysqli_query($connexion,$update3);
			
		
			}

		}
	
		// si il a fait un jaime pas
		if (isset($_POST['jaimepas'])) 
		{
			//si il na pas fait de jaime pas
			 if($resultat[4] == 0) 
			{
				
				$jaime1 = 0;
	            $jaimepas1 = 0;
				$jaime = $_POST['jaime'];
				$jaimepas = $_POST['jaimepas'];
				$aime = $resultat[3];
				$aimepas= $resultat[4];
				var_dump($aime);
				$updatepas= "UPDATE interaction SET aime= 0  , aimepas= 2 WHERE message_id= $id AND user_id= $user";
				$querypas=mysqli_query($connexion,$updatepas);
				var_dump($querypas);
			
			}
		else
			{

				$aime = $resultat[3];
				$aimepas= $resultat[4];
				$updatepas2= "UPDATE interaction SET aime= 0  , aimepas= 0 WHERE message_id= $id AND user_id= $user";
				$querypas2=mysqli_query($connexion,$updatepas2);
				var_dump($querypas2);
				
			}	
		}


				 $count="SELECT COUNT(*) FROM interaction WHERE aime = 1";
				 $countquery=mysqli_query($connexion,$count);
				 $resultataime= mysqli_fetch_all($countquery);
				 var_dump($resultataime);

				 $count2="SELECT COUNT(*) FROM interaction WHERE aimepas = 2";
				 $countquery2=mysqli_query($connexion,$count2);
				 $resultataime2= mysqli_fetch_all($countquery2);
				 var_dump($resultataime2);



?>
<html >
<head>
 <meta charset="utf-8">
</head>
<body>
<form method='POST' action="message2.php?id=<?php echo $id; ?>">
	<label>J aime</label>
	<input type="submit" name="jaime" value="jaime"></br>
	<label>J aime pas</label>
	<input type="submit" name="jaimepas" value="jaimepas"></br>
</form>
</body>
</html>
