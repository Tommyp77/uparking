<!DOCTYPE html>
<html>
<head>
    <title>University Parking - Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            margin: 0 auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
        }
    </style>
</head>
<body>
<h1>University Parking</h1>
<nav>
  <div class="navbar">
    <a href="homepage.php">Home</a>
    <a href="account.php">Account</a>    
	<a href="vehicle.php">Vehicle</a> 
	<a href="permit.php">Permit</a> 
	<a href="violation.php">Violation</a> 
    <a href="logout.php">Log Out</a>
  </div>
</nav>  



<?php
require_once 'determinerole.php';
require_once 'uparking.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
if(isset($_GET['uid'])){
	
	$uid = $_GET['uid'];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo '<form method="POST">
    <label for="firstname">
    First Name:</label>
    <input type="text" id="firstname" name="firstname" required value=' . $row['FirstName'] . '><br><br> 
    
    <label for="middle-name">
    Middle Name:</label>
    <input type="text" id="middlename" name="middlename" value=' . $row['MiddleName'] . '><br><br>
    
    <label for="last-name">
    Last Name:</label>
    <input type="text" id="lastname" name="lastname" required value=' . $row['LastName'] . '><br><br>
    
    <label for="email">
    Email:</label>
    <input type="email" id="email" name="email" required value=' . $row['Email'] . '><br><br>
    
    <label for="username">
    Username:</label>
    <input type="text" id="username" name="username" required value=' . $row['Username'] . '><br><br>
    <input type="hidden" id="uid" name="uid" value=' . $row['UID'] . '>
    <label for="role">
    ';
    if ($row['Role'] != "Staff"){
        echo 'Account Type:</label>
        <select id="role" name="role">
          <option value="User" selected>user</option>
          <option value="Staff">admin</option>
                </select><br><br>
        <input type="submit" value="Save">
      </form>';
    }else{
    echo 'Account Type:</label>
    <select id="role" name="role">
      <option value="User">user</option>
      <option value="Staff" selected>admin</option>
            </select><br><br>
    <input type="submit" value="Save">
  </form>';
    }
    
}
if(isset($_POST['username'])){

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$middlename = $_POST['middlename'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$role = $_POST['role'];
    $uid = $_POST['uid'];
		
    // insert user into DB
    $sql = "UPDATE user
        SET FirstName = '$firstname', LastName = '$lastname', MiddleName='$middlename', Email = '$email', Username='$username', 
        Role='$role'
        WHERE uid=$uid;";

    if ($conn->query($sql) === true) {
        echo "User added successfully";
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }
    header("Location: account.php");
    exit();
}

    $conn->close();



?>

</body>
</html>