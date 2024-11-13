<?php
require 'connection.php';

// Retrieve data from the "package" table
$stmt = $pdo->query("SELECT * FROM `package`");
$packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include ('sidebar.php')
?>
<link rel="stylesheet" href="style/package.css">


<div class="div">
    <h1 style="font-size: 20px;">Table Packages</h1>
</div><br>
<br>  

    <table>
        
        <tr>
            <th>Package ID</th>
            <th>Day</th>
            <th>Price</th>
            <th>Package Type</th>
        </tr>
        <?php foreach ($packages as $package): ?>
        <tr>
            <td><?php echo $package['Package_ID']; ?></td>
            <td><?php echo $package['Day']; ?></td>
            <td><?php echo $package['Price']; ?></td>
            <td><?php echo $package['package_type']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

        </main>
</body>
</html>