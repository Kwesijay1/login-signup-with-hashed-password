<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_credentials WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}else{
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="dashboard.css">
</head>
<body>
<section class="header">
        <nav>
			<a href="dashboard.php"><img src=""></a>
			<div class="nav-links">
				<ul>
                    <li><a href="#">ABOUT ME</a></li>
                    <li><a href="#">MAGAZINE</a></li>
                    <li><a href="#">CONTACTS</a></li>
                    <button><li><a href="logout.php">Logout</a></li></button>
				</ul>
			</div>
		</nav>
</section>
<section class arrange>
<div class="col-md-12 end-box ">
     &copy; 2023 | &nbsp; All Rights Reserved | &nbsp; Critac Ghana. | &nbsp; 24x7 support | &nbsp; Email
     us: info@critac.com
 </div>
</section>
</body>
</html>