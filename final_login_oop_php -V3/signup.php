<?php
   include_once 'header.php';

   session_start();
?>
<body>
   
   <section class="index-si">
      <div class="wrapper">
         <div class="index-signup">
            <h3>SIGNUP UP</h3>
            <P></P>
            <br>
            <form action="includes/signup.inc.php" method="post">
               <input type="text" name="uid" placeholder="Username">
               <input type="text" name="email" placeholder="E-mail">
               <input type="password" name="pwd" placeholder="New password">
               <input type="password" name="pwdRepeat" placeholder="Repeat password">
               <br>
               <button type="submit" name="submit">Sign Up</button>
            </form>
         </div>
      </div>
   </section>
</body>

<?php
   include_once 'footer.php';
?>
     