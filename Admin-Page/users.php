<?php
require 'connection.php';

// Retrieve data from the "package" table
$stmt = $pdo->query("SELECT * FROM `user`");
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include ('sidebar.php')
?>
<link rel="stylesheet" href="style/package.css">
<link rel="stylesheet" href="style/userresponsive.css">


<div class="div">
    <h1>Table USERS</h1>
</div>
<br>
    

    <table>
        <tr>
            <th>User ID</th>
            <th>First_Name</th>
            <th>Last_Name</th>
            <th>email</th>
            <th>Type</th>
            
            <th>Phone_Number</th>
            <th>Address</th>
            <th>ACTION</th>
        </tr>
        <?php foreach ($user as $user): ?>
        <tr>
            <td><?php echo $user['User_ID']; ?></td>
            <td><?php echo $user['First_Name']; ?></td>
            <td><?php echo $user['Last_Name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['Type']; ?></td>
            
            <td><?php echo $user['Phone_Number']; ?></td>
            <td><?php echo $user['Address']; ?></td>

            <td>
                <form method="post">
                    <?php
                    //tis is the delete
if (isset($_POST['delete'])) {
    $userId = $_POST['delete'];
    $stmt = $pdo->prepare("DELETE FROM `user` WHERE User_ID = ?");
    if ($stmt->execute([$userId])) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record";
    }
}
?>
                    <button class="delete-button" type="submit" name="delete" value="<?php echo $userId['User_ID']; ?>">Delete</button>
                </form>
            </td>

        </tr>
        <?php endforeach; ?>
    </table>

        </main>
</body>
</html>