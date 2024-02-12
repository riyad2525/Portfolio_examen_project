

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,500;1,700;1,900&display=swap" rel="stylesheet"> <!--fonts-->
   <link rel="stylesheet" href="css/reset.css"> <!--This stylesheet fit all the content of your entair website in any browser.-->
   <link rel="stylesheet" href="css/main.css"> <!--This is defult navbar.-->
   <link rel="stylesheet" href="css/home.css"> <!--for home page.-->
   <link rel="stylesheet" href="css/form.css">
   <link rel="stylesheet" href="css/profile.css">
   <link rel="stylesheet" href="css/profilesettings.css">
   <link rel="stylesheet" href="css/sen.css">
   <link rel="stylesheet" type="text/css" href="css/gpio.css" />   

   
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
         <!--
            <li><a href='profile.php'>Profile</a></li>
            <li><a href='includes/logout.inc.php'>LOGOUT</a></li>
         -->
         <?php
            if(isset($_SESSION["userid"]))
            {
         ?>
            <li><a href="profile.php"><?php echo $_SESSION["useruid"]; ?></a></li>
            <li><a href="includes/logout.inc.php" class="header-login-a">LOGOUT</a></li>
         <?php
            }
            else
            {
         ?>
            <li><a href="signup.php">SING UP</a></li>
            <li><a href="login.php" class="header-login-a">LOGIN</a></li>
            <?php
            }
         ?>

      </ul>
      </div>
      
      </div>
   </header>
      <div class="wrapper">