<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="catan.css" />
    <title>Dustin's Mini Project</title>
  </head>

  <body onload="randomizeBoard()">
    <header onclick="randomizeBoard()">
      <div style="display: inline-block;">
        <p>
          <?php echo $_SESSION["player1"];?>: <span>1</span> Tree,
          <span> 1</span> Ore, <span> 1</span> Brick,<span> 1</span> Wheat,
          <span> 1</span> Sheep
        </p>
      </div>
      <h1 style="position: relative; left: 25%; display: inline; ;">
        <?php echo $_SESSION["player1"];?>'s Turn
      </h1>
      <div style="float: right; display: inline-block;">
        <p>
          <?php echo $_SESSION["player2"];?>: <span>1</span> Tree,
          <span> 1</span> Ore, <span> 1</span> Brick,<span> 1</span> Wheat,
          <span> 1</span> Sheep
        </p>
      </div>
    </header>

    <div class="row">
      <scetion id="leftColumn">
        <div class="column">
          <div class="everything">
            <h1 style="margin-left:30%;">Rules</h1>
            <p>
              The Object of the game is to be the first to get to 10 points.
              <br />
              You get 1 point for every settlement and 2 points for every city.
              <br />
              You need at least 2 roads in between each settlement/city to build
              <br />
              another settlement/city.
            </p>
          </div>
        </div>
      </scetion>

      <scetion id="middleColumn">
        <div class="column2 gameboard">
          <div class="hex-row">
            <div class="hex">
              <div class="top" id="top1"></div>
              <div class="middle" id="middle1">10</div>
              <div class="bottom" id="bottom1"></div>
            </div>
            <div class="hex">
              <div class="top" id="top2"></div>
              <div class="middle" id="middle2">2</div>
              <div class="bottom" id="bottom2"></div>
            </div>
            <div class="hex">
              <div class="top" id="top3"></div>
              <div class="middle" id="middle3">9</div>
              <div class="bottom" id="bottom3"></div>
            </div>
          </div>

          <div class="hex-row four">
            <div class="hex">
              <div class="top" id="top4"></div>
              <div class="middle" id="middle4">12</div>
              <div class="bottom" id="bottom4"></div>
            </div>
            <div class="hex">
              <div class="top" id="top5"></div>
              <div class="middle" id="middle5">6</div>
              <div class="bottom" id="bottom5"></div>
            </div>
            <div class="hex">
              <div class="top" id="top6"></div>
              <div class="middle" id="middle6">4</div>
              <div class="bottom" id="bottom6"></div>
            </div>
            <div class="hex">
              <div class="top" id="top7"></div>
              <div class="middle" id="middle7">10</div>
              <div class="bottom" id="bottom7"></div>
            </div>
          </div>

          <div class="hex-row five">
            <div class="hex">
              <div class="top" id="top8"></div>
              <div class="middle" id="middle8">9</div>
              <div class="bottom" id="bottom8"></div>
            </div>
            <div class="hex">
              <div class="top" id="top9"></div>
              <div class="middle" id="middle9">11</div>
              <div class="bottom" id="bottom9"></div>
            </div>
            <div class="hex">
              <div class="top" id="top10"></div>
              <div class="middle" id="middle10">X</div>
              <div class="bottom" id="bottom10"></div>
            </div>
            <div class="hex">
              <div class="top" id="top11"></div>
              <div class="middle" id="middle11">3</div>
              <div class="bottom" id="bottom11"></div>
            </div>
            <div class="hex">
              <div class="top" id="top12"></div>
              <div class="middle" id="middle12">8</div>
              <div class="bottom" id="bottom12"></div>
            </div>
          </div>

          <div class="hex-row four">
            <div class="hex">
              <div class="top" id="top13"></div>
              <div class="middle" id="middle13">8</div>
              <div class="bottom" id="bottom13"></div>
            </div>
            <div class="hex">
              <div class="top" id="top14"></div>
              <div class="middle" id="middle14">3</div>
              <div class="bottom" id="bottom14"></div>
            </div>
            <div class="hex">
              <div class="top" id="top15"></div>
              <div class="middle" id="middle15">4</div>
              <div class="bottom" id="bottom15"></div>
            </div>
            <div class="hex">
              <div class="top" id="top16"></div>
              <div class="middle" id="middle16">5</div>
              <div class="bottom" id="bottom16"></div>
            </div>
          </div>

          <div class="hex-row">
            <div class="hex">
              <div class="top" id="top17"></div>
              <div class="middle" id="middle17">5</div>
              <div class="bottom" id="bottom17"></div>
            </div>
            <div class="hex">
              <div class="top" id="top18"></div>
              <div class="middle" id="middle18">6</div>
              <div class="bottom" id="bottom18"></div>
            </div>
            <div class="hex">
              <div class="top" id="top19"></div>
              <div class="middle" id="middle19">11</div>
              <div class="bottom" id="bottom19"></div>
            </div>
          </div>
        </div>
      </scetion>

      <scetion id="rightColumn">
        <div class="column3">
          <div class="row everything">
            <div id="diceInstructions">
              Roll The Dice:
            </div>
            <h2 id="yourDiceRoll">12</h2>
            <button type="button" onclick="rollDice()" id="diceButton">
              Roll Dice
            </button>
            <button type="button">
              Trade
            </button>
            <button type="button">
              Use Card
            </button>
            <button type="button">
              Build
            </button>
            <button type="button">
              End Turn
            </button>
          </div>
        </div>
      </scetion>
    </div>

    <footer>
      <div style="display: inline-block;">
        <p>
          <?php echo $_SESSION["player3"];?>: <span>1</span> Tree,
          <span> 1</span> Ore, <span> 1</span> Brick,<span> 1</span> Wheat,
          <span> 1</span> Sheep
        </p>
      </div>
      <div style="float:right; display: inline-block;">
        <p>
          <?php echo $_SESSION["player4"];?>: <span>1</span> Tree,
          <span> 1</span> Ore, <span> 1</span> Brick,<span> 1</span> Wheat,
          <span> 1</span> Sheep
        </p>
      </div>
    </footer>

    <script>
      function randomizeBoard() {
        colors = [
          "greenyellow",
          "greenyellow",
          "greenyellow",
          "greenyellow",
          "darkgray",
          "darkgray",
          "darkgray",
          "green",
          "green",
          "green",
          "green",
          "gold",
          "gold",
          "gold",
          "gold",
          "tomato",
          "tomato",
          "tomato",
          "sandybrown"
        ];

        shuffle(colors);
        // alert(colors);

        for (var i = 1; i < 20; i++) {
          randColor = colors[colors.length - 1];
          document.getElementById("top" + i).style.borderBottom =
            "30px solid " + randColor;
          document.getElementById("middle" + i).style.background = randColor;
          document.getElementById("bottom" + i).style.borderTop =
            "30px solid " + randColor;
          colors.pop();
          shuffle(colors);
        }
        setNumbers();
      }
      function shuffle(colors) {
        var j, x, i;
        for (i = colors.length - 1; i > 0; i--) {
          j = Math.floor(Math.random() * (i + 1));
          x = colors[i];
          colors[i] = colors[j];
          colors[j] = x;
        }
        return colors;
      }
      function rollDice() {
        var dice = Math.floor(Math.random() * 12) + 1;
        document.getElementById("diceInstructions").innerHTML =
          "Your Dice Roll is:";
        document.getElementById("yourDiceRoll").innerHTML = dice;
        // document.getElementById("diceButton").disabled = true;
      }

      function setNumbers() {
        numbers = [5, 2, 6, 3, 8, 10, 9, 12, 11, 4, 8, 10, 9, 4, 5, 6, 3, 11];
        hex = [
          1,
          2,
          3,
          7,
          12,
          16,
          19,
          18,
          17,
          13,
          8,
          4,
          5,
          6,
          11,
          15,
          14,
          9,
          10
        ];

        for (var i = 0; i < hex.length; i++) {
          var temp = document.getElementById("middle" + hex[i]);
          let tempColor = window.getComputedStyle(temp).backgroundColor;
          if (tempColor == "rgb(244, 164, 96)") {
            console.log(i + 1); //if hex is desert
            document.getElementById("middle" + hex[i]).innerHTML = "X";
            numbers.splice(i, 0, "X"); // adds x into numbers array to shift numbers, to keep numbers in correct order
          } else {
            document.getElementById("middle" + hex[i]).innerHTML = numbers[i];
          }
        }
      }
    </script>
  </body>
</html>
