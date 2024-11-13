<?php

session_start();
if(!isset($_SESSION["user_id"])){
    header("Location: ../Login-Page/log.php?redirect=../VIP-Page");
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../Classic-Page/mystyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="x-icon" href="../Home-Page/images/fyw.png">
    <title> VIP Booking Page </title>
</head>

<body onload="renderdate()">
    <header>
        <img class="logo" src="../Home-Page/images/fyw.png">
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

    <div style="text-align: center; font-family: 'Poppins', serif; margin: 3rem 0rem; ">
        <strong>
            <h1 style="font-weight:bold ; font-size: 50px; line-height: 50px;">VIP</h1>
        </strong>
    </div>

    <h1>Please Select a Day</h1>

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
        <section class="site-info">

            <div class="header">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layers" viewBox="0 0 16 16">
                    <path d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882l-7.5-4zm3.515 7.008L14.438 10 8 13.433 1.562 10 4.25 8.567l3.515 1.874a.5.5 0 0 0 .47 0l3.515-1.874zM8 9.433 1.562 6 8 2.567 14.438 6z" />
                </svg> <!--icon-->
                <p style="text-align: end;"> Select a Date</p>
            </div>

            <p>Select a Touristic Site</p>
            <div class="form-example-cntr ">
                <div class="form-example hidden">
                    <input type="checkbox" class="form-check-input" name="day1" id="name" />
                    <label for="name">Touristic Site </label>
                </div>
            </div>
            <button class="add-order-btn">Add to Order</button>

        </section>
    </section>
    <div>
        <section class="order-summary hidden">
            <div>
                <p class="order-summary-text">Order Summary</p>
            </div>

            <div class="site-order hidden">
                <div class="col1">
                    <p class="site-date">
                        <span class="day">Order date</span>
                    </p>
                    <p class="order-site-name hidden">Site Name </p>
                </div>
                <div class="col2">
                    <span class="wrapper num">01</span>
                </div>
                <div class="col3">
                    <p class="price">XAF <span class="site-pricing">0</span></p>
                    <div class="wrapper">
                        <span class="minus" style="border-right: 1px solid black;">-</span>

                        <span class="plus">+</span>
                    </div>
                </div>

            </div>


        </section>
    </div>
    <section class="total">
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
                        require '../Classic-Page/php/connection.php';
                        require '../VIP-Page/code.php';
                        echo get_package_details($pdo, 'Classic');
                        ?>`;
        console.log(package_data);
        const obj = JSON.parse(package_data); //data from the backend

        const currentUrl = window.location.href;

        // Create URLSearchParams instance from the URL
        const urlParams = new URLSearchParams(new URL(currentUrl).search);

        urlParams.forEach((value, key) => {
            if (key == "response") {
                alert(value);
            }
        });
    </script>


    <script src="./js/calendar.js"></script>
    <script src="./js/dataHandler.js"></script>
</body>