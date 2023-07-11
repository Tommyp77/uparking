<?php

require_once 'uparking.php';

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

    <script>
        function updateVehicle(vehicleId) {
            console.log('Updating vehicle with ID: ' + vehicleId);
        }

                function deleteVehicle(vehicleId) {
            console.log('Deleting vehicle with ID: ' + vehicleId);
        }
    </script>
	
	<!DOCTYPE html>
<html>
<head>
    <title>University Parking - Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            margin: 0 auto;
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

<h3 style="text-decoration-line: underline; text-align: center;">All Current Drivers</h3>

<?php
require_once 'uparking.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
			<th>Middle Name</th>
			<th>Email</th>
			<th>Username</th>
			<th>Roles</th>
        </tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['FirstName'] . '</td>
                <td>' . $row['LastName'] . '</td>
				<td>' . $row['MiddleName'] . '</td>
				<td>' . $row['Email'] . '</td>
				<td>' . $row['Username'] . '</td>
				<td>' . $row['Roles'] . '</td>
            </tr>';
    }
    echo '</table><br>';
} else {
    echo 'No users found<br><br>';
}

$conn->close();
?>

</body>
</html>