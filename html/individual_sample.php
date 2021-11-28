<?php

session_start();

$placeidx = intval($_SESSION["placeid"]);

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
                echo $_SESSION["search_results"][intval($placeidx)]["latitude"];
            ?>;
            var lon = <?php
                echo $_SESSION["search_results"][intval($placeidx)]["longitude"]; 
            ?>;
            var name = "<?php
                echo $_SESSION["search_results"][intval($placeidx)]["name"];
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
        <h1 class="col-12 animate__animated animate__backInDown" itemprop="name"><?php echo $_SESSION["search_results"][intval($placeidx)]["name"] ?></h1> 
        <br>
        <p><?php echo $_SESSION["search_results"][intval($placeidx)]["description"] ?></p>
		<br>	
        <div id="map"></div>
        <!-- added in part 2 -->
        <?php
            if (!empty($_SESSION["search_results"][intval($placeidx)]["picsrc"])) {
                ?>
                <br>
                <div class="photo">
                    <picture>
                        <img style="width: 80%" src=<?php echo "\"" . $_SESSION["search_results"][intval($placeidx)]["picsrc"] . "\"" ?> alt=""/>
                    </picture>
                </div>
                <br>
                <?php
            }
            if (!empty($_SESSION["search_results"][intval($placeidx)]["vidsrc"])) {
                ?>
                <br>
                <video style="width: 60%" src=<?php echo "\"" . $_SESSION["search_results"][intval($placeidx)]["vidsrc"] . "\"" ?> alt="" controls></video>
                <br>
                <?php
            } 
        ?>
		<!--Start of the table, using another table class tableIn-->
        <!--Microdata for reviews-->
        <br>
        <br>
        <table class="tableIn">
            <?php
                if (!empty($_SESSION["review_results"])) {
                    foreach ($_SESSION["review_results"] as $row) {
                        ?>
                        <tr>
                            <td class="td" itemprop="author"><?php echo $row["name"]; ?></td>
                            <td class="td" itemprop="ratingValue"><?php echo $row["rating"] . " Stars"; ?></td>
                            <td class="td" itemprop="reviewBody"><?php echo $row["comment"]; ?></td>
                        </tr>
                        <?php
                    }    
                }
                if (isset($_SESSION["valid"])) {
                    if ($_SESSION["valid"] == '1') {
                        ?>
                            <form method="post" action="individual_sample_review.php" enctype="multipart/form-data">
                                    <tr>
                                        <td class="td"><label><textarea name="name" placeholder="Name" style="font-family: arial; width: 100%"></textarea></label></td>
                                        <td class="td"><label><select name="rating" style="font-family: arial; width: 100%; border-color: white;"> <!-- I LOOK WRONG -->
						                                        <option value="*" disabled selected>Please Select</option>
						                                        <option value="5">5 Stars</option>
						                                        <option value="4">4 Stars</option>
						                                        <option value="3">3 Stars</option>
						                                        <option value="2">2 Stars</option>
						                                        <option value="1">1 Star</option>
					                    </select></label></td>
                                        <td class="td"><textarea name="comment" placeholder="Comment" style="font-family: arial; width: 100%"></textarea></td>
                                    </tr>
                                </table>
                                <br>
                                <label><input type="submit"></label>
                            </form>
                            <?php
                    }
                } else {
                    ?>
                    </table>
                    <?php
                }
            ?>
        <br>
        <br>
</div>
<hr>
	<div class="footer">
        <p>Made by Simone Ocvirk and Yiqi Huang</p>
 
</div>
</body>
</html>
