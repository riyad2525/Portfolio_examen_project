<?php

if (isset($_POST["submit"])){

   $pwd = mysqli_escape_string($conn, md5($_POST['pwd']));
   $username = $_POST["uid"];
   $pwd = $_POST["pwd"];

   require_once 'dbh.inc.php';
   require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false){
      header("location: ../login.php?error=emptyinput");
      exit();
   }
   
   loginUsers($conn, $username, $pwd);
}
else{

   header("location: ../login.php?error=emptyinput");
   exit();
}