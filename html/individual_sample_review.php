
<?php
    session_start();    
    include('PDO_connect.php');
    $placeidx = intval($_SESSION["placeid"]);
    $place = $_SESSION["search_results"][$placeidx]["name"]; 
    $name = $_POST["name"];
    if (empty($name)) {
        $name = NULL;
    } 
    $rating = $_POST["rating"];
    if (empty($rating)) {
        $rating = NULL;
    }    
    $comment = $_POST["comment"];
    if (empty($comment)) {
        $comment = NULL;
    }   

    $sql = "INSERT INTO reviews (place, name, rating, comment) VALUES (:place,:name,:rating,:comment)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':place', $place);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':comment', $comment);

    $stmt->execute();
     
    $conn = null;
    
?>
