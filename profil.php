<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="forum.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <title>Profil</title>
</head>
<body class="bodyf">

  <?php
  session_start();
  // include("bar-nav.php");
  if (isset($_SESSION['login']))
  {
    $connexion = mysqli_connect("localhost","root","","forum");

    $requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
    $req = mysqli_query($connexion, $requete);
    $data = mysqli_fetch_assoc($req);
  ?>
    <section id="container1">
        
      
        <?php
      $LoginS= $_SESSION['login']; 
      ?>

        <div id="H1prof">
        <h1 id="h1pro">Profil de <?php echo $LoginS ?></h1>
      </div>
      <article id='profc'>
        <div id="main">

            <h3 id="H3prof">changement de mot de passe et pseudo</h3>
            <form name="loginform" id="loginform" action="#" method="post" enctype="multipart/form-data" class="wpl-track-me"> 
                <p class="login-username">
                    <label class="profform" for="user_login">Username</label> 
                    <input type="text" id="user_login" class="input" placeholder="New Username" value="<?php echo $data['login']?>" size="20" name="login"/> 
                </p> 
                <p class="login-password"> 
                    <label class="profform" for="user_pass">Password</label>
                    <input type="password" name="mdp" id="user_pass" class="input" placeholder="New Password" value="<?php echo $data['password']?>" size="20"/> 
                </p>  

                

  

                <p class="login-submit"><input type="submit" name="Modifier" id="submit" class="button-primary" value="Modifier" />
                    <input type="hidden" name="redirect_to" value="#"/>
                </p>  
           </form>
           </div>
           <div id="info-prof">

           
          <p class="profform">RanK: <?php echo $data['rank']?></p>
          <p class="profform">Nom: <?php echo $data['name']?></p>
          <p class="profform">Prenom: <?php echo $data['surname']?></p>
          <p class="profform">Inscrit le: <?php echo $data['date']?></p>

      </div>
    </article>

         
        
   </section>
  <?php

    if (isset($_POST['Modifier']))
    {


      $login = $_POST['login'];
      $passe = password_hash($_POST["mdp"], PASSWORD_DEFAULT, array('cost' => 12));

      $requete2 = "UPDATE utilisateurs SET login = '$login', password = '$passe' WHERE login = '".$_SESSION['login']."'";
      $query2=mysqli_query($connexion,$requete2);
      session_unset();
      header("location:connexion.php?reconnect=1");
    }
  }
  else 
  {
  ?>
    <section id="notcon">
      <p>Veuillez vous connecter pour accéder à votre page !</p>
    </section>
        <?php
  }
  
// include("footer.php");
?>
 
  
</body>
</html>

        
