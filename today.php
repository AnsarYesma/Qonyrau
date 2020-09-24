<?php
include "connect.php";
$classid = $_GET['class'];
$query = mysqli_query($conn, "select * from keste where className = '" . $classid . "'");
$row = mysqli_fetch_array($query);
if (empty($row)) {
	header('Location: create.php?name=' . $classid . '');
	exit();
}

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

$dayOfWeek = date('w');
?>
<html>

<head>
	<!-- <meta content="width=device-width, initial-scale=1" name="viewport" /> -->
	<title>Keste<?php echo $dayOfWeek . " " . $classid; ?></title>
	<link rel="stylesheet" media="only screen and (min-aspect-ratio: 1/1)" href="stylesheets/desktop.css">
	<link rel="stylesheet" media="only screen and (max-aspect-ratio: 1/1)" href="stylesheets/mobile.css">
	<link rel="stylesheet" href="stylesheets/style.css">
	<link rel="shortcut icon" href="icon2.png" type="image/png">
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
	<nav class="out-shadow">
		<ul>
			<li><a href="today.php">Today</a></li>
			<li><a href="sched.php">Schedule</a></li>
			<li><a href="news.php">News</a></li>
			<li><a href="https://www.patreon.com/Qonyrau">Donate</a></li>
			<li><a href="https://classroom.google.com/u/0/h" target="_blank">Courses</a></li>
			<li><a href="https://classroom.google.com/u/0/a/not-turned-in/all" target="_blank">Homework</a></li>
			<li><a href="index.php">Change class</a></li>
		</ul>
	</nav>
	<!-- <header style="height: 5vh; margin-top: 1.25vh; padding: 0 5vw;">
		<div id="upper">
			<span style='font-size: 30px; display: inline-block; width: auto; font-family: "Avenir Black"; background: linear-gradient(30deg, rgb(188, 0, 22), #6259c2 60%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;'>Qonyrau</span>
			<span style='line-height: 30px;background: linear-gradient(30deg, #6259c2, rgb(188, 0, 22)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;' ><a href="https://classroom.google.com/u/0/h" target="_blank">Courses</a> | <a href="https://classroom.google.com/u/0/a/not-turned-in/all" target="_blank">Homework</a> | <a href="index.php">Change class</a></span>
		</div>
	</header>
	<a href="https://vk.com/nphmsdebateclub" target="_blank">
		<div class="headerMenu">
			<img src="debate.png" style="display: inline; margin-right: 1vh; height: 7.5vh; width: 7.5vh;">
			<span>Join Fizmat Speech & Debate Club!</span>
		</div>
	</a> -->
	<div class="area">
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
	</section>
	</div>
	<!-- <footer class="footer">
		<h1 class="footer-author">Ansar × 2020</h1>
		<p><a href="contact.html">✉️Contact</a>|<a href="help.html">❓Help</a></p>
		<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,whatsapp,telegram"></div>
		<p><a href="https://vk.com/qonyrau">Вконтакте</a> | <a href="mailto:ansar.yesmukhanov23@fizmat.kz">Почта</a> | <a href="tel:+77014414955">Телефон</a> </p>
	</footer> -->
	<script type="text/javascript">
	 	<?php include "scripts/script.php" ?>
	</script>
	<script src="scripts/timerScript.js"></script>
	<!-- <script src="scripts/script.php" type="text/php"></script> -->
</body>

</html>
