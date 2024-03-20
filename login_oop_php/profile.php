<?php
       session_start();
       include_once 'header.php';
       include "classes/dbh.classes.php";
       include "classes/login.classes.php";
       include "classes/profileinfo.classes.php";
       include "classes/profileinfo-view.classes.php";
       $profileInfo = new ProfileInfoView();

       echo '<link rel="stylesheet" type="text/css" href="css\profile.css">';
?>

<select class="profile">
   <div class="profile-bg">
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
               // Call the fetchAbout method with the user ID from the session
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
                  <h2>MOTION SENSOR</h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, natus.</p>
               </div>
            </div>
         </div>       
      </div>
   </div>
</select>


<?php
   include_once 'footer.php';
?>
