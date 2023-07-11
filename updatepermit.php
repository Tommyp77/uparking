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
    echo '<div style="margin: auto; width: 50%; padding: 10px; margin-top:20px;">
    <form method="post">
            <div class="form-group">
                <label for="inputPurchaseDate">Purchase Date</label>
                <input type="date" class="form-control" name="purchase_date" id="inputPurchaseDate" value=' . $row['PurchaseDate'] . '>
            </div>
            <div class="form-group">
                <label for="inputExpirationDate">Expiration Date</label>
                <input type="date" class="form-control" name="expiration_date" id="inputExpirationDate" value=' . $row['ExpirationDate'] . '>
            </div>
            <div class="form-group">
                <label for="inputVehicleID">Vehicle ID</label>
                <input type="text" class="form-control" name="vehicle_id" id="inputVehicleID"value=' . $row['VehicleID'] . '>
            </div>
            <div class="form-group">
                <label for="inputPermitType">Permit Type</label>
                <input type="text" class="form-control" name="permit_type" id="inputPermitType" value=' . $row['PermitType'] . '>
            </div>
            <div class="form-group">
                <label for="inputLotID">Lot ID</label>
                <input type="text" class="form-control" name="lot_id" id="inputLotID" value=' . $row['LotID'] . '>
            </div><br>
        <input type="hidden" id="permitid" name="permitid" value=' . $row['PermitID'] . '>

        <button type="submit" class="btn btn-danger" name="addvehicle">Update Permit</button>

        </form>
</div>';
    
}
if(isset($_POST['purchase_date'])){

	$purchasedate = $_POST['purchase_date'];
	$expirationdate = $_POST['expiration_date'];
	$permittype = $_POST['permit_type'];
	$lotid = $_POST['lot_id'];
    $permitid = $_POST['permitid'];
		
    // insert user into DB
    $sql = "UPDATE permit
        SET PurchaseDate = '$purchasedate', ExpirationDate = '$expirationdate', PermitType='$permittype', LotID = '$lotid' where PermitID='$permitid'";
         if ($conn->query($sql) === true) {
            header("Location: permit.php");
            exit();
        } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }

}

    $conn->close();



?>

</body>
</html>