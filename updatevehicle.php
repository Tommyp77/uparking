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
    $sql = "select * from vehicle where UID=$uid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo '<div style="margin: auto; width: 50%; padding: 10px; margin-top:20px;">
    <form method="POST">
        <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 20px;">
            <div class="form-group">
                <label for="inputLicense">License Plate Number</label>
                <input type="text" class="form-control" id="inputLicense" name="licenseplate" value=' . $row['LicensePlate'] . '>
            </div>
            <div class="form-group">
                <label for="inputYear">Vehicle Year</label>
                <input type="number" class="form-control" id="inputYear" name="year"value=' . $row['Year'] . '>
            </div>
            <div class="form-group">
                <label for="inputMake">Vehicle Make</label>
                <input type="text" class="form-control" id="inputMake" name="make" value=' . $row['Make'] . '>
            </div>
            <div class="form-group">
                <label for="inputModel">Vehicle Model</label>
                <input type="text" class="form-control" id="inputModel" name="model" value=' . $row['Model'] . '>
            </div>
    <input type="hidden" id="uid" name="uid" value=' . $uid . '>
            <div class="form-group">
                <label for="inputColor">Vehicle Color</label>
                <input type="text" class="form-control" id="inputColor" name="color" value=' . $row['Color'] . '>
            </div>
        </div><br>
        <button type="submit" class="btn btn-danger" name="addvehicle">Update Vehicle</button>
    </form>
</div>';
    
}
if(isset($_POST['licenseplate'])){

	$licenseplate = $_POST['licenseplate'];
	$year = $_POST['year'];
	$make = $_POST['make'];
	$model = $_POST['model'];
	$color = $_POST['color'];
    $uid = $_POST['uid'];
		
    // insert user into DB
    $sql = "UPDATE vehicle
        SET LicensePlate = '$licenseplate', Year = $year, Make='$make', Model = '$model', color='$color'
        WHERE uid=$uid";
         if ($conn->query($sql) === true) {
            header("Location: vehicle.php");
            exit();
        } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }

}

    $conn->close();



?>

</body>
</html>