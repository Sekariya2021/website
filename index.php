<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body style="background-image: url('vakantiepark.png');background-size: 80%;background-repeat: no-repeat;background-position: center;background-position-y: 30px;">
<!-- HTML -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
</br>
      <h3>Login</h3>
      <form action="auth.php" method="post">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" id ="user" name  = "user" placeholder="Enter username">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" id ="pass" name  = "pass" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-primary" id="btn">Submit</button>
      </form>
    </div>
  </div>
</div>
</body>
