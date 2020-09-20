let daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednsday", "Thursday", "Friday", "Saturday"];
let now = new Date();
let hour = now.getHours(), min = now.getMinutes(), sec = now.getSeconds();
let currTime = hour * 60 + min;
let currLess = 1;
let flag = 0, isBreak = 0, notif = 1;
let less = [];
let start = [];
let dur = 25;

if (!("Notification" in window)) {
	notif = 0;
} else {
	if (Notification.permission !== 'denied') {
		Notification.requestPermission();
	}
}

let weekDay = <?php echo $dayOfWeek; ?>, cntLess;

todayWeek.innerHTML = daysOfWeek[weekDay];
if (weekDay == 6 || weekDay == 0) {
	endDay();
}

<?php
	include "connect.php";
	 if ($dayOfWeek != 6 && $dayOfWeek != 0) {
		 $query = mysqli_query($conn, "select * from keste where className = '".$classid."' and weekDay = ". $dayOfWeek .";");
		 $i = 0;
		 while ($row = mysqli_fetch_array($query)) {
			 $i++;
			 $row['lessName'] = substr($row['lessName'], 0, -1);
			 echo "less[". $i ."] = \"". $row['lessName'] ."\"; \n";
		 }
		 echo "cntLess = ". $i ."; \n";
		 for ($j = 1; $j <= $i; ++$j) {
			 echo 'start['.$j.']='.$timetable[$j].';
	 ';
	 }
 }
 ?>

 start[0] = 0;

 function checkCurrent(time) {
 	for (let  i = 1; i <= cntLess; ++i) {
 		if (time >= start[i-1] + dur && time < start[i] + dur) {
 			if (currLess != i || isBreak != time < start[i]) {
				isBreak = time < start[i];
 				changeLesson(i);
 				return;
 			}
		}
 	}
	if (60 > start[1] - time && start[1] > time) {
 		changeLesson(0);
 		flag = 1;
 		return;
 	}
	if (time >= start[cntLess] + dur) {
		changeLesson(cntLess+1);
		return;
	}
 }

 function checkSchedules(time) {
	 for (let  i = 1; i <= cntLess; ++i) {
		 if (time == start[i] && !flag) {
			 flag = 1;
			 if (notif)
			 	let push = new Notification(less[i] + ' have started!', {icon: "icon2.png"});
		 }
		 if (time == start[i] + dur && flag) {
			 flag = 0;
			 if (i < cntLess) {
				 let str = 'Next is ' + less[i+1];
				 if (less[i] == less[i+1])
				 	str = str + ' too.';
				else
					str = str + '.';
					if (notif)
				 		let push = new Notification('Lesson is over', {
					 		body: str, icon: "icon2.png"
				 		});
			 } else {
				 if (notif)
				 	let push = new Notification('That\'s all for today!', {icon: "icon2.png"});
			 }
		 }
	 }

 }

 function changeLesson(id) {
	 if (id == 0) {
		 return;
	 }
	if (id > cntLess) {
		document.getElementById("ls"+currLess).style.color = "black";
		document.getElementById("ls"+currLess).style.fontSize = "100%";
		currLess = cntLess+1;
		endDay();
		return;
	}
	if (id > 1) {
		document.getElementById("ls"+currLess).style.color = "black";
		document.getElementById("ls"+currLess).style.fontSize = "100%";
	}
	currLess = id;
 	if (isBreak)
 		document.getElementById("ls"+currLess).style.color = "orange";
 	else
 		document.getElementById("ls"+currLess).style.color = "rgb(188,0,22)";
 	document.getElementById("ls"+currLess).style.fontSize = "150%";
 }

function goto(id) {
	document.getElementById(id).scrollIntoView({
		behavior: 'smooth'
	})
}

function setTimer(time) {
	let target;
	if (isBreak) {
		target = start[currLess];
	} else {
		target = start[currLess] + dur;
	}
	target = target * 60;
	let t = target - time;
	let leftMin = Math.trunc(Math.trunc(t/60) % 60), leftSec = Math.trunc(t%60);
	if (leftMin < 10)
		leftMin = '0' + leftMin;

	if (leftSec < 10)
		leftSec = '0' + leftSec;

	document.getElementById("timer").innerHTML = leftMin + ':' + leftSec;
}

var mainFunc = setInterval(function() {
	now = new Date();
	hour = now.getHours(), min = now.getMinutes(), sec = now.getSeconds();
	currTime = hour * 60 + min;
	checkSchedules(currTime);
	checkCurrent(currTime);
	setTimer(currTime*60+sec);
})

function endDay() {
	document.getElementById("rs").innerHTML = "<p class='endDay'>Lessons are over!</p><button onclick=\"document.location = 'https://classroom.google.com/a/not-turned-in/all'\">Check your homework</button>";
	document.getElementById("timer").style.display = "none";
	goto('fullSchedule');
	clearInterval(mainFunc);
}
