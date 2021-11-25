<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- setup -->
	<title>Web Beginners</title>
	<!--Add-on task 1 step 5. Add metadata for configuring web applications-->
	<link rel="apple-touch-icon" sizes="180x180" href="src/icons/apple-touch-icon.png">
	<link rel="apple-touch-icon-precomposed" href="src/icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="src/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="src/icons/favicon-16x16.png">
	<link rel="manifest" href="src/icons/site.webmanifest">
	<link rel="mask-icon" href="src/icons/safari-pinned-tab.svg" color="#31d1fe">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<link rel="apple-touch-startup-image" href="src/icons/splash.png"/>
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />

	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<meta charset="utf-8">
 	<link rel="stylesheet" href="GenericFormat.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<script src="js/search.js"></script>
</head>

<body class="bg" style="color: white;" >
	<div class="header">
	<div class="name">
		<a href="index.php">WEB BEGINNERS</a>
	</div>
  
  	<div class="header-right">
	<!-- buttons for header -->
      <a href="search.php" class="button buttonh">Search</a>
      <a href="submission.php" class="button buttonh">Submission</a>
      <?php
        if (isset($_SESSION["valid"])) {
            if ($_SESSION["valid"] == '1') {
                ?>
                <a href="logout.php" class="button buttonh">Sign Out</a>
                <?php
            }
        } else {
            ?>
            <a href="registration.php" class="button buttonh">Sign Up</a>
            <?php
        }
      ?>
       	</div>
</div>
	<!-- additional button to register if haven't yet -->
	<div class="center">
	<h1 class="animate__animated animate__backInDown"> Search the best location through three methods! </h1>

	<!--Using geolocation API get user's location-->
	<!-- animation 3/10 -->
	<button onclick="getLocation();location.href='results_sample.php';" class="searchLocation">Get your location and search near you!!</button>
</div>
	<hr>

	<div class="row" style="min-height: 65vh;">
		<!-- Start of the second search panel -->
		<div class="col-6" style="padding: 30px;" >
    	<h2 class="center">Search it up by the names!</h2>
    	
    	<br>
        <form class="search" method="post" action="search_action.php"> 
    		<input type="search" id="search" name="search" placeholder="Ex: vegan" class="searchTerm"> <br>
    		<!--link to another page by sumbit button-->
            <input type="submit" value="Submit" class="searchButton">
        </form>    
  	</div>


  	<!-- Start of the second search panel -->
		<div class="col-6 center" style="padding: 30px;" >
			<h2>Or...search it up by ratings!</h2>
				<select name="rating" >
					<optgroup label="">
						<option value="*" disabled selected>Please select...</option>
						<option value="5">5 star rating</option>
						<option value="4">4 star rating</option>
						<option value="3">3 star rating</option>
						<option value="2">2 star rating</option>
						<option value="1">1 star rating</option>
					</optgroup>
					</select> <br>
				<!--link to another page by sumbit button-->
					<input type="submit" onclick="location.href='results_sample.php';" value="Submit" class="searchButton"/>
		</div>
	</div>
<hr>
	<div class="footer">
        <p>Made by Simone Ocvirk and Yiqi Huang</p>
 
</div>
</body>
</html>
