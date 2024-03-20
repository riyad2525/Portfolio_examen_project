<?php

include_once 'header.php';
include_once 'include\dbh.inc.php';

?>

<body class="singup_body">

<section class="s-form">

   <form action="include/signup.inc.php" method="POST">

      <h3>SIGNUP</h3><br><br>

      <div class="signup-form-form">
         <form action="include/signup.inc.php" methode="post">
            <input type="text" name= "name" placeholder="Volledige naam...">
            <input type="text" name= "email" placeholder="Email...">
            <input type="text" name= "uid" placeholder="Gebruikersnaam...">
            <input type="text" name= "pwd" placeholder="Password...">
            <input type="text" name= "pwdrepeat" placeholder="Herhaal password...">
            <button type="submit" name="submit">Sign Up</button>
   
         </form>
     </div>
</selection>

   <?php

   if(isset($_GET["error"])){
      if($_GET["error"] == "emptyinput"){
         echo "<p>Fill in all fields!</p>";
      }
      else if($_GET["error"] == "invaliduid"){
         echo "<p>Choose a proper username!</p>";
      }
      else if($_GET["error"] == "invalidemail"){
         echo "<p>Choose a proper email!</p>";
      }
      else if($_GET["error"] == "passworddontmatch"){
         echo "<p>Password doesn't match!</p>";
      }
      else if($_GET["error"] == "stmtfailed"){
         echo "<p>Something went wrong, try again!</p>";
      }
      else if($_GET["error"] == "usernametaken"){
         echo "<p>Username already taken!</p>";
      }
      else if($_GET["error"] == "none"){
         echo "<p>You have signed up!</p>";
      }

   }
   

   ?>
</section>


</body>

<script src="https://kit.fontawesome.com/615de15e92.js" crossorigin="anonymous"></script>

<?php

include_once 'footer.php';

?>