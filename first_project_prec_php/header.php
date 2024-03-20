<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="css/sl_form.css"> <!--Css for form -->
   <link rel="stylesheet" href="css/navbar.css"> <!--This is only for navbar.-->
   <!--<link rel="stylesheet" href="css/reset.css"> --> <!--This stylesheet fit all the content of your entair website in any browser.-->
</head>
<body>
   
   <header class="header-main">
      <a href="index.php"> <!--This link will takes user to the home page.-->
      <div class="header-main-logo">
         <img src="img/logo.png" alt="logo">
      </div>
   </a>

      <nav class="header-main-nav">
         <div class="wrapper">
         <ul>
            <li><a href="index.php">HOME</a></li> <!--Home page-->
            <li><a href="sensors.php">SENSORS</a></li> <!--Sensors page. Users can find here all sensors that are connected to GPIO's.-->
            <li><a href="profile.php">PROFILE</a></li>
         </ul>
      </nav>
      
      <div class="header-main-sl"> <!--This div cover only the login and singUp button.-->
         <ul>
         <?php
   if (isset($_SESSION["useruid"])){
      echo "<li><a href='profile.php'>Profile</a></li>";
      echo "<li><a href='includes/logout.inc.php'>LOGOUT</a></li>";
   }
   else{
      echo "<li><a href='login.php'>LOGIN</a></li>";
      echo "<li><a href='signup.php'>SING UP</a></li>";
   }
   ?>
      </ul>
      </div>
      
      </div>
   </header>
      <div class="wrapper">