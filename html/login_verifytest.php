<?php
    session_start();
    include('PDO_connect.php');
    $email = $_POST["email"];
    $password = $_POST["pass"];
    
        $sql = sprintf("SELECT * FROM users WHERE email='%s' AND password='%s'", $email, $password);
        $result = $conn->query($sql);
       
        if ($result->rowCount() == 1) {
            $_SESSION["valid"] = '1';
            header("Location: home.php");
        } else {
            $_SESSION["status_message"] = "invalid";
            header("Location: login.php");
        }
    
?>
