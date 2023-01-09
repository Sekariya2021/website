<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Reservation</title>
</head>
<body>
<div class="container">
    <br>
    <br>
    <h1>Reservation</h1>
    <br>
    <br>
    <form action="reservation.php" method="post">
        <div class="form-group">
            <label for="firstname">Firstname:</label>
            <input type="text" class="form-control" name="firstname" placeholder="John">
        </div>
        <div class="form-group">
            <label for="lastname">Lastname:</label>
            <input type="text" class="form-control" name="lastname" placeholder="Doe">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" placeholder="johndoegmail.com">
        </div>
        <div class="form-group">
            <label for="amount">Aantal mensen:</label>
            <input type="text" class="form-control" name="amount" placeholder="5">
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
                <select type="text" class="form-control" name="time" id="time">
                    <option>9 AM</option>
                    <option>10 AM</option>
                    <option>11 AM</option>
                    <option>12 PM</option>
                    <option>13 PM</option>
                    <option>14 PM</option>
                    <option>15 PM</option>
                    <option>16 PM</option>
                    <option>17 PM</option>
                </select>
        </div>
        <button type="submit" class="btn btn-primary">Reserveer</button>
        </br>
        </br>
        <label for="time">Reservaties inzien druk op de knop hieronder.</label>
        </br>
        <a href="dashboard.php" class="btn btn-primary">Reservaties</a>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

<?php
if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['amount'], $_POST['time'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $time = $_POST['time'];
 
    $data = array(
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'amount' => $amount,
        'time' => $time
    );
 
    $url = 'http://localhost:8080/create';
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode( $data ),
            'header'=>  "Content-Type: application/json\r\n" .
                        "Accept: application/json\r\n"
        )
    );
 
    $context  = stream_context_create( $options );
    $result = @file_get_contents( $url, false, $context );
    if ($result === false) {
        // error handling
    } else {
        $response = json_decode( $result );
    }
}
?>
