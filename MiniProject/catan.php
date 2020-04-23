<?php
// Start the session
session_start();
include_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
    <link rel="stylesheet" href="catan.css" />
    <title>Dustin's Mini Project</title>
  </head>

  <body onload="randomizeBoard()">
    <header>
      <div style="display: inline-block;">
        <p>
          <?php echo $_SESSION["player1"];?>: <span id="tree1">0</span> Tree, 
          <span id="ore1">0</span> Ore, <span id="brick1">0</span> Brick, <span id="wheat1">0</span> Wheat, 
          <span id="sheep1">0</span> Sheep, <span id="score1">0</span> Points
        </p>
      </div>
      <h1 style="position: relative; left: 25%; display: inline; ;">
        <span id="mainText"><?php echo $_SESSION["player1"];?></span>'s Turn
      </h1>
      <div style="float: right; display: block;">
        <p>
          <?php echo $_SESSION["player2"];?>: <span id="tree2">0</span> Tree, 
          <span id="ore2">0</span> Ore, <span id="brick2">0</span> Brick, <span id="wheat2">0</span> Wheat, 
          <span id="sheep2">0</span> Sheep, <span id="score2">0</span> Points
        </p>
      </div>
    </header>

    <p>https://youtu.be/KQFSRXPJ6Ms</p>
    <p id="canUpgrade" class="no"></p>
    <p id="whosTurn" class="1"></p>
    <p id="setUpCount" class="1"></p>
    <p hidden id="numbers1"></p>
    <p hidden id="numbers2"></p>
    <p hidden id="numbers3"></p>
    <p hidden id="numbers4"></p>

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
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road1"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road2"></div> <!-- ROAD -->
              <div class="firstAndLastRowHouses house hideMeHouse" onclick="claimHouse(this.id)" id="house1">
                <i id="house1icon" onclick="claimHotel(this.id)"></i>
              </div> <!-- HOUSE -->
              <div class="top" id="top1"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road7"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house4"><i id="house4icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle1">10</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road11"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road12"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house8"><i id="house8icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom1"></div>
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road3"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road4"></div> <!-- ROAD -->
              <div class="firstAndLastRowHouses house hideMeHouse" onclick="claimHouse(this.id)" id="house2"><i id="house2icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="top" id="top2"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road8"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house5"><i id="house5icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle2">2</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road13"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road14"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house9"><i id="house9icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom2"></div>
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road5"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road6"></div> <!-- ROAD -->
              <div class="firstAndLastRowHouses house hideMeHouse" onclick="claimHouse(this.id)" id="house3"><i id="house3icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="top" id="top3"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road9"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house6"><i id="house6icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="house lastHouseOfRow hideMeHouse"  onclick="claimHouse(this.id)" id="house7"><i id="house7icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle3">9</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road15"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road16"></div> <!-- ROAD -->
              <div class="lastRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road10"></div> <!-- ROAD -->
              <div class="houseFixOther hideMeHouse" onclick="claimHouse(this.id)" id="house10"><i id="house10icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="house lastHouseOfRow lastHouseOfRowFix hideMeHouse"  onclick="claimHouse(this.id)" id="house11"><i id="house11icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom3"></div>
            </div>
          </div>

          <div class="hex-row four">
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road17"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road18"></div> <!-- ROAD -->
              <div class="top" id="top4"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road25"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house12"><i id="house12icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle4">12</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road30"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road31"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house17"><i id="house17icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom4"></div>
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road19"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road20"></div> <!-- ROAD -->
              <div class="top" id="top5"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road26"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house13"><i id="house13icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle5">6</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road32"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road33"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house18"><i id="house18icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom5"></div>
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road21"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road22"></div> <!-- ROAD -->
              <div class="top" id="top6"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road27"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house14"><i id="house14icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle6">4</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road34"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road35"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house19"><i id="house19icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom6"></div>
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road23"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road24"></div> <!-- ROAD -->
              <div class="top" id="top7"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road28"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house15"><i id="house15icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="house lastHouseOfRow hideMeHouse"  onclick="claimHouse(this.id)" id="house16"><i id="house16icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle7">10</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road36"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road37"></div> <!-- ROAD -->
              <div class="lastRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road29"></div> <!-- ROAD -->
              <div class="houseFixOther hideMeHouse" onclick="claimHouse(this.id)" id="house20"><i id="house20icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="house lastHouseOfRowFix hideMeHouse" onclick="claimHouse(this.id)" id="house21"><i id="house21icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom7"></div>
            </div>
          </div>

          <div class="hex-row five">
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road38"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road39"></div> <!-- ROAD -->
              <div class="top" id="top8"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road48"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house22"><i id="house22icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle8">9</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road54"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road55"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house28"><i id="house28icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom8"></div>
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road40"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road41"></div> <!-- ROAD -->
              <div class="top" id="top9"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road49"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house23"><i id="house23icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle9">11</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road56"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road57"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house29"><i id="house29icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom9"></div>
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road42"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road43"></div> <!-- ROAD -->
              <div class="top" id="top10"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road50"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house24"><i id="house24icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle10">X</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road58"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road59"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house30"><i id="house30icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom10"></div>
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road44"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road45"></div> <!-- ROAD -->
              <div class="top" id="top11"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road51"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house25"><i id="house25icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle11">3</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road60"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road61"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house31"><i id="house31icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom11"></div>
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road46"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road47"></div> <!-- ROAD -->
              <div class="top" id="top12"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road52"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house26"><i id="house26icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="house lastHouseOfRow hideMeHouse"  onclick="claimHouse(this.id)" id="house27"><i id="house27icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle12">8</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road62"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road63"></div> <!-- ROAD -->
              <div class="lastRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road53"></div> <!-- ROAD -->
              <div class="houseFixOther hideMeHouse" onclick="claimHouse(this.id)" id="house32"><i id="house32icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="house lastHouseOfRowFix hideMeHouse"  onclick="claimHouse(this.id)" id="house33"><i id="house33icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom12"></div>
            </div>
          </div>

          <div class="hex-row four">
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road64"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road65"></div> <!-- ROAD -->
              <div class="top" id="top13"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road72"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house34"><i id="house34icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle13">8</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road77"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road78"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house39"><i id="house39icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom13"></div>
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road66"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road67"></div> <!-- ROAD -->
              <div class="top" id="top14"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road73"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house35"><i id="house35icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle14">3</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road79"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road80"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house40"><i id="house40icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom14"></div>
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road68"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road69"></div> <!-- ROAD -->
              <div class="top" id="top15"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road74"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house36"><i id="house36icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle15">4</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road81"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road82"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house41"><i id="house41icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom15"></div>
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road70"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road71"></div> <!-- ROAD -->
              <div class="top" id="top16"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road75"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house37"><i id="house37icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="house lastHouseOfRow hideMeHouse"  onclick="claimHouse(this.id)" id="house38"><i id="house38icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle16">5</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road83"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road84"></div> <!-- ROAD -->
              <div class="lastRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road76"></div> <!-- ROAD -->
              <div class="houseFixOther hideMeHouse" onclick="claimHouse(this.id)" id="house42"><i id="house42icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="house lastHouseOfRowFix hideMeHouse"  onclick="claimHouse(this.id)" id="house43"><i id="house43icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom16"></div>
            </div>
          </div>

          <div class="hex-row">
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road85"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road86"></div> <!-- ROAD -->
              <div class="top" id="top17"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road91"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house44"><i id="house44icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle17">5</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road95"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road96"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house48"><i id="house48icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom17"></div>
              <div class="house firstAndLastRowHousesFix hideMeHouse" onclick="claimHouse(this.id)" id="house52"><i id="house52icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road87"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road88"></div> <!-- ROAD -->
              <div class="top" id="top18"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road92"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house45"><i id="house45icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle18">6</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road97"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road98"></div> <!-- ROAD -->
              <div class="houseFix hideMeHouse" onclick="claimHouse(this.id)" id="house49"><i id="house49icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom18"></div>
              <div class="house firstAndLastRowHousesFix hideMeHouse" onclick="claimHouse(this.id)" id="house53"><i id="house53icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
            </div>
            <div class="hex">
              <div class="leftRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road89"></div> <!-- ROAD -->
              <div class="rightRoadTop hideMeRoad road" onclick="claimRoad(this.id)"  id="road90"></div> <!-- ROAD -->
              <div class="top" id="top19"></div>
              <div class="firstRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road93"></div> <!-- ROAD -->
              <div class="house hideMeHouse" onclick="claimHouse(this.id)" id="house46"><i id="house46icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="house lastHouseOfRow hideMeHouse"  onclick="claimHouse(this.id)" id="house47"><i id="house47icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="middle" id="middle19">11</div>
              <div class="leftRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road99"></div> <!-- ROAD -->
              <div class="rightRoadBot hideMeRoad road" onclick="claimRoad(this.id)"  id="road100"></div> <!-- ROAD -->
              <div class="lastRoad hideMeRoad road" onclick="claimRoad(this.id)"  id="road94"></div> <!-- ROAD -->
              <div class="houseFixOther hideMeHouse" onclick="claimHouse(this.id)" id="house50"><i id="house50icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="house lastHouseOfRowFix hideMeHouse"  onclick="claimHouse(this.id)" id="house51"><i id="house51icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
              <div class="bottom" id="bottom19"></div>
              <div class="firstAndLastRowHousesFixOther house hideMeHouse" onclick="claimHouse(this.id)" id="house54"><i id="house54icon" onclick="claimHotel(this.id)"></i></div> <!-- HOUSE -->
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
            <h2 id="yourDiceRoll">??</h2>
            <button type="button" onclick="rollDice()" id="diceButton">
              Roll Dice
            </button>

            <button type="button" onclick="trade()" id="tradeButton">
              Trade (none)
            </button>
            <div id="myModalTrade" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <button style="margin: 1%;" onclick="playerTrade(this.id)" id="player1Trade">Trade With Player 1</button>
                <button style="margin: 1%;" onclick="playerTrade(this.id))" id="player2Trade">Trade With Player 2</button>
                <button style="margin: 1%;" onclick="playerTrade(this.id))" id="player3Trade">Trade With Player 3</button>
                <button style="margin: 1%;" onclick="playerTrade(this.id))" id="player4Trade">Trade With Player 4</button>
                <button style="margin: 1%;" onclick="bankTrade()" id="bankTrade">Trade with Bank (4:1)</button>
              </div>
            </div>
            <div id="myModalTradePlayer" class="modal modal2">
              <div class="modal-content">
                <span class="close">&times;</span>
                <div style="float:left;width:50%;display:inline;">
                  Trade This:<br><br>
                  <input type="checkbox" id="tradeTree1">
                  <label for="tradeTree1">Tree</label>
                  <input type="text" id="tradeTreeAmount1"><br><br>

                  <input type="checkbox" id="tradeOre1">
                  <label for="tradeOre1">Ore</label>
                  <input type="text" id="tradeOreAmount1"><br><br>

                  <input type="checkbox" id="tradeBrick1">
                  <label for="tradeBrick1">Brick</label>
                  <input type="text" id="tradeBrickAmount1"><br><br>

                  <input type="checkbox" id="tradeWheat">
                  <label for="tradeWheat1">Wheat</label>
                  <input type="text" id="tradeWheatAmount1"><br><br>

                  <input type="checkbox" id="tradeSheep1">
                  <label for="tradeSheep1">Sheep</label>
                  <input type="text" id="tradeSheepAmount1"><br><br>
                  
                </div>
                <div style="float:left;width:50%;display:inline;">
                  For This:<br><br>
                  <input type="checkbox" id="getTree1">
                  <label for="getTree1">Tree</label>
                  <input type="text" id="getTreeAmount1"><br><br>

                  <input type="checkbox" id="getOre1">
                  <label for="getOre1">Ore</label>
                  <input type="text" id="getOreAmount1"><br><br>

                  <input type="checkbox" id="getBrick1">
                  <label for="getBrick1">Brick</label>
                  <input type="text" id="getBrickAmount1"><br><br>

                  <input type="checkbox" id="getWheat">
                  <label for="getWheat1">Wheat</label>
                  <input type="text" id="getWheatAmount1"><br><br>
                  
                  <input type="checkbox" id="getSheep1">
                  <label for="getSheep1">Sheep</label>
                  <input type="text" id="getSheepAmount1"><br><br>
                </div>
              </div>
            </div>
            <div id="myModalTradeBank" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <button style="margin: 1%;" onclick="playerTrade(this.id)" id="player1Trade">Trade With Player 1</button>
                <button style="margin: 1%;" onclick="playerTrade()" id="player2Trade">Trade With Player 2</button>
                <button style="margin: 1%;" onclick="playerTrade()" id="player3Trade">Trade With Player 3</button>
                <button style="margin: 1%;" onclick="playerTrade()" id="player4Trade">Trade With Player 4</button>
                <button style="margin: 1%;" onclick="bankTrade()" id="bankTrade">Trade with Bank (4:1)</button>
              </div>
            </div>

            <button type="button" onclick="buildSomething()" id="buildButton">
              Build
            </button>
            <div id="myModal" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <button style="margin: 1%;" onclick="buildRoad()" id="roadButton">Road (1 Brick & 1 Tree)</button>
                <button style="margin: 1%;" onclick="buildHouse()" id="houseButton">House (1 Brick, 1 Tree, 1 Wheat, & 1 Sheep)</button>
                <button style="margin: 1%;" onclick="buildHotel()" id="hotelButton">Hotel (3 Ore & 2 Wheat)</button>
              </div>
            </div>
            <button type="button" onclick="cancelBuild()" id="cancelBuildButton" style="display: none;">
              Build Cancel
            </button>

            <button type="button" onclick="endTurn()" id="endButton">
              End Turn
            </button>
          </div>
        </div>
      </scetion>
    </div>

    <footer>
      <div style="display: inline-block;">
        <p>
          <?php echo $_SESSION["player3"];?>: <span id="tree3">0</span> Tree, 
          <span id="ore3">0</span> Ore, <span id="brick3">0</span> Brick, <span id="wheat3">0</span> Wheat, 
          <span id="sheep3">0</span> Sheep, <span id="score3">0</span> Points
        </p>
      </div>

      <p
        id="timer"
        style="text-align: center; position: relative; left: 20%; display: inline-block;"
      ></p>

      <div style="float:right; display: block;">
        <p>
          <?php echo $_SESSION["player4"];?>: <span id="tree4">0</span> Tree, 
          <span id="ore4">0</span> Ore, <span id="brick4">0</span> Brick, <span id="wheat4">0</span> Wheat, 
          <span id="sheep4">0</span> Sheep, <span id="score4">0</span> Points
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
          "sienna"
        ];

        shuffle(colors);

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
          if (tempColor == "rgb(160, 82, 45)") {
            document.getElementById("middle" + hex[i]).innerHTML = "X";
            numbers.splice(i, 0, "X"); // adds x into numbers array to shift numbers, to keep numbers in correct order
          } else {
            document.getElementById("middle" + hex[i]).innerHTML = numbers[i];
          }
        }
        document.getElementById("diceButton").disabled = true;
        document.getElementById("hotelButton").disabled = true;
        document.getElementById("tradeButton").disabled = true;
      }

      var countDownDate = new Date("Apr 27, 2020 23:59:59").getTime();

      // Update the count down every 1 second
      var x = setInterval(function() {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor(
          (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("timer").innerHTML =
          "Days until the last Day of School: " +
          days +
          "d " +
          hours +
          "h " +
          minutes +
          "m " +
          seconds +
          "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("timer").innerHTML = "SCHOOL IS DONE!!";
        }
      }, 1000);

      //Buttons Buttons Buttons Buttons Buttons Buttons Buttons Buttons Buttons Buttons Buttons Buttons Buttons Buttons 

      function rollDice() {
        var dice = (Math.floor(Math.random() * 11) + 1) + 1;
        document.getElementById("diceInstructions").innerHTML =
          "Your Dice Roll is:";
        document.getElementById("yourDiceRoll").innerHTML = dice;
        document.getElementById("diceButton").disabled = true;
        checkNumbers(dice);
      }

      function checkNumbers(dice){
        var player1 = document.getElementById("numbers1").innerHTML;
        var str1 = player1.split(",");
        var player2 = document.getElementById("numbers2").innerHTML;
        var str2 = player2.split(",");
        var player3 = document.getElementById("numbers3").innerHTML;
        var str3 = player3.split(",");
        var player4 = document.getElementById("numbers4").innerHTML;
        var str4 = player4.split(",");
        var playersWhoHaveHex = [];

        for (var i = 0; i < player1.length; i++) {
          if(str1[i] == dice){
            playersWhoHaveHex.push(1);
          }
        }
        for (var i = 0; i < player2.length; i++) {
          if(str2[i] == dice){
            playersWhoHaveHex.push(2);
          }
        }
        for (var i = 0; i < player3.length; i++) {
          if(str3[i] == dice){
            playersWhoHaveHex.push(3);
          }
        }
        for (var i = 0; i < player4.length; i++) {
          if(str4[i] == dice){
            playersWhoHaveHex.push(4);
          }
        }

        if(dice == 12){
          var hexNumber = "";
          for (var i = 1; i <= 19; i++) {
            var temp = document.getElementById("middle"+i).innerHTML;
            if(temp == 12){
              hexNumber = "middle" + i;
            }
          }
          console.log("playersWhoHaveHex: " + playersWhoHaveHex);
          var hexColor = document.getElementById(hexNumber).style.background;
          if(hexColor == "greenyellow"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("sheep" + playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("sheep" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor == "green"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("tree" + playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("tree" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor == "darkgray"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("ore" + playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("ore" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor == "gold"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("wheat"+ playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("wheat" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor == "tomato"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("brick"+ playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("brick"+ playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
        }
        if(dice == 2){
          var hexNumber = "";
          for (var i = 1; i <= 19; i++) {
            var temp = document.getElementById("middle"+i).innerHTML;
            if(temp == 2){
              hexNumber = "middle" + i;
            }
          }
          console.log("playersWhoHaveHex: " + playersWhoHaveHex);
          var hexColor = document.getElementById(hexNumber).style.background;
          if(hexColor == "greenyellow"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("sheep" + playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("sheep" + playersWhoHaveHex[i]).innerHTML = amountInt;
              // playersWhoHaveHex.pop();
            }
          }
          if(hexColor == "green"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("tree" + playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("tree" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor == "darkgray"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("ore" + playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("ore" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor == "gold"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("wheat"+ playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("wheat" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor == "tomato"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("brick"+ playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("brick"+ playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
        }

        if(dice != 2 && dice !=12){
          var hexNumber = "";
          for (var i = 1; i <= 19; i++) {
            var temp = document.getElementById("middle"+i).innerHTML;
            if(temp == dice){
              hexNumber += i + ",";
            }
          }
          var hexNumberArr = hexNumber.split(",");
          console.log("hexNumberOther: " + hexNumber);
          console.log("hexNumberArr[0]: " + hexNumberArr[0]);
          console.log("hexNumberArr[1]: " + hexNumberArr[1]);
          console.log("playersWhoHaveHex: " + playersWhoHaveHex);
          var hexColor1 = document.getElementById("middle" + hexNumberArr[0]).style.background;
          var hexColor2 = document.getElementById("middle" + hexNumberArr[1]).style.background;
          if(hexColor1 == "greenyellow"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              if(playersWhoHaveHex[i] == dice){
                var amount = document.getElementById("sheep" + playersWhoHaveHex[i]).innerHTML;
                var amountInt = parseInt(amount) + 1;
                document.getElementById("sheep" + playersWhoHaveHex[i]).innerHTML = amountInt;
              }
            }
          }
          if(hexColor1 == "green"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("tree" + playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("tree" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor1 == "darkgray"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("ore" + playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("ore" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor1 == "gold"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("wheat"+ playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("wheat" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor1 == "tomato"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("brick"+ playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("brick"+ playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor2 == "greenyellow"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("sheep" + playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("sheep" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor2 == "green"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("tree" + playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("tree" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor2 == "darkgray"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("ore" + playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("ore" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor2 == "gold"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("wheat"+ playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("wheat" + playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
          if(hexColor2 == "tomato"){
            for (var i = 0; i < playersWhoHaveHex.length; i++) {
              var amount = document.getElementById("brick"+ playersWhoHaveHex[i]).innerHTML;
              var amountInt = parseInt(amount) + 1;
              document.getElementById("brick"+ playersWhoHaveHex[i]).innerHTML = amountInt;
            }
          }
        }
      }

      function trade(){
        var modal = document.getElementById("myModalTrade");
        var span = document.getElementsByClassName("close")[0];
        modal.style.display = "block";
        span.onclick = function() {
        modal.style.display = "none";
          }
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
      }

      function playerTrade(otherTrader){
        var modal = document.getElementById("myModalTradePlayer");
        var span = document.getElementsByClassName("close")[1];
        modal.style.display = "block";
        span.onclick = function() {
        modal.style.display = "none";
          }
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
      }

      function buildSomething(){
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[3];
        modal.style.display = "block";
        span.onclick = function() {
        modal.style.display = "none";
          }
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
      }

      function cancelBuild(){
        var hideHouse = document.getElementsByClassName("hideMeHouse");
        for (var i = 0; i < hideHouse.length; i++) {
          hideHouse[i].style.visibility = "hidden";
        }
        var hideRoad = document.getElementsByClassName("hideMeRoad");
        for (var i = 0; i < hideRoad.length; i++) {
          hideRoad[i].style.visibility = "hidden";
        }
        document.getElementById("cancelBuildButton").style.display = "none";
        document.getElementById("buildButton").style.display = "";
      }

      function buildHouse(){ //shows all houses
        var count = document.getElementById("setUpCount").className;
        var player = document.getElementById("whosTurn").className;
        var tree = document.getElementById("tree" + player).innerHTML;
        var wheat = document.getElementById("wheat" + player).innerHTML;
        var brick = document.getElementById("brick" + player).innerHTML;
        var sheep = document.getElementById("sheep" + player).innerHTML;
        if(count > 8){ //after setup phase, check for correct amount of resources
          if(tree == 0 || wheat == 0 || brick == 0 || sheep == 0){
            alert("You do not have the correct amount of resources to make a house.");
          }else{
            var treeInt = parseInt(tree);
            treeInt -= 1;
            var brickInt = parseInt(brick);
            brickInt -= 1;
            var wheatInt = parseInt(wheat);
            wheatInt -= 1;
            var sheepInt = parseInt(sheep);
            sheepInt -= 1;
            document.getElementById("tree" + player).innerHTML = treeInt;
            document.getElementById("brick" + player).innerHTML = brickInt;
            document.getElementById("wheat" + player).innerHTML = wheatInt;
            document.getElementById("sheep" + player).innerHTML = sheepInt;
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
            var hideHouse = document.getElementsByClassName("hideMeHouse");
            for (var i = 0; i < hideHouse.length; i++) {
              hideHouse[i].style.visibility = "visible";
            }
            document.getElementById("cancelBuildButton").innerHTML = "Cancel House";
            document.getElementById("cancelBuildButton").style.display = "";
            document.getElementById("buildButton").style.display = "none";
          }
        }else{
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
            var hideHouse = document.getElementsByClassName("hideMeHouse");
            for (var i = 0; i < hideHouse.length; i++) {
              hideHouse[i].style.visibility = "visible";
            }
            document.getElementById("cancelBuildButton").innerHTML = "Cancel House";
            document.getElementById("cancelBuildButton").style.display = "";
            document.getElementById("buildButton").style.display = "none";
          }
      }
      
      function claimHouse(houseId){ //makes house belong to that person
        var player = document.getElementById("whosTurn").className;
        var color;
        if(player == 1){
          color = "red";
        }
        if(player == 2){
          color = "dodgerblue";
        }
        if(player == 3){
          color = "orange";
        }
        if(player == 4){
          color = "white";
        }
        removeAdjacentHouses(houseId); //removes adjacent houses that are too close to be claimed
        getHouseNumbers(houseId);
        document.getElementById(houseId).classList.remove("hideMeHouse"); //removes invisible
        if(document.getElementById(houseId).classList.contains("firstAndLastRowHouses")){ //changes house
          document.getElementById(houseId).classList.remove("firstAndLastRowHouses");
          document.getElementById(houseId).classList.add("ownedFirstAndLast");
          document.getElementById(houseId).classList.add("upgradable");
          document.getElementById(houseId).style.backgroundColor=color;
        }
        if(document.getElementById(houseId).classList.contains("firstAndLastRowHousesFix")){
          document.getElementById(houseId).classList.remove("firstAndLastRowHousesFix");
          document.getElementById(houseId).classList.add("ownedFirstAndLastFix");
          document.getElementById(houseId).classList.add("upgradable");
          document.getElementById(houseId).style.backgroundColor=color;

        }
        if(document.getElementById(houseId).classList.contains("firstAndLastRowHousesFixOther")){
          document.getElementById(houseId).classList.remove("firstAndLastRowHousesFixOther");
          document.getElementById(houseId).classList.add("ownedFirstAndLastFixOther");
          document.getElementById(houseId).classList.add("upgradable");
          document.getElementById(houseId).style.backgroundColor=color;

        }
        if(document.getElementById(houseId).classList.contains("house")){
          document.getElementById(houseId).classList.remove("house");
          document.getElementById(houseId).classList.add("owned");
          document.getElementById(houseId).classList.add("upgradable");
          document.getElementById(houseId).style.backgroundColor=color;

        }
        if(document.getElementById(houseId).classList.contains("houseFix")){
          document.getElementById(houseId).classList.remove("houseFix");
          document.getElementById(houseId).classList.add("ownedFix");
          document.getElementById(houseId).classList.add("upgradable");
          document.getElementById(houseId).style.backgroundColor=color;

        }
        if(document.getElementById(houseId).classList.contains("houseFixOther")){
          document.getElementById(houseId).classList.remove("houseFixOther");
          document.getElementById(houseId).classList.add("ownedFixOther");
          document.getElementById(houseId).classList.add("upgradable");
          document.getElementById(houseId).style.backgroundColor=color;

        }
        if(document.getElementById(houseId).classList.contains("lastHouseOfRow")){
          document.getElementById(houseId).classList.remove("lastHouseOfRow");
          document.getElementById(houseId).classList.add("ownedLastHouseOfRow");
          document.getElementById(houseId).classList.add("upgradable");
          document.getElementById(houseId).style.backgroundColor=color;

        }
        if(document.getElementById(houseId).classList.contains("lastHouseOfRowFix")){
          document.getElementById(houseId).classList.remove("lastHouseOfRowFix");
          document.getElementById(houseId).classList.add("ownedLastHouseOfRowFix");
          document.getElementById(houseId).classList.add("upgradable");
          document.getElementById(houseId).style.backgroundColor=color;

        }
        if(document.getElementById(houseId+"icon")){
          document.getElementById(houseId+"icon").classList.add("fas");
          document.getElementById(houseId+"icon").classList.add("fa-home");
        }
        var hideHouse = document.getElementsByClassName("hideMeHouse");
        for (var i = 0; i < hideHouse.length; i++) {
          hideHouse[i].style.visibility = "hidden";
        }
        document.getElementById("cancelBuildButton").style.display = "none";
        document.getElementById("buildButton").style.display = "";
        var turn = document.getElementById("whosTurn").className;
        var score = document.getElementById("score" + turn).innerHTML;
        var scoreInt = parseInt(score) +1;
        document.getElementById("score" + turn).innerHTML = scoreInt;
      }

      function removeAdjacentHouses(houseId){ // holds all house info that are to be removed if key house is claimed
        var dict = new Map();
        dict.set("house1",[4,5]);
        dict.set("house2",[5,6]);
        dict.set("house3",[6,7]);
        dict.set("house4",[1,8]);
        dict.set("house5",[1,2]);
        dict.set("house6",[2,3]);
        dict.set("house7",[3,11]);
        dict.set("house8",[4,12,13]);
        dict.set("house9",[5,13,14]);
        dict.set("house10",[7,14,15]);
        dict.set("house11",[7,15,16]);
        dict.set("house12",[8,17]);
        dict.set("house13",[8,9,18]);
        dict.set("house14",[9,10,19]);
        dict.set("house15",[10,11,20]);
        dict.set("house16",[11,21]);
        dict.set("house17",[12,22,23]);
        dict.set("house18",[13,23,24]);
        dict.set("house19",[14,24,25]);
        dict.set("house20",[15,25,26]);
        dict.set("house21",[16,26,27]);
        dict.set("house22",[17,28]);
        dict.set("house23",[17,18,29]);
        dict.set("house24",[18,19,30]);
        dict.set("house25",[19,20,31]);
        dict.set("house26",[20,21,32]);
        dict.set("house27",[21,33]);
        dict.set("house28",[22,34]);
        dict.set("house29",[23,34,35]);
        dict.set("house30",[24,35,36]);
        dict.set("house31",[25,36,37]);
        dict.set("house32",[26,37,38]);
        dict.set("house33",[27,38]);
        dict.set("house34",[28,29,39]);
        dict.set("house35",[29,30,40]);
        dict.set("house36",[30,31,41]);
        dict.set("house37",[31,32,42]);
        dict.set("house38",[32,33,43]);
        dict.set("house39",[34,44]);
        dict.set("house40",[35,44,45]);
        dict.set("house41",[36,45,46]);
        dict.set("house42",[37,46,47]);
        dict.set("house43",[38,47]);
        dict.set("house44",[39,40,48]);
        dict.set("house45",[40,41,49]);
        dict.set("house46",[41,42,50]);
        dict.set("house47",[42,43,51]);
        dict.set("house48",[44,52]);
        dict.set("house49",[45,52,53]);
        dict.set("house50",[46,53,54]);
        dict.set("house51",[47,54]);
        dict.set("house52",[48,49]);
        dict.set("house53",[49,50]);
        dict.set("house54",[50,51]);
        
        var str = dict.get(houseId);
        for (var i = 0; i < str.length; i++) {
          document.getElementById("house"+str[i]).classList.remove("hideMeHouse");
          document.getElementById("house"+str[i]).style.visibility="hidden";
          document.getElementById("house"+str[i]).classList.add("noLongerForSale");
        }
      }

      function getHouseNumbers(houseId){ // holds hex numbers to send to database
        var player = document.getElementById("whosTurn").className;
        var playerTable = "numbers" + player;
        var dict = new Map();
        dict.set("house1",[document.getElementById("middle1").innerHTML]);
        dict.set("house2",[document.getElementById("middle2").innerHTML]);
        dict.set("house3",[document.getElementById("middle3").innerHTML]);
        dict.set("house4",[document.getElementById("middle1").innerHTML]);
        dict.set("house5",[document.getElementById("middle1").innerHTML,document.getElementById("middle2").innerHTML]);
        dict.set("house6",[document.getElementById("middle2").innerHTML],document.getElementById("middle3").innerHTML);
        dict.set("house7",[document.getElementById("middle3").innerHTML]);
        dict.set("house8",[document.getElementById("middle1").innerHTML,document.getElementById("middle4").innerHTML]);
        dict.set("house9",[document.getElementById("middle1").innerHTML,document.getElementById("middle2").innerHTML,document.getElementById("middle5").innerHTML]);
        dict.set("house10",[document.getElementById("middle2").innerHTML,document.getElementById("middle3").innerHTML,document.getElementById("middle6").innerHTML]);
        dict.set("house11",[document.getElementById("middle3").innerHTML,document.getElementById("middle7").innerHTML]);
        dict.set("house12",[document.getElementById("middle4").innerHTML]);
        dict.set("house13",[document.getElementById("middle1").innerHTML,document.getElementById("middle4").innerHTML,document.getElementById("middle5").innerHTML]);
        dict.set("house14",[document.getElementById("middle2").innerHTML,document.getElementById("middle5").innerHTML,document.getElementById("middle6").innerHTML]);
        dict.set("house15",[document.getElementById("middle3").innerHTML,document.getElementById("middle6").innerHTML,document.getElementById("middle7").innerHTML]);
        dict.set("house16",[document.getElementById("middle7").innerHTML]);
        dict.set("house17",[document.getElementById("middle4").innerHTML,document.getElementById("middle8").innerHTML]);
        dict.set("house18",[document.getElementById("middle4").innerHTML,document.getElementById("middle5").innerHTML,document.getElementById("middle9").innerHTML]);
        dict.set("house19",[document.getElementById("middle5").innerHTML,document.getElementById("middle6").innerHTML,document.getElementById("middle10").innerHTML]);
        dict.set("house20",[document.getElementById("middle6").innerHTML,document.getElementById("middle7").innerHTML,document.getElementById("middle11").innerHTML]);
        dict.set("house21",[document.getElementById("middle7").innerHTML,document.getElementById("middle12").innerHTML]);
        dict.set("house22",[document.getElementById("middle8").innerHTML]);
        dict.set("house23",[document.getElementById("middle4").innerHTML,document.getElementById("middle8").innerHTML,document.getElementById("middle9").innerHTML]);
        dict.set("house24",[document.getElementById("middle5").innerHTML,document.getElementById("middle9").innerHTML,document.getElementById("middle10").innerHTML]);
        dict.set("house25",[document.getElementById("middle6").innerHTML,document.getElementById("middle10").innerHTML,document.getElementById("middle11").innerHTML]);
        dict.set("house26",[document.getElementById("middle7").innerHTML,document.getElementById("middle11").innerHTML,document.getElementById("middle12").innerHTML]);
        dict.set("house27",[document.getElementById("middle12").innerHTML]);
        dict.set("house28",[document.getElementById("middle8").innerHTML]);
        dict.set("house29",[document.getElementById("middle8").innerHTML,document.getElementById("middle9").innerHTML,document.getElementById("middle13").innerHTML]);
        dict.set("house30",[document.getElementById("middle9").innerHTML,document.getElementById("middle10").innerHTML,document.getElementById("middle14").innerHTML]);
        dict.set("house31",[document.getElementById("middle10").innerHTML,document.getElementById("middle11").innerHTML,document.getElementById("middle15").innerHTML]);
        dict.set("house32",[document.getElementById("middle11").innerHTML,document.getElementById("middle12").innerHTML,document.getElementById("middle16").innerHTML]);
        dict.set("house33",[document.getElementById("middle12").innerHTML]);
        dict.set("house34",[document.getElementById("middle8").innerHTML,document.getElementById("middle13").innerHTML]);
        dict.set("house35",[document.getElementById("middle9").innerHTML,document.getElementById("middle13").innerHTML,document.getElementById("middle14").innerHTML]);
        dict.set("house36",[document.getElementById("middle10").innerHTML,document.getElementById("middle14").innerHTML,document.getElementById("middle15").innerHTML]);
        dict.set("house37",[document.getElementById("middle11").innerHTML,document.getElementById("middle15").innerHTML,document.getElementById("middle16").innerHTML]);
        dict.set("house38",[document.getElementById("middle12").innerHTML,document.getElementById("middle16").innerHTML]);
        dict.set("house39",[document.getElementById("middle13").innerHTML]);
        dict.set("house40",[document.getElementById("middle13").innerHTML,document.getElementById("middle14").innerHTML,document.getElementById("middle17").innerHTML]);
        dict.set("house41",[document.getElementById("middle14").innerHTML,document.getElementById("middle15").innerHTML,document.getElementById("middle18").innerHTML]);
        dict.set("house42",[document.getElementById("middle15").innerHTML,document.getElementById("middle16").innerHTML,document.getElementById("middle19").innerHTML]);
        dict.set("house43",[document.getElementById("middle16").innerHTML]);
        dict.set("house44",[document.getElementById("middle13").innerHTML,document.getElementById("middle17").innerHTML]);
        dict.set("house45",[document.getElementById("middle14").innerHTML,document.getElementById("middle17").innerHTML,document.getElementById("middle18").innerHTML]);
        dict.set("house46",[document.getElementById("middle15").innerHTML,document.getElementById("middle18").innerHTML,document.getElementById("middle19").innerHTML]);
        dict.set("house47",[document.getElementById("middle16").innerHTML,document.getElementById("middle19").innerHTML]);
        dict.set("house48",[document.getElementById("middle17").innerHTML]);
        dict.set("house49",[document.getElementById("middle17").innerHTML,document.getElementById("middle18").innerHTML]);
        dict.set("house50",[document.getElementById("middle18").innerHTML,document.getElementById("middle19").innerHTML]);
        dict.set("house51",[document.getElementById("middle19").innerHTML]);
        dict.set("house52",[document.getElementById("middle17").innerHTML]);
        dict.set("house53",[document.getElementById("middle18").innerHTML]);
        dict.set("house54",[document.getElementById("middle19").innerHTML]);

        var str = dict.get(houseId);
        for (var i = 0; i < str.length; i++) {
          document.getElementById(playerTable).innerHTML += str[i] + ",";
        }
      }

      function buildRoad(){ //shows all roads
        var count = document.getElementById("setUpCount").className;
        var player = document.getElementById("whosTurn").className;
        var tree = document.getElementById("tree" + player).innerHTML;
        var brick = document.getElementById("brick" + player).innerHTML;
        if(count > 8){ //after setup phase, check for correct amount of resources 
          if(tree == 0 || brick == 0){
            alert("You do not have the correct amount of resources to build a road.");
          }else{
            var treeInt = parseInt(tree);
            treeInt -= 1;
            var brickInt = parseInt(brick);
            brickInt -= 1;
            document.getElementById("tree" + player).innerHTML = treeInt;
            document.getElementById("brick" + player).innerHTML = brickInt;
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
            var hideRoad = document.getElementsByClassName("hideMeRoad");
            for (var i = 0; i < hideRoad.length; i++) {
              hideRoad[i].style.visibility = "visible";
            }
            document.getElementById("cancelBuildButton").innerHTML = "Cancel Road";
            document.getElementById("cancelBuildButton").style.display = "";
            document.getElementById("buildButton").style.display = "none";
          }
        }else{
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
            var hideRoad = document.getElementsByClassName("hideMeRoad");
            for (var i = 0; i < hideRoad.length; i++) {
              hideRoad[i].style.visibility = "visible";
            }
            document.getElementById("cancelBuildButton").innerHTML = "Cancel Road";
            document.getElementById("cancelBuildButton").style.display = "";
            document.getElementById("buildButton").style.display = "none";
          }
      }

      function claimRoad(roadId){ //makes house belong to that person
        var player = document.getElementById("whosTurn").className;
        var color;
        if(player == 1){
          color = "7px solid red";
        }
        if(player == 2){
          color = "7px solid blue";
        }
        if(player == 3){
          color = "7px solid orange";
        }
        if(player == 4){
          color = "7px solid white";
        }
        document.getElementById(roadId).style.border = color;
        document.getElementById(roadId).classList.remove("hideMeRoad");
        document.getElementById(roadId).style.pointerEvents = 'none';
        var hideRoad = document.getElementsByClassName("hideMeRoad");
        for (var i = 0; i < hideRoad.length; i++) {
          hideRoad[i].style.visibility = "hidden";
        }
        document.getElementById("cancelBuildButton").style.display = "none";
        document.getElementById("buildButton").style.display = "";
      }

      function buildHotel(){ //shows all roads
        var count = document.getElementById("setUpCount").className;
        var player = document.getElementById("whosTurn").className;
        var ore = document.getElementById("ore" + player).innerHTML;
        var wheat = document.getElementById("wheat" + player).innerHTML;
        if(count > 8){ //after setup phase, check for correct amount of resources 
          if(ore <= 2 || wheat <= 1){
            alert("You do not have the correct amount of resources to build a hotel.");
          }else{
            var oreInt = parseInt(ore);
            oreInt -= 3;
            var wheatInt = parseInt(wheat);
            wheatInt -= 2;
            document.getElementById("ore" + player).innerHTML = oreInt;
            document.getElementById("wheat" + player).innerHTML = wheatInt;
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
            document.getElementById("canUpgrade").className="yes";
            document.getElementById("cancelBuildButton").innerHTML = "Cancel Hotel";
            document.getElementById("cancelBuildButton").style.display = "";
            document.getElementById("buildButton").style.display = "none";
          }
        }else{
          var modal = document.getElementById("myModal");
          modal.style.display = "none";
          document.getElementById("canUpgrade").className="yes";
          document.getElementById("cancelBuildButton").innerHTML = "Cancel Hotel";
          document.getElementById("cancelBuildButton").style.display = "";
          document.getElementById("buildButton").style.display = "none";
          }
      }

      function claimHotel(hotelIdIcon){
        var allowUpgrade = document.getElementById("canUpgrade").className;
        console.log("can upgrade hotel: " + allowUpgrade);
        var hotelId = hotelIdIcon.slice(0,-4);
        if(allowUpgrade == "yes"){
          if(document.getElementById(hotelId).classList.contains("upgradable")){
            document.getElementById(hotelIdIcon).remove();
            var makeIcon = document.createElement("i");
            document.getElementById(hotelId).appendChild(makeIcon);
            makeIcon.className = "fas fa-crown";
            makeIcon.id = hotelIdIcon+"New";
            document.getElementById("canUpgrade").className="no";
            document.getElementById(hotelId).style.pointerEvents = 'none';
            var turn = document.getElementById("whosTurn").className;
            var score = document.getElementById("score" + turn).innerHTML;
            var scoreInt = parseInt(score) + 1;
            document.getElementById("score" + turn).innerHTML = scoreInt;
          }
        }
      }

      function endTurn(){
        var count = document.getElementById("setUpCount").className;
        var player = document.getElementById("whosTurn").className;
        if(count < 4){ //setup the board
          var next = parseInt(player) +1;
          document.getElementById("whosTurn").className = next;
          var nextCount = parseInt(count) + 1;
          document.getElementById("setUpCount").className = nextCount;
          if(next == 2){
            document.getElementById("mainText").innerHTML = "<?php echo $_SESSION["player2"]?>";
          }
          if(next == 3){
            document.getElementById("mainText").innerHTML = "<?php echo $_SESSION["player3"]?>";
          }
          if(next == 4){
            document.getElementById("mainText").innerHTML = "<?php echo $_SESSION["player4"]?>";
          }
          console.log("next Player: " + next);
        }
        if(count == 4){
          var next = parseInt(player);
          var nextCount = parseInt(count) + 1;
          document.getElementById("setUpCount").className = nextCount;
          console.log("next Player: " + next);
        }
        if(count >=5 && count < 8){
          var next = parseInt(player) -1;
          document.getElementById("whosTurn").className = next;
          var nextCount = parseInt(count) + 1;
          document.getElementById("setUpCount").className = nextCount;
          console.log("next Player: " + next);
          if(next == 1){
            document.getElementById("mainText").innerHTML = "<?php echo $_SESSION["player1"]?>";
          }
          if(next == 2){
            document.getElementById("mainText").innerHTML = "<?php echo $_SESSION["player2"]?>";
          }
          if(next == 3){
            document.getElementById("mainText").innerHTML = "<?php echo $_SESSION["player3"]?>";
          }
        }
        if(count == 8){
          var next = parseInt(player);
          var nextCount = parseInt(count) + 1;
          document.getElementById("setUpCount").className = nextCount;
          console.log("next Player: " + next);
          document.getElementById("diceButton").disabled = false;
          document.getElementById("hotelButton").disabled = false;
          document.getElementById("tradeButton").disabled = false;
        }

        if(count > 8){
          if(player == 1){
            if(document.getElementById("score" + player).innerHTML >= 10){
              document.getElementById("rollDice").disabled = true;
              document.getElementById("buildButton").disabled = true;
              document.getElementById("tradeButton").disabled = true;
              document.getElementById("endButton").disabled = true;
              alert("<?php echo $_SESSION["player1"]?> wins!");
            }
            document.getElementById("whosTurn").className = 2;
            document.getElementById("diceButton").disabled = false;
            document.getElementById("mainText").innerHTML = "<?php echo $_SESSION["player2"]?>";
          }
          if(player == 2){
            if(document.getElementById("score" + player).innerHTML >= 10){
              document.getElementById("rollDice").disabled = true;
              document.getElementById("buildButton").disabled = true;
              document.getElementById("tradeButton").disabled = true;
              document.getElementById("endButton").disabled = true;
              alert("<?php echo $_SESSION["player2"]?> wins!");
            }
            document.getElementById("whosTurn").className = 3;
            document.getElementById("diceButton").disabled = false;
            document.getElementById("mainText").innerHTML = "<?php echo $_SESSION["player3"]?>";
          }
          if(player == 3){
            if(document.getElementById("score" + player).innerHTML >= 10){
              document.getElementById("rollDice").disabled = true;
              document.getElementById("buildButton").disabled = true;
              document.getElementById("tradeButton").disabled = true;
              document.getElementById("endButton").disabled = true;
              alert("<?php echo $_SESSION["player3"]?> wins!");
            }
            document.getElementById("whosTurn").className = 4;
            document.getElementById("diceButton").disabled = false;
            document.getElementById("mainText").innerHTML = "<?php echo $_SESSION["player4"]?>";
          }
          if(player == 4){
            if(document.getElementById("score" + player).innerHTML >= 10){
              document.getElementById("rollDice").disabled = true;
              document.getElementById("buildButton").disabled = true;
              document.getElementById("tradeButton").disabled = true;
              document.getElementById("endButton").disabled = true;
              alert("<?php echo $_SESSION["player4"]?> wins!");
            }
            document.getElementById("whosTurn").className = 1;
            document.getElementById("diceButton").disabled = false;
            document.getElementById("mainText").innerHTML = "<?php echo $_SESSION["player1"]?>";
          }
       }
      }

    </script>
  </body>
</html>
