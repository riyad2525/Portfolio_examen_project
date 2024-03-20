<?php
   session_start();
   include_once 'header.php';
   include "classes/dbh.classes.php";
   include "classes/profileinfo.classes.php";
   include "classes/profileinfo-view.classes.php";
   $profileInfo = new ProfileInfoView();
?>

      <section class="profile">
         <div class="profile-bg">
            <div class="wrapper">
               <div class="profile-settings">
                  <h3>PROFILE SETTINGS</h3> 
                  <p>Change your about here!</p>
                  <form action="includes/profileinfo.inc.php" method="post">
                     <textarea name="about" cols="30" rows="10" placeholder="profile about section..."><?php $ProfileInfo->fetchAbout($_SESSION["userid"]);?></textarea>
                     <br><br>
                     <p>Change profile page intro here!</p>
                     <br>
                     <input type="text" name="introtitle" placeholder="profile title..."
                      value="<?php $ProfileInfo->fetchTitle($_SESSION["userid"]);?>">
                     <textarea name="introtext" cols="30" rows="10" placeholder="profile introduction..."><?php $ProfileInfo->fetchText($_SESSION["userid"]);?></textarea>
                     <button type="submit" name="submit">SAVE</button>
                  </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      

      
<?php
   include_once 'footer.php';
?>
     