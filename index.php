<?php
    require_once('user.php');
    $user = new User();

    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome User</title>
</head>


<body>
    <h1>Assignment 2</h1>
    <p>Welcome, <?= htmlspecialchars($_SESSION['username']) ?></p>
    <p>Today is <?= date("l, F j, Y") ?></p>

    <footer>
        <p><a href="logout.php">Click here to logout</a></p>
    </footer>
</body>
</html>