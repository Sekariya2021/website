<?php
    $server = "reservatiesdb.mysql.database.azure.com";
    $username = "sekariya";
    $password = "Prullenbak123";
    $database = "fonteyn";


    // Create connection
    $conn = new mysqli($server, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // escape variables for security
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_BCRYPT);

    // check if username already exists
    $sql_check = "SELECT username FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($result) > 0) {
        echo "This username is already taken. Please choose another username";
    } else {
        // insert data into mysql
        $sql="INSERT INTO users (username, password)
        VALUES ('$username', '$password')";

        if (!mysqli_query($conn,$sql)) {
        die('Error: ' . mysqli_error($conn));
        }
        echo "1 record added";
        header("Location: index.php");
    }

    // close connection
    mysqli_close($conn);
?>