<?php
/* Whene the users submit the form to sign up than this page will catch it up.  
   Than the data that users will give to us, goes throw the if steatsments to find the errors in it.
*/
if (isset($_POST["submit"])){
// This're infos that users give to you to take them to use.
   $name = $_POST["name"];
   $email = $_POST["email"];
   $username = $_POST["uid"];
   $pwd = $_POST["pwd"];
   $pwdRepeat = $_POST["pwdrepeat"];

   require_once 'dbh.inc.php';
   // if the user submit the form correctly, than it will make a connection to database.
   require_once 'functions.inc.php'; //Connected to function page.

   // if all this filds are empty.
   if (emptyInputSignup($name, $email, $username,  $pwd, $pwdRepeat) !== false){
      header("location: ../signup.php?error=emptyinput");
   exit(); 
   }
   
   // if the usersname is invalid. f.e. wrong symbols
   if (invalidUid($username) !== false){
      header("location: ../signup.php?error=invaliduid"); // Will sendback to signup page
   exit(); // Stopt running script.
   }
/*
   if (invalidEmail($email) !== false){
      header("location: ../signup.php?error=invalidemail");
   exit(); // invalidemail (without @ )
   }
*/

   if (passwordMatch($pwd, $pwdRepeat) !== false){
      header("location: ../signup.php?error=passworddontmatch");
   exit(); // Are the two password matches.
   }

   if (uidExists($conn, $username, $email) !== false){
      header("location: ../signup.php?error=usernametaken");
   exit(); // check of the users already exist.
   }

   createUser($conn, $name, $email, $username, $pwd);
} // finaly this function will create the user.

else{

   header("location: ../signup.php");
   exit(); // else it will bring you back to signup.
}