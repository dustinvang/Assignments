<html>
<body>

<?php include 'validationUtilities.php'?>

Welcome <?php echo $_POST["fname"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?><br>
Your birthday is: <?php echo $_POST["birthday"]; ?><br>
Your age is: <?php echo $_POST["age"]; ?><br>
Your state is: <?php echo $_POST["state"]; ?><br>
Your zipcode is: <?php echo $_POST["zipcode"]; ?><br>

<br>

<?php
$birthday = $_POST["birthday"];
$age = $_POST["age"];
$zipcode = $_POST["zipcode"];

isValidDate($birthday);

fIsValidRange($age,18,100);

fIsValidZipcode($zipcode);

?>

</body>
</html>