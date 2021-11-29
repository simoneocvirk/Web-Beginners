<?php
    session_start();
    require 'vendor/autoload.php';
    include('/home/ubuntu/mysql_auth.php');
    include('/home/ubuntu/s3_auth.php');
    $place = $_POST["place"];
    $name = $_POST["name"];
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];
    $servername = "localhost";
    $database = "cs4ww3project";
    if (isset($_POST["placeid"])) {
        $_SESSION["placeid"] = $_POST["placeid"];
    } else {
        $_SESSION["placeid"] = $_GET["idx"];
    }
    $placeidx = intval($_SESSION["placeid"]);    
    $location = $_SESSION["search_results"][$placeidx]["name"];
    $conn = new mysqli($servername, $dbusername, $dbpassword, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = sprintf("SELECT * FROM reviews WHERE place LIKE CONCAT('%%', CONCAT(LOWER('%s'), '%%'))", $location);
        $results = $conn->query($sql);
        if (!$results) {
            die('Invalid query: ' . $conn->error);
        }
        $_SESSION["review_results"] = $results->fetch_all(MYSQLI_ASSOC);
        $s3 = new Aws\S3\S3Client([
            'region'  => 'ca-central-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => $access,
                'secret' => $secret,
            ]
        ]);
        header("Location: individual_sample.php");
    }
?>
