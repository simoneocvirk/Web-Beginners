<!-- set up php for file -->
<?php session_start(); ?>

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
      <a href="registration.php" class="button buttonh">Sign Up</a>   
  	</div>
</div>
<hr>
	<br>
	<!-- animation 1/10 -->
	<h3 class="animate__animated animate__bounceInLeft" style="text-align: center">Looking for a place to eat on campus?</h3>
	<!-- animation 2/10 -->
	<h3 class="animate__animated animate__bounceInRight" style="text-align: center">You've come to the right place!</h3>
    <br>
    <!-- notify user if credentials are incorrect -->
    <?php
        if(isset($_SESSION['status_message'])) {
            if(!empty($_SESSION['status_message'])) {
                $msg = '';
                if($_SESSION['status_message'] == 'invalid') {
                    $msg = "Invalid credentials.";
                    $_SESSION['status_message'] = '';
                }
                echo '<div class="alert alert-danger" role="alert">' .$msg. '</div>';
            }
        }
    ?>
    <hr>
    <div>
        <form name="login" onsubmit="return(validate());" method="post" action="login_verify.php">
            <?php
                $default_email = "";
                if (isset($_SESSION['useremail'])) {
                    $default_email = $_SESSION['useremail'];
                }
            ?>
            <fieldset class = "fieldset">
                <legend>Log In</legend>
                <h4>Email: </h4>
                <input type="text" name="email" value=<?php echo $default_email; ?>><br/>
                <h4>Password: </h4>
                <input type="text" name="pass"/><br/>
                <br/>
                <input type="submit" value="Submit" >
            </fieldset>
        </form>
    </div>
    <br/>
	<div class="footer">
        <p>Made by Simone Ocvirk and Yiqi Huang</p>
 
</div>
</body>
</html>
