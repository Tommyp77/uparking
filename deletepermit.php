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
if(isset($_GET['uid'])){
	$uid = $_GET['uid'];
    $sql = "SELECT *
    FROM user u
    JOIN vehicle v ON u.uid = v.uid
    JOIN permit p ON v.vehicleID = p.vehicleID
    JOIN parkinglot pl ON p.LotID = pl.LotID
    WHERE u.uid = '$uid';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $permitid = $row["PermitID"];
    $sql = "DELETE FROM permit WHERE PermitID = $permitid;";
    $result = $conn->query($sql);
    header("Location: permit.php");
    exit();
}
    $conn->close();



?>

</body>
</html>