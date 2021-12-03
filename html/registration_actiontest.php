<?php
//Insert registered user data into database

    include('PDO_connect.php');
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["userpw"];
    $gender = $_POST["gender"];
    $emailList = 1;
    if (strcmp("No, thanks", $_POST["infoPush"]) == 0) {
        $emailList = 0;
    }
    

     $sql = "INSERT INTO users (firstName, lastName, email, password, gender, emailList) VALUES (:firstName,:lastName,:email,:password,:gender,:emailList)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':emailList', $emailList);
        $stmt->execute();

        $conn = null;
    
?>
