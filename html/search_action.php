<?php
    session_start();
    require 'vendor/autoload.php';
    include('/home/ubuntu/mysql_auth.php');
    $search = $_POST["search"];
    //$rating = $_POST["rating"];
    $servername = "localhost";
    $database = "cs4ww3project";
    $conn = new mysqli($servername, $dbusername, $dbpassword, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = sprintf("SELECT * FROM places WHERE name LIKE CONCAT('%%', CONCAT(LOWER('%s'), '%%'))", $search);
        $results = $conn->query($sql);
        if (!$results) {
            die('Invalid query: ' . $conn->error);
        }
        $_SESSION["search_results"] = $results->fetch_all(MYSQLI_ASSOC);
        $s3 = new Aws\S3\S3Client([
            'region'  => 'ca-central-1',
            'version' => 'latest',
            'credentials' => [
                'key'    => "AKIA3UP3PBQ3ZC2JKQFK",
                'secret' => "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",
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