<!DOCTYPE html>
<html>
<head>
    <title>University Parking - Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   </head>
<body>
    <div style=" margin: auto;
  width: 50%;
  border: 3px solid red;
  border-radius: 25px;
  padding: 10px;
  margin-top:20px;">
<header>
        <h1>Welcome to University Parking</h1>
    </header>
<form  style="width:50%">
  <div class="form-group">
    <label for="inputEmail">Email address</label>
    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
  </div>
  <a href="HomePage.php" class="btn btn-danger">
    Login
  </a>
  <p style="margin-top:10px"> New to Uparking? </p>
  <a href="register.php" class="btn btn-danger">
    Register
  </a>
</form>
</div>


  
    <footer style=" margin: auto;
  width: 50%;">
        <p>&copy; <?php echo date("Y"); ?> University Parking. All rights reserved.</p>
    </footer>
</body>
</html>
