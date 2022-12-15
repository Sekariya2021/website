<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body style="background-image: url('vakantiepark.png');background-size: 80%;background-repeat: no-repeat;background-position: center;background-position-y: 30px;">
<!-- HTML -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
</br>
      <h3>Login</h3>
      <form action="" method="post">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
</body>
<!-- PHP -->
<?php
  if (isset($_POST['username']) && isset($_POST['password'])) 
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to database
    $host = "reservatiesdb.mysql.database.azure.com";
    $dbUsername = "sekariya";
    $dbPassword = "Prullenbak123";
    $dbname = "fonteyn";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query
    $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Login success
      header("Location: dashboard.php");
    } else {
      // Login failed
      echo "Error: Login failed";
    }
  }
?>