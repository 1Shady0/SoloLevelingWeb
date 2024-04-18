<?php
require "config.php";

$username = $_POST["li_username"];
$password = $_POST["li_pass"];

function validateUser($conn, $username, $password) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return true; 
        }
    }
    return false;
}

    
    if (validateUser($conn, $username, $password)) {

        session_start();
        $_SESSION["username"] = $username;

        header("Location: app.php");
        exit();
    } else {
        $msg = "Wrong username or password !";
        header("Location: index.php?msg=".urlencode($msg));
        exit();
    }

?>
