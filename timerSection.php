<div style="margin-bottom: 10px; margin-top: 85px;">
  <button class="timerButton resetButton" id="timerZero" onmousedown='timerZero.classList.add("press"); timerReset();' onmouseup='timerZero.classList.remove("press");'>🗑</button><button class="timerButton" id="timerOne" onclick="timerChange(timerOne, 1);">1</button><button class="timerButton" id="timerTwo" onclick="timerChange(timerTwo, 2);">2</button><button class="timerButton" id="timerFive" onclick="timerChange(timerFive, 5);">5</button><button class="timerButton" id="timerTen" onclick="timerChange(timerTen, 10);">10</button><button class="timerButton" id="timerFifteen" onclick="timerChange(timerFifteen, 15);">15</button><button class="timerButton" id="timerTwenty" onclick="timerChange(timerTwenty, 20);">20</button><button class="timerButton" id="timerThirty" onclick="timerChange(timerThirty, 30);">30</button>
</div>
<div>
  <div class="customTimer">
    <div style="float: left; height: 50px; width: 50px; margin-right: 10px; font-size: 20px; text-align: center; line-height: 50px; cursor: default;">✏️</div
    ><div style="float: left; width: 200px; height: 50px; font-size: 20px;"> <input id="pencilInput" style="margin: 10px 0;" type="text" value="Custom duration(minutes)"> </div>
  </div><button id="customButton" class="timerButton" onmousedown='customButton.classList.add("press"); customTimerSet();' onmouseup='customButton.classList.remove("press");'>⏰</button>
</div>
