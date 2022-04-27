<!DOCTYPE html>
<html lang="en">

<head>
  <?php
      include "partials/.head.php";
  ?>
    <title>Order Status | muscleandfinesscare</title>
</head>

<body>
    <!-- navbar  -->
    <?php
      include "partials/header.php";
      if (!isset($_SESSION['loggedin'])) {
          echo "<script>window.location='index.php'</script>";
        }
        if (!isset($_GET['orderid']) & !isset($_GET['query'])) {
            echo "<script>window.location='index.php'</script>";
        }
        $DAO = new Database();
        $orderid = $_GET['orderid'];
        $id = $_GET['query'];
        $sql = "SELECT * FROM `allorders` WHERE orderid = '$orderid' AND id = '$id'";
        $data = $DAO->RetriveSingle($sql);
        $addr = $data['address'];
        $addr = json_decode($addr,true);

        $pid = $data['productid'];
        $psql = "SELECT `feature_img` FROM `products` WHERE id = $pid";
        $ft = $DAO->RetriveSingle($psql);
        $ftimg = $ft['feature_img']; 
    ?>

    <main class="pt-5">

        <div class="container-fluid p-0 mt-3">
            <!-- feature products  -->
            <div class="row">
                <div class="col-md-10 col-12 mx-auto feature_product_container p-0">
                    <input type="hidden" id="oid" value="<?php echo $orderid;?>">

                    <div class="cart-list">
                        <h2 class="cart-title heading">Order Status</h2>

                        <div class="row mx-auto cartItem mb-3">
                            
                            <div class="col-md-8 col-12 p-2">
                                <h2>Order Id : <?php echo $_GET['orderid'] ?></h2>
                                <h3>Delivery Address</h3>
                                <p class="cartProductTitle"><?php echo $addr['name'];?></p>
                                <p class="attribute"><Span class="text-dark">Phone : </Span> <?php echo $addr['phone'].' | '.$addr['additional phone'];?></p>
                                <p class="attribute">
                                <?php 
                                    echo 'Land Mark : '.$addr['landmark'].', '.$addr['area'].', '.$addr['city'].'<br> '.$addr['state'].', Pin-'.$addr['pin'];
                                    echo '<strong><br>'.$addr['type'].'</strong>';
                                ?>
                                </p>
                               
                            </div>
                            <!-- <div class="col-md-4 col-12 p-2">
                                <h4>Download Invoice</h4>
                                <a href="#" class="btn btn-info text-light">Download <i class='bx bxs-download'></i></a>
                            </div> -->
                            

                        </div>
                        <div class="row mx-auto cartItem">
                            <div class="col-md-3 col-12 p-2 cartProductThumb">
                            <a href="product-details.php?querry=<?php echo $pid;?>">
                                <img src="admin/<?php echo $ftimg;?>" alt="" class="">
                            </a>    
                            </div>
                            <div class="col-md-6 col-12 p-2">
                                <p class="cartProductTitle"><?php echo $data['productname'];?></p>
                                <p class="attribute">weight : <Span class="text-dark"><?php echo $data['attribute'];?></Span></p>
                                <p class="attribute">Flavor : <Span class="text-dark"><?php echo $data['flavors'];?></Span></p>
                                <p class="cartPrice"><?php echo $data['price'];?> &#8377; X <?php echo $data['quantity'];?></p>
                                
                                <p style="font-size: 2rem;">Total Price : <?php echo $data['totalprice'];?> &#8377;</p>
                            </div>
                            <div class="col-md-3 col-12 p-2">
                                <p class="cartDelivery">Delivery in 7 - 9 days</p>
                                <p class="cartDeliveryCharge">Free </p>
                                <?php 
                                    if ($data['status'] == 'cancel') {
                                        // echo '<h1>Cancel</h1>';
                                        echo '<p class="text-dark fs-3 m-0">Status: <span class="cartDeliveryCharge text-danger fs-2">Cancel</span></p>
                                        <small class="fs-4 para m-0">As Per Your Request</small>';
                                    }else {
                                        echo '<p class="text-dark fs-3">Status: <span class="cartDeliveryCharge fs-2">'.$data['status'].'</span></p>';
                                        echo '<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancel</button>';
                                    }
                                ?>
                                
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>



    </main>



<!-- Modal -->
<div class="modal fade shadow" id="cancelModal" tabindex="-1" aria-labelledby="cancelModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h5 class="text-center fs-3">Are You Sure Want Cancel The Order ?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" id="cancelOrder" >Cancel</button>
      </div>
    </div>
  </div>
</div>


  <!-- footer bar-->
 <?php
   include "partials/footer.php";
 ?>

    <script src="assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js"></script>
    <?php
        include "script/_ordercancel.php";
    ?>
</body>

</html>