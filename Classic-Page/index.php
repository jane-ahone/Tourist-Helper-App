<?php
session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: ../Login-Page/log.php?redirect=../Classic-Page");
}

?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Group 10">
    <meta http-equiv="x-UA-Compatible" content="IE-Edge">

    <link rel="stylesheet" href="mystyle.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">    <link rel="shortcut icon" type="x-icon" href="fyw.png">
    <title> Classic Booking Page </title>

</head>

<body onload="renderdate()">

<header>
        <img  class="logo" src="../Home-Page/images/fyw.png">
            <nav> 
                <ul class="nav-list" width:100%>
                    <li><a href="../Home-Page/home.php">Home</a></li>
                    <li><a href="OurTours.php">Our Tours</a></li>
                    <li><a href="../About-Page/About.php">About Buea</a></li>
                    <li><a href="../Tourist-Guide-Page/index.php">Travel Guide</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </nav>
    </header>

    <div class="myclassic" style="text-align: center; font-family: 'Poppins', Times, serif;">
        <strong>
            <h1 style="font-weight:bold ; font-size: 50px; line-height: 50px;">Classic</h1>
        </strong>
    </div>

    <section>
        <div class="container">
            <div class="calendar">
                <div class="clock">
                    <div class="time">
                        <span class="Hours">00</span> :
                        <span class="Minutes">00</span> :
                        <span class="Seconds">00</span>
                        <span class="Format">AM</span>
                    </div>
                </div>

                <div class="month">

                    <div class="prev" onclick="movedate('prev')">
                        <span class="arrow">&#10094</span>
                    </div>

                    <div>
                        <h2 id="month">December-2023</h2>
                        <p id="date">Wed December 28 2023 </p>
                    </div>

                    <div class="next" onclick="movedate('next')">
                        <span class="arrow">&#10095</span>
                    </div>

                </div>
                <hr>

                <div class="week">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thur</div>
                    <div>Fri</div>
                    <div>Sat</div>

                </div>

                <div class="date">


                </div>

            </div>

        </div>


    </section>
    <section id="site-info-cntr">

        <section class="site-info hidden">

            <div class="header">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layers" viewBox="0 0 16 16">
                    <path d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882l-7.5-4zm3.515 7.008L14.438 10 8 13.433 1.562 10 4.25 8.567l3.515 1.874a.5.5 0 0 0 .47 0l3.515-1.874zM8 9.433 1.562 6 8 2.567 14.438 6z" />
                </svg> <!--icon-->
                <span>
                    <span class="calendar-day">date </span>
                    <span>, </span>
                    <span class="calendar-month">Month</span>
                    <span class="calendar-date">Day</span>
                    <span class="calendar-year">Year</span>
                    <span class="package_id_index hidden">package_id </span>
                </span>
                <div class="form-check" style="display: inline;">
                    <input class="form-check-input" type="checkbox" name="flexCheckboxDefault">

                </div>

            </div>

            <div class="site-details" id="bordered">
                <div class="tourist-site">
                    <p class="site-name">Site Name</p>
                    <p class="site-desc">Lorem ipsum sit dolor consecutif</p>
                </div>
                <div class="time">
                    <p><span class="start-time">3:00pm</span> - <span class="end-time">4:30p.m</span> </p>
                </div>
            </div>

            <div class="site-details">
                <div class="tourist-site">
                    <p class="site-name">Site Name</p>
                    <p class="site-desc">Lorem ipsum sit dolor consecutif</p>
                </div>
                <div class="time">
                    <p><span class="start-time">3:00pm</span> - <span class="end-time">4:30p.m</span> </p>
                </div>
            </div>


            <div class="site-details">
                <div class="tourist-site">
                    <p class="site-name">Site Name</p>
                    <p class="site-desc">Lorem ipsum sit dolor consecutif</p>
                </div>
                <div class="time">
                    <p><span class="start-time">3:00pm</span> - <span class="end-time">4:30p.m</span> </p>
                </div>

            </div>

        </section>


    </section>

    <section class="order-summary hidden">

        <div>
            <p class="order-summary-text">Order Summary</p>
        </div>

        <div class="site-order first hidden">
            <div class="col1">
                <p class="site-date">
                    <span class="day">day </span>
                    <span class="month">month </span>
                    <span class="date">day</span>
                    <span class="year">year</span>
                </p>
                <p class="order-site-name">Site Name </p>
                <p class="order-site-name">Site Name</p>
                <p class="order-site-name">Site Name </p>
            </div>
            <div class="col2">
                <span class="wrapper num">01</span>
            </div>
            <div class="col3">
                <p class="price">XAF 15000</p>
                <div class="wrapper" class="hidden">
                    <span class="minus" style="border-right: 1px solid black;">-</span>

                    <span class="plus">+</span>
                </div>
            </div>

        </div>


    </section>
    <section class="total hidden">
        <p>Total</p>
        <div>
            <span>XAF <span class="total-pricing">0</span></span>
            <br>
            <button onclick=summaryData()> Make Payment</button>
        </div>
    </section>

    <form action="./php/process_order.php" method="post" id="payment_form" class="hidden">
        <input type="text" id="order_details" name="order_details">
    </form>
    <script type="text/javascript">
        package_data = `<?php
                        require './php/connection.php';
                        require './php/code.php';
                        echo get_package_details($pdo, 'Classic');
                        ?>`;

        console.log(package_data);
        const obj = JSON.parse(package_data); //data from the backend

        // Get the current URL
        const currentUrl = window.location.href;

        // Create URLSearchParams instance from the URL
        const urlParams = new URLSearchParams(new URL(currentUrl).search);

        urlParams.forEach((value, key) => {
            if(key == "response"){
                alert(value);
            }
        });
    </script>
    <script src="./js/calendar.js"></script>
    <script src="./js/dataHandler.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>