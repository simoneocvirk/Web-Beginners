
<?php
    session_start();    
    include('PDO_connect.php');
    $placeidx = intval($_SESSION["placeid"]);
    $place = $_SESSION["search_results"][$placeidx]["name"]; 
    $name = $_POST["name"];
 
    $rating = $_POST["rating"];
        
    $comment = $_POST["comment"];
      

    $sql = "INSERT INTO reviews (place, name, rating, comment) VALUES (:place,:name,:rating,:comment)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':place', $place);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':comment', $place);

    $stmt->execute();
     
    $conn = null;
    
?>
