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

<div style="margin: auto; width: 50%; padding: 10px; margin-top:20px;">
    <form method="post">
            <div class="form-group">
                <label for="inputPurchaseDate">Purchase Date</label>
                <input type="date" class="form-control" name="purchase_date" id="inputPurchaseDate">
            </div>
            <div class="form-group">
                <label for="inputExpirationDate">Expiration Date</label>
                <input type="date" class="form-control" name="expiration_date" id="inputExpirationDate" value=>
            </div>
            <div class="form-group">
                <label for="inputVehicleID">Vehicle ID</label>
                <input type="text" class="form-control" name="vehicle_id" id="inputVehicleID">
            </div>
            <div class="form-group">
                <label for="inputLotID">Lot ID</label>
                <input type="text" class="form-control" name="lot_id" id="inputLotID">
            </div><br>
        <button type="submit" class="btn btn-danger">Add Permit</button>

        </form>
</div>


<?php
require_once 'determinerole.php';
require_once 'uparking.php';
if(isset($_POST['purchase_date'])){

	$purchasedate = $_POST['purchase_date'];
	$expirationdate = $_POST['expiration_date'];
	$permittype = rand(25,75);
	$lotid = $_POST['lot_id'];
    $vehicleid = $_POST['vehicle_id'];
    // insert user into DB
    $sql = "INSERT permit SET PurchaseDate = '$purchasedate', ExpirationDate = '$expirationdate',
     PermitType='$permittype', LotID = '$lotid', VehicleID='$vehicleid'";
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