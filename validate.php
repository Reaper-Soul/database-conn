<?php
session_start();

// List of valid users and their passwords
$valid_users = [
    "mike" => "password",
    "jane" => "1234",
    "navish" => "secret"
];


$username_input = strtolower($_POST['username']); 
$password_input = $_POST['password'];


$valid_users_lower = array_change_key_case($valid_users, CASE_LOWER);


$_SESSION['username'] = $_POST['username'];

if (isset($valid_users_lower[$username_input]) && $valid_users_lower[$username_input] === $password_input) {
    $_SESSION['authenticated'] = 1;
    $_SESSION['failed_attempts'] = 0;
    header("Location: index.php");
    exit();
} else {
    
    if (!isset($_SESSION['failed_attempts'])) {
        $_SESSION['failed_attempts'] = 1;
    } else {
        $_SESSION['failed_attempts'] += 1;
    }

    echo "<p>Invalid login. This is attempt #" . $_SESSION['failed_attempts'] . "</p>";
    echo "<p><a href='login.php'>Try Again</a></p>";
}
?>
