<?php

require_once('user.php');
$user = new User();

session_start();

$username_input = $_POST['username']; 
$password_input = $_POST['password'];

if ($user->user_exists($username_input) == false){
    echo "<p>Username does not exist.</p>";
    echo "<p><a href='login.php'>Try Again</a></p>";
    exit();
}

if ($user->get_user($username_input, $password_input)){
    $_SESSION['authenticated'] = 1;
    $_SESSION['username'] = $_POST['username'];
    header("Location: index.php");
    exit();
}else{
    echo "<p>Invalid username or password.</p>";
    echo "<p><a href='login.php'>Try Again</a></p>";
}
?>
