<?php

class ProfileInfo extends Dbh {

   // selecting colum of users_id from profiles table to cnnect with forigen key of the users table.
   protected function getProfileInfo($userId){
      $stmt = $this->connect()->prepare('SELECT * FROM profiles WHERE users_id = ?;');

      if(!$stmt->execute(array($userId))){
         $stmt = null;
         header("location: profile.php?error=stmtfailed");
         exit();
      }

     // $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: profile.php?error=profilenotfound");
         exit();
      }

      $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC); 

      return $profileData;
   } 
   
   // if the users update there profile it will make changes in DB with this code.
   protected function setNewProfileInfo($profileAbout, $profileTitle, $profileText, $userId){
      $stmt = $this->connect()->prepare('UPDATE profiles SET profiles_about = ?, profiles_introtitle = ?, profiles_introtext = ? WHERE users_id = ?;');

      if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))){
         $stmt = null;
         header("location: profile.php?error=stmtfailed");
         exit();
      }

      $stmt = null;
   } 


//This insert data in profiles table as soon as the users signup.

   protected function setProfileInfo($profileAbout, $profileTitle, $profileText, $userId){
      $stmt = $this->connect()->prepare('INSERT INTO profiles (profiles_about, profiles_introtitle, profiles_introtext, users_id) VALUES (?, ?, ?, ?);');

      if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))){
         $stmt = null;
         header("location: profile.php?error=stmtfailed");
         exit();
      }

      $stmt = null;
   } 


/* 

protected function setProfileInfo($profileAbout, $profileTitle, $profileText, $userId){
   $stmt = $this->connect()->prepare('INSERT INTO profiles (profiles_about, profiles_introtitle, profiles_introtext, users_id) VALUES (?, ?, ?, ?);');

   if(!$stmt->execute([$profileAbout, $profileTitle, $profileText, $userId])){
       $stmt = null;
       header("location: profile.php?error=stmtfailed");
       exit();
   }

   $stmt = null;
}
*/

}