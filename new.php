<?php
  include "connect.php";
  $classid = $_POST['name'];
  $data = $_POST['data'];
  $myread = fopen('in.txt', 'w') or die("не удалось открыть файл");
	fwrite($myread, $data);
  // echo $data;
  fclose($myread);
  $myread = fopen('in.txt', 'r') or die("не удалось открыть файл2");
  for ( $i = 1; $i <= 5; $i++ ) {
     $lsCnt = fgets($myread);
     // $lsCnt = substr($lsCnt, 0, -1);
     echo $lsCnt." ";
     // $query = mysqli_query($conn, "insert lessCnt(className, weekDay, count) values('". $classid ."', ". $i .", ". $lsCnt .");");
     // echo "insert lessCnt(className, weekDay, count) values('". $classid ."', ". $i .", ". $lsCnt ."); \n";
     for ( $j = 1; $j <= $lsCnt; $j++ ) {
       $lsName = fgets($myread);
       echo $lsName." ";
       // $lsName = substr($lsName, 0, -1);
       $query = mysqli_query($conn, "insert keste(className, weekDay, lessId, lessName) values('". $classid ."', ". $i .", ". $j .", '". $lsName ."');");
       // echo $lsName . " ";
     }
   }
   // header ('Location: action.php?class='.$classid .'');
   // exit();
   fclose($myread);
?>
