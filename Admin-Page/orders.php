<?php
require 'connection.php';

// Retrieve data from the "order" table
$stmt = $pdo->query("SELECT * FROM `order`");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);




?>



<?php
include ('sidebar.php')
?>




<link rel="stylesheet" href="style/package.css">


<div class="div">
    <h1>Table Orders</h1>
</div>
<br>
   
    <table>
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Booking Date</th>
            <th>Total_Price</th>
            <th>Order_Method</th>
            <th>Payment_Reference</th>
            <th>ACTION</th>
        </tr>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?php echo $order['Order_ID']; ?></td>
            <td><?php echo $order['User_ID']; ?></td>
            <td><?php echo $order['Booking_Date']; ?></td>
            <td><?php echo $order['Total_Price']; ?></td>
            <td><?php echo $order['Order_Method']; ?></td>
            <td><?php echo $order['Payment_Reference']; ?></td>

            <td>
                <form method="post">
                    <?php
                    //tis is the delete
if (isset($_POST['delete'])) {
    $orderId = $_POST['delete'];
    $stmt = $pdo->prepare("DELETE FROM `order` WHERE Order_ID = ?");
    if ($stmt->execute([$orderId])) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record";
    }
}
?>
                    <button class="delete-button" type="submit" name="delete" value="<?php echo $order['Order_ID']; ?>">Delete</button>
                </form>
            </td>

        </tr>
        <?php endforeach; ?>
    </table>
    </main>

	
</body>
</html>