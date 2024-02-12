<?php

class Dbh {

   protected function connect() {
      try{
         $username = "root";
         $password = "";
         $dbh = new PDO('mysql:host=localhost;dbname=ooplogin', $username, $password);
         return $dbh;
      }
      catch (PDOException $e){
         print "Error!: " . $e->getMessage() . "<br/>";
         die(); // Will shut down the script. 
      }
     
   }
}

 /*The PHP PDOException is a runtime exception that occurs when something goes wrong while using the PDO (PHP Data Objects) class or its related extensions. For example, this exception can occur while handling database connections or queries. 

 If this function catch any errors, than it's will asing to the variable $e. 


 */