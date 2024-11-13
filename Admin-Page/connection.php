<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TouristApp";


try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully\n";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?>

