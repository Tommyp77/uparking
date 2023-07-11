<!DOCTYPE html>
<html>
<head>
    <title>University Parking - Permits</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 80%;
            margin: 0 auto;
        }

        .table-row {
            display: flex;
            justify-content: space-between;
        }

        .table-cell {
            flex-basis: 48%;
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



<a  href="addpermit.php"> <button style="margin-top:15px" type="button" class="btn btn-info">Add Permit</button></a>




    <div style="text-align: center;">
    <?php
    require_once 'determinerole.php';
    require_once 'uparking.php';
    $user = False;
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    if(determineRole("Staff")){
        $sql = "SELECT *
        FROM user u
        JOIN vehicle v ON u.uid = v.uid
        JOIN permit p ON v.vehicleID = p.vehicleID
        JOIN parkinglot pl ON p.LotID = pl.LotID;";
        echo '<h3 style="text-decoration-line: underline;">All Permits</h3>';
        $result = $conn->query($sql);
    echo 
        '<table class="table" style="width: 80%; margin: 0 auto;">
            <thead>
                <tr>
                    <th>Purchase Date</th>
                    <th>Expiration Date</th>
                    <th>Vehicle ID</th>
                    <th>Permit ID</th>
                    <th>Permit Type</th>
                    <th>Lot Address</th>
                    <th>Lot City</th>
                    <th>Lot State</th>
                    <th>Lot Zipcode</th>
                    <th>Lot Capacity</th>
                    <th>Actions</th>
                </tr>
            </thead>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['PurchaseDate'] . '</td>
                <td>' . $row['ExpirationDate'] . '</td>
                <td>' . $row['VehicleID'] . '</td>
                <td>' . $row['PermitID'] . '</td>
                <td>' . $row['PermitType'] . '</td>
                <td>' . $row['StreetAddress'] . '</td>
                <td>' . $row['City'] . '</td>
                <td>' . $row['State'] . '</td>
                <td>' . $row['ZipCode'] . '</td>
                <td>' . $row['Capacity'] . '</td>
                <td>
                <a href="updatepermit.php?uid=' . $row['UID'] . '"> <button type="button" class="btn btn-info">Update</button></a>
                <a href="deletepermit.php?uid=' . $row['UID'] . '"> <button type="button" class="btn btn-info">Delete</button></a>
                </td>
            </tr>';
    }
    echo '</table><br>';
    }else{
        $user = $_SESSION['user'];
        $sql = "SELECT *
        FROM user u
        JOIN vehicle v ON u.uid = v.uid
        JOIN permit p ON v.vehicleID = p.vehicleID
        JOIN parkinglot pl ON p.LotID = pl.LotID
        WHERE u.uid = '$user->uid';";
        echo '<h3 style="text-decoration-line: underline;">Your Permits</h3>';
        $user = True;
        $result = $conn->query($sql);
    echo 
        '<table class="table" style="width: 80%; margin: 0 auto;">
            <thead>
                <tr>
                    <th>Purchase Date</th>
                    <th>Expiration Date</th>
                    <th>Vehicle ID</th>
                    <th>Permit ID</th>
                    <th>Permit Price</th>
                    <th>Lot Address</th>
                    <th>Lot City</th>
                    <th>Lot State</th>
                    <th>Lot Zipcode</th>
                    <th>Lot Capacity</th>
                    <th>Actions</th>
                </tr>
            </thead>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['PurchaseDate'] . '</td>
                <td>' . $row['ExpirationDate'] . '</td>
                <td>' . $row['VehicleID'] . '</td>
                <td>' . $row['PermitID'] . '</td>
                <td>' . $row['PermitType'] . '</td>
                <td>' . $row['StreetAddress'] . '</td>
                <td>' . $row['City'] . '</td>
                <td>' . $row['State'] . '</td>
                <td>' . $row['ZipCode'] . '</td>
                <td>' . $row['Capacity'] . '</td>
                <td>
                <a href="paypermit.php?permitid=' . $row['PermitID'] . '&uid=' . $row['UID'] . '"> <button type="button" class="btn btn-info">Pay</button></a>
                </td>
            </tr>';
    }
    echo '</table><br>';
    }
    
    
   
    
    if ($user){
        echo '<h3 style="text-decoration-line: underline;">Lots</h3>';
        $sql = "SELECT * from parkinglot";
        $result = $conn->query($sql);
        echo 
            '<table class="table" style="width: 80%; margin: 0 auto;">
                <thead>
                    <tr>
                        <th>Lot ID</th>
                        <th>Lot Address</th>
                        <th>Lot City</th>
                        <th>Lot State</th>
                        <th>Lot Zipcode</th>
                        <th>Lot Capacity</th>
                    </tr>
                </thead>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
            <td>' . $row['LotID'] . '</td>
            <td>' . $row['StreetAddress'] . '</td>
            <td>' . $row['City'] . '</td>
            <td>' . $row['State'] . '</td>
            <td>' . $row['ZipCode'] . '</td>
            <td>' . $row['Capacity'] . '</td>    
                </tr>';
        }
        echo '</table><br>';
    }
    ?>
</body>
</html>