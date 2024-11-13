<?php
session_start();

require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$_SESSION['user_id'] = 1; // Need to delete in real environment
	$_SESSION['account_type'] = "ADMIN"; // Need to delete in real environment
	if ($_SESSION['account_type'] != 'ADMIN') {
		echo 'Only an admin is allowed to execute this operation.';
	} else {
		$start_time = $_POST['Start_Time'];
		$end_time = $_POST['End_Time'];
		$site_name = $_POST['Site_Name'];
		$price = $_POST['Price'];
		$ratings = $_POST['Average_Ratings'];
		$site_location = $_POST['Site_Location'];
		$description = $_POST['Description'];

		$stmt = $pdo->prepare("INSERT INTO tour (Start_Time, End_Time, Site_Name, Price, Average_Ratings, Site_Location, Description) VALUES (?, ?, ?, ?, ?, ?, ?)");
		if ($stmt->execute([$start_time, $end_time, $site_name, $price, $ratings, $site_location, $description])) {
			// Tour details saved successfully
			// You can add additional logic or redirect the user to another page
			echo "Tour created successfully!";
		} else {
			echo "Error creating tour";
		}
	}
}
?>
<?php
include('sidebar.php')
?>

<link rel="stylesheet" href="../style/package.css">
<link rel="stylesheet" href="../style/addpackage.css">
<link rel="stylesheet" href="../input.css">

<div class="div">
	<h1>Tours</h1>
</div>
<br>



<section class="add_package">
	<form class="form-horizontal" name="tour" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="focusedinput">Start Time</label>
			<div class="col-sm-8">
				<input type="text" class="form-control1" name="Start_Time" id="Start_Time" placeholder="Start Tour" required>
			</div>
		</div>
		<div class="form-group">
			<label for="focusedinput">End Time</label>
			<div class="col-sm-8">
				<input type="text" class="form-control1" name="End_Time" id="End_Time" placeholder="End Tour" required>
			</div>
		</div>

		<div class="form-group">
			<label for="focusedinput">Site_Name</label>
			<div class="col-sm-8">
				<input type="text" class="form-control1" name="Site_Name" id="Site_Name" placeholder=" Tour Name" required>
			</div>
		</div>

		<div class="form-group">
			<label for="focusedinput">Price</label>
			<div class="col-sm-8">
				<input type="text" class="form-control1" name="Price" id="Price" placeholder=" Tour Price" required>
			</div>
		</div>

		<div class="form-group">
			<label for="focusedinput">Ratings</label>
			<div class="col-sm-8">
				<input type="text" class="form-control1" name="Average_Ratings" id="Ratings" placeholder=" Tour Ratings" required>
			</div>
		</div>



		<div class="form-group">
			<label for="focusedinput">Site_Location</label>
			<div class="col-sm-8">
				<input type="text" class="form-control1" name="Site_Location" id="Site_Location" placeholder="Tour Location" required>
			</div>
		</div>


		<div class="form-group">
			<label for="focusedinput">Description</label>
			<div class="col-sm-8">
				<textarea class="form-control" rows="5" cols="50" name="Description" id="Description" placeholder="Tour Description" required></textarea>
			</div>
		</div>


		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="submit" class="create">Create</button>

				<button type="reset" class="btn-inverse btn">Reset</button>
			</div>
		</div>





		</div>

	</form>
</section>



</body>

</html>