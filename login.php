<?php
session_start();
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 1) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<body>
    <h1>Login Form</h1>

    <form action="validate.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <input type="checkbox" id="showPassword" onclick="togglePassword()"> Show Password<br><br>

        <input type="submit" value="Submit">
    </form>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            passwordField.type = passwordField.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
