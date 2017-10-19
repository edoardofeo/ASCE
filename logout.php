<?php
session_start();

//session control - accessibile solo se loggati
if(!isset($_SESSION['user'])){
    header("Location:login.php");
}


unset($_SESSION['email']);
unset($_SESSION['pw']);
unset($_SESSION['user']);

unset($_COOKIE['user']);
setcookie("user", "", time()-3600);


session_destroy();

  header( "refresh:4; index.php" );
  echo 'Logout riuscito. Verrai rindirizzato in 5 secondi.<br>Se non succede, clicca <a href="index.php">qui</a>.';

?>