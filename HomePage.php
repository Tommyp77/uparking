<!DOCTYPE html>
<html>
<head>
    <title>University Parking - Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   </head>
<body>
    <header>
        <h1>Welcome to University Parking</h1>
    </header>
  <div class="container-fluid" style="background-color: #FF0000;color:white">
    <ul class="nav navbar-nav">
      <li class="active"><a  href="#">Home</a></li>
      <li><a href="vehicles.php">Vehicles</a></li>
      <li><a href="drivers.php">Drivers</a></li>

    </ul>
  </div>
</nav>  
<h2>Welcome to your Homepage, User!</h2>
  <div style="margin: auto;
  width: 50%;">
        <h3 style="text-decoration-line: underline;">Your Current Vehicles</h3>
        <h3 style="text-decoration-line: underline;">Your Current Permits</h3>
    </div>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> University Parking. All rights reserved.</p>
    </footer>

</body>
</html>
