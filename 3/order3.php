<?php
   $name = $_COOKIE["cookie_name"];
   $model = $_COOKIE["cookie_model"]; 
   $color = $_POST["color"]; 
?>

<html>
  <head>
    <title>Select Model</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="pageContainer">
      <h2 class="centerText">Select Model</h2>

      <form action="" class="formLayout">
        <div class="formGroup">
          <?php echo "First name:" . $name;?>
          <br>
        </div>
        <div class="formGroup">
          <?php echo "Car Model:" . $model;?>
          <br>
          <?php echo "Car Color:" . $color;?>
        </div>
        <div class="formGroup">
          <img src="images/<?php echo $color . $model . ".jpg";?>" alt=<?php echo $color . $model;?> />
        </div>
      </form>
      <a href="order1.php">Reload page</a>
    </div>
  </body>
</html>
