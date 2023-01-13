<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    #myInput {
      background-position: 10px 10px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }
  </style>
</head>

<body style="background-image: url('vakantiepark.png');background-size: 80%;background-repeat: no-repeat;background-position: center;background-position-y: 30px;">
  <div class="container">
    <h2>Dashboard</h2>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    <a href="reservation.php" class="btn btn-primary">Reserveren</a>
    <a href="parkeren.php" class="btn btn-primary">Parkeren</a>
  </br>
  </br>
    <table class="table table-bordered table-striped" id="myTable">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Amount</th>
          <th>Time</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          //Connect to database
          $con = mysqli_connect("reservatiesdb.mysql.database.azure.com", "sekariya", "Prullenbak123", "fonteyn");
          //Query the database
          $query = "SELECT firstname, lastname, email, amount, time FROM reservaties";
          $result = mysqli_query($con, $query);
          //Loop through the results
          while($row = mysqli_fetch_array($result)) {?>
          <tr>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <td><a href="delete.php?email=<?php echo $row['email']; ?>" class="btn btn-danger">Delete</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
  </script>
</body>
</html>