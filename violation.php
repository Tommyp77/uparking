<!DOCTYPE html>
<html>
<head>
    <title>University Parking - Violation</title>
    <link rel="stylesheet" href="style.css">
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

    <div style="text-align: center;">
    <?php
    require_once 'determinerole.php';
    require_once 'uparking.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    if(determineRole("Staff")){
        echo '<a  href="addviolation.php"> <button style="margin-top:15px" type="button" class="btn btn-info">Add Violation</button></a>';
        echo '<h3 style="text-decoration-line: underline;">All Current Violations</h3>';
        $sql = "SELECT *
        FROM user u
        JOIN vehicle v ON u.uid = v.uid
        JOIN violation v1 ON v.vehicleID = v1.vehicleID";
        $result = $conn->query($sql);
        echo 
            '<table class="table" style="width: 80%; margin: 0 auto;">
                <thead>
                    <tr>
                    <th>Date Issued</th>
                    <th>Violation Type</th>
                    <th>Fee</th>
                    <th>Vehicle ID</th>
                    <th>Actions</th>
                    </tr>
                </thead>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row['DateIssued'] . '</td>
                    <td>' . $row['ViolationType'] . '</td>
                    <td>' . $row['Fee'] . '</td>
                    <td>' . $row['VehicleID'] . '</td>
                    <td>
                    <a href="updateviolation.php?uid=' . $row['UID'] . '"> <button type="button" class="btn btn-info">Update</button></a>
                    <a href="deleteviolation.php?uid=' . $row['UID'] . '"> <button type="button" class="btn btn-info">Delete</button></a>
                    </td>
                </tr>';
        }
        echo '</table><br>';
    }else{
    echo '<h3 style="text-decoration-line: underline;">Your Current Violations</h3>';
        $user = $_SESSION['user'];
        $sql = "SELECT *
        FROM user u
        JOIN vehicle v ON u.uid = v.uid
        JOIN violation v1 ON v.vehicleID = v1.vehicleID
        WHERE u.uid = '$user->uid';";
        $result = $conn->query($sql);
        echo 
            '<table class="table" style="width: 80%; margin: 0 auto;">
                <thead>
                    <tr>
                    <th>Date Issued</th>
                    <th>Violation Type</th>
                    <th>Fee</th>
                    <th>Vehicle ID</th>
                    <th>Actions</th>
                    </tr>
                </thead>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row['DateIssued'] . '</td>
                    <td>' . $row['ViolationType'] . '</td>
                    <td>' . $row['Fee'] . '</td>
                    <td>' . $row['VehicleID'] . '</td>
                    <td>
                    <a href="payviolation.php?uid=' . $user->uid . '&violationid=' . $row['ViolationID'] . '"> <button type="button" class="btn btn-info">Pay</button></a>
                    </td>
                </tr>';
        }
        echo '</table><br>';
    }
    
    
    ?>
</body>
</html>