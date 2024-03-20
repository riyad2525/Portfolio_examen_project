
<?php
   session_start();

   include_once 'header.php';

?>

<div class="full_structur">
<body oncopy="return false" oncut="return false" onpaste="return false">
   <main class="table">
      <section class="table_header">
         <h1>ALL SENSORES</h1>
      </section>
      <section class="table_body">
         <table>
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Picture</th>
                  <th>Discription</th>
                  <th>Button</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td><strong>DHT11 Temperature-Humidity Sensor</strong></td>
                  <td><img src="images\dht11-temperature-humidity-sensor.jpg" alt="DHT11"></td>
                  <td>
                     <p>
                        It can be used for detecting ambient temperature and humidity, through the standard single-wire interface.
                     </p>
                  </td>
                  <td>
                     <!--Toggle Button
                     <label class="toggle" for="myToggle">
                        <input class="toggle__input" type="checkbox" id="myToggle">
                        <div class="toggle__fill"></div>
                     </label>
                      -->
                      <div class="noselect">
                     <div class="GpioContainer">
                      <strong>GPIO26</strong>
                     <br>
                        <label class="switch">
                        <input type="checkbox" id="GPIO26" disabled >
                        <span class="slider round"></span>
                        </label>	
                        <br>
                        <button id="GPIO26M"></button>
                     <br>
                  </div>
                  </div>
                </td>
                </tr>
              
               
               <tr>
                  <td><strong>Ultrasonic Distance Sensor</strong></td>
                  <td><img src="images\distance-sensor.jpg" alt="DHT11"></td>
                  <td>
                     <p>
                        The HC-SR04 Ultrasonic Range Sensor uses non-contact ultrasound sonar to measure the distance to an object - they're great for any obstacle avoiding systems on Raspberry Pi robots or rovers!
                     </p>
                  </td>
                  <td>
                     <!--Toggle Button-->
                     <div class="noselect">
                     <div class="GpioContainer">
                        <strong>GPIO20</strong>
                        <br>
                        <label class="switch">
                          <input type="checkbox" id="GPIO20" disabled>
                          <span class="slider round"></span>
                        </label>	
                        <br>
                        <button id="GPIO20M"></button>
                        <br>
                      </div>
                      </div>
                  </td>
               </tr>

               <tr>
                  <td><strong>Sound Sensor</strong></td>
                  <td><img src="images\sound-sensor.jpg" alt="DHT11"></td>
                  <td>
                     <p>
                        Sound sensors are handy for detecting noise or other sounds near your project - great for monitoring projects, alarm projects and more.
                     </p>
                  </td>
                  <td>
                     <!--Toggle Button-->
                     <div class="noselect">
                     <div class="GpioContainer">
                        <strong>GPIO16</strong>
                        <br>
                        <label class="switch">
                        <input type="checkbox" id="GPIO16" disabled>
                        <span class="slider round"></span>
                        </label>	
                        <br>
                        <button id="GPIO16M"></button>
                        <br>
                      </div>
                     </div>
                  </td>
               </tr>

               <tr>
                  <td><strong>Sound Sensor</strong></td>
                  <td><img src="images\sound-sensor.jpg" alt="DHT11"></td>
                  <td>
                     <p>
                        Sound sensors are handy for detecting noise or other sounds near your project - great for monitoring projects, alarm projects and more.
                     </p>
                  </td>
                  <td>
                     <!--Toggle Button-->
                  <div class="noselect">
                    <div class="GpioContainer">
                     <strong>GPIO21</strong>
                     <br>
                     <label class="switch">
                       <input type="checkbox" id="GPIO21" disabled>
                       <span class="slider round"></span>
                     </label>	
                     <br>
                     <button id="GPIO21M"></button>
                     <br>
                   </div>
                   </div>
                  </td>
               </tr>
               
            </tbody>
         </table>
      </section>
   </main>

   <!-- include socket.io client side script -->
   <script src="main.js"></script>

  <script src="/socket.io/socket.io.js"></script>

 
</body>
</div>

<?php
   include_once 'footer.php';
?>
     