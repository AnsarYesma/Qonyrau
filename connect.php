<?php
  $host="localhost";
  $database="qonyrau";
  $user="ansar";
  $pswd="Ansar117!";

  $conn = mysqli_connect($host, $user, $pswd) or die("aa");
  mysqli_select_db($conn, "qonyrau") or die("nn");
 ?>
