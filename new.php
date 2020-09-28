<?php
  include "connect.php";
  $classid = $_POST['name'];
  $string = $_POST['data'];
  $string2 = $_POST['meet'];
  $data = explode("\n", $string);
  $meet = explode("\n", $string2);
  $k = 0;
  // echo $classid;
  for ( $i = 1; $i <= 5; $i++ ) {
    $lsCnt = $data[$k];
    // echo $lsCnt . " ";
    $k++;
    for ( $j = 1; $j <= $lsCnt; $j++ ) {
      $lsName = $data[$k];
      $k++;
      // echo $lsName." ";
      // $lsName = substr($lsName, 0, -1);
      $query = mysqli_query($conn, "insert keste(className, weekDay, lessId, lessName) values('". $classid ."', ". $i .", ". $j .", '". $lsName ."');");
      echo "insert keste(className, weekDay, lessId, lessName) values('". $classid ."', ". $i .", ". $j .", '". $lsName ."'); \n";
    }
  }
  $k = 0;
  $meetCnt = $meet[$k];
  for ($i = 0; $i < $meetCnt; $i++) {
    $k++;
    $lsName = $meet[$k];
    $k++;
    $lsCode = $meet[$k];
    $query = mysqli_query($conn, "insert meet(className, lessName, meetLink) values('" . $classid . "', '" . $lsName . "', '" . $lsCode . "');" );

  }
  header ('Location: action.php?class='.$classid .'');
  exit();
?>
