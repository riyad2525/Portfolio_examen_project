<?php

include_once 'header.php'; //A header page included. Inside here you can finde the navbar.

?>
         <section class="intro-page">
<?php
   if (isset($_SESSION["useruid"])){
      echo "<p>Hallo there ". $_SESSION["useruid"] ."</p>";
   }
   
   ?>
          <h3>This is the intro page</h3> <br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi adipisci sapiente illum voluptate unde, nostrum ipsum veniam reprehenderit, dicta numquam voluptatem quos laboriosam natus totam neque odio sint. Hic, itaque?</p>
         </section>

         <section class="index-catagories">
            <div>
               <h4>project-1</h4>
            </div>
            
            <div>
               <h4>project-2</h4>
            </div>
            <div>
               <h4>project-3</h4>
            </div>
            <div>
               <h4>project-4</h4>
            </div>
            

         </section>
         
<?php

    include_once 'footer.php'; //A footer page included. Find all footer stuff.

?>
