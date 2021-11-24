<?php

session_start();

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
	<title>Web Beginners</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="GenericFormat.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<script src="js/submission.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGPdLfMp6vlhM4OtNgDx1z5NMY6XZYXdY&callback=initMap"></script>	
</head>

<body class="bg" style="color: white;">
	<div class="header">
		<div class="name">
			<a href="index.php">WEB BEGINNERS</a>
		</div>
  
  		<div class="header-right">
		<!-- buttons for the header -->
	      <a href="search.php" class="button buttonh">Search</a>
	      <a href="submission.php" class="button buttonh">Submission</a>
	      <a href="logout.php" class="button buttonh">Sign Out</a>   
  		</div>
	</div>
	<hr>

	<div class="center" style="min-height: 80vh;">
	<!-- animation 4/10 -->
	<h2 class="animate__animated animate__backInDown">TO ADD A NEW OBJECT FILL OUT THE FORM BELOW</h2>
		<form method="post" action="submission_action.php" enctype="multipart/form-data">	
				<!--Text bar for entering location's name-->
				<label><br><input type="text" name="name" placeholder="Name" style="width: 30%"><br></label>
				<!--Description text bar-->
				<label><br><textarea name="description" placeholder="Description" ols="100" rows="10" style="font-family: arial;"></textarea><br></label>
				<!-- edited in part 2 -->
				<label><br><input id="address" type="text" name="address" placeholder="Address" style="width: 60%"><br></label>
				<!-- button to trigger Geolocation API -->
				<br><button type="button" onclick="getLatLon()">Get Latitude and Longitude</button>
				<!--Create two blocks for two text bar on the same row-->
				<div class="row">
					<div class="col-12">
						<!-- edited in part 2 -->
						<label><input id="lat" name="lat" type="text" placeholder="Latitude" size="30" class=""></label>	
												<label class="latlon"><input id="long" name="long" type="text" placeholder="Longitude" size="30" class=""></label>
					</div>
				</div>
				<!--Image file upload-->
				<div class="row">
					<div class="col-12">
						<p>Add Photo</p>
						<label><input type="file" name="pic" accept="image/*"></label>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<p>Add Video</p>
						<label><input type="file" name="vid" accept="video/*"></label>
					</div>
				</div>
				<label><input type="submit"></label>
				
		</form>
</div>
<div class="footer">
        <p>Made by Simone Ocvirk and Yiqi Huang</p>
</div>
</body>
</html>
