<?php
  $classid = $_GET['name'];
  $host="localhost";
  $database="test";
  $user="root";
  $pswd="ansar123";

  $conn = mysqli_connect($host, $user, $pswd) or die("aa");
  mysqli_select_db($conn, "test") or die("nn");
  // $sql = "USE test";
  // $q = mysqli_query($conn, $sql);
  // $sql = "CREATE TABLE ";
  // // mysqli_query($conn, $sql);
  // // $sql = "DROP DATABASE ansarino";
  // if (mysqli_query($conn, $sql) === TRUE) {
  //   echo "Database created successfully";
  // } else {
  //   // echo "Error creating database: ";
  // }
?>
 <html>
<head>
	<title>Add new keste</title>
  <link rel="stylesheet" href="stylesheets/style.css">
	<link rel="stylesheet" href="stylesheets/lightmode.css">
  <link rel="stylesheet" href="stylesheets/create.css">
</head>

<body>
	<section class="centerFlex">
		<form action="new.php" method="post">
      <p style='font-size: 30px; width: 300px; text-align: center; font-family: "Avenir Black"; background: linear-gradient(30deg, rgb(188, 0, 22), #6259c2 60%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;'>Class doesn't exist. Create it!</p>
      <br>
			Enter your class number:
      <input style="font-size: 30px; height: 50px; width: 300px; margin: 15px 0;" type="textarea" name="name" <?php echo 'value = "'.$classid.'"' ?>>
      <br>
      Enter your timetable:
      <!-- <div> -->
        <textarea rows="10" name="data" style="display: block; font-size: 15px; margin: 15px 0; width: 300px; resize: none;"></textarea>
        <!-- <textarea rows="10" name="data" style="display: inline-block; font-size: 15px; margin: 15px 0 15px 15px; width: 185px; resize: none;"></textarea> -->
      <!-- </div> -->
			<button type="submit" style="font-size: 20px; height: 30px; margin: 15px 0; width: 300px; border-radius: 15px;">Go</button>
      <p style="margin-bottom: 15px;">Please read <a href="help.html">Help / Template</a></p>
		</form>
	</section>
</body>
</html>
