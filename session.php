<?php
session_start();
if(!isset($_SESSION['nom'])){
   header('Location:connexion.php');
   exit();
}else{
   echo 'Bienvenu'.$_SESSION['nom'].$_SESSION['prenom'];
}


?>