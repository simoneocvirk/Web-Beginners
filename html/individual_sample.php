<!DOCTYPE html>
<html lang="en">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta charset="utf-8">	
 	<link rel="stylesheet" href="GenericFormat.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<script src="js/individual_sample.js"></script>
	<script src="js/OpenLayers-2.13.1/OpenLayers.js"></script>

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

<body class="bg" style="color: white" onload="initmap()">
	<div class="header">
	<div class="name">
		<a href="index.php">WEB BEGINNERS</a>
	</div>
  
  	<div class="header-right">
      <a href="search.php" class="button buttonh">Search</a>
      <a href="submission.php" class="button buttonh">Submission</a>
      <a href="registration.php" class="button buttonh">Sign Up</a>   
  	</div>
</div>
<hr>
	<!--Starting microdata for add on task 1, so that advanced webparsers can recognize reviews-->
	<div class="center" itemscope itemtype="https://schema.org/Review">
	<div class="row" style="min-height: 65vh;" itemprop="itemReviewed" itemscope itemtype="https://schema.org/Restaurant">
		
		<a href="results_sample.php" style="text-decoration: none"><i class="arrow left arrowh"></i></a>
		<!-- animation 9/10 -->
		<h2 class="col-12 animate__animated animate__backInDown" itemprop="name">Bridges</h2>
		<br>
		<p>Introduced in 2005, Bridges Cafe was developed from a student-based initiative
		<br>to introduce inclusiveness to the McMaster dining experience. Specialized in
		<br>serving vegetarian and vegan options, Bridges caters to the ideological and
		<br>religious needs of the student body and celebrates the diversity of culture,
		<br>faith, gender, ability, sexual orientation and more, that is present in the
		<br>McMaster community. Bridges is fitted with wireless internet, a comfortable
		<br>seating area and delicious food options, making it a great study location.
		<br>With booking availability and provided sound equipment, this beautifully
		<br>decorated cafe is also the perfect spot to host your team meetings and
		<br>charitable events.</p>
		<br>	


		<!-- added in part 2 -->
		<center><div id="basicMap" style="width: 60%; height: 20vw;"></div></center>
		<div style="height: 20%; width: 100%;"></div>
		<br>
			<div class="photo">
				<picture>
					<!-- the image is 475 pixels in width -->
					<source media="(min-width: 475px)"
						srcset="src/Bridges2x.png"/>
					<source media="(max-width: 474px)"
						srcset="src/Bridges1x.png"/>
					<img itemprop="image" src="src/Bridges1x.png" alt=""/>
				</picture>
			</div>
		<br>

		<!-- Video -->
		<video src="src/Video.mp4" style="width: 80%; height: 40%" controls></video>
		<p></p>
	</div>
		<!--Start of the table, using another table class tableIn-->
		<!--Microdata for reviews-->
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
