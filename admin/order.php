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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Order</title>
</head>

<body id="body-pd">
    <!-- sidenav  -->
    <?php
    include "views/sidenav.php";
    $exits = false;
    if (isset($_GET['oid'])) {
        $exits = true;
        include "./includes/db.php";
        $DAO = new Database();
        $id = $_GET['oid'];
        $d = $DAO->RetriveSingle("SELECT * FROM `allorders` WHERE orderid = '$id'");
    }
    ?>
    <!-- sidenav  -->
    <section class="componentContainer">
        <!-- <h1>Component</h1> -->
        <div class="navigation mb-3">
            <span class="rootMenu"><a href="#">Home</a> / </span><Span class="mainMenu"><a href="#">Order</a></Span>
        </div>

        <div class="row">
            <div class="col">
                <h3 style="font-weight: 600;">Order Details</h3>
            </div>

        </div>

        <!-- from  -->
        <div class="mt-2 px-3">
            <form action="controller/manage_brand.php" method="post" class="row">
                <div class="col-md-7 col-12 px-3">
                    <p class="mb-2"><strong>Order Id : </strong> <?php echo $d['orderid']; ?></p>
                    <input type="hidden" name="" id="oid" value="<?php echo $d['orderid']; ?>">
                    <p class="mb-2"><strong>Product Name : </strong> <a href="../product-details.php?querry=<?php echo $d['productid']; ?>" target="_blank"><?php echo $d['productname']; ?></a></p>
                    <p class="mb-2"><strong>Attribute : </strong> <?php echo $d['attribute']; ?></p>
                    <p class="mb-2"><strong>Flavors : </strong> <?php echo $d['flavors']; ?></p>
                    <p class="mb-2"><strong>Price : </strong> ₹<?php echo $d['price']; ?> X <?php echo $d['quantity']; ?></p>
                    <p class="mb-2"><strong>Total Price : </strong> ₹<?php echo $d['totalprice']; ?></p>
                    <?php
                    $attr = json_decode($d['address']);
                    ?>
                    <p class="mb-2"><strong>Name : </strong> <?php echo $attr->name; ?></p>
                    <p class="mb-2"><strong>Address : </strong>
                        <?php echo $attr->area . ', ' . $attr->city . ', ' . $attr->state . '-' . $attr->pin . ', Land Mark : ' . $attr->landmark; ?></p>
                    <p class="mb-1"><?php echo $attr->phone; ?></p>
                    <p class="mb-1"><?php echo $attr->type; ?></p>
                    <p class="mb-2"><strong>Payment Type : </strong> <?php echo $d['payment']; ?></p>
                    <p class="mb-2"><strong>Payment Id : </strong> <?php echo $d['payment_id']; ?></p>
                    <p class="mb-2"><strong>Payment Status : </strong> <?php echo $d['payment_status']; ?></p>
                    <p class="mb-2"><strong>Date : </strong> <?php echo $d['date']; ?></p>

                </div>

                <div class="col-md-5 col-12 px-3">

                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Status</strong></label>
                        <br>
                        <?php
                        $status = $d['status'];
                        $display = '';
                        if ($status == 'cancel') {
                            echo '<p class="bg-danger text-light py-2 px-3" style="display:inline-block;">Cancel</p>';
                            $display = 'style="display: none;"';
                        }
                        elseif ($status == 'Order') {
                            echo '<p class="bg-warning text-light py-2 px-3" style="display:inline-block;">Order</p>';
                        } else {
                            echo '<p class="bg-success text-light py-2 px-3" style="display:inline-block;">'.$status.'</p>';
                        }
                        
                        ?>

                    </div>
                    <small id="order_status_alert" class="text-danger"></small>
                    <div class="mb-3" <?php echo $display;?> >
                        <select name="order_status" id="order_status" class="form-control" required>
                            <option value="">Update Order Status</option>
                            <option value="Dispatched">Dispatched</option>
                            <option value="Deliverd">Deliverd</option>
                        </select>
                    </div>

                    <button type="button" name="save" id="update" class="btn btn-primary" <?php echo $display;?>>Update</button>

                    <a href="order_invoice.php?oid=<?php echo $d['orderid']; ?>" class="btn btn-info" target="_blank">Download <i class='bx bx-cloud-download'></i></a>



                </div>


            </form>

        </div>

    </section>


    <footer class="mt-5">
        <ul>
            <li>Copyright &copy; 2022 Beetabie.All Right Reserved</li>
            <li>Developed by <a href="#">Subhankar sarkar</a></li>
        </ul>
    </footer>

    <!--===== MAIN JS =====-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#update').click(function() {
                let status = $('#order_status').val();
                if (status == '') {
                    $('#order_status_alert').text('Select an option');
                } else {
                    $('#order_status_alert').text('');
                    update_order_status();

                }
            })

            function update_order_status() {

                let oid = $('#oid').val();
                let status = $('#order_status').val();
                $.ajax({
                    url: './controller/manage_order.php',
                    type: 'POST',
                    data: {order_id: oid,order_status: status},
                    success: function(data) {
                        if (data == 'suceess') {
                            location.reload();
                        }else{
                            alert('Something Error Occured. Please Try Again');
                        }
                    }

                })
            }
        })
    </script>
</body>

</html>