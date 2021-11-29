<?php
    session_start();
    require 'vendor/autoload.php';
    include('/home/ubuntu/mysql_auth.php');
    include('/home/ubuntu/s3_auth.php');
    $rating = $_POST["rating"];
    $servername = "localhost";
    $database = "cs4ww3project";
    $conn = new mysqli($servername, $dbusername, $dbpassword, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = sprintf("SELECT * FROM places RIGHT JOIN (SELECT DISTINCT place, ROUND(AVG(rating)) as rate FROM reviews GROUP BY place) review ON places.name = review.place WHERE review.rate = '%d'", $rating);
        $results = $conn->query($sql);
        if (!$results) {
            die('Invalid query: ' . $conn->error);
        }
        $_SESSION["search_results"] = $results->fetch_all(MYSQLI_ASSOC);
        $s3 = new Aws\S3\S3Client([
            'region'  => 'ca-central-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => $access,
                'secret' => $secret,
            ]
        ]);
        $i = 0;
        foreach ($_SESSION["search_results"] as $row) {
            $picture_src = NULL;
            if ($row["photo"] != NULL) {
                $cmd = $s3->getCommand('GetObject', [
                    'Bucket' => 'cs4ww3project',
                    'Key'    => $row["photo"]
                ]);
                $request = $s3->createPresignedRequest($cmd, '+10 minutes');
                $picture_src = (string) $request->getUri();
            }
            $_SESSION["search_results"][$i]["picsrc"] = $picture_src;
            $video_src = NULL;
            if ($row["video"] != NULL) {
                $cmd = $s3->getCommand('GetObject', [
                    'Bucket' => 'cs4ww3project',
                    'Key'    => $row["video"]
                ]);
                $request = $s3->createPresignedRequest($cmd, '+10 minutes');
                $video_src = (string) $request->getUri();
            }
            $_SESSION["search_results"][$i]["vidsrc"] = $video_src;
            $i = $i + 1;
        }
        header("Location: results_sample.php");
    }
?>
