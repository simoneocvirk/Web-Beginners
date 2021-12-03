<!-- set up php for file -->
<?php
// Query database for searching by location's latitude and longitude

    session_start();
    require 'vendor/autoload.php';
    include('PDO_connect.php');
    include('/home/ubuntu/s3_auth.php');
    // get values from page
    $latitude = $_GET["myLat"];
    $longitude = $_GET["myLon"];
    echo $latitude;
    echo $longitude;
    
    if ((empty($latitude)) || (empty($longitude))) {
        $latitude = NULL;
        $longitude = NULL;
        $_SESSION["search_results"] = NULL;
    } else {

            // sql query for info about locations and calculation of lat lon coordinate distance
            $sql = sprintf("SELECT * FROM places p1 LEFT JOIN (SELECT DISTINCT place, ROUND(AVG(rating)) as rate FROM reviews GROUP BY place) review ON p1.name = review.place LEFT JOIN (SELECT name, SQRT(POWER(p2.latitude - %f, 2) + POWER(p2.longitude - %f, 2)) as distance FROM places p2) far ON p1.name = far.name WHERE distance<= ALL (SELECT distance FROM places p3 LEFT JOIN (SELECT DISTINCT place, ROUND(AVG(rating)) as rate FROM reviews GROUP BY place) review ON p3.name = review.place LEFT JOIN (SELECT name, SQRT(POWER(p4.latitude - %f, 2) + POWER(p4.longitude - %f, 2)) as distance FROM places p4) far ON p3.name = far.name)", $latitude, $longitude, $latitude, $longitude);
            echo $sql;
            $results = $conn->prepare($sql);
            $results->execute();
            $_SESSION["search_results"] = $results->fetchAll();
            // connect to S3 to store pictues and videos
            $s3 = new Aws\S3\S3Client([
                'region'  => 'ca-central-1',
                'version' => 'latest',
                'credentials' => [
                    'key'    => $access,
                    'secret' => $secret,
                ]
            ]);
            $i = 0;
            // add pictures and videos to S3
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
        
    }
    $conn = null;
    header("Location: results_sample.php");
?>
