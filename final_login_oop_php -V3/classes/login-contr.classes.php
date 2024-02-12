<?php

class LoginContr extends Login{

   private $uid;
   private $pwd;
  

   public function __construct($uid, $pwd)
   {
      $this->uid = $uid;
      $this->pwd = $pwd;
   }

   // Erorr Handelars    The login need only cheaking for empty input.
   public function loginUser() {
      if($this->emptyInput() == false){
         // echo "Empty Input!";
         header("location: ../index.php?error=emptyInput");
         exit();
      }
     
      // getUser = Getting users from DB. See, login.classes.php
      $this->getUser($this->uid, $this->pwd);

   }

   private function emptyInput() {
      $result;
      if(empty($this->uid) || empty($this->pwd))
      {
      $result = false;
      } 
   else {
      $result = true;
   }
   return $result;
   }


}