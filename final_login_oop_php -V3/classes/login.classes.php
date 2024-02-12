<?php

class Login extends Dbh{

// getUser = Getting users from DB.   
   protected function getUser($uid, $pwd){
      $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');

     
// Looking for the users.
      if(!$stmt->execute(array($uid, $pwd))){
         $stmt = null;
         header("location: ../index.php?error=stmtfailed");
         exit();
      }
// Cheaking for the users in DB.
      if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../index.php?error=usernotfound");
         exit();
      }
// # Hashing pwd for security purpose.  
      $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC); 
      $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);
// if user put wrong pwd. Cheaking for right pwd. users input vs actual dat in DB  users_pwd
      if($checkPwd == false){
         $stmt = null;
         header("location: ../index.php?error=wrongpassword");
         exit();
      } // User can put both as usersname name / email.
      elseif($checkPwd == true){
         $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');

         if(!$stmt->execute(array($uid, $uid, $pwd))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
         }
//By all this rowCount if  getting 0 result from DB, than showing the error massage. 
         if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
         }

         $user = $stmt->fetchAll(PDO::FETCH_ASSOC); 
// if everything runs correct users get loged in.
// This is puted in every webpage to run the page properly after login.
         session_start(); 
         $_SESSION["userid"] = $user[0]["users_id"];
         $_SESSION["useruid"] = $user[0]["users_uid"];

         $stmt = null;
      }


      $stmt = null;

   }

}