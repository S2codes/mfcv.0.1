<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    include "partials/.head.php";
  ?>
  <title>Place Your Order | muscleandfinesscare</title>
</head>

<body>
  <!-- navbar  -->
  <?php
  include "partials/header.php";
  if (!isset($_SESSION['loggedin'])) {
    echo "<script>window.location='signin.php'</script>";
}
 
  $pid = '';
  $DAO = new Database(); 
  $cartItem = array();

   if (isset($_GET['cart'])) {
     $cartid = $_GET['cart'];
     $s = "SELECT * FROM `carts` WHERE id = $cartid AND userid = $userId";
     echo $DAO->CountRows($s);
     if ($DAO->CountRows($s) > 0) {
       $cartItem = $DAO->RetriveSingle($s);
       $pid = $cartItem['productid'];
     }else{
       echo "<script>window.location='cart.php'</script>";
     }


  }
  

  elseif ($_SERVER['REQUEST_METHOD']=='POST') {
    $cartItem = array();
    $pid = $_POST['cart_prduct'];
    $OrderData = array(
      "userid" => $_POST['uid'],
      "productName" => $_POST['cart_prduct_name'],
      "productid" => $_POST['cart_prduct'],
      "weight" => $_POST['cart_weight'],
      "price" => $_POST['cart_price'],
      "flavors" => $_POST['cart_flavors'],
      "qty" => $_POST['cart_quantity'],
    );

    $cartItem = $OrderData;
  }

  else {
    echo "<script>window.location='./profile.php'</script>";
  }

  $psql = "SELECT `feature_img`  FROM `products` WHERE id = $pid";
  $ftr_img = $DAO->RetriveSingle($psql);
  $ordeId = 'MFC'.date('ymd').$userId.$pid.'-'. time();




  ?>


  <main>
    <div class="container-fluid p-0 mt-3">
      <!-- feature products  -->
      <div class="row">
        <div class="col-md-11 col-12 mx-auto feature_product_container p-0">
          <div class="row mt-2">
            <div class="col-md-8 col-12 mt-2">
              <div class="cart-list">
                <h2 class="cart-title">Order Summary</h2>
                <!-- cart item  -->
                <div class="row mx-auto cartItem">
                  <div class="col-md-3 col-12 p-2 cartProductThumb">
                  <a href="product-details.php?querry=<?php echo $pid;?>" class="cartProductThumb">
                    <img src="admin/<?php echo $ftr_img['feature_img'] ?>" alt="" class="width: 95%; w-100">
                  </a>
                  </div>
                  <div class="col-md-6 col-12 p-2">
                    <p class="cartProductTitle"><?php echo $cartItem['productName'];?></p>
                    <p class="attribute">weight : <span class="text-dark"><?php echo $cartItem['weight'];?></span></p>
                    <p class="attribute">Flavor : <span class="text-dark"><?php echo $cartItem['flavors'];?></span></p>
                    <!-- <p class="cartPrice">&#8377;6000 <strike class="cartMrp">&#8377;7000</strike>
                      <span class="Cartdiscount">10% Off</span> -->
                    <p class="cartPrice"><?php echo $cartItem['price'];?> &#8377;</p>
                   
                    <div class="attribute qty">Qty : <input type="number" name="qty" id="orderQty" value="<?php echo $cartItem['qty'];?>" class="form-control cartQty" min="1" max="5">
                      <small class="text-danger ms-3" id="qtyAlert"></small>
                    </div>
                    <!-- <p class="cartRemove">REMOVE</p> -->
                  </div>
                  <div class="col-md-3 col-12 p-2">
                    <p class="cartDelivery">Delivery in 7 - 9 days</p>
                    <p class="cartDelivery">Charge <span class="cartDeliveryCharge">Free</span></p>
                    
                  </div>

                </div>

                <form action="" method="post" class="address-form" id="palceOrder">
                <!-- delivery address  -->
                <h4 class="cart-title mt-3">Delivery Address</h4>
                <small class="text-danger" style="font-size: 1.3rem;" id="addAlert">Please Fill the all Feilds</small>
                  <input type="hidden" name="orderid" id="orderid" value="<?php echo $ordeId; ?>">
                  <div class="row mt-3">
                    <div class="col-md-6 col-12">
                      <input type="text" name="addr[]" id="in_n" placeholder="Name" class="form-control mb-3" value="<?php echo $userName;?>" required>
                    </div>
                    <div class="col-md-6 col-12">
                      <input type="tel" name="addr[]" id="in_p" placeholder="Phone" class="form-control mb-3" required>
                    </div>

                    <div class="col-md-6 col-12">
                      <select name="addr[]" id="in_s" class="form-control mb-3" required>
                        <option selected value="">Select State</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                        </option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                      </select>
                    </div>
                    <div class="col-md-6 col-12">
                      <input type="tel" name="addr[]" id="in_c" placeholder="City / Town" class="form-control mb-3" required>
                    </div>
                    <div class="col-md-12 col-12">
                      <textarea name="addr[]" id="in_a" cols="30" rows="3" class="form-control mb-3" placeholder="Address (Area & Street)" required></textarea>
                    </div>

                    <div class="col-md-6 col-12">
                      <input type="" name="addr[]" id="in_pin" placeholder="Pincode" class="form-control mb-3"required>
                    </div>
                    
                    <div class="col-md-6 col-12">
                      <input type="text" name="addr[]" id="in_l"  placeholder="Landmark" class="form-control mb-3">
                    </div>
                    <div class="col-md-6 col-12">
                      <input type="tel" name="addr[]" id=""  placeholder="Addtional Contact Number" class="form-control mb-3" >
                    </div>
                    <div class="col-md-6 col-12">
                      <select name="addr[]" id="" class="form-control mb-3">
                        <option selected value="">Select Order Type</option>
                        <option value="All day delivery">All day delivery</option>
                        <option value="Delivery between 10AM - 5PM">Delivery between 10AM - 5PM</option>
                      </select>
                    </div>

                    <!-- <div class="col-md-6 col-12">
                      <button class="btn btn-outline-dark ">Add Address</button>
                    </div> -->

                    <input type="hidden" name="userid" value="<?php echo $userId?>">
                    <input type="hidden" name="product_id" value="<?php echo $pid;?>">
                    <input type="hidden" name="title" id="p_title" value="<?php echo $cartItem['productName'];?>">
                    <input type="hidden" name="attr" value="<?php echo $cartItem['weight'];?>">
                    <input type="hidden" name="flv" value="<?php echo $cartItem['flavors'];?>">
                    <input type="hidden" id="p_Price" name="price" value="<?php echo $cartItem['price'];?>">
                    <input type="hidden" id= "quantity"  name="qty" value="<?php echo $cartItem['qty'];?>">
                    <input type="hidden" id="t_price" name="total" value="<?php echo ($cartItem['price'] * $cartItem['qty']);?>">


                  </div>

               
              </div>
            </div>


            <div class="col-md-4 col-12 mt-2 p-2 whiteBg">
              <!-- <h1>Hello</h1> -->
              <h5 class="priceDetails">Price Details</h5>
              <div class="cartPriceList">
                <ul class="cartPrice-item">
                  <li>Price</li>
                  <li><?php echo $cartItem['price'];?> &#8377;</li>
                </ul>
                <ul class="cartPrice-item">
                  <li>Quantiy</li>
                  <li id="product_Qty"><?php echo $cartItem['qty'];?></li>
                </ul>

                <ul class="cartPrice-item">
                  <li>Delivery Charges</li>
                  <li style="color: #388e3c;">Free</li>
                </ul>

                <ul class="cartPrice-item cartTotal">
                  <li class="tAmount">Total Price</li>
                  <li id="product_Tprice"><?php echo ($cartItem['qty'] * $cartItem['price']);?> &#8377;</li>
                </ul>
                <ul class="cartPrice-item ">
                  <li class="tAmount">Payment Method</li>
                </ul>
                <ul class="cartPrice-item payMthod">
                  <li class="px-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payType" id="paynow" value="paynow" checked >
                      <label class="form-check-label" for="flexRadioDefault1">
                        Pay Now
                      </label>
                    </div>
                    <!-- </li>
                                    <li class="flex-column"> -->
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payType" id="payondelivery" value="payondelivery">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Pay On Delivery
                      </label>
                    </div>
                  </li>

                </ul>
                <input type="hidden" id="payTypeVal" value="paynow">

                <div id="checkoutBtnGrp" class="mt-4">
                  <button type="submit" class="btn btn-primary payondeliveryBtn" id="continue" style="display: none;">Continue</button>
                  <button type="submit" class="btn btn-primary paynowBtn" id="rzp-button1" >Pay with Razorpay</button>
                  
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>




<!-- modal  -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sucessModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="sucessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content p-3" style="background-color: #3399cc; border:none">
      <div class="modal-header" style="border:none">
      </div>
      <div class="modal-body">
      <div class="mb-2 d-flex align-items-center justify-content-center" style="font-size: 5.5rem;">
        <i class="bx bxs-check-circle text-center text-light"></i>
      </div>
        <h1 class="text-center text-light">Payment Sucess</h1>
      </div>
      <div class="modal-footer" style="border:none">
        <a href="orders.php" class="btn btn-primary">Ok</a>
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
    include "./script/_placeorder.php";
  ?>

</body>

</html>