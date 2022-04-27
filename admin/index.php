<!DOCTYPE html>
<html lang="en">

<?php
include "includes/auth.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- ===== CSS ===== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Manegment system</title>
</head>

<body id="body-pd">
    <?php
    include "views/sidenav.php";
    include "includes/db.php";
    $DAO = new Database();
    $tsql = "SELECT * FROM `allorders` WHERE status = 'Order'";
    $total_order = $DAO->CountRows($tsql);
    $total_users = $DAO->CountRows("SELECT * FROM `clients`");
    $total_deliverd = $DAO->CountRows("SELECT * FROM `allorders` WHERE status = 'Deliverd'");
    $total_cancel = $DAO->CountRows("SELECT * FROM `allorders` WHERE status = 'cancel'");

    ?>


    <section class="componentContainer">
        <!-- <h1>Component</h1> -->
        <div class="navigation mb-3">
            <span class="rootMenu"><a href="#">Home</a> / </span><Span class="mainMenu"><a href="#">DashBoard</a></Span>
        </div>

        <!-- statictics card  -->
        <div class="row">
            <div class="col m-2 numBox">
                <div class="numIcon" style="background-color: rgba(3, 3, 177, 0.678);">
                    <!-- <i class='bx bxs-widget'></i> -->
                    <i class='bx bxs-user-circle'></i>
                </div>
                <div class="numDetails">
                    <span class="numHead">Total Users </span>
                    <span id="totalnum"><?php echo $total_users; ?></span>
                </div>
            </div>
            <div class="col m-2 numBox">
                <div class="numIcon" style=" background-color: rgba(134, 12, 175, 0.705);">
                    <i class='bx bxs-package'></i>
                </div>
                <div class="numDetails">
                    <span class="numHead">Total Users </span>
                    <span id="totalnum"><?php echo $total_order; ?></span>
                </div>
            </div>
            <div class="col m-2 numBox">
                <div class="numIcon" style=" background-color: rgba(3, 3, 177, 0.678);">
                <i class='bx bxs-truck'></i>
                </div>
                <div class="numDetails">
                    <span class="numHead">Total Deliveries</span>
                    <span id="totalnum"><?php echo $total_deliverd; ?></span>
                </div>
            </div>
            <div class="col m-2 numBox">
                <div class="numIcon" style=" background-color: rgba(134, 12, 175, 0.705);;">
                    <i class='bx bxs-user'></i>
                </div>
                <div class="numDetails">
                    <span class="numHead">Total Cancel</span>
                    <span id="totalnum"><?php echo $total_cancel; ?></span>
                </div>
            </div>
        </div>
        <div class="dataContainer mt-3">
            <div class="row ">
                <div class="col-md-12 col-12">
                    <h3 style="font-weight: 600;">Recent Orders</h3>
                    <table class="table" id="recentData">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Id</th>
                                <th>Product</th>
                                <th>Attributes</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "script/view_recentOrder.php";
                            ?>

                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </section>


    <footer>
        <ul>
            <li>Copyright &copy; 2022 Beetabie.All Right Reserved</li>
            <li>Developed by <a href="#">Subhankar sarkar</a></li>
        </ul>
    </footer>

    <!--===== MAIN JS =====-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#navHome').addClass('active');
        })
    </script>
</body>

</html>