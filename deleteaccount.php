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
$page_roles = array("Staff");
require_once 'checksession.php';
require_once 'uparking.php';
if(isset($_GET['uid'])){
	$uid = $_GET['uid'];
    $sql = "DELETE FROM user WHERE uid = $uid;";
    $result = $conn->query($sql);
    header("Location: account.php");
    exit();
}
    $conn->close();



?>

</body>
</html>