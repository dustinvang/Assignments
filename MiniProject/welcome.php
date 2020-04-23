<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="welcome.css" />
    <title>Dustin's Mini Project</title>
  </head>

  <body>
    <?php
    include 'connect.php';
    // Start the session
    session_start();

    echo "<h2>Welcome " . $_SESSION["name"] . "</h2>";
    echo "<br>"; echo "Your password is " . $_SESSION["password"]; echo "<br />";
    
    $cookie_name = $_SESSION["name"];
    $password = $_SESSION["password"];
    setcookie($cookie_name, $cookie_password, time() + (86400 * 30), "/");
    
    $sql = "DELETE FROM catan";

    if ($conn->query($sql) === TRUE) {
      echo '<script language="javascript">';
      echo 'console.log("deletion success")';
      echo '</script>';
    }else {
      echo '<script language="javascript">';
      echo 'console.log("deletion fail")';
      echo '</script>';
    }
    $sql1 = "ALTER TABLE catan AUTO_INCREMENT = 1;";

    if ($conn->query($sql1) === TRUE) {
      echo '<script language="javascript">';
      echo 'console.log("reset success")';
      echo '</script>';
    }else {
      echo '<script language="javascript">';
      echo 'console.log("reset failed")';
      echo '</script>';
    }

    ?>

    <!-- <h2>Welcome Dustin</h2> -->
    <p>to</p>
    <h1>Settlers of Catan</h1>
    <!-- <p><br>https://youtu.be/d-OoflrzAJg <br></p> -->
    <p>
      The Object of the game is to be the first to get to 10 points.
      <br />
      You get 1 point for every settlement and 2 points for every city.
      <br />
      You need at least 2 roads in between each settlement/city to build
      <br />
      another settlement/city.
    </p>
    <br />
    <form action="loadToGame.php" method="post">
      <label for="playerCount">How Many Players:</label>
      <select id="playerCount">
        <option value="2">2 Players</option>
        <option value="3">3 Players</option>
        <option value="4">4 Players</option>
      </select>
      <br />
      <br />

      <h2>Names:</h2>

      <label for="player1">Player 1:</label>
      <input type="text" id="player1" name="player1" value="Player1" /><br />

      <label for="player2">Player 2:</label>
      <input type="text" id="player2" name="player2" value="Player2" /><br />

      <label for="player3">Player 3:</label>
      <input type="text" id="player3" name="player3" value="Player3" /><br />

      <label for="player4">Player 4:</label>
      <input type="text" id="player4" name="player4" value="Player4" /><br />
      <br />
      <button type="submit">Submit</button>

    </form>
  </body>
</html>
