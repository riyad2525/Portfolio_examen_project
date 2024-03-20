<?php

class Signup extends Dbh{

   // This is to sign the users up.
   protected function setUser($uid, $pwd, $email){
      $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUE (?, ?, ?);');

      $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

      if(!$stmt->execute(array($uid, $hashedPwd, $email))){
         $stmt = null;   
         header("location: ../index.php?error=stmtfailed");
         exit();
      }

      //$stmt= users_id;

      $stmt = null;

   }

  

   protected function checkUser($uid, $email){
      $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

      if(!$stmt->execute(array($uid, $email))){
         $stmt = null;
         header("location: ../index.php?error=stmtfailed");
         exit();
      }

      $resultCheck;
      
      if($stmt->rowCount() > 0){
         $resultCheck = false;
      }
      else {
         $resultCheck = true;
      }

      return $resultCheck;
   }

   protected function getUserId($uid){
      $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_uid = ?;');

      if(!$stmt->execute(array($uid))){
         $stmt = null;
         header("location: profile.php?error=stmtfailed");
         exit();
      }

      if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: profile.php?error=stmtfailed");
         exit();
      }

      $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC); 

      return $profileData;
   } 

}