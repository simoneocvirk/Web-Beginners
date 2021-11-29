<?php
    include('/home/ubuntu/mysql_auth.php');
    include('/home/ubuntu/s3_auth.php');
    require 'vendor/autoload.php';
    $name = $_POST["name"];
    if (empty($name)) {
        $name = NULL;
    }    
    $hours = $_POST["hours"];
    if (empty($hours)) {
        $hours = NULL;
    }
    $description = $_POST["description"];
    if (empty($description)) {
        $description = NULL;
    }
    $address = $_POST["address"];
    if (empty($address)) {
        $address = NULL;
    }
    $latitude = $_POST["lat"];
    $longitude = $_POST["long"];
    $photo = $_FILES["pic"]["tmp_name"];
    if (empty($photo)) {
        $photo = NULL;
    }
    $video = $_FILES["vid"]["tmp_name"];
    if (empty($video)) {
        $video = NULL;
    }
    $s3 = new Aws\S3\S3Client([
        'region'  => 'ca-central-1',
        'version' => 'latest',
        'credentials' => [
            'key'    => $access,
            'secret' => $secret,
        ]
    ]);
    if ($photo != NULL) {
        $result1 = $s3->putObject([
            'Bucket' => 'cs4ww3project',
            'Key'    => $photo,
            'SourceFile' => $photo
        ]);
    }
    if ($video != NULL) {
        $result2 = $s3->putObject([
            'Bucket' => 'cs4ww3project',
            'Key'    => $video,
            'SourceFile' => $video
        ]);
    }
    $servername = "localhost";
    $database = "cs4ww3project";
    $conn = new mysqli($servername, $dbusername, $dbpassword, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = "INSERT INTO places (name, hours, description, address, latitude, longitude, photo, video) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssddss", $name, $hours, $description, $address, $latitude, $longitude, $photo, $video);
        $stmt->execute();
        header("Location: home.php");
    }
?>
