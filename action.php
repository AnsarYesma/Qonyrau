<?php
include "connect.php";
$classid = $_GET['class'];
// $schoolname = $_GET['school'];
$query = mysqli_query($conn, "SELECT * FROM keste WHERE className = '" . $classid . "';");
$row = mysqli_fetch_array($query);
if (empty($row)) {
	header('Location: create.php?name=' . $classid . '');
	exit();
}

// if (!file_exists('data/'.$classid.'.txt')) {
// 	header ('Location: create.php?name='.$classid.'');
// 	exit();
// }
// $myRead = fopen('data/'.$classid.'.txt', 'r');
$weekNames[1] = "Monday";
$weekNames[2] = "Tuesday";
$weekNames[3] = "Wednesday";
$weekNames[4] = "Thursday";
$weekNames[5] = "Friday";
$timetable[1] = 540;
$timetable[2] = 575;
$timetable[3] = 610;
$timetable[4] = 645;
$timetable[5] = 680;
$timetable[6] = 715;
$timetable[7] = 800;
$timetable[8] = 835;
$timetable[9] = 870;

// $dayOfWeek = 1;
$dayOfWeek = date('w');

// for ( $i = 1; $i <= 5; $i++ ) {
// 	$lessCnt[$i] = fgets($myRead);
// 	$lessCnt[$i] = @mb_strimwidth($lessCnt[$i], 0, strlen($lessCnt[$i]) - 1);
// 	for ( $j = 1; $j <= $lessCnt[$i]; $j++ ) {
// 		$arr[$i][$j] = fgets($myRead);
// 		$arr[$i][$j] = @mb_strimwidth($arr[$i][$j], 0, strlen($arr[$i][$j]) - 1);
// 	}
// }

// $data = $_POST['second'];
// $myFile = fopen('in.txt', 'w');
// fwrite( $myFile, $data );
// $myRead = fopen('data/timings', 'r');
// for ( $i = 1; $i <= 9; $i++ ) {
// 	$time[$i] = fgets($myRead);
// 	$duration[$i] = fgets($myRead);
// 	$time[$i] = @mb_strimwidth($time[$i], 0, strlen($time[$i]) - 1);
// 	$duration[$i] = @mb_strimwidth($duration[$i], 0, strlen($duration[$i]) - 1);
// }
?>
<html>

