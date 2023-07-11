<?php

//HW SQL database
$hn = "localhost:3306"; //host name
$db = "uparking"; //database
$un = "root"; //username
$pw = ""; //password

// Create a database connection
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>