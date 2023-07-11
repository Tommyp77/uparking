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
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
    $sql = "";
    if (determineRole("Staff")){
        echo '<h3 style="text-decoration-line: underline; text-align: center;">All Current Drivers</h3>';
        echo '<a  href="addaccount.php"> <button style="margin-top:15px" type="button" class="btn btn-info">Admin Add User</button></a>';
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table>
            <tr>
                <th>UID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Middle Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Roles</th>
            </tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row['UID'] . '</td>
                    <td>' . $row['FirstName'] . '</td>
                    <td>' . $row['LastName'] . '</td>
                    <td>' . $row['MiddleName'] . '</td>
                    <td>' . $row['Email'] . '</td>
                    <td>' . $row['Username'] . '</td>
                    <td>' . $row['Role'] . '</td>
                    <td>
                        <a href="updateaccount.php?uid=' . $row['UID'] . '"> <button type="button" class="btn btn-info">Update</button></a>
                        <a href="deleteaccount.php?uid=' . $row['UID'] . '"> <button type="button" class="btn btn-info">Delete</button></a>
                    </td>
                </tr>';
        }
        echo '</table><br>';
    } else {
        echo 'No users found<br><br>';
    }
    }else{
        echo '<h3 style="text-decoration-line: underline; text-align: center;">My Account</h3>';
        $user = $_SESSION['user'];
        $sql = "SELECT * FROM user WHERE UID='$user->uid' ";
        $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>
            <tr>
                <th>UID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Middle Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Roles</th>
            </tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row['UID'] . '</td>
                    <td>' . $row['FirstName'] . '</td>
                    <td>' . $row['LastName'] . '</td>
                    <td>' . $row['MiddleName'] . '</td>
                    <td>' . $row['Email'] . '</td>
                    <td>' . $row['Username'] . '</td>
                    <td>' . $row['Role'] . '</td>
                    <td>
                    <a href="updateaccount.php?uid=' . $row['UID'] . '"> <button type="button" class="btn btn-info">Update</button></a>
                    </td>
                </tr>';
        }
        echo '</table><br>';
    } else {
        echo 'No users found<br><br>';
    }
    }
    
    $conn->close();

?>

</body>
</html>