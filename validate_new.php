<?php

require_once('user.php');
$user = new User();

session_start();

$username_input = trim($_POST['username']); 
$password_input = $_POST['password'];
$confirm_password_input = $_POST['confirm_password'];

if ($password_input !== $confirm_password_input){
    echo "<p>Passwords do not match.</p>";
    echo "<p><a href='signup.php'>Try Again</a></p>";
}

if (strlen($password_input) < 10 || 
    !preg_match('/[a-z]/', $password_input) || 
    !preg_match('/[A-Z]/', $password_input)) {

    echo "<p>Password must be more than 10 characters and contain both uppercase and lowercase letters.</p>";
    echo "<p><a href='signup.php'>Try Again</a></p>";
    exit();
}

if ($user->user_exists($username_input)){
    echo "<p>Username already exists. Please choose a different username.</p>";
    echo "<p><a href='signup.php'>Try Again</a></p>";
    exit();
}

$hashed_password = password_hash($password_input, PASSWORD_DEFAULT);


if ($user->create_user($username_input, $hashed_password)) {
    $_SESSION['username'] = $username_input;
    $_SESSION['authenticated'] = 1;
    header("Location: index.php");
    exit();
} else {
    echo "<p>Something went wrong. Please try again later.</p>";
    echo "<p><a href='signup.php'>Go Back</a></p>";
}

?>
