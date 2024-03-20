<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
   
   $result;

   /* This variable is used repeatedly in every function. That's why it's not inside the if statements. If it's true, than the if statement isnside signup.inc.php will run. 
   If it's false and the user submit everything correctly. Than the user is going to register inside the database.
   */
   if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
      $result = true;
   } else {
      $result = false;
   }
   return $result;
}

function invalidUid($username) {
   $result;
   if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){ 
      //This preg_match function will check the valid characters that the user give.
      $result = true;
   }else {
      $result = false;
   }
   return $result;
}

function invalidEmail($email) {
   $result;
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $result = true;
   }else {
      $result = false;
   }
   return $result;
}

//This will check if the psw NOT match.
function passwordMatch($pwd, $pwdRepeat) { 
   $result;
   if($pwd !== $pwdRepeat){
      $result = true;
   }else {
      $result = false;
   }
   return $result;
}

/* Check out the user already exists or not.*/

function uidExists($conn, $username, $email) {
   $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ? ;";
   $stmt = mysqli_stmt_init($conn);

   // checking mistakes made by users.
   if(!mysqli_stmt_prepare($stmt, $sql)){
      header("location: ../signup.php?error=stmtFaild");
   exit();
   }

   mysqli_stmt_bind_param($stmt, "ss", $username, $email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   if($row = mysqli_fetch_assoc($resultData)){
      return $row;   

   } 
   else{
      $result = false;
      return $result;
   }

   mysqli_stmt_close($stmt);
}

// This will sign a person up.
function createUser($conn, $name, $email, $username, $pwd) {
   $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUE (?,?,?,?);";
   $stmt = mysqli_stmt_init($conn);

   if(!mysqli_stmt_prepare($stmt, $sql)){
      header("location: ../signup.php?error=stmtFaild");
   exit();
   }

   // This'll make the actual password invisible in database
   $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

   mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
   mysqli_stmt_execute($stmt);
   mysqli_stmt_close($stmt);
   header("location: ../signup.php?error=none");
   exit();
}
 

function emptyInputLogin($username, $pwd) {
   $result;
   if(empty($username) || empty($pwd)){
      $result = true;
   } else {
      $result = false;
   }
   return $result;
}

function loginUsers($conn, $username, $pwd) {
   $uidExists = uidExists($conn, $username, $username);

   if ($uidExists === false){
      header("location: ../login.php?error=wronglogin");
      exit();
   }

   $pwdHashed = $uidExists ["usersPwd"];
   $checkPwd = password_verify($pwdHashed, $pwd);

   if($checkPwd === false){
      header("location: ../login.php?error=wronglogin");
      exit();
   }
   elseif($checkPwd === true){
      session_start();
      $_SESSION["userid"] = $uidExists["usersId"];
      $_SESSION["useruid"] = $uidExists["usersUid"];
      header("location: ../index.php");
      exit();
   }

}