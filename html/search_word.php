<!-- set up php for file -->
<?php
// Query database for searching by location's name

    session_start();
    require 'vendor/autoload.php';
    include('PDO_connect.php');
    // include s3 username and password
    include('/home/ubuntu/s3_auth.php');
    $search = $_POST["search"];

        // sql query for places and rounded rating average
        $sql = sprintf("SELECT * FROM places LEFT JOIN (SELECT DISTINCT place, ROUND(AVG(rating)) as rate FROM reviews GROUP BY place) review ON places.name = review.place WHERE name LIKE CONCAT('%%', CONCAT(LOWER('%s'), '%%'))", $search);
        $results = $conn->prepare($sql);
        $results->execute();
        $_SESSION["search_results"] = $results->fetchAll();
        // connect to s3 for pictures and videos
        $s3 = new Aws\S3\S3Client([
            'region'  => 'ca-central-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => $access,
                'secret' => $secret,
            ]
        ]);
        $i = 0;
        // get pictures and videos from s3
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
    
?>
