<!DOCTYPE html>
<html>
<head>
    <title>University Parking - Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   </head>
<body>
<nav>
  <div class="container-fluid" style="background-color: #FF0000;color:white">
    <ul class="nav navbar-nav">
      <li class="active"><a  href="HomePage.php">Home</a></li>
      <li><a href="vehicles.php">Vehicles</a></li>
      <li><a href="drivers.php">Drivers</a></li>
      <li><a href="drivers.php">Logout</a></li>
    </ul>
  </div>
</nav>  
<h3 style="text-decoration-line: underline; text-align: center;">Add New Driver</h3>

<div style=" margin: auto;
  width: 50%;
  padding: 10px;
  margin-top:20px;">
<form  style="width:50%">


  <div style="display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 20px;">
<div class="form-group">
    <label for="inputDriverUsername"> Driver Username</label>
    <input type="text" class="form-control" id="inputDriverUsername" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="inputDriverPassword">Driver Password</label>
    <input type="password" class="form-control" id="inputDriverPassword" placeholder="Enter Password">
  </div>
  <div class="form-group">
    <label for="inputDriverFirstName">First Name</label>
    <input type="text" class="form-control" id="inputDriverFirstName"  placeholder="Enter First Name">
  </div>
  <div class="form-group">
    <label for="inputDriverMiddleName">Driver Middle Name</label>
    <input type="text" class="form-control" id="inputDriverMiddleName"  placeholder="Enter Middle Name">
  </div>
  <div class="form-group">
    <label for="inputDriverLastName">Last Name</label>
    <input type="text" class="form-control" id="inputDriverLastName"  placeholder="Enter Last Name">
  </div>
  <div class="form-group">
    <label for="inputDriverEmail">Driver Email address</label>
    <input type="email" class="form-control" id="inputDriverEmail" placeholder="Enter Email">
  </div>
  </div>
  <fieldset>
  <p>Driver Role:</p>
    <div>
      <input type="radio" id="inputStudent" name="contact" value="text" />
      <label for="inputStudent">Student</label>

      <input type="radio" id="inputFaculty" name="contact" value="text" />
      <label for="inputFaculty">Faculty</label>

      <input type="radio" id="inputGuest" name="contact" value="text" />
      <label for="inputGuest">Guest</label>
      <input type="radio" id="inputSuperuser" name="contact" value="text" />
      <label for="inputSuperuser">Super User</label>
    </div>
  </fieldset>

  <a href="HomePage.php" class="btn btn-danger">
    Add Driver
  </a>
</form>
</div>
<h3 style="text-decoration-line: underline; text-align: center;">All Current Drivers</h3>

</body>
</html>
