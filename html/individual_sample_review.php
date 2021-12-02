<?php
    session_start();    
    include('/home/ubuntu/mysql_auth.php');
    $placeidx = intval($_SESSION["placeid"]);
    $place = $_SESSION["search_results"][$placeidx]["name"]; 
    $name = $_POST["name"];
    if (empty($name)) {
        $name = NULL;
    }
    $rating = $_POST["rating"];
    if (empty($rating)) {
        $rating = NULL;
    }     
    $comment = $_POST["comment"];
    if (empty($comment)) {
        $comment = NULL;
    }    
    $servername = "localhost";
    $database = "cs4ww3project";
    $conn = new mysqli($servername, $dbusername, $dbpassword, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = "INSERT INTO reviews (place, name, rating, comment) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $place, $name, $rating, $comment);
        $stmt->execute();
        header("Location: individual_sample.php");
    }
?>
