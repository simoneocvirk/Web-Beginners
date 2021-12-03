<?php
// Match the corresponding individual sample

    session_start();
    require 'vendor/autoload.php';
    include('PDO_connect.php');
    // include s3 username and password
    include('/home/ubuntu/s3_auth.php');
    // get values from page
    $place = $_POST["place"];
    $name = $_POST["name"];
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];
   
    if (isset($_POST["placeid"])) {
        $_SESSION["placeid"] = $_POST["placeid"];
    } else {
        $_SESSION["placeid"] = $_GET["idx"];
    }
    $placeidx = intval($_SESSION["placeid"]);    
    $location = $_SESSION["search_results"][$placeidx]["name"];

        // sql query for reviews for place
        $sql = sprintf("SELECT * FROM reviews WHERE place LIKE CONCAT('%%', CONCAT(LOWER('%s'), '%%'))", $location);
        $results = $conn->prepare($sql);
        $results->execute();
        $_SESSION["review_results"] = $results->fetchAll();
        // connect to s3
        $s3 = new Aws\S3\S3Client([
            'region'  => 'ca-central-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => $access,
                'secret' => $secret,
            ]
        ]);
        header("Location: individual_sample.php");
    
?>
