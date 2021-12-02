<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "themidpass";
$database = "cs4ww3project";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $dbusername, $dbpassword);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
