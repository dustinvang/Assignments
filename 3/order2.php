<?php 
   $name = htmlspecialchars($_POST["fname"]);
   $model = $_POST["model"];
   $arr = str_split($name);

   for($i=0;$i<count($arr);$i++){
      if(is_numeric($arr[$i])){
           exit ("This is numeric: " . $i . "<br>"); 
          }
        }
          setcookie("cookie_name",$name, time() + (86400 * 30),"/");
          setcookie("cookie_model",$model, time() + (86400 * 30),'/'); 
   
  ?>

<html>
  <head>
    <title>Select Color</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="pageContainer centerText">
      <p></p>
      <h2 class="centerText">Select Color</h2>

      <div class="pageContainer">
        <form action="order3.php" class="formLayout" method="post">
          <div class="formGroup">
            <label>Car color:</label>
            <div class="formElements">
              <select name="color" required>
                <option
                  style="background-color: blue; color:white;"
                  value="blue"
                  >Blue</option
                >
                <option style="background-color: red" value="red">Red</option>
                <option style="background-color: yellow" value="yellow"
                  >Yellow</option
                >
              </select>
            </div>
          </div>
          <div class="formGroup">
            <label></label>
            <button type="submit">>> Next >></button>
          </div>
          <div class="centerText vertGap55">
            <button type="submit" formnovalidate>
              Submit without validation</button
            ><br /><br />
            <a href="?">Reload page</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
