<?php
// Check for the error parameter in the URL
if (isset($_GET['error']) && $_GET['error'] === 'unexpected') {
    echo "<script> alert('Unexpected Error Occurred');</script>";
}

// Check for the error parameter in the URL(Duplicate)
if (isset($_GET['error']) && $_GET['error'] === 'user-exists') {
    echo "<script> alert('Name or Email Is Already Taken');</script>";
}
//Return for invalid email
if (isset($_GET['error']) && $_GET['error'] === 'invalid-email') {
    echo "<script> alert('Invalid Email Format');</script>";
}
if (isset($_GET['error']) && $_GET['error'] === 'weak-password') {
    echo "<script> alert('Invalid Password Format');</script>";
}
if (isset($_GET['error']) && $_GET['error'] === 'unmatched-password') {
    echo "<script> alert('Unmatched Password');</script>";
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form action="signup-action.php" method="POST" autocomplete="off">
            <h1 class="small">Sign Up</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or enter your details</span>
            <input type="text" name="name" placeholder="Name" required/>
            <input type="text" name="username" placeholder="Username" required />
            <input type="email" name="email" placeholder="Email" required value="" />
            <input type="password" name="password" placeholder="Password" required/>
            <input type="password" name="confirmpassword" placeholder="Confirm Password" required/>
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-right">
                <h1>Have An Account Already?</h1>
                <p>Stay connected with us by logging in with your credentials</p>
                <button class="ghost" id="signIn" onclick="location.href='index.php'">Sign In</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>

