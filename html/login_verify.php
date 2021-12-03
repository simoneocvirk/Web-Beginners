<!-- set up php for file -->
<?php
    session_start();
    include('PDO_connect.php');
    // get values from page 
    $email = $_POST["email"];
    $password = $_POST["pass"];
        
        // sql query for valid user
        $sql = sprintf("SELECT * FROM users WHERE email='%s' AND password='%s'", $email, $password);
        $result = $conn->query($sql);

        // login if valid, otherwise let user know that its incorrect
        if ($result->rowCount() == 1) {
            $_SESSION["valid"] = '1';
            header("Location: home.php");
        } else {
            $_SESSION["status_message"] = "invalid";
            header("Location: login.php");
        }
    
?>
