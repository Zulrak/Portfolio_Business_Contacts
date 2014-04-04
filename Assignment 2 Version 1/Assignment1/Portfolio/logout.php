<?php   
session_start(); //open the session
session_destroy(); //destroy the session
header("location:home.html"); 
exit();
?>