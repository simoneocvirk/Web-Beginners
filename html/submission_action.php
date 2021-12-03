<?php
//Insert data of new place in database

    include('PDO_connect.php');
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
    if (empty($latitude)) {
	$latitude = NULL;
    }
    $longitude = $_POST["long"];
    if (empty($longitude)) {
    	$longitude = NULL;
    }
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
    
        $sql = "INSERT INTO places (name, hours, description, address, latitude, longitude, photo, video) VALUES (:name,:hours,:description,:address,:latitude,:longitude,:photo,:video)";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':hours', $hours);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':latitude', $latitude);
        $stmt->bindParam(':longitude', $longitude);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':video', $video);
        $stmt->execute();

        $conn = null;
        header("Location: home.php");
    
?>
