<?php
require 'config.php';

$username = $_POST['su_username'];
$password = $_POST['su_pass'];
$confirm_password = $_POST['su_pass_confirm'];

function usernameExists($conn, $username) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return true; 
    } else {
        return false; 
    }
}

function validatePasswordLength($password) {
    $length = strlen($password);
    return ($length >= 8 && $length <= 30);
}

        
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $msg = "Empty fields!";
        header("Location:index.php?msg=".urlencode($msg));
        return;
    }

    if (usernameExists($conn, $username)) {
        $msg = "Username already exists!";
        header("Location:index.php?msg=".urlencode($msg));
        return;
    }
    

    if (!validatePasswordLength($password)) {
        $msg = "Password must be between 8 and 30 characters!";
        header("Location:index.php?msg=".urlencode($msg));
        return;
    }
    

    if ($password !== $confirm_password) {
        $msg = "Passwords do not match!";
        header("Location:index.php?msg=".urlencode($msg));
        return;
    }

    

    $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);
    if ($stmt->execute()) {
        $msg = "Sign up successful!";
    } else {
        $msg = "Error: " . $conn->error;
    }

    header("Location:index.php?msg=".urlencode($msg));

$conn->close();
?>
