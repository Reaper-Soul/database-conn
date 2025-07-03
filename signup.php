<!DOCTYPE html>
<html>
<head>
    <title>SignUp</title>
</head>

<body>
    <h1>SignUp Form</h1>

    <form action="validate_new.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <br><br>
        <input type="submit" value="Submit">
    </form>

    <br>
    <a href="login.php">Already signed up? Login Now!</a>
</body>
</html>