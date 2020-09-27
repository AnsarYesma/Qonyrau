<?php
  include "connect.php";
  $classid = $_GET['name'];
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
<html>
<head>
	<title>Add new keste</title>
  <link rel="stylesheet" href="stylesheets/style.css">
	<link rel="stylesheet" href="stylesheets/lightmode.css">
  <link rel="stylesheet" href="stylesheets/create.css">
  <link rel="shortcut icon" href="icon.jpg">
</head>

<body>
	<section class="centerFlex">
		<form action="new.php" method="post">
      <p style='font-size: 30px; width: 400px; text-align: center; font-family: "Avenir Black"; background: linear-gradient(30deg, rgb(188, 0, 22), #6259c2 60%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;'>Class doesn't exist. Create it!</p>
      <br>
			<p>Enter your class number:</p>
      <input style="font-size: 30px; height: 50px; width: 400px; margin: 15px 0;" type="textarea" name="name" <?php echo 'value = "'.$classid.'"' ?>>
      <br>
      Enter your timetable:
      <div>
        <textarea rows="10" name="data" style="display: inline-block; font-size: 15px; margin: 15px 30px 15px 0; width: 185px; resize: none;"></textarea>
        <textarea rows="10" name="meet" style="display: inline-block; font-size: 15px; margin: 15px 0; width: 185px; resize: none;"></textarea>
      </div>
			<button type="submit" style="font-size: 20px; height: 30px; margin: 15px 0; width: 400; border-radius: 15px;">Go</button>
      <p style="margin-bottom: 15px;">Please read <a href="help.html">Help / Template</a></p>
		</form>
	</section>
</body>
</html>
