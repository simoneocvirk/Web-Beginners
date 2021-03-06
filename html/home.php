<!-- set up php for file -->
<?php

session_start();

// if not logged in go to login page
if (isset($_SESSION["valid"])) {
    if ($_SESSION["valid"] != '1') {
        header("Location: login.php");
    }
} else {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- setup -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta charset="utf-8">	
 	<link rel="stylesheet" type="text/css" href="GenericFormat.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="js/home.js"></script>
    <title>Web Beginners</title>
</head>

<body class="bg" style="color: white;" >
	<div class="header">
	<div class="name">
		<a href="index.php">WEB BEGINNERS</a>
	</div>
  
  	<div class="header-right">
	<!-- header buttons -->
      <a href="search.php" class="button buttonh">Search</a>
      <a href="submission.php" class="button buttonh">Submission</a>
      <a href="logout.php" class="button buttonh">Sign Out</a>   
  	</div>
</div>
<hr>
	<br>
	<!-- animation 1/10 -->
	<h3 class="animate__animated animate__bounceInLeft" style="text-align: center">Looking for a place to eat on campus?</h3>
	<!-- animation 2/10 -->
	<h3 class="animate__animated animate__bounceInRight" style="text-align: center">You've come to the right place!</h3>
    <br>
    <hr>
    <br/>
	<div class="footer">
        <p>Made by Simone Ocvirk and Yiqi Huang</p>
 
</div>
</body>
</html>