<head>
	<!-- <meta content="width=device-width, initial-scale=1" name="viewport" /> -->
	<title>Keste <?php echo $classid; ?></title>
	<link rel="stylesheet" media="only screen and (min-aspect-ratio: 1/1)" href="stylesheets/desktop.css">
	<link rel="stylesheet" media="only screen and (max-aspect-ratio: 1/1)" href="stylesheets/mobile.css">
	<link rel="stylesheet" href="stylesheets/style.css">
	<link rel="shortcut icon" href="resources/icon2.png" type="image/png">
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,700;1,500&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="stylesheets/today.css">
	<link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(67530775, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/67530775" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>

<body>
	<header style="height: 5vh; margin-top: 1.25vh; padding: 0 5vw;">
		<div id="upper">
			<span style='font-size: 30px; display: inline-block; width: auto; font-family: "Avenir Black"; background: linear-gradient(30deg, rgb(188, 0, 22), #6259c2 60%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;'>Qonyrau</span>
			<span style='line-height: 30px;background: linear-gradient(30deg, #6259c2, rgb(188, 0, 22)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;' ><a href="https://classroom.google.com/u/0/h" target="_blank">Courses</a> | <a href="https://classroom.google.com/u/0/a/not-turned-in/all" target="_blank">Homework</a> | <a href="index.php">Change class</a></span>
		</div>
	</header>
	<a href="https://vk.com/nphmsdebateclub" target="_blank">
		<div class="headerMenu">
			<img src="resources/debate.png" style="display: inline; margin-right: 1vh; height: 7.5vh; width: 7.5vh;">
			<span>Join Fizmat Speech & Debate Club!</span>
		</div>
	</a>
	<section class="upperDiv">
		<!-- <div class="in-shadow news">
			<h3>News</h3>
			<div class="in-shadow news-content">
				<p>Dark Theme added</p>
				<p>Today's Ansars' birthday!</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Thanks to Ibra</p>
			</div>
		</div> -->
		<div class="today">
			<div class="leftSide">
				<h1 id="todayWeek" style="font-family: Yeseva One;"></h1>
				<h2 id="timer"></h2>
				<button type="button" onclick="goto('fullSchedule')">
					Schedule
				</button>
				<span id="meet"><a href="google.com">Meet</a></span>
			</div>
			<div id="lineToday"></div>
			<div class="rightSide" id="rs">
				<?php
				$query = mysqli_query($conn, "select * from keste where className = '" . $classid . "' and weekDay = " . $dayOfWeek . ";");
				while ($row = mysqli_fetch_array($query)) {
					echo "<p id=\"ls" . $row['lessId'] . "\">" . $row['lessName'] . "</p>\n";
				}
				?>
			</div>
		</div>
		<!-- <div class="in-shadow news">
			<h3>News</h3>
			<div class="in-shadow news-content">
				<p>Dark Theme added</p>
				<p>Today's Ansars' birthday!</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Share button added</p>
				<p>Thanks to Ibra</p>
			</div>
		</div> -->
	</section>
	<div>
		<a id="fullSchedule"></a>
	</div>
	<section class="content">
		<?php for ($i = 1; $i <= 5; ++$i) { ?>
			<div class="wrapper <?php if ($i == $dayOfWeek) echo "colorDay"; ?>">
				<div class="card">
					<h3 class="cardTitle"><?php echo $weekNames[$i]; ?></h3>
					<div class="cardField">
						<div class="mainMenu">
							<?php
							$query = mysqli_query($conn, "select * from keste where className = '" . $classid . "' and weekDay = " . $i . ";");
							while ($row = mysqli_fetch_array($query)) {
								echo $row['lessId'] . ". " . $row['lessName'] . "<br> \n";
							}
							?>
						</div>
						<div class="subMenu">
							<?php
							$query = mysqli_query($conn, "select * from keste where className = '" . $classid . "' and weekDay = " . $i . ";");
							while ($row = mysqli_fetch_array($query)) {
								$mins = floor($timetable[$row['lessId']] / 60);
								$secs = $timetable[$row['lessId']] % 60;
								if ($mins < 10)
									echo '0';
								echo $mins . ':';
								if ($secs < 10)
									echo '0';
								echo $secs . '<br>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</section>
	<section class="someSection" id="timerSection" style="box-shadow: 0vw -0.1vw 0.07vw #c5b0f2;">
		<h1 class="someHeading">Timer</h1>
		<div style="display: flex; justify-content: flex-start;">
			<div width="475px">
				<div style="margin: 85px 200px 10px 0">
					<button class="timerButton resetButton" id="timerZero" onmousedown='timerZero.classList.add("pressReset"); timerReset();' onmouseup='timerZero.classList.remove("pressReset");'>🗑</button><button class="timerButton" id="timerOne" onclick="timerChange(timerOne, 1);">1</button><button class="timerButton" id="timerTwo" onclick="timerChange(timerTwo, 2);">2</button><button class="timerButton" id="timerFive" onclick="timerChange(timerFive, 5);">5</button><button class="timerButton" id="timerTen" onclick="timerChange(timerTen, 10);">10</button><button class="timerButton" id="timerFifteen" onclick="timerChange(timerFifteen, 15);">15</button><button class="timerButton" id="timerTwenty" onclick="timerChange(timerTwenty, 20);">20</button><button class="timerButton" id="timerThirty" onclick="timerChange(timerThirty, 30);">30</button>
				</div>
				<div>
					<div class="customTimer">
						<div style="float: left; height: 50px; width: 50px; margin-right: 10px; font-size: 20px; text-align: center; line-height: 50px; cursor: default;">✏️</div>
						<div style="float: left; width: 200px; height: 50px; font-size: 20px;"> <input id="pencilInput" style="margin: 10px 0;" type="text" placeholder="Custom duration(minutes)"> </div>
					</div><button type="submit" id="customButton" class="timerButton" onmousedown='customButton.classList.add("press"); customTimerSet();' onmouseup='customButton.classList.remove("press");'>⏰</button>
				</div>
			</div>
			<div style="position: relative;">
				<div id="shadowBox">
					<div id="timerZone">00:00</div>
				</div>
				<!-- <svg width="300" height="300">
					<circle id="circleTimer" transform="rotate(270) translate(-300 0)" class="circle_animation" r="100.2676141479" cx="150" cy="150" stroke-width="3" stroke="#6259c2" fill="none"/>
				</svg> -->
				<svg width="300" height="300">
					<circle id="circleTimer" transform="rotate(270) translate(-300 0)" class="circle_animation" r="100.2676141479" cx="150" cy="150" stroke-width="15" stroke="url(#gradient)" fill="none" />
					<linearGradient id="gradient" x1="0" x2="0" y1="1" y2="0">
						<stop stop-color="rgb(188, 0, 22)" offset="0" />
						<stop stop-color="#6259c2" offset="1" />
					</linearGradient>
				</svg>
			</div>
		</div>
	</section>
	<div class="someSection dsk">
		<div class="tryDesk">💻 Try Qonyrau on your desktop!</div>
	</div>
	<a id="donateSection"></a>
	<div class="someSection">
		<a href="https://www.patreon.com/Qonyrau" style="color: black;"><h1 class="someHeading">Want to donate me?</h1></a>
		<!-- <iframe src="https://money.yandex.ru/quickpay/shop-widget?writer=buyer&targets=&targets-hint=%D0%9D%D0%B0%20%D1%80%D0%B0%D0%B7%D0%B2%D0%B8%D1%82%D0%B8%D0%B5&default-sum=100&button-text=13&mail=on&hint=&successURL=&quickpay=shop&account=4100115137685017" class="donation" frameborder="0" allowtransparency="true" scrolling="no"></iframe> -->
	</div>
	<footer class="footer">
		<h1 class="footer-author">Ansar × 2020</h1>
		<p><a href="contact.html">✉️Contact</a>|<a href="help.html">❓Help</a></p>
		<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,whatsapp,telegram"></div>
		<!-- <p><a href="https://vk.com/qonyrau">Вконтакте</a> | <a href="mailto:ansar.yesmukhanov23@fizmat.kz">Почта</a> | <a href="tel:+77014414955">Телефон</a> </p> -->
	</footer>
	<script type="text/javascript">
	 	<?php include "scripts/script.php" ?>
	</script>
	<script src="scripts/timerScript.js"></script>
	<!-- <script src="scripts/script.php" type="text/php"></script> -->
</body>

</html>
