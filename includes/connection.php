<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "touristapp";

// Create a connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

function isLoggedIn() {
    //return isset($_SESSION["Email"]);
    return isset($_SESSION["First_Name"]);
    
}
function getEmail() {
    //return $_SESSION["Email"];
    return $_SESSION["First_Name"];
    
}
?> 

