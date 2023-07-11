<?php
session_start();

// Destroy the session
session_destroy();
unset($_SESSION["user"]);

//login page
header("Location: login.php");
exit();
?>
