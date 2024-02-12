<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

   // Grabbing the data
  
   $uid = htmlspecialchars($_POST["uid"], ENT_QUOTES, 'UTF-8');
   $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, 'UTF-8');
   $pwdRepeat = htmlspecialchars($_POST["pwdRepeat"], ENT_QUOTES, 'UTF-8');
   $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');

   // Instantiate SignupContr class.
   //This ordering is very important. 1st dbh > 2nd model class > 3rd contr-class
   // Because in this ordering it communicate to each other.  
   include "../classes/dbh.classes.php";
   include "../classes/signup.classes.php";
   include "../classes/signup-contr.classes.php";
   $signup = new SignupContr($uid, $email, $pwd, $pwdRepeat);

   // Running error handelars and user signup.
   $signup->signupUser();
   $userId = $signup->fetchUserId($uid);

   //Go back to the fornt page
  // header("location: ../index.php?error=none");

   // Instantiate profileInfoContr class.
   include "../classes/profileinfo.classes.php";
   include "../classes/profileinfo-contr.classes.php";
   $profileInfo = new profileInfoContr($userId, $uid);
   $profileInfo->defaultProfileInfo();


   // Going back to front page.
   header("location: ../index.php?error=none");
}