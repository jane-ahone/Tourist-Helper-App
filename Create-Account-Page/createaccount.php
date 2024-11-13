<?php
session_start();

include("../includes/connection.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Address = $_POST['Address'];
    $Phone_Number = $_POST['Telephone'];

     //check if the email already exists
    $checkQuery = "SELECT * FROM user WHERE Email = '$Email'";
     $result = mysqli_query($con,$checkQuery);

     if (mysqli_num_rows($result) > 0) {
          echo "This email already exist. Please enter different email."; } else {

    if (!empty($First_Name) && !empty($Last_Name) && !empty($Email) && !empty($Password) && !empty($Phone_Number) && !is_numeric($First_Name) && !is_numeric($Last_Name)) {

          //Hash the password
          $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
        
         // Save in the database
        $query = "INSERT INTO user (First_Name, Last_Name, Email, Type, Password, Phone_Number, Address) VALUES ('$First_Name', '$Last_Name', '$Email', 'CUSTOMER', '$hashedPassword', '$Phone_Number', '$Address')";
        
          mysqli_query($con, $query);
      
        if (mysqli_error($con)) {
    echo "Error: " . mysqli_error($con);
          }

          $checkQuery = "SELECT * FROM user WHERE Email = '$Email'";
          $result = mysqli_query($con,$checkQuery);
          $user_data = mysqli_fetch_assoc($result);
          
          $_SESSION["Email"] =$Email;
          $_SESSION["First_Name"] =$First_Name;
          $_SESSION['user_id'] = $user_data['User_ID'];
          $_SESSION['account_type'] = $user_data['Type'];
          $_SESSION['phone_number'] = $user_data['Phone_Number'];

          header("Location: ../Home-Page/home.php");
        die;
    } else {
        echo "Please enter valid information!";
    }
   
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style/create-account.css" rel="stylesheet">
    <title>Create Account</title>
</head>
<body>
    <main>
        <section class="sect1">
            <div class="logo"><img src="../Home-Page/images/fyw.png"></div>
            <div class="block1"> <div class="content1">
                    <div class="welcome"> WELCOME TO <span> FIND YOU WAY</span>  </div>
                    <center>
                        <P>To keep connected with us, please login with your personal info</P>
                        <a href="login.html" target="_blank" ><button class="sign-in">SIGN-IN</button></a>
                    </center>
                </div>
            </div>   
        </section>
        <section class="sect2">
            <form class="content2" method="post" action="">
                <div class="create"> Create Account </div>
                <div class="inp"><img src=""> <label for="First_Name"></label><input placeholder=" First_Name" type="text" name="First_Name" id="First_Name" required> </div>
                <div class="inp"><img src=""> <label for="Last_Name"></label><input placeholder=" Last_Name" type="text" name="Last_Name" id="Last_Name"> </div>
                <div class="inp"><img src=""> <label for="Email"></label><input placeholder=" Email" type="email" name="Email" id="Email" required> </div>
                <div class="inp"><img src=""> <label for="Password"></label><input placeholder=" Password" type="password" name="Password" id="Password" required> </div>
                <div class="inp"><img src=""> <label for="Telephone"></label><input placeholder=" Telephone" type="tel" name="Telephone" id="Telephone" required> </div>
                <div class="inp"><img src=""> <label for="Address"></label><input placeholder=" Address" type="text" name="Address" id="Address" required> </div>
                 <?php if (!empty($errorMsg)) { ?>
                    <div class="error-msg"><?php echo $errorMsg; ?></div>
                <?php } ?>
                 
                <a href="index.php"><input class="sign-up" type="submit" value="SIGN-UP"></a>
            </form>    
        </section>
    </main>
</body>
</html>