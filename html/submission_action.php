<?php
    include('/home/ubuntu/mysql_auth.php');
    require 'vendor/autoload.php';
    $name = $_POST["name"];
    $description = $_POST["description"];
    $address = $_POST["address"];
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
            'key'    => "AKIA3UP3PBQ3ZC2JKQFK",
            'secret' => "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",
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
        $sql = "INSERT INTO places (name, description, address, latitude, longitude, photo, video) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssddss", $name, $description, $address, $latitude, $longitude, $photo, $video);
        $stmt->execute();
        echo file_get_contents("index.html");
    }
?>
