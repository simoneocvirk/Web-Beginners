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

<script>
function addmarkers() {
    var lats = "<?php
    foreach ($_SESSION["search_results"] as $row) {
        echo $row["latitude"] . " ";
    }
    ?>".split(" ");
    var lons = "<?php
    foreach ($_SESSION["search_results"] as $row) {
        echo $row["longitude"] . " ";
    }
    ?>".split(" ");
    var names = "<?php
    foreach ($_SESSION["search_results"] as $row) {
        echo $row["name"] . "~~~~";
    }
    ?>".split("~~~~");
    lats.pop();
    lons.pop();
    names.pop();
    for (let i = 0; i < lats.length; i++) {
        addMarker(lats[i], lons[i], names[i]);
    }
}
</script>

<title>Web Beginners</title>
</head>

<body class="bg" style="color: white;" onload="loadmap(); addmarkers();">
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
    <?php
        if (isset($_SESSION["search_results"])) {
            $i = 0;
            foreach ($_SESSION["search_results"] as $row) { 
                $i = $i + 1;
                ?>
                <div class="centreResults">
                <div class="col-6 list">
<form name="<?php echo "name" . strval($i) ?>" method="post" action="individual_sample.php">
<input type="hidden" name="placeid" value=<?php echo "\"" . strval($i - 1) . "\"" ?>>
                <!-- <a href="individual_sample.php"-->  <div onclick="document.forms['<?php echo "name" . strval($i) ?>'].submit();" style="color: white">
</form>
                    <h3 class="animate__animated animate__heartBeat"><?php echo $row["name"]; ?></h3>
                </div>
                </div>
                <?php
                    if (!empty($row["picsrc"])) {
                        ?>
                        <br>
                        <div class="photo">
                            <picture>
                                <img style="width: 60%" src=<?php echo "\"" . $row["picsrc"] . "\"" ?> alt=""/>
                            </picture>
                        </div>
                        </div>
                        <?php
                    }
                ?>
                <br>
                <div>
                    <hr>
                    <table class="table">
                        <tr>
                            <th>Location</th>
                            <td><?php echo $row["address"]; ?></td>
                        </tr>
                        <tr>
                            <th>Hours</th>
                            <td><?php echo $row["hours"]; ?></td>
                        </tr>
                        <tr>
                            <th>Rating</th>
                            <td>Average Rating</td>
                        </tr>
                    </table>
                </div>
                <br>
                <br>
                <?php
            }            
        }
        ?>
</div> 
        <div class="footer">
		<p>Made by Simone Ocvirk and Yiqi Huang</p>
	</div>

</body>
</html>
