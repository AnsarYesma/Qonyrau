<?php
  $host="localhost";
  $database="test";
  $user="root";
  $pswd="ansar123";

  $conn = mysqli_connect($host, $user, $pswd) or die("aa");
  mysqli_select_db($conn, "test") or die("nn");
 ?>
