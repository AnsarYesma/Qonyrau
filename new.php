<?php
$host="localhost";
  $database="qonyrau";
  $user="root";
  $pswd="d52b8fd945026d4d762e5fddb7d31a23423b5b25aa34bb76";

  $conn = mysqli_connect($host, $user, $pswd) or die("aa");
  mysqli_select_db($conn, "test") or die("nn");
  $classid = $_POST['name'];
  $data = $_POST['data'];
  $myread = fopen('in.txt', 'w');
	fwrite($myread, $data);
  $myread = fopen('in.txt', 'r');
  for ( $i = 1; $i <= 5; $i++ ) {
     $lsCnt = fgets($myread);
     $lsCnt = substr($lsCnt, 0, -1);
     $query = mysqli_query($conn, "insert lessCnt(className, weekDay, count) values('". $classid ."', ". $i .", ". $lsCnt .");");
     // echo "insert lessCnt(className, weekDay, count) values('". $classid ."', ". $i .", ". $lsCnt ."); \n";
     for ( $j = 1; $j <= $lsCnt; $j++ ) {
       $lsName = fgets($myread);
       $lsName = substr($lsName, 0, -1);
       $query = mysqli_query($conn, "insert keste(className, weekDay, lessId, lessName) values('". $classid ."', ". $i .", ". $j .", '". $lsName ."');");
       // echo "insert keste(className, weekDay, lessId, lessName) values('". $classid ."', ". $i .", ". $j .", '". $lsName ."'); \n";
     }
   }
   header ('Location: action.php?class='.$classid .'');
   exit();
?>
