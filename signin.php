<?php
require 'config.php';

//Logging and monitoring events on the website
function logEvent($eventType, $details = null) {
    global $conn;
    $details = ($details) ? json_encode($details) : null;

    $stmtLog = mysqli_prepare($conn, "INSERT INTO logs_table (event_type, details) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmtLog, "ss", $eventType, $details);
    mysqli_stmt_execute($stmtLog);
}

if(isset($_POST["submit"])){
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8'); //preventing XSS attacks
    $usernameOrEmail = $_POST["email"];
    $password = $_POST["password"];
    
   
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
        logEvent("SuccessfulLogin", ["user_id" => $row['id']]);
        header("Location: dashboard.php");
        exit();
        }
        else{
            logEvent("Wrong password", ["user_id" =>$row['id']]);
            header("Location: index.php?error=wrong-password");
            exit();
        }
        }else{
            logEvent(" invalidUserAttempt", ["user_id" => $row['id']]);
            header("Location: index.php?error=invalid-user");
            exit();
    }
}else {
    logEvent("UnexpectedError");
    header("Location: index.php?error=unexpected");
    exit();
}

?>