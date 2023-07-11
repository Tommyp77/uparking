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
if(isset($_GET['permitid'])){
	
    $permitid = $_GET['permitid'];
    $uid = $_GET['uid'];
    echo '<div style="margin: auto; width: 50%; padding: 10px; margin-top:20px;">
    <form method="POST">
        <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 20px;">
            <div class="form-group">
                <label for="card">Card Number</label>
                <input type="number" class="form-control" id="card" name="card">
            </div>
            <div class="form-group">
                <label for="amount">Payment Amount</label>
                <input type="number" class="form-control" id="amount" name="amount">
            </div>
        <input type="hidden" id="uid" name="uid" value=' . $uid . '>
        <input type="hidden" id="permitid" name="permitid" value=' . $permitid . '>
        </div><br>
        <button type="submit" class="btn btn-danger">Pay Violation</button>
    </form>
</div>';
    
}
if(isset($_POST['card'])){

	$card = $_POST['card'];
	$amount = $_POST['amount'];
    $permitid = $_POST['permitid'];
    $uid = $_POST['uid'];
		
    // insert user into DB
    $sql = "INSERT payment
        SET CardNo = $card, AmountPaid = $amount, PermitID='$permitid', uid = '$uid'";
         if ($conn->query($sql) === true) {
            
        } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }
    $sql = "DELETE 
        FROM permit where PermitID='$permitid'";
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