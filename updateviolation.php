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
    $violationid = $_GET['violationid'];
    $sql = "select * from violation where ViolationID = $violationid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo '<div style="margin: auto; padding: 10px; margin-top:20px;">
    <form method="POST">
            <div>
                <div class="form-group">
                    <label for="inputDateIssued">Date Issued</label>
                    <input type="date" class="form-control" id="inputDateIssued" name="dateissued" value=' . $row['DateIssued'] . '>
                </div>
                <div class="form-group">
                    <label for="inputViolationType">Violation Type</label>
                    <input type="text" class="form-control" id="inputViolationType" value=' . $row['ViolationType'] . ' name="violationtype">
                </div>
                <div class="form-group">
                    <label for="inputFee">Fee</label>
                    <input type="number" class="form-control" id="inputFee" value=' . $row['Fee'] . ' name="fee">
                </div>
                <div class="form-group">
                    <label for="inputVehicleId">Vehicle ID</label>
                    <input type="text" class="form-control" id="inputVehicleId" value=' . $row['VehicleID'] . ' name="vehicleid">
                </div>
                <input type="hidden" id="violationid" name="violationid" value=' . $violationid . '>
            </div><br>
            <button type="submit" class="btn btn-danger" >Update Violation</button>
        </form>
    </div>';
    
}
if(isset($_POST['dateissued'])){

	$dateissued = $_POST['dateissued'];
	$violationtype = $_POST['violationtype'];
	$fee = $_POST['fee'];
	$vehicleid = $_POST['vehicleid'];
    $violationid = $_POST['violationid'];

    
    // insert user into DB
    $sql = "UPDATE violation
        SET DateIssued = '$dateissued', ViolationType = '$violationtype', Fee='$fee', VehicleID = '$vehicleid' where ViolationID=$violationid";
         if ($conn->query($sql) === true) {
            header("Location: violation.php");
            exit();
        } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }

}

    $conn->close();



?>

</body>
</html>