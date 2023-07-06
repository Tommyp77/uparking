<!DOCTYPE html>
<html>
<head>
    <title>University Parking - Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script>
        function updateVehicle(vehicleId) {
            console.log('Updating vehicle with ID: ' + vehicleId);
        }
        

                function deleteVehicle(vehicleId) {
            console.log('Deleting vehicle with ID: ' + vehicleId);
        }
    </script>
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

    <h3 style="text-decoration-line: underline; text-align: center;">Add New Vehicle</h3>

    <div style="margin: auto; width: 50%; padding: 10px; margin-top:20px;">
        <form>
            <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 20px;">
                <div class="form-group">
                    <label for="inputLicense">License Plate Number</label>
                    <input type="text" class="form-control" id="inputLicense" placeholder="Enter Plate Number">
                </div>
                <div class="form-group">
                    <label for="inputYear">Vehicle Year</label>
                    <input type="number" class="form-control" id="inputYear" placeholder="Enter Vehicle Year">
                </div>
                <div class="form-group">
                    <label for="inputMake">Vehicle Make</label>
                    <input type="text" class="form-control" id="inputMake" placeholder="Enter Vehicle Make">
                </div>
                <div class="form-group">
                    <label for="inputModel">Vehicle Model</label>
                    <input type="text" class="form-control" id="inputModel" placeholder="Enter Vehicle Model">
                </div>
                <div class="form-group">
                    <label for="inputColor">Vehicle Color</label>
                    <input type="text" class="form-control" id="inputColor" placeholder="Enter Vehicle Color">
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Add Vehicle</button>
        </form>
    </div>

    <h3 style="text-decoration-line: underline; text-align: center;">Your Current Vehicles</h3>

    <table class="table">
        <thead>
            <tr>
                <th>License Plate Number</th>
                <th>Vehicle Year</th>
                <th>Vehicle Make</th>
                <th>Vehicle Model</th>
                <th>Vehicle Color</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ABC123</td>
                <td>2022</td>
                <td>Toyota</td>
                <td>Camry</td>
                <td>Red</td>
                <td>
                    <button class="btn btn-warning" onclick="updateVehicle(1)">Update</button>
                    <button class="btn btn-danger" onclick="deleteVehicle(1)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
    
</body>
</html>
