<?php
session_start();

include("../includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/OurTours.css">
    <title>Our Tours | Find Your Way</title>
</head>
<body>
    <header>
        <nav> 
            <img class="logo" src="images/logo b.png" alt="logo">
            <ul class="nav-list" width:100%>
                <li><a href="../Home-Page/home.php">Home</a></li>
                <li><a href="../Our-Tours/ourtours.php">Our Tours</a></li>
                <li><a href="../About-Page/about.php">About Buea</a></li>
                <li><a href="../Our-Tours/ourtours.php">Travel Guide</a></li>
                <li><a href="contact.php">Contact Us</a>
                    <ul class="dropdown">
                        <li><a href="#">Booking</a>
                            <ul class="dropdown2">
                                <li><a href="#">VIP</a></li>
                                <li><a href="#">Classic</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </li>
                <?php
                    require_once "../includes/connection.php";

                    if(isLoggedIn()) {
                        $First_Name = getEmail();
                        echo "<li><a href='Travel.php'>$First_Name</a></li>";
                    }
                    else {
                        echo '<li><a href="createaccount.php">SignUp</a></li>';
                    }
                    ?>
            </ul>
        </nav>
</header>
    <div class="heading">Popular attractions</div>
    <div class="attractions">
        <div class="attraction1">
            <div>
                <h3>Reunification Monument</h3>
                <p> Structurally, the monument comprises concrete, ten metal cylinders supporting the logo of the Cameroon golden jubilee.
                    The central piece is made up of ten metal cylinders of varying heights– representing the ten regions of Cameroon.
                   This gives a clearer view of the 50th-anniversary logo. The logo is characteristic of a globe, portraying the map of
                  Cameroon, supported by two hands at its center. Slightly above it–is the code of arms representing the peace and unity 
                  that reigns in the country.
                   There are metal cylinders supporting the logo, which symbolize power, growth, and emergence dynamics, fundamental to the
                   economic, social, and cultural development of Cameroon.
                </p>
            </div>
            <img class="pic" src="images/mask-group.png">
        </div>
        <div class="attraction1">
            <img class="pic" src="images/PM House.png">
            <div>
                <h3>Prime Mininster's Lodge</h3>
                <p> The Schloss, constructed 1887 by German governor Jesco Von Puttkamer.Renamed the prime ministers lodge.
                    Was the ”10th Downing Street” of West Cameroon.The first Prime minister of West Cameroon Dr. John Ngu Foncha slept here 
                    from 1961-1965 as prime minister of West Cameroon and vice president of the Federal Republic of Cameroon.Bobe Augustine 
                    Ngom Jua 1965-1968Solomon Tambeng( Tandeng) Muna 1968- the most hated Dissolution of the Federation by Ahidjo in 1972.
                    The office of the prime minister was then moved to Yaounde at the lakeside residence abandoning this wonderful monument 
                    and edifice. That was the genesis of our problem; transferring West Cameroon to East Cameroon.
                </p>
            </div>
        </div>
        <div class="attraction1">
            <div>
                <h3>Mount Cameroon</h3>
                <p> Mount Cameroon Race of Hope is an annual event organised by the Ministry of Sports and Physical Education 
                    together with the Athletic Federation of Cameroon generally in the month of February. Actually around several hundred athletes
                    participate from Cameroon and from abroad. The competition comprises, male, female, relays, junior, veteran courses.
                </p>
            </div>
            <img class="pic" src="images/Mount Camerooon2.png">
        </div>
        <div class="attraction1">
            <img class="pic" src="images/shrine.png">
            <div>
                <h3>Our Lady of Grace Shrine</h3>
                <p> This place is a place of prayer for all christians and people who beleive in God, located in Sasse-Buea in the
                    South West Region of Cameroon
                </p>
            </div>
        </div>
        <div class="buttons">
            <a href="../Classic-Page/index.php"><button>Book Classic</button></a>
            <a href="../Classic-Page/index.php"><button>Book VIP</button></a>
        </div>
    </div>
    <div class="hotels">
        <div class="heading">Popular hotels and Restaurants</div>
        <div class="attraction2">
            <img class="pic" src="images/wdc.png">
            <div class="links">
                <h3>WDC</h3>
                <a href="https://www.wdcaparthotel.com">https://www.wdcaparthotel.com</a>
            </div>
        </div>
        <div class="attraction2">
            <div class="links">
                <h3>IYA Buea</h3>
                <a href="https://www.iyabuea.com">https://www.iyabuea.com</a>
            </div>
            <img class="pic" src="images/iya.png">
        </div>
        <div class="attraction2">
            <img class="pic" src="images/blue hotel.png">
            <div class="links">
                <h3>Blue Empire</h3>
                <a href="https://www.wdcaparthotel.com">https://www.wdcaparthotel.com</a>
            </div>
        </div>
        <div class="attraction2">
            <div class="links">
                <h3>Mountain Hotel</h3>
                <a href="https://www.iyabuea.com">https://www.iyabuea.com</a>
            </div>
            <img class="pic" src="images/pool.png">
        </div>
    </div>
    <div class="footer">
        <p>No long term contracts. No Cathes. Simple</p>
        <button>Get started</button>
        <div class="line2"></div>
    </div>
</body>
</html>