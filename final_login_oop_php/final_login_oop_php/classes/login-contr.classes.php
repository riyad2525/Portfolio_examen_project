<?php

class LoginContr extends Login{

   private $uid;
   private $pwd;
  

   public function __construct($uid, $pwd)
   {
      $this->uid = $uid;
      $this->pwd = $pwd;
   }

   // Erorr Handelars    it's a methode
   public function loginUser() {
      if($this->emptyInput() == false){
         // echo "Empty Input!";
         header("location: ../index.php?error=emptyInput");
         exit();
      }
     

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