<?php

include_once 'header.php';

?>

<body class="singup_body">

   <section class="s-form"> <!-- Login form start here -->

      <form action="include/login.inc.php" method="$_POST"> <!-- Form is linked to login.inc.php where some error handlers are writenn. -->


         <h3>LOGIN</h3><br><br>
      
         <div class="input-group">
            <input type="text" id="uid" name="uid" required>
            <label for="name"><i class="fa-solid fa-envelope"></i> E-mail / <i class="fa-solid fa-user"></i> Username</label>
         </div> <!-- Users can here login with username or e-mail-->
         <br>
         <br>
      
         <div class="input-group">
            <input type="password" id="pwd" name="pwd" required>
            <label for="pws"><i class="fa-solid fa-key"></i> Password</label>
         </div>
         <br>
         <br>
      
      

         <button type="submit" name="submit">LOGIN</button>
      
      </form> <!-- Login form end here -->
   
 <?php

   if(isset($_GET["error"])){
   if($_GET["error"] == "emptyinput"){
      echo "<p>Fill in all fields!</p>";
   }
   else if($_GET["error"] == "wronglogin"){
      echo "<p>Incorrect login info!</p>";
   }

}


?>
   </section>

  
</body>

<script src="https://kit.fontawesome.com/615de15e92.js" crossorigin="anonymous"></script>

<?php

include_once 'footer.php';

?>