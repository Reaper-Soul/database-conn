<?php
session_start();

// Redirect to login if user is not authenticated
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Navish_Sharma</title>
</head>
  

<body>
    <h1>Assignment 1</h1>
    <p>Welcome, <?= htmlspecialchars($_SESSION['username']) ?></p>
    <p>Today is <?= date("l, F j, Y") ?></p>

    <footer>
        <p><a href="logout.php">Click here to logout</a></p>
    </footer>
</body>
</html>
