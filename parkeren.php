<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Parkeren</title>
</head>
<body>
<div class="container">
    <br>
    <br>
    <h1>Parkeren</h1>
    <br>
    <br>
    <form action="parkeren.php" method="post">

        <div class="form-group">
            <label for="kenteken">Kenteken:</label>
            <input type="text" class="form-control" name="kenteken" placeholder="K12-B4-M9">
        </div>
        <button type="submit" class="btn btn-primary">Reserveer Parkeerplaats</button>
        <a href="dashboard.php" class="btn btn-primary">Terug naar dashboard</a>
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
if (isset($_POST['kenteken'])) {
    $kenteken = $_POST['kenteken'];
    if(strlen($kenteken) >= 6) {
        $data = array(
            'kenteken' => $kenteken
        );
     
        $url = 'http://localhost:8080/storeKenteken';
        $options = array(
            'http' => array(
                'method'  => 'POST',
                'content' => json_encode( $data ),
                'header'=>  "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n"
            )
        );
     
        $context  = stream_context_create( $options );
        $result = file_get_contents( $url, false, $context );
        $response = json_decode( $result );
    } else {
        echo 'The kenteken should have 6 characters';
    }
}
?>
