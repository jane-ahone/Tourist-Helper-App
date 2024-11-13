<?php
session_start();

require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['user_id'] = 1; // Need to delete in real environment
    $_SESSION['account_type'] = "ADMIN"; // Need to delete in real environment
    if ($_SESSION['account_type'] != 'ADMIN') {
        echo 'Only an admin is allowed to execute this operation.';
    } else {
        $packageday = $_POST['packageday'];
        $packageprice = $_POST['packageprice'];
        $packagetype = $_POST['packagetype'];

        $stmt = $pdo->prepare("INSERT INTO package (Day, Price, package_type) VALUES (?, ?, ?)");
        if ($stmt->execute([$packageday, $packageprice, $packagetype])) {
            // Package details saved successfully
            // You can add additional logic or redirect the user to another page
            echo "Package created successfully!";
        } else {
            echo "Error creating package";
        }
    }
}
?>
<?php
include ('sidebar.php')
?>
<link rel="stylesheet" href="style/addpackage.css">
<link rel="stylesheet" href="style/package.css">
<link rel="stylesheet" href="input.css">


<div class="div">
    <h1>Create Packages</h1>
</div>
<br>  



<section class="add_package">

<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput">Day</label><br><br>
									<div class="colinput">
										<input type="text" class="form-control1" name="packageday" id="packageday" placeholder="  Package Day" required>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput">Price</label><br><br><br>
									<div class="colinput">
										<input type="text" class="form-control1" name="packageprice" id="packageprice" placeholder=" Package price" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput">Package Type</label><br><br><br>
									<div class="colinput">
										<input type="text" class="form-control1" name="packagetype" id="packagetype" placeholder=" Package Type" required>
									</div>
								</div>



								<div class="row">
			<div class="cbutton">
				<button type="submit" name="submit" class="create">Create</button>

				<button type="reset" class="btn-inverse btn"><a href="create-package.php">Reset</a></button>
			</div>
		</div>
						
					
						
						
						
					</div>
					
					</form>

</section>
	
</body>
</html>