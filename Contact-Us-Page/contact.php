<?php
session_start();

include("../includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Contact Us | Find Your Way</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <header>
        <img  class="logo" src="../Home-Page/images/fyw.png">
            <nav> 
                <ul class="nav-list" width:100%>
                    <li><a href="../Home-Page/home.php">Home</a></li>
                </ul>
            </nav>
    </header>
    
    <div class="section blue">
        <div class="box">
            <div class="head">
                <h1>Contact Us</h1>
                <h5>Were're here to help you.</h5>
            </div>
            <div class="contact">
                <i class="bi bi-telephone-forward"></i>
                <div>
                    <h1>PHONE</h1>
                    <h3>+237 677 79 62 58</h3>
                </div>
            </div>
            <div class="contact">
                <i class="bi bi-envelope-at-fill"></i>
                <div>
                    <h1>EMAIL</h1>
                    <h3>FindyourWay@gmail.com</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="section white">
        <div class="box">
            <div class="head">
                <h1>Let's Talk!</h1>
                <h5>Feek free to drop us a line below</h5>
            </div>
            <form action="https://formsubmit.co/berrynamura6@gmail.com" method="POST"></form>
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="subject" required placeholder="Subject">
                <textarea  name="message" placeholder="Message"></textarea>
                <button type="submit">Submit</button>
            </form>

        </div>
    </div>
</body>
</html>