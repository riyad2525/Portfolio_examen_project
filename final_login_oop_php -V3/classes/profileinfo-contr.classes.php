<?php

class ProfileInfoContr extends ProfileInfo {

   private $userId;
   private $userUid;
  

   public function __construct($userId, $userUid){
      $this->userId = $userId;
      $this->userUid = $userUid;
   }
   // Create immediate some default text when the users create account and changed noting throw profiles settings.
   public function defaultProfileInfo(){
      $profileAbout = "Tell about yourself!";
      $profileTitle = "Hi, I am " . $this->userUid;
      $profileText = "Welcome to my profile page!";
      $this->setProfileInfo($profileAbout, $profileTitle, $profileText, $this->userId);
   }
// This is when they will made the changes.
   public function updateProfileInfo ($about, $introTitle, $introText){
      // Error handlers emptyInputCheck
      if($this->emptyInputCheck ($about, $introTitle, $introText) == true){
         header("location: ../profilesettings.php?error=emptyinputd");
         exit();
      }

      // Update profile info
      $this->setNewProfileInfo($about, $introTitle, $introText, $this->userId);
   }

   private function emptyInputCheck ($about, $introTitle, $introText){
      $result;
      if(empty($about) || empty($introTitle) || empty($introText)){
         $result = true;
      }
      else{
         $result = false;
      }
      return $result;
   }
}