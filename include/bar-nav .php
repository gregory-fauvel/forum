


  <?php
    if (isset($_SESSION['login'])==false)
    {
    ?>
  

  <nav class="menu">
  
    <li class=""><a href="index.php">Home</a></li>
    <li class=""><a href="topic.php">Topics</a></li>
    <li class=""><a href="connexion.php">Connexion</a></li>
    <li class=""><a href="inscription.php">Inscription</a></li>
   
  
</nav>

    
     <?php
    }
     elseif(isset($_SESSION['login'])==true)

    {
       
    ?>
    <nav class="menu">
      
        <li class=""><a href="index.php">Home</a></li>
        <li class=""><a href="profil.php">Profil</a></li>
        <li class=""><a href="topic.php">Topics</a></li>
        <li class=""><a href="topic.php?deconnexion=true">Déconnexion</a>
        
      
    </nav>
 
     <?php
                
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:topic.php");
                   }
                }
    
    }
             
    ?>