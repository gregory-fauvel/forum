

  <?php
    if (isset($_SESSION['login'])==false)
    {
    ?>
  

  <nav class="menu">
  <ol>
    <li class="menu-item"><a href="index.php">Home</a></li>
    <li class="menu-item"><a href="topic.php">Topics</a></li>
    <li class="menu-item"><a href="connexion.php">Connexion</a></li>
    <li class="menu-item"><a href="inscription.php">Inscription</a></li>
  </ol>
   
  
</nav>

    
     <?php
    }
     elseif(isset($_SESSION['login'])==true)

    {
       
    ?>
    <nav class="menu">
      <ol>
      
        <li class="menu-item"><a href="index.php">Home</a></li>
        <li class="menu-item"><a href="topic.php">Topics</a></li>
        <li class="menu-itemc"><a href="profil.php">Profil</a></li>
        <li class="menu-itemc"><a href="topic.php?deconnexion=true">Déconnexion</a>
        </li>
      </ol>
        
      
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