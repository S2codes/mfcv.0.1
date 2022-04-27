<?php
    include "includes/auth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- ===== CSS ===== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>All Orders</title>
</head>

<body id="body-pd">
    <?php
        include "views/sidenav.php";
        include "includes/db.php";
    ?>


    <section class="componentContainer">
        <!-- <h1>Component</h1> -->
        <div class="navigation mb-3">
            <span class="rootMenu"><a href="#">Home</a> / </span><Span class="mainMenu"><a href="#">All Orders</a></Span>
        </div>

        <div class="row">
            <div class="col">
                <h3 style="font-weight: 600;">All Orderss</h3>
            </div>
          
           
        </div>
       
        <div class="dataContainer mt-3">
            <div class="row ">
                <div class="col-md-11 col-12 mx-auto">
                    <table class="table" id="myTable">
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
                              include "script/view_orders.php";
                          ?>
                           
                        </tbody>
                    </table>

                </div>
               
            </div>
        </div>
    </section >


    <footer>
        <ul>
            <li>Copyright &copy; 2022 Beetabie.All Right Reserved</li>
            <li>Developed by <a href="#">Subhankar sarkar</a></li>
        </ul>
    </footer>

    <!--===== MAIN JS =====-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="http://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
            $('#navOrders').addClass('active');
        } );
    </script>
    <script src="assets/js/main.js"></script>
    
</body>

</html>