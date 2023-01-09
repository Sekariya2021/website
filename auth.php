
<?php
    // connect to database
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
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // check if username exists
    $sql_check = "SELECT username FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($result) == 0) {
        echo "This username does not exist. Please try again";
    } else {
        // get hashed password from database
        $sql_check = "SELECT password FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql_check);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $hashed_password = $row["password"];
            }
        }
        // check if password is correct
        if (password_verify($password, $hashed_password)) {
            echo "Login successful";
            header("Location: dashboard.php");
        } else {
            echo "Password incorrect. Please try again";
        }
    }

    // close connection
    mysqli_close($conn);
?>