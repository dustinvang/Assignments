<?php

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
  $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: ' . $location);
  exit;
}
    session_start();
    if ($password == 'guest' && strlen($username) > 0) {
      $_SESSION["username"] = $username;
      header("location: protected.php"); exit; //stops page execution
    }
    $_SESSION["name"] = "Name";
    $name = $_SESSION["name"];
    $password = $_SERVER["password"];
    $postback = $_SERVER["postback"];
    

?>

<html>
  <head>
    <title>Select Model</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="pageContainer">
      <h2 class="centerText">Select Model</h2>
      <p><?php echo $name; ?></p>

      <form class="formLayout" method="post">
        <div class="formGroup">
          <label>Name:</label>
          <input
            type="text"
            name="username"
            class="textbox"
            autofocus
            required
            placeholder="Name"
            value = "<?php echo $name; ?>"
          />
          <?php 
            if ($postback && strlen($username) < 1) {
              echo "Please enter your name.";
          }
          
          ?>



          <label>Password:</label>
          <input
            type="text"
            name="password"
            class="textbox"
            autofocus
            required
          />
        </div>
        <input type="hidden" name="postback" value="true" />
        <div class="formGroup">
          <label></label>
          <button type="submit" onclick= "changeValue()">Submit</button>
        </div>

        

      </form>
    </div>
  </body>
</html>
