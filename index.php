<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body style="background-image: url('vakantiepark.png');background-size: 80%;background-repeat: no-repeat;background-position: center;background-position-y: 30px;">
<script
			  src="https://code.jquery.com/jquery-3.6.3.min.js"
			  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
			  crossorigin="anonymous">
  </script>
<script src="https://cdn.auth0.com/js/auth0-spa-js/2.0/auth0-spa-js.production.js"></script>
<!-- HTML -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
</br>
      <h3>Login</h3>
      <form action="www/auth.php" method="post">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" id ="user" name  = "user" placeholder="Enter username">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" id ="pass" name  = "pass" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-primary" id="btn">Login</button>
        <a href="register.php" class="btn btn-primary">Register</a>
      </form>
    </div>
  </div>
</div>
</body>
