<?php
require 'config.php';
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign In</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="" method="POST" autocomplete="off">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="text" name="usernameemail" placeholder="Username Or Email" />
			<input type="password" name="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<input type="submit" value="Sign In">
		</form>
	</div>
	<div class="overlay-container">
        <div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Not Registered Yet?</h1>
				<p>Enter your details to get started with us</p>
				<button class="ghost" id="signUp" onclick="location.href='signup.php'">Sign Up</button>
			</div>
		</div>
	</div>
</div>
</body>
</html>
