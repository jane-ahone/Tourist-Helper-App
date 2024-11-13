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
    <title>About Buea | Find Your Way</title>
</head>
<body>
    <header>
        <nav> 
            <img class="logo" src="images/logo b.png" alt="logo">
            <ul class="nav-list" width:100%>
                <li><a href="../Home-Page/home.php">Home</a></li>
                <li><a href="../Our-Tours/ourtours.php">Our Tours</a></li>
                <li><a href="About.php">About Buea</a></li>
                <li><a href="../Our-Tours/travel.php">Travel Guide</a></li>
                <li><a href="../Contact-Us-Page/contact.php">Contact Us</a>
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
    <div class="about-topic">
        <p id="buea">Buea:</p>
        <p id="motto">City ofLegendary Hospitality</p>
        <div class="greenline"></div>
    </div>
    <div class="about-text">
        <div class="History">
            <div class="heading1">History</div>
            <p>
                <p>Buea, originally "bue", was founded by a hunter who came from the Bomboko area. Coming from the Bomboko side of the mountain, he named the new-found land in amazement as "a Bue", meaning literally a "son of bué". A prominent King of the tikar clashes with German troops during invasion. Resistance remain popular folklore; currently ruled by the Endeleys. Tea growing is an important local industry, especially in Tole.</p>
                <p>Buea was the colonial capital of German Kamerun from 1901 to 1919, the capital of the Southern Cameroons from 1949 until 1961 and the capital of West Cameroon until 1972, when Ahmadou Ahidjo abolished the Federation of Cameroon. The German colonial administration in Buea was temporarily suspended during the eruption of Mount Cameroon from 28 April until June 1909.</p>
                <p>Originally, Buea's population consisted mainly of the Bakweri people. However, owing to its status as a university town and the regional capital, there are significant numbers of other ethnic groups.</p>

            </p>
        </div>
        <div class="History">
            <div class="heading1">Culture: The Bakweri</div>
            <p>
                <p>The elephant (Njoku in Bakweri) is the totem of Bakweri people. Members of the “Male” societies have “their” elephant in the bush and can transform into this elephant. Villages meet from time to time to perform the “Male” or “Elephant Dance”. There a number of other traditional dances of the Bakweri people.</p>
                <p>Traditional wrestling (Pala Pala) and Tug of War</p>

                <p>Traditional wrestling or “Pala Pala” are rotating between the
                bakweri villages.</p>

            </p>
        </div>
        <div class="History">
            <div class="heading1">Climate</div>
            <p>
                Buea has a subtropical highland climate (Cfb) closely bordering on a tropical rainforest climate (Af). Because of its location at the foot of Mount Cameroon, the climate in Buea tends to be humid, with the neighbourhoods at higher elevations enjoying cooler temperatures while the lower neighbourhoods experience a hotter climate. Extended periods of rainfall, characterized by incessant drizzle, which can last for weeks, are common during the rainy season as are damp fogs, rolling off the mountain into the town below.


            </p>
        </div>
        <div class="History">
            <div class="heading1">Food and Beverages</div>
            <p>
                The traditional food of the Kwe people is ‘Kwacoco Bible – made from grated coco yam and mixed with spinach, smoked fish, red oil and other spices. It is wrapped in plantain leaves, steamed until cooked through.  
            </p>
        </div>
        <div class="Photos">
            <div class="heading1">Photo Album</div>
            <p>
                
            </p>
        </div>
    </div>
    <div class="footer">
        <p>No long term contracts. No Cathes. Simple</p>
        <button>Get started</button>
        <div class="line2"></div>
    </div>
</body>
</html>