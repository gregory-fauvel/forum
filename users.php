<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="forum.css">
    <title>Profil</title>
</head>

<body class="inscription">

  <header class="header">
    <?php include 'bar-nav.php'?>;
  </header>

  <?php
  session_start();
   
  if (isset($_SESSION['login']))
  {
    $id= $_GET['id'];
    $connexion = mysqli_connect("localhost","root","","forum");

    $requete = "SELECT * FROM utilisateurs WHERE id= $id";
    $req = mysqli_query($connexion, $requete);
    $data = mysqli_fetch_assoc($req);
 
  ?>
   
        <div id="containeruser">
          <h1 class="titre2">Info de l utilisateur</h1>
            <div class="blocuser">

                    <div id="mainuser">
                        <h1 class="titre">Profil de <?php echo $data['name'] ?></h1>
                            <?php
                            $LoginS= $_SESSION['login'];
                             ?>
                            <p>RanK: <?php echo $data['rank']?></p><br>
                            <p>Inscrit le: <?php echo $data['date']?></p>

                </div>
             </div>
           
       
   
   
  <?php
  if ($_SESSION['login'] == 'admin'){
    ?>
    
     <h1 class="titre">Changer de grade</h1>
    <form method="post">
    <select name="rank">
      <option value="Admin">Admin</option>;
      <option value="Moderateur">Moderateur</option>
      <option value="Membre">Membre</option>
    </select>
    <input type="submit" name="rankB">
  </form>

</div>
    <?php


    if (isset($_POST['rankB']))
    {
      $rank =  $_POST['rank'];
      $login = $_POST['login'];
     

      $requete2 = "UPDATE utilisateurs SET rank = '$rank' WHERE id = $id";
      echo "$requete2";
      $query2=mysqli_query($connexion,$requete2);
      header("Refresh:0;");

       // header("location:users.php");

    }
  }
}
         else
        {
          ?>
            <section id="notcon">
              <p id="pascopro">Veuillez vous connecter pour accéder à votre page !</p>
            </section>
        <?php
        }
 
 
?>
           <footer class="footer">
              <aside> Copyright 2020 Coding School | All Rights Reserved | Project by Anthony,Mohamed,Grégory. </aside>
              
            </footer>
 
 
    </body>
</html>