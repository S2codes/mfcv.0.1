<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include "partials/.head.php";
  ?>
  <title>Sign Up | Muscle & Fitness Care</title>
</head>

<body class="">
  <?php
  include "partials/header.php";
$alert = false;
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signup'])) {
      $username = mysqli_real_escape_string($con, $_POST['name']);
      $email = mysqli_real_escape_string($con, $_POST['email']);
      $phone = mysqli_real_escape_string($con, $_POST['phone']);
      $pass = mysqli_real_escape_string($con, $_POST['pass']);
      $cpass = mysqli_real_escape_string($con, $_POST['cpass']);

      $DAO = new Database();
      $q = "SELECT * FROM `clients` WHERE email = '$email'";
      if ($DAO->CountRows($q) > 0) {
        $alert = true;
      }else{
        $hash = password_hash($_POST['pass'], PASSWORD_BCRYPT);
        $token = bin2hex(random_bytes(15));

        $s = "INSERT INTO `clients`(`name`, `phone`, `email`, `hash`, `token`) VALUES ('" . $_POST['name'] . "','" . $_POST['phone'] . "','" . $_POST['email'] . "','$hash', '$token')";
        if ($DAO->Query($s)) {
          $_SESSION['msg']= true;
          echo "<script>document.getElementById('signupForm').reset();</script>";
          echo "<script>window.location= 'signin.php?signup=alpha';</script>";
        } else {
          echo '<script>alert("Something error Occurred")</script>';
        }
      }
    }
  }
  ?>


  <main class="container-fluid">
    <div class="row mt-5">
      <div class="col-md-5 col-12 mx-auto p-4 whiteBg">
        <h3 class="text-center mb-3 heading">Create an Account</h3>
        <?php
         if ($alert) {
           echo '<div class="alert alert-warning text-center" role="alert" style="font-size:1.5rem">Already Have an Account. Please Login to Continue </div>';
         }
          
        ?>

        <form action="signup.php" method="post" id="signupForm">
          <small class="text-danger para ms-1" id="su_alert"></small>
          <div class="mb-3">
            <input type="text" class="form-control" name="name" id="su_name" placeholder="Name" required>
          </div>
          <div class="row mb-3">

            <input type="tel" class="form-control" name="phone" id="su_phone" placeholder="Phone Number" required>
          
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="email" id="su_email" placeholder="Email" required>
          </div>

          <div class="passbox">
            <input type="password" class="form-control" name="pass" id="su_pass" placeholder="Password" id="p1" required>
            <div class="passToggler">
              <i class='bx bx-show eye' data-id="1"></i>
            </div>
          </div>

          <small class="para ms-1">Password must be at least 6 characters</small>

          <div class="mt-3 passbox">
            <input type="password" class="form-control" name="cpass" id="su_cpass" placeholder="Confirm Password" id="p2" required>
            <div class="passToggler">
              <i class='bx bx-show eye' data-id="2"></i>
            </div>
          </div>

          <div class="d-flex flex-column mt-3">
            <button type="submit" name="signup" class="btn btn-lg btn-primary w-50 mx-auto">Sign Up</button>
            <p class="text-center mt-4" style="font-size: 1.2rem;">By continuing, you agree to Our's <a href="termsandconditions.php" class="text-primary">Terms and Conditions</a></p>

            <p class="text-center" style="font-size: 1.5rem;">Already Have an Acoount? <a href="signin.php" class="text-primary">Sign In</a></p>
          </div>

        </form>
      </div>
    </div>
  </main>

  <?php
  include "partials/footer.php";
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>