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

if (isset($_POST["submit"])) {
    $name  = $_POST["name"];
    $username = $_POST["username"];
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    // Prepared statement for preventing SQL INJECTION
    $stmtCheck = mysqli_prepare($conn, "SELECT * FROM tb_credentials WHERE name = ? OR email = ?");
    mysqli_stmt_bind_param($stmtCheck, "ss", $name, $email);
    mysqli_stmt_execute($stmtCheck);

    $result = mysqli_stmt_get_result($stmtCheck);
    $existingRecords = mysqli_fetch_assoc($result);

    if ($existingRecords) {
        // Redirect to the home page if username or email already exist
        header("Location: signup.php?error=user-exists");
        exit();
    } 
     //validating and sanitizing email format
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        logEvent("InvalidEmail", ["user_id" => $row['id']]);
        header("Location: signup.php?error=invalid-email");
        exit();
    }

    elseif($password != $confirmpassword){
        //Redirect to the home page if password doesn't match
        header("Location: signup.php?error=unmatched-password");
    }
    else {
        // Prepared statement for inserting new record
        $stmtInsert = mysqli_prepare($conn, "INSERT INTO tb_credentials (name, username, email, password) VALUES (?, ?, ?, ?)");

        // Hashing the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmtInsert, "ssss", $name, $username, $email, $hashed_password);
        mysqli_stmt_execute($stmtInsert);

        mysqli_stmt_close($stmtInsert);
        mysqli_close($conn);

        // Redirect to the home page after successful registration
        logEvent("SuccessfulLogin", ["user_id" => $row['id']]);
        header("Location: index.php?success=signup-success");
        exit();
    }
} else {
    logEvent("UnexpectedError");
    header("Location: signup.php?error=unexpected");
    exit();
}
?>