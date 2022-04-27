<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- icon -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <!-- fonts  -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200;400;600&display=swap" rel="stylesheet">
  <!-- slick  -->
  <link rel="stylesheet" href="assets/css/plugins/slick.css">
  <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <title>Cart | muscleandfinesscare</title>
</head>

<body>
  <!-- navbar  -->
  <?php
    include "partials/header.php";
    if (isset($_SESSION['loggedin'])) {
    $DAO = new Database();
    $s = "SELECT * FROM `carts` WHERE userid = $userId";
    $totalCart = $DAO->CountRows($s);
    $cartData = $DAO->RetriveArray($s);
    }
  ?>
  <main>


    <div class="container-fluid p-0 mt-3">
      <!-- feature products  -->
      <div class="row">
        <div class="col-md-11 col-12 mx-auto feature_product_container p-0">

          <div class="row mt-4">
            <div class="col-md-12 col-12 mx-auto ">
              
              <div class="cart-list">
                
                <?php
                $log = '<p class="para text-center mt-3">Login to see the items you added</p>
                <div class="d-flex mt-5 mb-3">
                  <a href="signin.php" class="btn aboutBtn mx-auto">Sign In</a>
                </div>';
                if (isset($_SESSION['loggedin'])) {
                  $log = '';


                  echo ' <h2 class="cart-title">Cart ('.$totalCart.')</h2>';
                  foreach($cartData as $cartItem){
                    $pid = $cartItem['productid'];
                    $crtSql = "SELECT `feature_img` FROM `products` WHERE `id` = $pid";
                    $ft_img = $DAO->RetriveSingle($crtSql);
                    echo '
                    <div class="row mx-auto cartItem" id="cartitem'.$cartItem['id'].'">
                        <div class="col-md-3 p-2 cartProductThumb">
                        <a href="product-details.php?querry='.$pid.'" class="cartProductThumb">
                          <img src="admin/'.$ft_img['feature_img'].'" alt="" class=""></a>
                          <input type="hidden" name="pimg" value="'.$ft_img['feature_img'].'">
                          </div>
                          <div class="col-md-6 p-2">
                          <p class="cartProductTitle">'.$cartItem['productName'].'</p>
                          <p class="attribute">weight : <Span class="text-dark">'.$cartItem['weight'].'</Span></p>
                          <p class="attribute">Flavors : <Span class="text-dark">'.$cartItem['flavors'].'</Span></p>
                          <p class="cartPrice">Price : '.$cartItem['price'].' &#8377; X ' .$cartItem['qty'].'</p>
                          <div class="attribute qty "> Delete 
                            <span class="cartRemove" title="remove Item" data-id="'.$cartItem['id'].'"> <i class="bx bxs-trash"></i></span>
                          </div>
                          
                        </div>
                        <div class="col-md-3 p-2">
                          <p class="cartDelivery">Delivery in 7 - 9 days</p>
                          <p class="cartDelivery">Delivery Charge: <span class="cartDeliveryCharge"> Free</span></p>
                          
                          <div class="mt-5">
                            <a href="placeorder.php?cart='.$cartItem['id'].'" class="aboutBtn">Buy Now</a>
                          </div>
                        </div>
                    </div>';
                  }
                }
                // else {
                //   noCart();
                // }
                
                if (!isset($_SESSION['loggedin']) || ($cartNum == 0)) {
                 
                    echo '<h1 class="text-center heading">No Items in cart</h1>'.$log;
                }
                
                ?>
                

              </div>
            </div>
            
                  
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
  <?php
    include "script/_cart.php";
  ?>
  <!-- <script src="assets/js/plugins/slick.min.js"></script>
  <script src="assets/js/slider.js"></script> -->

</body>

</html>