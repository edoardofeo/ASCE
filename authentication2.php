<?php

session_start();
if(!isset($_SESSION['user'])){
    header("Location:login2.php");
    exit();
}

?>