function getPay() {
  var index = document.getElementById("button").value;
  parseInt(index);
  var table = document.getElementById("table");
  var row = table.insertRow(-1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  cell1.innerHTML = index++;
  cell2.innerHTML = hours();
  cell3.innerHTML = "$" + pay();
  document.getElementById("button").value = index;
}

function hours() {
  var yourHours = document.getElementById("hours").value;
  if (yourHours < 0) {
    document.getElementById("button").disabled = "True";
    return "";
  }
  return yourHours;
}

function pay() {
  var hours = document.getElementById("hours").value;
  if (hours < 0) {
    return "";
  }
  if (hours > 40) {
    var overtime = hours - 40;
    return overtime * (15 * 1.5) + 40 * 15;
  }
  return hours * 15;
}

function setUp() {
  var secret = Math.floor(Math.random() * 100) + 1;
  document.getElementById("secret").innerHTML = secret;
  var timerCheck = setInterval(quizTimer, 1000);
}

function guess() {
  var secretNumber = document.getElementById("secret").innerHTML;
  var tries = document.getElementById("tries").innerHTML;
  var number = document.getElementById("yourGuess").value;

  if (tries <= 1) {
    document.getElementById("output").innerHTML = "";
    alert("You ran out of guesses! You lose! Try Again!");
    document.getElementById("newGame").style.display = "";
    document.getElementById("button").style.display = "none";
  } else {
    document.getElementById("tries").innerHTML = tries -= 1;
  }

  if (parseInt(number) < parseInt(secretNumber)) {
    document.getElementById("output").innerHTML =
      "You are lower than the secret number. Guess again!";
  } else if (parseInt(number) > parseInt(secretNumber)) {
    document.getElementById("output").innerHTML =
      "You are higher than the secret number. Guess again!";
  } else {
    document.getElementById("output").innerHTML = "";
    alert("You guessed the secret number! You win!");
    document.getElementById("newGame").style.display = "";
    document.getElementById("button").style.display = "none";
    document.getElementById("timer").style.display = "none";
    document.getElementById("timer").innerHTML = 99999999;
  }
}

function quizTimer() {
  var time = document.getElementById("timer").innerHTML;
  if (time <= 1) {
    document.getElementById("output").innerHTML = "";
    alert("You ran out of time! You lose! Try Again!");
    document.getElementById("newGame").style.display = "";
    document.getElementById("button").style.display = "none";
    document.getElementById("timer").style.display = "none";
    document.getElementById("timer").innerHTML = 99999999;
  } else {
    document.getElementById("timer").innerHTML = time -= 1;
  }
}

function setSize() {
  var getSize = document.getElementById("size").value;
  var getDifficulty = document.getElementById("difficulty").value;
  if (getSize == 8) {
    makeBoard(4, 4, 4, 120, 16);
  } else if (getSize == 10) {
    makeBoard(4, 5, 2, 150, 20);
  } else {
    makeBoard(4, 6, 0, 180, 24);
  }
  document.getElementById("button").style.display = "none";
  document.getElementById("sizeLabel").style.display = "none";
  document.getElementById("size").style.display = "none";
  document.getElementById("difficulty").style.display = "none";
  document.getElementById("difficultyLabel").style.display = "none";
  document.getElementById("score").style.display = "";
  document.getElementById("timer").style.display = "";
  document.getElementById("countdown").innerHTML = getDifficulty;
  document.getElementById("newGame").style.display = "";
  document.getElementById("newGame").innerHTML = "Restart";
}

function makeBoard(rowSize, columnSize, popCount, gameTime, pointsToWin) {
  var counter = 1;
  pictures = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
  shuffleArray(pictures);
  popArray(popCount, pictures);

  picturesCopy = pictures;
  doublePictures = pictures.concat(picturesCopy);
  shuffleArray(doublePictures);

  var makeGame = document.createElement("div");
  document.body.appendChild(makeGame);
  makeGame.className = "game";
  makeGame.id = "game";

  for (var i = 1; i <= rowSize; i++) {
    var makeRow = document.createElement("div");
    makeGame.appendChild(makeRow);
    makeRow.className = "row";
    makeRow.id = "row" + i;

    for (var j = 1; j <= columnSize; j++) {
      var img = document.createElement("img");
      img.src =
        "pictures/" + doublePictures[doublePictures.length - 1] + ".jpeg";
      img.setAttribute("name", doublePictures[doublePictures.length - 1]);
      img.id = "image" + counter;
      img.onclick = function() {
        flipPicture(this);
      };
      var src = document.getElementById("row" + i).appendChild(img);
      doublePictures.pop();
      counter++;
    }
  }
  document.getElementById("pointsToWin").innerHTML = pointsToWin;
  document.getElementById("gameLength").innerHTML = gameTime;
  var timerCheck = setInterval(coverUp, 1000);
}

function shuffleArray(array) {
  var j = 0;
  var k = 0;
  for (var i = array.length - 1; i > 0; i--) {
    j = Math.floor(Math.random() * (i + 1));
    k = array[i];
    array[i] = array[j];
    array[j] = k;
  }
}

function popArray(count, array) {
  for (var i = 0; i < count; i++) {
    array.pop();
  }
}

function coverUp() {
  var countdown = document.getElementById("countdown").innerHTML;
  var gameTime = document.getElementById("gameLength").innerHTML;
  var gameplay = document.getElementById("gameState").innerHTML;

  if (countdown <= 1 && gameplay == "False") {
    // for setting up board
    document.getElementById("countdown").innerHTML = gameTime;
    document.getElementById("gameState").innerHTML = "True";
    var x, i;
    x = document.querySelectorAll("img");
    for (i = 0; i < x.length; i++) {
      x[i].src = "pictures/hide.jpeg";
    }
  } else if (countdown <= 1 && gameplay == "True") {
    // for running out of time when playing
    alert("You ran out of time! You lose! Try Again!");
    document.getElementById("newGame").style.display = "";
    document.getElementById("game").style.display = "none";
    document.getElementById("timer").style.display = "none";
    document.getElementById("timer").innerHTML = 99999999;
  } else {
    // timer countdown
    document.getElementById("countdown").innerHTML = countdown -= 1;
  }
}

function flipPicture(clickedImage) {
  var gameplay = document.getElementById("gameState").innerHTML;
  var gameFlips = document.getElementById("gameFlip").innerHTML;
  var count = parseInt(gameFlips);
  var flippedPictures = document.getElementById("flippedPictures").innerHTML;
  var flippedPictureNames = document.getElementById("flippedPictureNames")
    .innerHTML;
  var pointsToWin = document.getElementById("pointsToWin").innerHTML;
  var score = document.getElementById("points").innerHTML;

  if (parseInt(score) >= parseInt(pointsToWin)) {
    alert("You matched all the cards! You win!!");
    document.getElementById("newGame").style.display = "";
    document.getElementById("game").style.display = "none";
    document.getElementById("timer").style.display = "none";
    document.getElementById("timer").innerHTML = 99999999;
    document.getElementById("newGame").innerHTML = "Play Again";
  }

  if (gameplay == "True" && gameFlips < 2) {
    var name = clickedImage.getAttribute("name");
    clickedImage.src = "pictures/" + name + ".jpeg";
    count++;
    document.getElementById("gameFlip").innerHTML = count;

    if (flippedPictures == "") {
      document.getElementById(
        "flippedPictures"
      ).innerHTML = clickedImage.getAttribute("id");
    } else {
      document.getElementById("flippedPictures").innerHTML =
        flippedPictures + " " + clickedImage.getAttribute("id");
    }

    if (flippedPictureNames == "") {
      document.getElementById(
        "flippedPictureNames"
      ).innerHTML = clickedImage.getAttribute("name");
    } else {
      document.getElementById("flippedPictureNames").innerHTML =
        flippedPictureNames + " " + clickedImage.getAttribute("name");
    }
  } else if (gameplay == "True" && gameFlips >= 2) {
    var timerCheck = setTimeout(flipBackOver(), 1000);
  }

  console.log("Image Name: " + clickedImage.getAttribute("id"));
  console.log("gameFlips: " + gameFlips);
  console.log(
    "flippedPictures: " + document.getElementById("flippedPictures").innerHTML
  );
  console.log(
    "flippedPictureNames: " +
      document.getElementById("flippedPictureNames").innerHTML
  );
  console.log("count: " + count);
}

function flipBackOver() {
  var flippedPictures = document.getElementById("flippedPictures").innerHTML;
  var flipback = flippedPictures.split(" ");
  var flippedPictureNames = document.getElementById("flippedPictureNames")
    .innerHTML;
  var flipbackNames = flippedPictureNames.split(" ");
  var gameplay = document.getElementById("gameState").innerHTML;
  var countdown = document.getElementById("countdown").innerHTML;
  var gameFlips = document.getElementById("gameFlip").innerHTML;
  var pointsToWin = document.getElementById("pointsToWin").innerHTML;
  var score = document.getElementById("points").innerHTML;
  var scoreNumber = parseInt(score);

  // alert(flipback.length);

  if (flipbackNames[0] == flipbackNames[1]) {
    console.log("name 1: " + flipbackNames[0]);
    console.log("name 2: " + flipbackNames[1]);
    alert("They match!");
    scoreNumber += 2;
    document.getElementById("points").innerHTML = scoreNumber;
    document.getElementById(flipback[0]).style.display = "none";
    document.getElementById(flipback[1]).style.display = "none";
    document.getElementById("flippedPictures").innerHTML = "";
    document.getElementById("flippedPictureNames").innerHTML = "";
    document.getElementById("gameFlip").innerHTML = 0;
  } else {
    document.getElementById(flipback[0]).src = "pictures/hide.jpeg";
    document.getElementById(flipback[1]).src = "pictures/hide.jpeg";
    document.getElementById("flippedPictures").innerHTML = "";
    document.getElementById("flippedPictureNames").innerHTML = "";
    document.getElementById("gameFlip").innerHTML = 0;
  }
}
