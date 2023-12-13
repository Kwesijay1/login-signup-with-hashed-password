<?php
require 'config.php';
if(isset($_POST["submit"])){
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8'); //preventing XSS attacks
    $usernameOrEmail = $_POST["email"];
    $password = $_POST["password"];
    
    //validating and sanitizing email format
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: index.php?error=invalid-email");
        exit();
    }
    //prepared statement for preventing SQL INJECTION
    $stmtCheck = mysqli_prepare($conn, "SELECT * FROM tb_credentials WHERE username = ? OR email = ?");
    mysqli_stmt_bind_param($stmtCheck, "ss", $usernameOrEmail, $usernameOrEmail);
    mysqli_stmt_execute($stmtCheck);
    
    $result = mysqli_stmt_get_result($stmtCheck);
    $row = mysqli_fetch_assoc($result);
    

    if(mysqli_num_rows($result) > 0){
        
        $user = $result->fetch_assoc();

        if($row && password_verify($password, $row['password'])){
        $_SESSION["Login"] = true;
        $_SESSION['id'] = $row['id'];
        header("Location: dashboard.php");
        exit();
        }
        else{
            header("Location: index.php?error=wrong-password");
            exit();
        }
        }else{
            header("Location: index.php?error=invalid-user");
            exit();
    }
}else {
    header("Location: index.php?error=unexpected");
    exit();
}

?>