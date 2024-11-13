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
    <title>Travel Guide | Find Your Way</title>
</head>
<body>
    <header>
        <nav> 
            <img class="logo" src="images/logo b.png" alt="logo">
            <ul class="nav-list" width:100%>
                <li><a href="../Home-Page/home.php">Home</a></li>
                <li><a href="OurTours.php">Our Tours</a></li>
                <li><a href="../About-Page/about.php">About Buea</a></li>
                <li><a href="../Our-Tours/travel.php">Travel Guide</a></li>
                <li><a href="../Contact-Us-Page//contact.php">Contact Us</a>
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
    <div class="about-text">
        <div class="History">
            <div>
                <div class="heading1">Health</div>
                <p>
                    The CDC and WHO recommend the following vaccinations for Cameroon: hepatitis A, hepatitis B, typhoid, cholera, yellow fever, rabies, meningitis, polio, measles, mumps and rubella (MMR), Tdap (tetanus, diphtheria and pertussis), chickenpox, shingles, pneumonia and influenza.
                    Pharmacies in Cameroon have a green cross outside. Most are extremely helpful to clients.
                    Most facilities will require cash payments before medical services are administered.

                </p>
            </div>
            <div>
                <div class="miniheading">Insects</div>
                <p>
                    Mosquitoes, ticks and fleas can transmit a number a diseases, some of which can’t be prevented with a vaccine 
or drugs. However, the risk can be reduced by taking certain precautions:
                </p>
                <ul>
                    <li>Cover the skin</li>
                    <li>Use a suitable repellent</li>
                    <li>Sleep in an air-conditioned evironment</li>
                    <li>If you sleep outside use a mosquio net</li>
                    <li>Use Permethrin to treat clothing and Permethrin</li>
                </ul>
            </div>
            <div>
                <div class="miniheading">Animals</div>
                <p>
                    Most animals avoid humans but can bite or scratch if they feel threatened.

                </p>
                <ul>
                    <li>Do not feed or touch strange animals</li>
                    <li>Keep animals awa from open wound</li>
                    <li>Avoid animal saliva</li>
                    <li>Avoid rodents</li>
                </ul>
            </div>
        </div>
        <div class="History">
            <div class="heading1">Weather</div>
            <p>
                Throughout the year, Buea displays moderately high temperatures with little variation. Looking at the average highs and lows, there's a narrow range from 27.2°C to 32.1°C for the highs, and from 23.2°C to 18.3°C for the lows. 
                Regarding humidity, the city faces pretty high and consistent humidity levels year-round
                The city records heavy rainfall especially in the months from May to November and consistent sunshine throughout 
                the rest of the months.
            </p>
            <p>Taking into account the overall weather conditions, the best time to visit Buea would most probably be from December to February.  The temperatures are also within a pleasant range, with highs fluctuating from 30.8°C to 32.1°C. Thus, these months provide an excellent opportunity for visitors who plan to take part in outdoor activities without worrying about heavy showers
            </p>
        </div>
        <div class="History">
            <div class="heading1">Local Law</div>
            <ul>
                <li>Always carry proof of your identity. This can be your residence permit or a certified copy of your passport.</li>
                <li>Same-sex relationships are illegal. Penalties include 6 months to 5 years jail and a fine of 20,000 to 200,000 francs.</li>
                <li>Be careful when taking photos. It's illegal to photograph military zones, assets or personnel. Taking photos of government buildings, airports and ports is also illegal.</li>
                <li>Dress and behaviour standards are conservative. Always dress appropriately.                </li>
            </ul>
        </div>
        <div class="History">
            <div class="heading1">Security Advice</div>
            <p>
                General strikes (or ‘ghost towns’) are called in the North West and South West(Anglophone) regions for each Monday, with additional days often called in particular periods including February (around Youth Day, 11 February), May around National Day on 20 May) and October (around 1 October). 
                Violence and travel disruption is regularly reported on these days.  
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