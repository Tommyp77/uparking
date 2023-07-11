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

<div class="container">
   
<h3 style="text-decoration-line: underline;">Add New Violation</h3>

    <div style="margin: auto; padding: 10px; margin-top:20px;">
    <form method="POST">
            <div>
                <div class="form-group">
                    <label for="inputDateIssued">Date Issued</label>
                    <input type="date" class="form-control" id="inputDateIssued" name="dateissued">
                </div>
                <div class="form-group">
                    <label for="inputViolationType">Violation Type</label>
                    <input type="text" class="form-control" id="inputViolationType" placeholder="Enter Violation Type"  name="violationtype">
                </div>
                <div class="form-group">
                    <label for="inputFee">Fee</label>
                    <input type="number" class="form-control" id="inputFee" placeholder="Enter Fee" name="fee">
                </div>
                <div class="form-group">
                    <label for="inputVehicleId">Vehicle ID</label>
                    <input type="text" class="form-control" id="inputVehicleId" placeholder="Enter Vehicle ID" name="vehicleid">
                </div>
            </div><br>
            <button type="submit" class="btn btn-danger" >Add Violation</button>
        </form>
    </div>

<?php
$page_roles = array("Staff");
require_once 'checksession.php';
require_once 'uparking.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['dateissued'])){

	$dateissued = $_POST['dateissued'];
	$violationtype = $_POST['violationtype'];
	$fee = $_POST['fee'];
	$vehicleid = $_POST['vehicleid'];
    
    // insert user into DB
    $sql = "INSERT violation
        SET DateIssued = '$dateissued', ViolationType = '$violationtype', Fee='$fee', VehicleID = '$vehicleid'";
         if ($conn->query($sql) === true) {
            header("Location: violation.php");
            exit();
        } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }

}
    

$conn->close();



?>
</div>
</body>
</html>