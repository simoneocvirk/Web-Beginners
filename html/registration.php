<!-- set up php for file -->
<?php

session_start();
// if already logged in go to log in page
if (isset($_SESSION["valid"])) {
    if ($_SESSION["valid"] == '1') {
        header("Location: home.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- setup -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="GenericFormat.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	
	<!--Specific external Javascript code-->
	<script src="js/registration.js"></script>

	<title>Web Beginners</title>
</head>

<body class="bg" style="color: white;">
      <div class="header">
	<div class="name">
		<a href="index.php">WEB BEGINNERS</a>
	</div>
  
  	<div class="header-right">
	<!-- buttons for header -->
      <a href="search.php" class="button buttonh">Search</a>
      <a href="submission.php" class="button buttonh">Submission</a>
      <a href="registration.php" class="button buttonh">Sign Up</a>   
  	</div>
     </div>

        <!-- animation 5/10 -->
	<h1 class="animate__animated animate__backInDown" style="text-align: center;">Welcome, new user!</h1>
	<div>
	<!-- list of form inputs -->
	<!-- insert javascript here for validate form-->
	<form name = "RegForm" onsubmit = "return(validate());" method="post" action="registration_action.php">
		<fieldset class="fieldset">
			<legend>Sign up</legend>
			<h4>Please enter your first name: </h4> 
			<input type="text" name="firstname" /><br/>
			<h4>Please enter your last name: </h4>
			<input type="text" name="lastname"/><br/><br/>

			<h4>Please enter your email address: </h4>
			<input type="email" name="email"/><br/><br/>

			<h4>Please enter your password: </h4>
			<input type="password" name="userpw" id="firstPw"/><br/>
			<h4>Please repeat your password: </h4>
			<input type="password" name="userpwconfirm" id="secondPw"/><br/><br/>

			<h4>Gender:</h4> 
			<input type="text" name="gender" /><br/><br/>
			<hr>

			<!-- animation 10/10 -->
			<h4 class="animate__animated animate__heartBeat">Do you want us to push you the newest information on those best locations?</h4> 
			<input id="yes" type="radio" name="infoPush" value="Yes"> 
			<label for="yes">Yes</label> 
			<input id="no" type="radio" name="infoPush" value="No, thanks"> 
			<label for="no">No, thanks</label> <br><br>

			<input type="submit" value="Submit" > 
		</fieldset>
	</form>
	</div>
</body>

</html>
