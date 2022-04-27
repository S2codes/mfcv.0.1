<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "partials/.head.php"; ?>
  <title>Reset Your Password | Muscle & Fitness Care</title>
</head>

<body class="">
  <?php
  include "partials/header.php";

//   $pass_match = false;
  $success = false;
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['reset_pass'])) {
        $DAO = new Database();
        //   $s = "SELECT * FROM `clients` WHERE token = '$token'";
        
    $token= $_POST['slug_token'];
      $newpass = mysqli_real_escape_string($con, $_POST['n_pass']);
      $newcpass = mysqli_real_escape_string($con, $_POST['n_cpass']);
      
      if ($newpass == $newcpass) {
          $new_token = bin2hex(random_bytes(15));
          $hash = password_hash($newpass, PASSWORD_BCRYPT);
          $q = "UPDATE `clients` SET `hash`='$hash', `token` = '$new_token' WHERE `token` = '$token'";
          if ($DAO->Query($q)) {
              $success = true;
          }else{
              echo "<script>window.location='./index.php'</script>";
          }
      }
      
    }
  }

  ?>


  <main class="container-fluid">
    <div class="row mt-5">
      <div class="col-md-5 col-12 mx-auto p-4 whiteBg">
        <h3 class="text-center mb-3 heading">Reset Password</h3>
        <?php
       
        if ($success) {
          echo '<div class="alert alert-success text-center" role="alert" style="font-size:1.5rem">Password Changed Succesfully. Sign in to Continue </div>';
        }


        ?>




        <form action="reset_password.php" method="post">
            <?php
                if (isset($_GET['slug'])) {
                    $token = $_GET['slug'];
                    echo '<input type="hidden" name="slug_token" value="'.$token.'">';
                }
            ?>
            

          <div class="mb-3">
            <label for="name" class="form-label">Password</label>
            <input type="text" class="form-control" name="n_pass" placeholder="Enter Your new Password" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Confirm Password</label>
            <input type="text" class="form-control" name="n_cpass" placeholder="Enter Your new Password" required>
          </div>

          <div class="d-flex flex-column">
            <button type="submit" name="reset_pass" class="btn btn-lg btn-primary w-50 mx-auto">Sign In</button>
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