<?php
// Check for the success parameter in the URL
if (isset($_GET['success']) && $_GET['success'] === 'signup-success') {
    echo "<script> alert('Registration Successful, Please Sign In..');</script>";
}
//Return for invalid email
if (isset($_GET['error']) && $_GET['error'] === 'invalid-email') {
    echo "<script> alert('Invalid Email');</script>";
}
//Return for wrong password
if (isset($_GET['error']) && $_GET['error'] === 'wrong-password') {
    echo "<script> alert('Wrong Password');</script>";
}
//Return for Invalid user
if (isset($_GET['error']) && $_GET['error'] === 'invalid-user') {
    echo "<script> alert('Invalid User');</script>";
}
//Return for unexpected error
if (isset($_GET['error']) && $_GET['error'] === 'unexpected') {
    echo "<script> alert('Unexpected Error Occurred');</script>";
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
        <form action="signin.php" method="POST" autocomplete="off">
            <h1>Sign in</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your account</span>
            <input type="text" name="email" placeholder="Username Or Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <a href="#">Forgot your password?</a>
            <button type="submit" name="submit">Sign In</button>
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