<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $name  = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    // Prepared statement for checking existing records
    $stmtCheck = mysqli_prepare($conn, "SELECT * FROM tb_credentials WHERE name = ? OR email = ?");
    mysqli_stmt_bind_param($stmtCheck, "ss", $name, $email);
    mysqli_stmt_execute($stmtCheck);

    $result = mysqli_stmt_get_result($stmtCheck);
    $existingRecords = mysqli_fetch_assoc($result);

    if ($existingRecords) {
        // Redirect to the home page if username or email already exist
        header("Location: signup.php?error=user-exists");
        exit();
    } else {
        // Prepared statement for inserting new record
        $stmtInsert = mysqli_prepare($conn, "INSERT INTO tb_credentials (name, username, email, password) VALUES (?, ?, ?, ?)");

        // Hashing the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmtInsert, "ssss", $name, $username, $email, $hashed_password);
        mysqli_stmt_execute($stmtInsert);

        mysqli_stmt_close($stmtInsert);
        mysqli_close($conn);

        // Redirect to the home page after successful registration
        header("Location: index.php?success=signup-success");
        exit();
    }

    mysqli_stmt_close($stmtCheck);
    mysqli_close($conn);
} else {
    header("Location: signup.php?error=unexpected");
    exit();
}
?>