<?php
  include "connect.php";
  $classid = $_POST['name'];
  $string = $_POST['data'];
  $data = explode('\n', $string);
  $k = 0;
  for ( $i = 1; $i <= 5; $i++ ) {
     $lsCnt = $data[$k];
     $k++;
     for ( $j = 1; $j <= $lsCnt; $j++ ) {
       $lsName = $data[$k];
       $k++;
       // echo $lsName." ";
       // $lsName = substr($lsName, 0, -1);
       $query = mysqli_query($conn, "insert keste(className, weekDay, lessId, lessName) values('". $classid ."', ". $i .", ". $j .", '". $lsName ."');");
       // echo "insert keste(className, weekDay, lessId, lessName) values('". $classid ."', ". $i .", ". $j .", '". $lsName ."');";
     }
   }
   header ('Location: action.php?class='.$classid .'');
   exit();
   // fclose($myread);
?>
