let currTimer = document.getElementById("timerZero");
let timerTime, goalTime;
let isReset = 1;

function customTimerSet() {
  isReset = 1;
  let t = pencilInput.value;
  if (currTimer.classList)
    currTimer.classList.remove("press");
  currTimer = timerZero;
  if (isNaN(Math.trunc(parseFloat(t) * 60))) {
    pencilInput.style.border = "none";
    pencilInput.style.paddingLeft = "15px";
    pencilInput.style.color = "black";
    isReset = 1;
    timerTime = 0;
    goalTime = 0;
    document.getElementById("timerZone").innerHTML = "??:??";
  } else {
    pencilInput.style.border = "1px solid #c5b0f2";
    pencilInput.style.color = "rgb(188, 0, 22)";
    pencilInput.style.paddingLeft = "14px";
    timerTime = Math.trunc(parseFloat(t) * 60);
    goalTime = timerTime;
    circleTimer.style.transition = "none";
    circleTimer.style.strokeDashoffset = 630;
    circleTimer.style.transition = "all 1s linear";
    isReset = 0;
  }
}

function timerChange(id, t) {
  // circleTimer.transform = "rotate(90)";
  isReset = 1;
  if (id == currTimer) {
    timerReset();
    return;
  }
  pencilInput.style.border = "none";
  pencilInput.style.paddingLeft = "15px";
  pencilInput.style.color = "black";
  if (currTimer.classList)
    currTimer.classList.remove("press");
  id.classList.add("press");
  currTimer = id;
  timerTime = parseFloat(t)*60;
  goalTime = timerTime;
  circleTimer.style.transition = "none";
  circleTimer.style.strokeDashoffset = 630;
  circleTimer.style.transition = "all 1s linear";
  isReset = 0;
}

var cycle = setInterval( function () {
  if (isReset)
    return;
  secondsT = Math.trunc(timerTime%60);
  minutesT = Math.trunc(timerTime/60);
  if (secondsT < 10)
    secondsT = '0' + secondsT;
  if (minutesT < 10)
    minutesT = '0' + minutesT;
  let strTimer = `${minutesT}:${secondsT}`;
  document.getElementById("timerZone").innerHTML = strTimer;
  if (timerTime <= 0) {
    timerReset();
    timerTime = 0;
    isReset = 1;
    let push = new Notification('Time is up!', {icon: "/icon2.png"})
    return;
  }
  circleTimer.style.strokeDashoffset = 630 - (((goalTime - timerTime)+1)*(630/goalTime));
  timerTime -= 1;
}, 1000);

function timerReset() {
  // clearInterval(cycle);
  if (currTimer)
    currTimer.classList.remove("press");
  pencilInput.style.border = "none";
  pencilInput.style.paddingLeft = "15px";
  pencilInput.style.color = "black";
  timerTime = 0;
  let strTimer = `00:00`;
  circleTimer.style.strokeDashoffset = 630;
  document.getElementById("timerZone").innerHTML = strTimer;
  isReset = 1;
  currTimer = "timerZero";
}
