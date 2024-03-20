<?php
   session_start();
   include_once 'header.php';
   include "classes/dbh.classes.php";
   include "classes/profileinfo.classes.php";
   include "classes/profileinfo-view.classes.php";
   $profileInfo = new ProfileInfoView();
?>

      <div class="profile">
         <div class="profile-bg">
            <div class="wrapper">
               <div class="profile-settings">
                  <h3>PROFILE SETTINGS</h3> 
                  <p>Change your about here!</p>
                  <form action="includes/profileinfo.inc.php" method="post">
                     <textarea name="about" cols="30" rows="10" placeholder="profile about section..."><?php
           // Check if the user is logged in
            if(isset($_SESSION["userid"])) {
         // Call the fetchAbout method with the user ID from the session
            $profileInfo->fetchAbout($_SESSION["userid"]);
               } else {
         // Handle the case when the user is not logged in
         // You might redirect to a login page or show an error message
                  echo "User not logged in.";
               }
            ?></textarea>
                     <br><br>
                     <p>Change profile page intro here!</p>
                     <br>
                     <input type="text" name="introtitle" placeholder="profile title..."
                      value="<?php
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
?>">
                     <textarea name="introtext" cols="30" rows="10" placeholder="profile introduction..."><?php
                  // Check if the user is logged in
                     if(isset($_SESSION["userid"])) {
               // Call the fetchAbout method with the user ID from the session
                         $ProfileInfo->fetchText($_SESSION["userid"]);
                        } else {
               // Handle the case when the user is not logged in
               // You might redirect to a login page or show an error message
                             echo "User not logged in.";
                        }
                    
                 ?></textarea>
                     <button type="submit" name="submit">SAVE</button>
                  </form>
                  </div>
               </div>
            </div>
         </div>
            </div>
      

      
<?php
   include_once 'footer.php';
?>
     