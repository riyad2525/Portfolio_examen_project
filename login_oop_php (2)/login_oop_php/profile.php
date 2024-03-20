<?php
   session_start();
   include_once 'header.php';
   include "../classes/dbh.classes.php";
   include "../classes/profileinfo.classes.php";
   include "../classes/profileinfo-view.classes.php";
   $profileInfo = new ProfileInfoView();
?>

      <section class="profile">
         <div class="profile-bg">
            <div class="wrapper">
               <div class="profile-intro">
                  <div class="profile-intro-bg">
                  <div class="profile-info-about">
                     <p>
                        <?php
                           echo $_SESSION["useruid"];
                        ?>
                     </p>
      <h3>About</h3>        
      <p>
         <?php
            $ProfileInfo->fetchAbout($_SESSION["userid"]);
         ?>
      </p>
      </div>
      <div class="profile-content">
         <div class="profile-intro">
         <h3>
         <?php
            $ProfileInfo->fetchTitle($_SESSION["userid"]);
         ?>
         </h3>
             <p>
                <?php
                    $ProfileInfo->fetchText($_SESSION["userid"]);
                 ?>
             </p>
         </div>
      </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      

      
<?php
   include_once 'footer.php';
?>
     