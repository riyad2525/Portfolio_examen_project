<?php

class ProfileInfoView extends ProfileInfo {
      // Update profile about if the user make changes.
   public function fetchAbout($userId){
      $profileInfo = $this->getProfileInfo($userId);
      
      echo $profileInfo[0]["profiles_about"];
   }
   // Update profile about if the user make changes.
   public function fetchTitle($userId){
      $profileInfo = $this->getProfileInfo($userId);

      echo $profileInfo[0]["profiles_introtitle"];
   }
   // Update profile about if the user make changes.
   public function fetchText($userId){
      $profileInfo = $this->getProfileInfo($userId);

      echo $profileInfo[0]["profiles_introtext"];
   }
   
}