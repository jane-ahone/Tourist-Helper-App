<?php
session_start();

include("../includes/connection.php");
include("functions.php");

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // Something was posted
  $Email = $_POST['Email'];
  $password = $_POST['password'];

  if (!empty($Email) && !empty($password) && !is_numeric($Email)) {
    // Read from the database
    $query = "SELECT * FROM user WHERE email = '$Email' LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $user_data = mysqli_fetch_assoc($result);

      // Verify the password
      if (password_verify($password, $user_data['Password'])) {
        $_SESSION["Email"] = $Email;
        $_SESSION["First_Name"] = $user_data['First_Name'];
        $_SESSION['user_id'] = $user_data['User_ID'];
        $_SESSION['account_type'] = $user_data['Type'];
        $_SESSION['phone_number'] = $user_data['Phone_Number'];
        if (isset($_GET['redirect'])) {
          header("Location: " . $_GET['redirect']);
          // header("Location: ../Home-Page/home.php");
        } else {
          header("Location: ../Home-Page/home.php");
        }
        die;
      } else {
        $error_message = "Incorrect email or password!";
      }
    } else {
      $error_message = "Incorrect email or password!";
    }
  } else {
    $error_message = "Incorrect email or password!";
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FindYourWay | Login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="bootstrap-grid.min.css">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap-grid.rtl.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap-grid.min.css" integrity="sha512-ZuRTqfQ3jNAKvJskDAU/hxbX1w25g41bANOVd1Co6GahIe2XjM6uVZ9dh0Nt3KFCOA061amfF2VeL60aJXdwwQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap-grid.rtl.min.css" integrity="sha512-C9DqRFOOTJ5aY4nPjM2zWBP1leudW4G1Sdb5fjRqdP/Vvfyx0bgittDhurMhu/LlXw3oC/QRlPz47qQPTYl+FA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
  </style>
</head>

<body>
  <section class="h-100 gradient-form" style="background-color: #eee">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0" id="bg">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4" id="bg">
                  <div class="text-center" id="blur">
                    <img src="logo.jpeg" style="width: 150px" alt="FindYourWay" />
                    <h4 id="wel" class="mt-1 mb-5 pb-1">WELCOME BACK</h4>
                    <center>
                      <p>
                        To keep connected with us,<br />
                        please login with your personal information<br />
                        or using social media
                      </p>
                    </center><br>
                  </div>

                  <form method="post">
                    <?php if (isset($error_message)) { ?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                      </div>
                    <?php } ?>

                    <div class="form-outline mb-4">
                      <input type="email" id="form2Example11" class="form-control" placeholder="email" name="Email" />
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" placeholder="password" id="form2Example22" class="form-control" name="password" />
                    </div>

                    <a id="for" class="text-danger margin-right" href="#!">Forgot password?</a><br />

                    <div class="text-center pt-1 mb-5 pb-1">
                      <button id="btn" class="btn btn-success btn-block fa-lg mb-3" type="submit">Log in</button>
                    </div>

                    <hr />

                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Don't have an account?</p>
                      <a href="../Create-Account-Page/createaccount.php">
                        <button id="cbtn" type="button" class="btn">Create new</button>
                      </a>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center" style="background: #40b09c;">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">FindYourWay</h4>
                  <p class="small mb-0">
                    Find Your way today and experience...
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>