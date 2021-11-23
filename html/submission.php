<?php
    include('/home/ubuntu/mysql_auth.php');

    $name = $_POST["name"];
    $description = $_POST["description"];
    $address = $_POST["address"];
    $latitude = $_POST["lat"];
    $longitude = $_POST["long"];
    $photo = NULL;
    if (!empty($_POST["pic"])) {
        $photo = "photo";
    }
    $video = NULL;
    if (!empty($_POST["vid"])) {
        $video = "video";
    }
    $servername = "localhost";
    $database = "cs4ww3project";
    $conn = new mysqli($servername, $dbusername, $dbpassword, $database);
    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    }

    $sql = "INSERT INTO places (name, description, address, latitude, longitude, photo, video) VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssddss", $name, $description, $address, $latitude, $longitude, $photo, $video);
    $stmt->execute();

    echo file_get_contents("index.html");
?>
