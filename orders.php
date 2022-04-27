<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    include "partials/.head.php";
  ?>
  <title>Orders | muscleandfinesscare</title>
</head>

<body>
  <!-- navbar  -->
  <?php
    include "partials/header.php";
    if (!isset($_SESSION['loggedin'])){
        echo "<script>window.location='./index.php'</script>";
    } 

    $DAO = new Database();
    $sql = "SELECT * FROM `allorders` WHERE userid = $userId";
    $data = $DAO->RetriveArray($sql);
    $orderNum = $DAO->CountRows($sql);
  ?>

  <main class="pt-5">

    <div class="container-fluid p-0 mt-3">
      <!-- feature products  -->
      <div class="row">
        <div class="col-md-11 col-12 mx-auto feature_product_container p-0">


          <div class="cart-list">
            <h2 class="cart-title heading">All orders (<?php echo $orderNum; ?>)</h2>

            <?php
                foreach($data as $order){
                  $pid = $order['productid'];
                  $psql = "SELECT `feature_img` FROM `products` WHERE id = $pid";
                  $ft = $DAO->RetriveSingle($psql);
                  $ftimg = $ft['feature_img']; 
                  echo ' <div class="row mx-auto cartItem">
                  <div class="col-md-3 col-12 p-2 cartProductThumb">
                  <a href="product-details.php?querry='.$pid.'" class="cartProductThumb">
                    <img src="admin/'.$ftimg.'" alt="" class="">
                    </a>
                  </div>
                  <div class="col-md-6 col-12 p-2">
                    <p class="cartProductTitle">'.$order['productname'].'</p>
                    <p class="attribute">weight : <Span class="text-dark">'.$order['attribute'].'</Span></p>
                    <p class="attribute">Flavors : <Span class="text-dark">'.$order['flavors'].'</Span></p>
                    <p class="cartPrice">'.$order['price'].' &#8377; X '.$order['quantity'].'</p>
                    <p style="font-size: 1.7rem;">Total Price : '.$order['totalprice'].' &#8377;</p>
                  </div>
                  <div class="col-md-3 col-12 p-2">
                    <p class="cartDelivery">Delivery in 7 - 9 days</p>
                    <p class="cartDeliveryCharge">Free </p>
                    <a href="order-status.php?orderid='.$order['orderid'].'&query='.$order['id'].'" class="btn btn-outline-info mt-3 fs-4 px-5">Status</a>
                  </div>
    
                </div> ';
                }
            
              if ($orderNum == 0) {
                echo '<h1 class="text-center heading">No Orders yet</h1>';
            }
            ?>

          </div>
        </div>
      </div>
    </div>



  </main>

  <!-- footer bar-->
  <?php
    include "partials/footer.php";
  ?>

  <script src="assets/js/plugins/bootstrap.bundle.min.js"></script>
  <script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>