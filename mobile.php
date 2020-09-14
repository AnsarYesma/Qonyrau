<?php
	$classid = $_GET['class'];
	if (!file_exists('data/'.$classid.'.txt')) {
		header ('Location: index.html');
		exit();
	}
	$myRead = fopen('data/'.$classid.'.txt', 'r');
	$weekNames[1] = "Monday";
	$weekNames[2] = "Tuesday";
	$weekNames[3] = "Wednesday";
	$weekNames[4] = "Thursday";
	$weekNames[5] = "Friday";
	$dayOfWeek = date("w");

	for ( $i = 1; $i <= 5; $i++ ) {
		$lessCnt[$i] = fgets($myRead);
		$lessCnt[$i] = @mb_strimwidth($lessCnt[$i], 0, strlen($lessCnt[$i]) - 1);
		for ( $j = 1; $j <= $lessCnt[$i]; $j++ ) {
			$arr[$i][$j] = fgets($myRead);
			$arr[$i][$j] = @mb_strimwidth($arr[$i][$j], 0, strlen($arr[$i][$j]) - 1);
		}
	}

	// $data = $_POST['second'];
	// $myFile = fopen('in.txt', 'w');
	// fwrite( $myFile, $data );
	$myRead = fopen('data/'.$classid.'2.txt', 'r');
	for ( $i = 1; $i <= 9; $i++ ) {
		$time[$i] = fgets($myRead);
		$duration[$i] = fgets($myRead);
		$time[$i] = @mb_strimwidth($time[$i], 0, strlen($time[$i]) - 1);
		$duration[$i] = @mb_strimwidth($duration[$i], 0, strlen($duration[$i]) - 1);
	}
?>
<html>
<head>
	<title>Keste</title>
  <link rel="stylesheet" href="stylesheets/Mobile/style.css">
	<link rel="stylesheet" href="stylesheets/Mobile/lightmode.css">
  <link rel="stylesheet" href="stylesheets/Mobile/today.css">
  <link rel="stylesheet" href="stylesheets/Mobile/head.css">
	<link rel="script" type="text/javascript" href="scripts/script.php">
  <!-- <link rel="icon" type="image" href="images/interface.png"> -->
</head>

<body>
	<header style="height: 5vh; margin-top: 1.25vh; padding: 0 5vw;">
		<div id="upper">
			<div style="font-size: 30px; font-family: Yeseva One; color: #6259c2;">Qonyrau</div>
			<div></div>
		</div>
	</header>
	<ul class="headerMenu">
		<li></li>
	</ul>
	<section class="upperDiv">
		<div class="today">
			<div class="leftSide">
				<h1 class="weekDay"></h1>
				<h2 id="timer"></h2>
				<button type="button" onclick="goto('fullSchedule')">Schedule</button>
			</div>
			<div class="rightSide" id = "rs">
				<?php
					for ($i = 1; $i <= $lessCnt[$dayOfWeek]; ++$i) {
						echo '<p id="ls'.$i.'">'.$arr[$dayOfWeek][$i].'</p>
';
					}
				 ?>
			</div>
		</div>
		<div class="referrence">

		</div>
	</section>
	<div style="height: 5vh">
		<a id="fullSchedule"></a>
	</div>
  <section class = "content">
		<?php
		 for ($i = 1; $i <= 5; ++$i) {
				echo '
				<div class="card">
				<h3 class="card-title">' . $weekNames[$i] . '</h3>
				<div class="cardField">
					<div class="mainMenu">
				';
				for ($j = 1; $j <= $lessCnt[$i]; ++$j) {
					echo $j . '. ' . $arr[$i][$j] . '<br>';
				}
				echo '
					</div>
					<div class="subMenu">
				';
				for ( $j = 1; $j <= $lessCnt[$i]; $j++ ) {
					$mins = floor($time[$j]/60);
					$secs = $time[$j]%60;
					if ($mins < 10)
						echo '0';
					echo $mins . ':';
					if ($secs < 10)
						echo '0';
					echo $secs . '<br>';
				}
				echo '
					</div>
					</div>
					</div>
				';
		 }
		 ?>
	</section>
	<section class="someSection" style="box-shadow: 0vw -0.1vw 0.07vw #c5b0f2;">
		<h1 class="someHeading" >Timer</h1>
		<div style="display: flex; justify-content: space-between;">
			<div width="475px">
				<?php include "timerSection.php"?>
			</div>
			<div style="position: relative;">
				<div id="shadowBox"><div id="timerZone">00:00</div></div>
				<svg width="300" height="300">
					<circle id="circleTimer" transform="rotate(270) translate(-300 0)" class="circle_animation" r="100.2676141479" cx="150" cy="150" stroke-width="3" stroke="#6259c2" fill="none"/>
				</svg>
			</div>
		</div>
	</section>
	<a id="donateSection"></a>
  <div class="someSection">
      <h1 class="someHeading" >Donate me!</h1>
      <iframe src="https://money.yandex.ru/quickpay/shop-widget?writer=buyer&targets=&targets-hint=%D0%9D%D0%B0%20%D1%80%D0%B0%D0%B7%D0%B2%D0%B8%D1%82%D0%B8%D0%B5&default-sum=100&button-text=13&mail=on&hint=&successURL=&quickpay=shop&account=4100115137685017" class="donation"  frameborder="0" allowtransparency="true" scrolling="no"></iframe>
	</div>
  <footer class = "footer">
    	<h1 class = "footer-author">Ansar × 2020</h1>
	</footer>
	<script type="text/javascript">
		<?php include "scripts/script.php" ?>
	</script>
</body>
<script src="scripts/timerScript.js"></script>
</html>
