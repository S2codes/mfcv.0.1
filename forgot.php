<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "partials/.head.php"; ?>
    <title>Recover Your Password | Muscle & Fitness Care</title>
</head>

<body class="">
    <?php
    include "partials/header.php";

    $pass_match = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['forgotPass'])) {
            $DAO = new Database();
            $email = mysqli_real_escape_string($con, $_POST['sign_email']);
            $s = "SELECT * FROM `clients` WHERE email = '$email'";
            if ($DAO->CountRows($s) > 0) {
                $d = $DAO->RetriveSingle($s);
                $token = $d['token'];
                echo "<script>window.location='./reset_password.php?slug=$token'</script>";
            } else {
                $pass_match = true;
            }
        }
    }

    ?>


    <main class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-5 col-12 mx-auto p-4 whiteBg">
                <h3 class="text-center mb-3 heading">Forgot Password</h3>
                <?php
                if ($pass_match) {
                    echo '<div class="alert alert-danger text-center" role="alert" style="font-size:1.5rem">No Account Found</div>';
                }


                ?>




                <form action="forgot.php" method="post">

                    <div class="mb-4">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" class="form-control" name="sign_email" placeholder="Enter Your Email" required>
                    </div>

                    <div class="d-flex flex-column mb-5">
                        <button type="submit" name="forgotPass" class="btn btn-lg btn-primary w-50 mx-auto">Send Mail</button>
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