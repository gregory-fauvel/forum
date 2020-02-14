<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="forum.css">
    <title>Profil</title>
</head>
<body id="bodyu">

  <?php
  session_start();
  // include("bar-nav.php");
  if (isset($_SESSION['login']))
  {
    $id= $_GET['id'];
    $connexion = mysqli_connect("localhost","root","","forum");

    $requete = "SELECT * FROM utilisateurs WHERE id= $id";
    $req = mysqli_query($connexion, $requete);
    $data = mysqli_fetch_assoc($req);
  
  ?>
    
        <div id="containeruser">
    <div class="blocuser">
      <div id="mainuser">
        <?php
      $LoginS= $_SESSION['login']; 
      ?>

      <div id="titreu">
        <h1>Profil de <?php echo $data['name'] ?></h1>
      </div>

            

           
          <p>RanK: <?php echo $data['rank']?></p><br>
          <p>Inscrit le: <?php echo $data['date']?></p>

         </div>
       </div>
        
   
   <div id="formU">
  <?php
  if ($_SESSION['login'] == 'admin'){
    ?>
    <label>Changer de grade</label>
    <form method="post">
    <select name="rank">
      <option value="Admin">Admin</option>;
      <option value="moderateur">Moderateur</option>
      <option value="Membre">Membre</option>
    </select>
    <input type="submit" name="rankB">
  </form>
</div>
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
  
// include("footer.php");
?>
 
  
</body>
</html>

        
