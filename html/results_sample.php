<?php

session_start();

?>
<!DOCTYPE html>
 <html lang="en">
<head>
<!-- setup -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">

<link rel="stylesheet" href="GenericFormat.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!--The following is for Leaflet living map-->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin="">
</script>
<!--Specific external Javascript code-->
<script src="js/results_sample.js"></script>

<title>Web Beginners</title>
</head>

<body class="bg" style="color: white;" onload="loadmap()">
<div class="header">
	<div class="name">
		<a href="index.php">WEB BEGINNERS</a>
	</div>
  
  	<div class="header-right">
	<!-- setup -->
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

<!--Adding the living map here for Project 2-->
<!-- animation 8/10 -->
<h3 class="center animate__animated animate__backInDown" style="font-style: italic;">We found those locations you may be interested:</h3>
<div id="map"></div>

<div class="row" style="text-align: center;">
      <!--First location-->
      <div class="col-6 list" >
	      <!-- animation 6/10 -->
	      <a href="individual_sample.php" style="color: white"><h3 class="animate_animated animate__heartBeat">Bridges</h3></a>
	      <br>
        	<div class="photo">
				<picture>
					<!-- the 2x image is 475 pixels in width -->
					<source media="(min-width: 475px)"
						srcset="src/Bridges2x.png"/>
					<source media="(max-width: 474px)"
						srcset="src/Bridges1x.png"/>
					<img src="src/Bridges1x.png" alt=""/>
				</picture>
		</div>
		<br>
        <hr>
        <table class="table" >
          <tr>
            <th>Location</th>
            <td>2002 Internal Rd, Hamilton, ON L8S 4E8</td>
          </tr>
          <tr>
            <th>Open hours</th>
            <td>
              <ul>
                <li>Sunday Closed</li>
                <li>Monday 11a.m. to 8p.m.</li>
                <li>Tuesday 11a.m. to 8p.m.</li>
                <li>Wednesday 11a.m. to 8p.m.</li>
                <li>Thursday 11a.m. to 8p.m.</li>
                <li>Friday 11a.m. to 3p.m.</li>
                <li>Saturday Closed</li>
              </ul>
            </td>
          </tr>
          <tr>
            <th>Website</th>
            <td></td>
          </tr>
          <tr>
            <th>Phone number</th>
            <td>+19055259140</td>
          </tr>
          <tr>
            <th>Rating</th>
            <td>4 stars</td>
          </tr>
        </table>
      </div>

      <!--Second location-->
      <div class="col-6 list" >
	<!-- animation 7/10 -->
	<h3 style="text-decoration: underline" class="animate__animated animate__heartBeat">La Pizzia</h3><br>
        	<div class="photo">
				<picture>
					<!-- the 2x image is 588 pixels in width -->
					<source media="(min-width: 588px)"
						srcset="src/LaPiazza2x.png"/>
					<source media="(max-width: 589px)"
						srcset="src/LaPiazza1x.png"/>
					<img src="src/LaPiazza1x.png" alt=""/>
			</picture>
		</div>	
	<br>
        <hr>
        <table class="table">
          <tr>
            <th>Location</th>
            <td>McMaster University Student Center, 1280 Main St W, Hamilton, ON L8S 4L8</td>
          </tr>
          <tr>
            <th>Open hours</th>
            <td>
              <ul>
                <li>Sunday Closed</li>
                <li>Monday 8a.m. to 7:30p.m.</li>
                <li>Tuesday 8a.m. to 7:30p.m.</li>
                <li>Wednesday 8a.m. to 7:30p.m.</li>
                <li>Thursday 8a.m. to 7:30p.m.</li>
                <li>Friday 8a.m. to 6p.m.</li>
                <li>Saturday Closed</li>
              </ul>
            </td>
          </tr>
          <tr>
            <th>Website</th>
            <td></td>
          </tr>
          <tr>
            <th>Phone number</th>
            <td>+19055259140</td>
          </tr>
          <tr>
            <th>Rating</th>
            <td>4 stars</td>
          </tr>
        </table>
      </div>
    </div>

<hr>
        <div class="footer">
		<p>Made by Simone Ocvirk and Yiqi Huang</p>
	</div>

</body>
</html>
