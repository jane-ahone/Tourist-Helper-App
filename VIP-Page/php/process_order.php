<?php
session_start();

require '../../Classic-Page/php/connection.php';
require '../../Classic-Page/php/process_payment.php';

function get_booking_price($pdo, $booking)
{
    $booking_price = 0;
    //get prices of individual touristic sites
    foreach ($booking['elts'] as $tour_name) {
        $stmt = $pdo->prepare(
            "SELECT * 
        FROM Tour
        WHERE Site_Name = :Site_Name"
        );
        $stmt->bindParam(':Site_Name', $tour_name, PDO::PARAM_STR);
        $stmt->execute();
        $tour = $stmt->fetch(PDO::FETCH_ASSOC);
        $booking_price = $tour["Price"] + $booking_price;  //sum them
    }
    return $booking_price;
}

function handle_booking($pdo, $order_id, $booking_date, $booking)
{
    $count = $booking['counts'];
    $price = $booking['price'];

    $stmt = $pdo->prepare("INSERT INTO booking (Order_ID, Price, NumberOfTickets, Booking_Date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$order_id, $price, $count, $booking_date]);
    $booking_id = $pdo->lastInsertId();

    foreach ($booking['elts'] as  $tour_name) {
        handle_toursession($pdo, $booking_id, $tour_name);
    }
}

function handle_toursession($pdo, $booking_id, $tour_name)
{
    $stmt = $pdo->prepare(
        "SELECT * 
        FROM Tour
        WHERE Site_Name = :Site_Name"
    );
    $stmt->bindParam(':Site_Name', $tour_name, PDO::PARAM_STR);
    $stmt->execute();
    $tour = $stmt->fetch(PDO::FETCH_ASSOC);
    $tour_id = $tour["Tour_ID"];

    $stmt = $pdo->prepare("INSERT INTO toursessionvip (Booking_ID, Tour_ID) VALUES (?, ?)");
    $stmt->execute([$booking_id, $tour_id]);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $_SESSION['phone_number'] = '0248888736'; // Need to delete in real environment
    // $_SESSION['user_id'] = 1; // Need to delete in real environment
    // $_SESSION['account_type'] = "USER"; // Need to delete in real environment
    if ($_SESSION['account_type'] == 'ADMIN') {
        echo 'Only a customer is allowed to execute this operation.';
    } else {
        $user_id = $_SESSION['user_id']; //getting the logged-in customer.
        $order_details = $_POST['order_details'];


        $order = json_decode($order_details, true);
        $total = 0;


        foreach (array_keys($order) as $booking_date) {
            $booking_price = get_booking_price($pdo, $order[$booking_date]);
            $order[$booking_date]['price'] = $booking_price;
            $total += $booking_price * $order[$booking_date]['counts'];
        }
        $reference_id = get_uuid();

        if (process_payment($total, $_SESSION["phone_number"], $reference_id)) {
            $pdo->beginTransaction();
            try {
                $stmt = $pdo->prepare("INSERT INTO `order` (User_ID, Total_Price, Order_Method, Payment_Reference) VALUES (?, ?, ?, ?)");
                $stmt->execute([$user_id, $total, 'Mobile Money', $reference_id]);
                $order_id = $pdo->lastInsertId();
                foreach(array_keys($order) as $booking_date) {
                   handle_booking($pdo, $order_id, $booking_date, $order[$booking_date]);
                }
                $pdo->commit();

                header("Location: ../index.php?response=order_successful");
            } catch (Exception $e) {
                $pdo->rollback();
                throw $e;
            }
        } else {
            echo "Payment unsucessful";
        }
    }
} else {
    echo "Invalid request.";
}
