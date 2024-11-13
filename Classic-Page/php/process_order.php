<?php
session_start();

require 'connection.php';
require 'process_payment.php';

function get_package_price($pdo, $package_id)
{
    $stmt = $pdo->prepare(
        "SELECT * 
        FROM package
        WHERE package_id = :package_id"
    );
    $stmt->bindParam(':package_id', $package_id, PDO::PARAM_INT);
    $stmt->execute();
    $package = $stmt->fetch(PDO::FETCH_ASSOC);
    return $package['Price'];
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
        // {
        //     "package_ids": [1,2,1,5],
        //     "package_counts": [10,5,6,1],
        //     "booking_dates": [2,5,4,6],
        // }

        
        $order = json_decode($order_details, true);
        $total = 0;
        foreach (array_map(null, $order['package_ids'], $order['package_counts']) as $package) {
            $package_id = $package[0];
            $package_count = $package[1];
            if($package_count <1){
                continue;
            }
            $total += get_package_price($pdo, $package_id) * $package_count;
        }
        $reference_id = get_uuid();

        if (process_payment($total, $_SESSION["phone_number"], $reference_id)) {
            $pdo->beginTransaction();
            try {
                $stmt = $pdo->prepare("INSERT INTO `order` (User_ID, Total_Price, Order_Method, Payment_Reference) VALUES (?, ?, ?, ?)");
                $stmt->execute([$user_id, $total, 'Mobile Money', $reference_id]);
                $order_id = $pdo->lastInsertId();
                foreach (array_map(null, $order['package_ids'], $order['package_counts'], $order['booking_dates']) as $package) {
                    $package_id = $package[0];
                    $package_count = $package[1];
                    $booking_date = $package[2];
                    $stmt = $pdo->prepare("INSERT INTO booking (Order_ID, Package_ID, Price, NumberOfTickets, Booking_Date) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([$order_id, $package_id, 0, $package_count, $booking_date]);
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
