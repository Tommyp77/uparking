<!DOCTYPE html>
<html>
<head>
  <title>University Parking</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <!-- Registration form -->
    <h1>Register</h1>
    <form action="register.php" method="POST">
      <label for="firstname">
	  First Name:</label>
      <input type="text" id="firstname" name="firstname" required><br><br> 
	  
      <label for="middle-name">
	  Middle Name:</label>
      <input type="text" id="middlename" name="middlename"><br><br>
      
      <label for="last-name">
	  Last Name:</label>
      <input type="text" id="lastname" name="lastname" required><br><br>
      
      <label for="email">
	  Email:</label>
      <input type="email" id="email" name="email" required><br><br>
      
      <label for="username">
	  Username:</label>
      <input type="text" id="username" name="username" required><br><br>
      
      <label for="password">
	  Password:</label>
      <input type="password" id="password" name="password" required><br><br>
      
      <label for="role">
	  Account Type:</label>
      <select id="role" name="role">
        <option value="User">user</option>
        <option value="Staff">admin</option>
		      </select><br><br>
      <input type="submit" value="Register">
	  <button onclick="window.location.href = 'login.php';">Go Back</button>
    </form>


<?php

require_once 'uparking.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['username'])){

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$middlename = $_POST['middlename'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	
	$token = password_hash($password,PASSWORD_DEFAULT);
	
    // insert user into DB
    $sql = "INSERT INTO user (firstname, lastname, middlename, email, username, password, role)
            VALUES ('$firstname', '$lastname', '$middlename', '$email', '$username', '$token', '$role')";

		    if ($conn->query($sql) === true) {
        echo "User added successfully";
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }
}
$conn->close();
?>
  </div>
</body>
</html>