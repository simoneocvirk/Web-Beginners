<?php
    session_start();
    include('/home/ubuntu/mysql_auth.php');
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $servername = "localhost";
    $database = "cs4ww3project";
    $conn = new mysqli($servername, $dbusername, $dbpassword, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = sprintf("SELECT * FROM users WHERE email='%s' AND password='%s'", $email, $password);
        $result = $conn->query($sql);
        if (!$result) {
            die('Invalid query: ' . $conn->error);
        }
        if ($result->num_rows == 1) {
            $_SESSION["valid"] = '1';
            header("Location: home.php");
        } else {
            $_SESSION["status_message"] = "invalid";
            header("Location: login.php");
        }
    }
?>
