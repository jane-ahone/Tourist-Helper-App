<?php
session_start();

require 'connection.php';
require 'auth.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try{
        if(loginUser($pdo, $username, $password)){
            echo "Login successful.\n";
            echo $_SESSION['account_type'];
            if ($_SESSION['account_type'] == "ADMIN"){
                header("Location: ../frontend/adminpage.html");
            }
            else{
                header("Location: ../frontend/mainpage.php");
            }
        }
        else{
            echo "Login unsuccessful.";
            header("Location: ../frontend");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>