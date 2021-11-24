<?php
    include('/home/ubuntu/mysql_auth.php');
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["userpw"];
    $gender = $_POST["gender"];
    $emailList = 1;
    if (strcmp("No, thanks", $_POST["infoPush"]) == 0) {
        $emailList = 0;
    }
    $servername = "localhost";
    $database = "cs4ww3project";
    $conn = new mysqli($servername, $dbusername, $dbpassword, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = "INSERT INTO users (firstName, lastName, email, password, gender, emailList) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $firstName, $lastName, $email, $password, $gender, $emailList);
        $stmt->execute();
        echo file_get_contents("index.html");
    }
?>
