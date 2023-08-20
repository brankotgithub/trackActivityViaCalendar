<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    
   <?php include 'inlude/style.php';?>
    
</head>
<body class="center">
    
   
    
    
    <h1  style="text-align:center;">Pozdrav, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.<br></b>Dobrodosli na pocetnu stranicu 
    <br>PRAĆENJA STATUSA PROJEKATA</h1>
    
    <?php include 'index.php';?>
  
</body>
</html>