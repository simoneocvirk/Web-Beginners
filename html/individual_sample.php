<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta charset="utf-8">	
 	<link rel="stylesheet" href="GenericFormat.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="js/individual_sample.js"></script>
    <!--The following is for Leaflet living map-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script>
        function addmarkers() {
            var lat = <?php
                echo $_SESSION["search_results"][intval($_POST["placeid"])]["latitude"];
            ?>;
            var lon = <?php
                echo $_SESSION["search_results"][intval($_POST["placeid"])]["longitude"]; 
            ?>;
            var name = "<?php
                echo $_SESSION["search_results"][intval($_POST["placeid"])]["name"];
            ?>";
            addMarker(lat, lon, name);        
        }
    </script>
	<!-- meta data for add on task 1, works for both facebook and twitter -->
	<meta property="og:title" content="Web Beginners"/>
	<meta property="og:url" content="https://18.217.210.172/individual_sample.html"/>
	<meta property="og:image" content="https://18.217.210.172/src/Bridges2x.png"/>
	<meta property="og:type" content="website"/>
	<meta property="og:description" content="Food at McMaster University"/>
	<!-- micro data for location -->
	<meta property="geo:latitude" content="43.26293574538705"/>
	<meta property="geo:longitude" content="-79.92126610204545" />
	<title>Web Beginners</title>
</head>

<body class="bg" style="color: white" onload="loadmap(); addmarkers();">
	<div class="header">
	<div class="name">
		<a href="index.php">WEB BEGINNERS</a>
	</div>
  
  	<div class="header-right">
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
<hr>
	<!--Starting microdata for add on task 1, so that advanced webparsers can recognize reviews-->
	<div class="center" itemscope itemtype="https://schema.org/Review">
	<div class="row" style="min-height: 65vh;" itemprop="itemReviewed" itemscope itemtype="https://schema.org/Restaurant">		
		<a href="results_sample.php" style="text-decoration: none"><i class="arrow left arrowh"></i></a>
		<!-- animation 9/10 -->
        <h1 class="col-12 animate__animated animate__backInDown" itemprop="name"><?php echo $_SESSION["search_results"][intval($_POST["placeid"])]["name"] ?></h1> 
        <br>
        <p><?php echo $_SESSION["search_results"][intval($_POST["placeid"])]["description"] ?></p>
		<br>	
        <div id="map"></div>
        <!-- added in part 2 -->
        <?php
            if (!empty($_SESSION["search_results"][intval($_POST["placeid"])]["picsrc"])) {
                ?>
                <br>
                <div class="photo">
                    <picture>
                        <img style="width: 80%" src=<?php echo "\"" . $_SESSION["search_results"][intval($_POST["placeid"])]["picsrc"] . "\"" ?> alt=""/>
                    </picture>
                </div>
                <br>
                <?php
            }
            if (!empty($_SESSION["search_results"][intval($_POST["placeid"])]["vidsrc"])) {
                ?>
                <br>
                <video style="width: 60%" src=<?php echo "\"" . $_SESSION["search_results"][intval($_POST["placeid"])]["vidsrc"] . "\"" ?> alt="" controls></video>
                <br>
                <?php
            } 
        ?>
		<!--Start of the table, using another table class tableIn-->
        <!--Microdata for reviews-->
        <br>
        <br>
		<table class="tableIn">
			<tr>
				<td class="td" itemprop="author">Lema A</td>
				<td class="td" itemprop="ratingValue">5 Stars</td>
				<td class="td" itemprop="reviewBody">Great vegetarian food and atmosphere is perfect for
					<br>studying and reading (during the quiet times).</td>
			</tr>
			<tr>
				<td class="td" itemprop="author">Sherry Chen</td>
				<td class="td" itemprop="ratingValue">5 Stars</td>
				<td class="td" itemprop="reviewBody">I didn't expect vegan food to be so hearty. The food was
					<br>excellent, and the people were very nice. I also liked
					<br>the atmosphere, which was perfect for group study.</td>	
			</tr>
			<tr>
				<td class="td" itemprop="author">Talia Tis</td>
				<td class="td" itemprop="ratingValue">4 Stars</td>
				<td class="td" itemprop="reviewBody">Consistently good vegetarian food, lots of seating and
					<br>a wide selection. Except for the samosa which shouldn't
					<br>even be called a samosa. It's so weirdly spiced and
					<br>just wrong</td>
			</tr>
		</table>
</div>
<hr>
	<div class="footer">
        <p>Made by Simone Ocvirk and Yiqi Huang</p>
 
</div>
</body>
</html>
