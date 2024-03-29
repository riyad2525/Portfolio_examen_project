<?php
   session_start();
   include "classes/dbh.classes.php";
   include "classes/profileinfo.classes.php";
   include "classes/profileinfo-view.classes.php";
   $profileInfo = new ProfileInfoView();
?>

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
     

<div class="profile">
   
      <div class="profile-wrapper">
         <div class="profile-info">
         <div class="profile-info-img">
            <p>
            <?php     
                 // Check if the "useruid" key exists in the $_SESSION array
                           if (isset($_SESSION["useruid"])) {
                           echo $_SESSION["useruid"];
                           } else {
                       // Handle the case when 'useruid' key is not set
                           echo "Uid will appear after login!";
                           }
           ?>
            </p>
            <a href="profilesettings.php" class="follow-btn">PROFILE SETTINGS</a>
         </div>
         <div class="profile-info-about">
            
            <h3>ABOUT</h3>
            <p>

            <?php
           // Check if the user is logged in
            if(isset($_SESSION["userid"])) {
         // Call the fetchAbout method with the user ID from the session
            $profileInfo->fetchAbout($_SESSION["userid"]);
               } else {
         // Handle the case when the user is not logged in
         // You might redirect to a login page or show an error message
                  echo "User not logged in.";
               }
            ?>

            </p>
            <h3>FOLLOWERS</h3>
         </div>
         </div>  
         
         <div class="profile-content">
            <div class="profile-intro">
               <h3>
               <?php
// Check if the user is logged in
if(isset($_SESSION["userid"])) {
    // Instantiate the ProfileInfo object (replace YourProfileClass with the actual class name)
    $ProfileInfo = new ProfileInfoView();

    // Call the fetchTitle method with the user ID from the session
    $ProfileInfo->fetchTitle($_SESSION["userid"]);
} else {
    // Handle the case when the user is not logged in
    // You might redirect to a login page or show an error message
    echo "User not logged in.";
}
?>

               </h3>
               <p>
               <?php
                  // Check if the user is logged in
                     if(isset($_SESSION["userid"])) {
               // Call the fetchAbout method with the user ID from the session
                         $ProfileInfo->fetchText($_SESSION["userid"]);
                        } else {
               // Handle the case when the user is not logged in
               // You might redirect to a login page or show an error message
                             echo "User not logged in.";
                        }
                    
                 ?>
               </p>
            </div>
            <div class="profile-posts">
               <h3>POST</h3>
               <div class="profile-post">
                  <h2>FEEL FREE TO POST HERE SOMETHING!</h2>
                  <p>The posting system is not available yet.</p>
               </div>
            </div>
         </div> <!--profile content-->

      </div>
 
</div>




 <!-- footer Start-->
 <footer class="footer-main">

   <div class="wrapper-main footer-main-flex">
   
   <div class="footer-testemoni">
      <img src="img/portret/prt-1.png" alt="testemoni" style="size: 50px;">
      <p>
         Lorem ipsum dolor sit amet consectetur adipisicing elit.
      </p>
   </div>
   <div class="footer-testemoni">
      <img src="img/portret/prt-2.png" alt="testemoni">
      <p>
         Lorem ipsum dolor sit amet consectetur adipisicing elit.
      </p>
   </div>
   <div class="footer-testemoni">
      <img src="img/portret/prt-3.png" alt="testemoni">
      <p>
         Lorem ipsum dolor sit amet consectetur adipisicing elit.
      </p>
   </div>
   <div class="footer-testemoni">
      <img src="img/portret/prt-4.png" alt="testemoni">
      <p>
         Lorem ipsum dolor sit amet consectetur adipisicing elit.
      </p>
   </div>
   
   <div class="footer-sitemap">
      <ul>
         <li><a href="#">HOME</a></li>
         <li><a href="#">ABOUT US</a></li>
         <li><a href="#">CONTACT</a></li>
      </ul>
      <ul>
         <li><a href="#">project-1</a></li>
         <li><a href="#">project-2</a></li>
         <li><a href="#">project-3</a></li>
         <li><a href="#">project-4</a></li>
      </ul>
      <ul>
         <li><p>GET IN TOUCH:</p></li>
         <li><p>+31205893472</p></li>
         <li><p>r.alameen@yahoo.com</p></li>
         <li><p>plantkoninglaan 50 3198 JE Bloemendaal</p></li>
      </ul>
   </div>
   </div>
   </footer>
   <!-- footer End-->
   </div>
   </body>
   </html>
