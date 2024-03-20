<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "phpproject01";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {

   die ("connection failed:" . mysqli_connect_error());
}

/* So, this is an very important page that will make connection to the database. The error inside if steatment will come to action if the connection failed */