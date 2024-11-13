<?php
session_start();

require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("INSERT INTO admin (name, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $password])) {

            $_SESSION['login'] == true;

            header('location: index.php');
            exit;
            // Package details saved successfully
            // You can add additional logic or redirect the user to another page
            echo "admin created successfully!";
        } else {
            echo "Error ";
        }
    
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
</head>
<body>
    <h1>Create Account</h1>
    <form method="POST" >
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Create Account">
    </form>
</body>
</html>