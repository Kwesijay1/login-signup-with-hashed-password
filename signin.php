<?php
require 'config.php';
if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $stmtCheck = mysqli_prepare($conn, "SELECT * FROM tb_credentials WHERE username = ? OR email = ?");
    mysqli_stmt_bind_param($stmtCheck, "ss", $username, $email);
    mysqli_stmt_execute($stmtCheck);
    
    $result = mysqli_stmt_get_result($stmtCheck);
    $row = mysqli_fetch_assoc($result);
    

    if(mysqli_num_rows($result) > 0){
        
        if($row && password_verify($password, $row['password'])){
        $_SESSION["Login"] = true;
        $_SESSION['id'] = $row['id'];
        header("Location: dashboard.php");
        exit();
        }else{
            header("Location: index.php?error=wrong-password");
            echo "<script>alert('Wrong Password');</script>";
            exit();
        }
    }
}else {
    header("Location: index.php?error=unexpected");
    exit();
}

?>