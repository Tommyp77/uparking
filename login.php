<!DOCTYPE html>
<html>
<head>
  <title>University Parking</title>
	<link rel="stylesheet" href="style.css">
 </head>
<body>
<div
 class="pic">
</div>
  <div class="container">
    <!-- Login form -->
    <h1>Login</h1>
    <form action="login.php" method="POST">
      <label for="username">
	  Username:</label>
      <input type="text" id="username" name="username" required><br><br>      
      <label for="password">
	  Password:</label>
      <input type="password" id="password" name="password" required><br><br>
      
      <input type="submit" value="Login">
    </form>
    <!-- Registration link -->
    <p>Don't have an account? <a href="register.php">Register Here</a></p>



<?php
session_start();
require_once 'uparking.php';
require_once 'user.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	//Get values from login screen
	$tmp_username = mysql_entities_fix_string($conn, $_POST['username']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);
	
	//get password from DB w/ SQL
	$query = "SELECT password FROM user WHERE username = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	
	}
	
	//Compare passwords
	if(password_verify($tmp_password,$passwordFromDB))
	{
		$user = new User($tmp_username);
		$_SESSION["user"]=$user;
		header("Location: homepage.php");
	}
	else
	{
		echo "Login error, please try again<br>";
	}	
}

$conn->close();


//sanitization functions
function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}



?>

  </div>
</body>
</html>