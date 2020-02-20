
<!-- Traitement déconnexion --> 

<?php
session_start();

if(!isset($_SESSION['login']))
{}
else header('Location:../index.php');

session_destroy();
?>