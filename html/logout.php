<!-- set up php for file -->
<?php
// if logout button is pressed end session and go back to the login page
session_start();
session_destroy();
header("Location: login.php");

?>
