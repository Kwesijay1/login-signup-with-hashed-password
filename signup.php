<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name  = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

//prepared statement for SQL Injection prevention
    $stmt = mysqli_prepare($conn, "SELECT * FROM tb_credentials WHERE name = ? OR email = ?");
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) > 0){

    echo "<script> alert('Name or Email Is Already Taken');</script>";

}else{

    if($password == $confirmpassword){
        $stmt = mysqli_prepare($conn, "INSERT INTO tb_credentials (name, username, email, password) VALUES (?, ?, ?, ?)");
//hashing the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $hashed_password);
            mysqli_stmt_execute($stmt);

        echo "<script> alert('Registration Successful');</script>";

    }else{

    echo "<script> alert('Password Does Not match');</script>";
    }
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
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
		<form action="" method="POST" autocomplete="off">
			<h1 class="small">Sign Up</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or enter your details</span>
            <input type="text" name="name" placeholder="Name" required value="" />
            <input type="text" name="username" placeholder="Username" required value="" />
			<input type="email" name="email" placeholder="Email" required value="" />
			<input type="password" name="password" placeholder="Password" required value="" />
			<input type="password" name="confirmpassword" placeholder="Confirm Password" required value=""/>
			<input type="submit" value="Sign Up">
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Have An Account Already?</h1>
				<p>Stay connected with us by logging in with your credentials</p>
				<button class="ghost" id="signIn" onclick="location.href='signin.php'">Sign In</button>
			</div>
		</div>
	</div>
</div>
</body>
</html>
