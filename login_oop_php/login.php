<?php
   include_once 'header.php';

   session_start();
?>
<body>
   
   <section class="index-login">
      <div class="wrapper">
         <div class="index-signup">
            <h3>LOGIN</h3>
            <P></P>
            <br>
            <form action="includes/login.inc.php" method="post">
               <input type="text" name="uid" placeholder="Username">
               <input type="password" name="pwd" placeholder="New password">
               <button type="submit" name="submit">Login</button>
            </form>
         </div>
      </div>
   </section>
</body>

<?php
   include_once 'footer.php';
?>
     