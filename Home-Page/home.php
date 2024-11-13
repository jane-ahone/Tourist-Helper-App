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
    <link rel="stylesheet" href="hom.css">
    

    
</head>

<body>
    <header>
            <nav> 
                <img class="logo" src="images/logo.jpg" alt="logo">
               
                <ul  class="nav-list" width:100%>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="../Our-Tours/ourtours.php">Our Tours</a></li>
                    <li><a href="../About-Page/about.php">About Buea</a></li>
                    <li><a href="../Our-Tours/travel.php">Travel Guide</a></li>
                    
                    <li><a href="../Contact-Us-Page/contact.php">Contact Us</a>
                    <li><a href="../Login-Page/log.php">Log In</a>
                    </li>
                    <?php
                    require_once "../includes/connection.php";

                    if(isLoggedIn()) {
                        $First_Name = getEmail();
                        echo "<li><a href='Travel.php'>$First_Name</a></li>";
                        echo "<li><a href='../logout.php' >/ Logout</a></li>";
                    }
                    else {
                        echo '<li><a href="../Create-Account-Page/createaccount.php">SignUp</a></li>';
                    }
                    ?>
                </ul>
                
            </nav>
    </header>

    <div class = "background">
        <h1 id="myText">Welcome to Buea</h1>
        <div class="greenline"></div>
        <p id="down">City of Legendary Hospitality</p>
    </div>

    <div class="box">
        <div class="heading">
            <h7>Discover<span id="blue"> Buea</span><div class="underline"><span class="span"></span></div></h7>
        </div>

        <div class="picset1">
            <div class="pic">
                <div class="imgtitle">Weleji we Mbamu</div>
                <img class="image" src="images/The Mountain.jfif">
                <p>Buea is the capital of the Southwest Region of Cameroon. The city is located in Fako Division, on the easern slopes of Mount Cameroon</p>
            </div>
            <div class="pic">
                <div class="imgtitle">Culture</div>
                <img class="image" src="images/culture.png">
                <p>The Bakweri are the main ethnic tribe in Buea. They live in oer 100 villages east and southeast of Mount Cameroon. Bakweri settlements largely lie in the mountain;s foothills and continue up its slopes as high as 4,000 metres.</p>
            </div>
            <div class="pic">
                <div class="imgtitle">Social Life</div>
                <img class="image" src="images/Copy of WDC.webp">
                <p>Buea offers a variety of options for nightlife and entertainment. There are numerous bas, clubs and lounges which often host live performanes. Buea also celebrates its cultural heritage through various events and festivals.</p>
            </div>
        </div>
    </div>
    <div class="box2">
        <div class="heading">
            <h7>Our<span id="blue"> Services</span><div class="underline"><span class="span"></span></div></h7>
        </div>

        <p>
            Cameroon can offer a variety of tourist attractions that can be divided into three main categories
        </p>

        <ol>
            <li>Cultural</li>
            <li>Historical and</li>
            <li> Natural</li>
        </ol>

        <p>
           We offer guided visits to touristic sites accompanied by locals. 
        </p>

    </div>

    <div class="box3">
        <div class="box1">
            <div class="box11">
                <i class="bi bi-arrow-left-circle icon h5"></i>
                <div class="text">
                    <div class="text-heading">Cultural Discoverery Tours</div>
                    <div class="text-body">Enjoy a tour that will take you to memorable places that will make you never forget Cameroon's culture</div>
                </div>
            </div>
            <div class="box11">
                <i class="bi bi-bank h5"></i>
                <div class="text">
                    <div class="text-heading">Historical Site Tours</div>
                    <div class="text-body">Our History is rich and full of exciting stories, but you can travel into our past with our historical city tours</div>
                </div>
            </div>
        </div>
        <div class="box1">
            <div class="box11">
                <i class="bi bi-car-front-fill h5"></i>
                <div class="text">
                    <div class="text-heading">Mount Cameroon Park Tour</div>
                    <div class="text-body">Buea is blessed with the lustrious forest of the Mountain providing a rainforest to Savanah somthing somthing</div>
                </div>
            </div>
            <div class="box11">
                <i class="bi bi-link h5"></i>
                <div class="text">
                    <div class="text-heading">Bimbia Slave Trade</div>
                    <div class="text-body">Bimbia is a special plae in our hearts. Being the place where our people were taken intoslavery</div>
                </div>
            </div>
        </div>

    </div>
    <div class="box">
        <div class="heading">
            <h7>Our<span id="blue">Tours</span><div class="underline"><span class="span"></span></div></h7>
        </div>

        <div class="picset2">
            <div class="pics">
                <img src="images/Copy of Von Puttkamer Castle.png">
                <button><a href="OurTours.php">Discover</a></button>
                <p>Von Puttkamer Castle</p>
            </div>
            <div class="pics">
                <img src="images/50th Century Anniversary.png">
                <button><a href="OurTours.php"></a>Discover</a></button>
                <p>Reunification Monument</p>
            </div>
            <a href="OurTours.php"><div class="pics">
                <img src="images/Copy of 50th Century Anniversary.png">
               <button>Discover</button>
                <p>Bismarck Founation</p>
            </div></a>
        </div>
    </div>

    <div class="box1">
        <a href="../Our-Tours/ourtours.php"><button>Visit Our Locations</button></a>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63669.310712113955!2d9.22532733757535!3d4.154985037432801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10613259651819a3%3A0x754210aa92e62bff!2zQnXDqWE!5e0!3m2!1sfr!2scm!4v1703876058199!5m2!1sfr!2scm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="footer">
        <p>No long term contracts. No Catches. Simple</p>
        <button>Get started</button>
        <div class="line2"></div>
    </div>

    

    <script>
        window.addEventListener('DOMContentLoaded', function() {
  // Array of text options
  const textOptions = [
    'Welome to Buea',
    'Find Your Way'
  ];
  const textdown = [
    'City of Legendary Hospitality',
    'Tour With Ease'
  ];

  // Get the target element
  const myTextElement = document.getElementById('myText');
  const mydown = document.getElementById('down');

  // Set initial text
  myTextElement.textContent = textOptions[0];
  mydown.textContent = textdown[0];

  // Change text automatically at a specified interval
  let currentIndex = 0;
  setInterval(function() {
    currentIndex = (currentIndex + 1) % textOptions.length;
    myTextElement.textContent = textOptions[currentIndex];
  }, 2000); // Change text every 2 seconds (2000 milliseconds)


// Change text automatically at a specified interval
let current = 0;
  setInterval(function() {
    current = (current + 1) % textdown.length;
    mydown.textContent = textdown[current];
  }, 2000); // Change text every 2 seconds (2000 milliseconds)
});

//reponsiveness for the menu bar
function hideMenu() {
  var navLinks = document.querySelector('.navLinks');
  if (navLinks) {
    navLinks.style.display = 'none';
  }
}

function showMenu() {
  var navLinks = document.querySelector('.navLinks');
  if (navLinks) {
    navLinks.style.display = 'block';
  }
}



    </script>
    
</body>
</html>




