<?php
    session_start();

$connexion =  mysqli_connect("localhost","root","","forum");
if (!isset($_SESSION["login"])) {
    

?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title> Inscription</title>
    <link rel="stylesheet" href="forum.css">
</head>

<body class="inscription">
    <header class="header">

    <?php include 'bar-nav.php' ?>

    </header>
    
        <section class="conteneur1">
        <h1> Inscription </h1>

        <form method='POST' action='inscription.php'>


            <article>
                <label> Login </label>
                <input type="text" name='login' required />
            </article>

            <article>
                <label> Name </label>
                <input type="text" name='name' required />
            </article>

            <article>
                <label> Surname </label>
                <input type="text" name='surname' required />
            </article>

            <article>
                <label> Mot de passe </label>
                <input type="password" name='mdp1' required />
            </article>

            <article>
                <label> Confirmation de mot de passe </label>
                <input type="password" name='mdp2' required />
            </article>

            <input class="bouton" type='submit' name='inscription' value='Inscription' />

            <?php

        if (isset($_POST['inscription']))
       {
            $login = $_POST['login'];
            $mdp= password_hash($_POST["mdp1"], PASSWORD_DEFAULT, array('cost' => 12));
          $name = $_POST['name'];
          $surn =$_POST['surname'];

            if ($_POST['mdp1']==$_POST['mdp2'])
            {
            $requet="SELECT* FROM utilisateurs WHERE login='".$login."'";
            $query2=mysqli_query($connexion,$requet);
            $resultat=mysqli_fetch_all($query2);
            $trouve=false;
            foreach ($resultat as $key => $value) 
            {
            if ($resultat[$key][1]==$_POST['login'])
            {
               $trouve=true;
               echo "<p class='erreur'><b>Login déja existant!!</b></p>";
            }
           }
           if ($trouve==false)
           {
            $sql = "INSERT INTO utilisateurs (login,password,name,surname,rank,date)
                VALUES ('$login','$mdp','$name','$surn','Membre',NOW())";
            $query=mysqli_query($connexion,$sql);
            header('location:connexion.php');
            }
           }
           else
           {
              echo "<p class='erreur'><b>Les mots de passe doivent être identique!</b></p>";
           }
        }

    ?>
        
        </form>
    </div>
        
    </section>
    <?php
    }
    else 
    {
    ?>
    <section id="notcon">
      <p>Vous êtes déjà connecté impossible de s'inscrire !!</p>
    </section>
        <?php
    }
    ?>
        </form>
    </section>


   
                <footer class="footer">
                     <aside> Copyright 2020 Coding School | All Rights Reserved | Project by Anthony,Mohamed,Grégory. </aside>
                 </footer>

</body>

</html>