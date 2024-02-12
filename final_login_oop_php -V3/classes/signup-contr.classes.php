<?php

class SignupContr extends Signup{
// properties = variables     So, this're the properties I used to sign a user up.
   private $uid;
   private $email;
   private $pwd;
   private $pwdRepeat;

   public function __construct($uid, $email, $pwd, $pwdRepeat)
   {
      $this->uid = $uid;
      $this->email = $email;
      $this->pwd = $pwd;
      $this->pwdRepeat = $pwdRepeat;
   }

   // Erorr Handelars    it's a methode = function
   public function signupUser() {
      if($this->emptyInput() == false){
         // echo "Empty Input!";
         header("location: ../index.php?error=emptyInput");
         exit();
      }
      
      if($this->invalidUid() == false){
         // echo "Invalid Uid!";
         header("location: ../index.php?error=invalidUid");
         exit();
      }

      if($this->invalidEmail() == false){
         // echo "Invalid Email!";
         header("location: ../index.php?error=invalidEmail ");
         exit();
      }
      
      if($this->pwdMatch() == false){
         // echo "Passwords don't match!";
         header("location: ../index.php?error=passwordMatch");
         exit();
      }

      if($this->uidTakenCheck() == false){
         // echo "Username or Eimail taken";
         header("location: ../index.php?error=useroreimailtaken");
         exit();
      }
      
       // This is asing to the funtion setUser inside signup.classes.php
      $this->setUser($this->uid, $this->pwd, $this->email);

   }

   // This funtions are made to the error handelars works. 
   private function emptyInput() {
      $result;
      if(empty($this->uid) ||empty($this->email) || empty($this->pwd) || empty($this->pwdRepeat))
      {
      $result = false;
      } // checking for "Empty Input!";
   else {
      $result = true;
   }
   return $result;
   }

   private function invalidUid() {
     $result;
      if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid))
      {
      $result = false;
      }  
   else { // checking "Invalid Uid!";
      $result = true;
      }
   return $result;
   }

   private function invalidEmail() {
      $result;
      if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
      {
      $result = false;
      }  
   else { // checking for "Invalid Email!";
      $result = true;
      }
   return $result;
   }

   private function pwdMatch() {
      $result;
      if($this->pwd !== $this->pwdRepeat)
      {
      $result = false;
      }  
   else { // checking for "Passsword match!";
      $result = true;
      }
   return $result;
   }


   private function uidTakenCheck() {
      $result;
      if(!$this->checkUser($this->uid, $this->email))
      {
      $result = false;
      }  
   else { // checking for "is the uid taken or not!";
      $result = true;
      }
   return $result;
   }

   public function fetchUserId($uid){
      $userId = $this->getUserId($uid);
      return $userId[0]["users_id"];
   }

} 