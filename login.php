<?php
// Start session
session_start();


// Include config file
include "server.php";
// Define valid username and password (for demonstration purposes)
$valid_username = "user";
$valid_password = "password";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to fetch user from the database
    $query = "SELECT * FROM account WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $query); // Pass $connect as the first argument

    // Check if user exists and password is correct
    if (mysqli_num_rows($result) == 1) {
        // User found, store user details in session variables
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";

        header('location: dashboard.php');
        exit; // Make sure to exit after redirection
    } else {
        // If user does not exist or password is incorrect, display error message
        echo '<script>alert("Invalid username or password")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>
<body> 
<div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post" autocomplete="off"> 
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <button type="submit">Login</button>
                <a href="index.php" class="btn btn-user btn-block bg-light">
                Go back
</a>
            </div>
        </form>
    </div>
        

    
</body>
</html>