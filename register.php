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
        <h1>Please Create Your Account</h1>
    </header>
<form  style="width:50%">
<fieldset>
  <p>Account Type:</p>
    <div>
      <input type="radio" id="inputStudent" name="contact" value="text" />
      <label for="inputStudent">Student</label>

      <input type="radio" id="inputFaculty" name="contact" value="text" />
      <label for="inputFaculty">Faculty</label>

      <input type="radio" id="inputGuest" name="contact" value="text" />
      <label for="inputGuest">Guest</label>
    </div>
  </fieldset>
<div class="form-group">
    <label for="inputUsername"> Username</label>
    <input type="text" class="form-control" id="inputUsername" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="inputFirstName">Password</label>
    <input type="password" class="form-control" id="inputFirstName" placeholder="Enter Password">
  </div>
  <div class="form-group">
    <label for="inputFirstName">First Name</label>
    <input type="text" class="form-control" id="inputFirstName"  placeholder="Enter Email">
  </div>
  <div class="form-group">
    <label for="inputMiddleName">Middle Name</label>
    <input type="text" class="form-control" id="inputMiddleName"  placeholder="Middle Name">
  </div>
  <div class="form-group">
    <label for="inputLastName">Last Name</label>
    <input type="text" class="form-control" id="inputLastName"  placeholder="Last Name">
  </div>
  <div class="form-group">
    <label for="inputEmail">Email address</label>
    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <a href="HomePage.php" class="btn btn-danger">
    Create Account
  </a>
</form>
</div>

</body>
</html>
