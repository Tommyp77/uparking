<!DOCTYPE html>
<html>
<head>
    <title>University Parking - Home</title>
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
        require_once 'uparking.php';
        require_once 'determinerole.php';

        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);
        $sql = "";
        if (determineRole('Staff')){
            $user = $_SESSION['user'];
            $uid = $user->uid;
   echo ' <a  href="addvehicle.php?uid=' . $uid . ' "> <button style="margin-top:15px" type="button" class="btn btn-info">Add Vehicle</button></a>';
            echo '<h3 style="text-decoration-line: underline;">All Current Vehicles</h3>';
            $sql = "SELECT * FROM vehicle";
        }else {
            echo '<h3 style="text-decoration-line: underline;">Your Current Vehicles</h3>';
            $user = $_SESSION['user'];
            $uid = $user->uid;
   echo ' <a  href="addvehicle.php?uid=' . $uid . ' "> <button style="margin-top:15px" type="button" class="btn btn-info">Add Vehicle</button></a>';

            $sql ="SELECT * FROM vehicle WHERE UID='$uid' ";
        }
        $result = $conn->query($sql);
    
        
        if ($result->num_rows > 0) {
            echo '<table class="table" style="width: 80%; margin: 0 auto;">
                <thead>
                    <tr>
                        <th>Vehicle ID</th>
                        <th>License Plate Number</th>
                        <th>Vehicle Year</th>
                        <th>Vehicle Make</th>
                        <th>Vehicle Model</th>
                        <th>Vehicle Color</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['VehicleID'] . "</td>";
                echo "<td>" . $row['LicensePlate'] . "</td>";
                echo "<td>" . $row['Year'] . "</td>";
                echo "<td>" . $row['Make'] . "</td>";
                echo "<td>" . $row['Model'] . "</td>";
                echo "<td>" . $row['Color'] . "</td>";
                echo '<td>
                <a href="updatevehicle.php?uid=' . $row['UID'] . '"> <button type="button" class="btn btn-info">Update</button></a>
                <a href="deletevehicle.php?uid=' . $row['UID'] . '"> <button type="button" class="btn btn-info">Delete</button></a>

                      </td>';
                echo "</tr>";
            }
            echo '</tbody>
            </table>';
        } else {
            echo "<p>No vehicles found.</p>";
        }
    

            $conn->close();
            ?>
    </div><br>
</body>
</html>
