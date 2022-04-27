<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "partials/.head.php"; ?>
  <title>Sign in | Muscle & Fitness Care</title>
</head>

<body class="">
  <?php
  include "partials/header.php";

  $pass_match = false;
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signin'])) {
      $DAO = new Database();
      $s = "SELECT * FROM `clients` WHERE email = '" . $_POST['sign_email'] . "'";
      if ($DAO->CountRows($s) > 0) {
        $d = $DAO->RetriveSingle($s);
        $hashed_password = $d['hash'];
        $password = $_POST['sign_pass'];
        if (password_verify($password, $hashed_password)) {
          $_SESSION['loggedin'] = true;
          $_SESSION['id'] = $d['id'];
          $_SESSION['name'] = $d['name'];
          $_SESSION['msg']='';
          echo "<script>window.location='./index.php'</script>";
        } else {
          $pass_match = true;
        }
      }else {
        $pass_match = true;
      }
    }
  }

  ?>


  <main class="container-fluid">
    <div class="row mt-5">
      <div class="col-md-5 col-12 mx-auto p-4 whiteBg">
        <h3 class="text-center mb-3 heading">Sign in to Continue</h3>
        <?php
        if (isset($_SESSION['msg'])) {
          echo '<div class="alert alert-success text-center" role="alert" style="font-size:1.5rem">Account Created Successfully. Please Login to Continue </div>';
        }
        if ($pass_match) {
          echo '<div class="alert alert-danger text-center" role="alert" style="font-size:1.5rem">Invalid Credentials </div>';
        }


        ?>




        <form action="signin.php" method="post">

          <div class="mb-3">
            <!-- <label for="name" class="form-label">Email</label> -->
            <input type="text" class="form-control" name="sign_email" placeholder="Enter Your Email" required>
          </div>

          <div class="mb-3 passbox">
            <!-- <label for="name" class="form-label">Password</label> -->
            <input type="password" class="form-control" name="sign_pass" id="p3" placeholder="Enter Your Password" required>
            <div class="passToggler">
              <i class='bx bx-show eye' data-id="3"></i>
            </div>
          </div>


          <div class="d-flex flex-column">
            <button type="submit" name="signin" class="btn btn-lg btn-primary w-50 mx-auto">Sign In</button>
            <p class="text-center mt-4" style="font-size: 1.5rem;">Don't Have an Acoount? <a href="signup.php" class="text-primary">Sign Up</a></p>
            <p class="text-center" style="font-size: 1.5rem;">Forgot Password? <a href="forgot.php" class="text-primary">Click Here</a></p>
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