<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
     include "partials/.head.php";
  ?>
  <title>Search | muscleandfinesscare</title>
</head>

<body>
  <!-- navbar  -->
  <?php
  include "partials/header.php";
  // include "./admin/includes/db.php";
  if (!isset($_GET['search'])) {
    echo "<script>window.location='shop.php';</script>";
  }
  $search = $_GET['search'];
  // alter table products add FULLTEXT(`title`, `category`, `brand`, `flavors`);
  $DAO = new Database();
  $q= "select * from products where match (title, category, brand, flavors) against ('$search')";
  $data = $DAO->RetriveArray($q);
  

  ?>

  <main class="pt-5">

    <div class="container-fluid p-0 ">
      <!-- feature products  -->
      <div class="row">
        <div class="col-md-11 col-12 mx-auto feature_product_container p-0">
          <div class="row ">
            <div class="col-md-12 col-12 m-0">
              <div class="cart-list">
                <!-- <h4 class="cart-title">Cart (2)</h4> -->

                <?php
                if ($DAO->CountRows($q) > 0) {
                  foreach($data as $d){
                    $attr = json_decode($d['attributes']);

                    echo '
                    <div class="row mx-auto cartItem">

                    <div class="col-md-3 p-2 cartProductThumb">
                      <a href="product-details.php?querry='.$d['id'].'" class="cartProductThumb">
                        <img src="admin/'.$d['feature_img'].'" alt="" class="">
                      </a>
                    </div>
                    <div class="col-md-8 p-2">
                      <p class="cartProductTitle"><a href="product-details.php?querry='.$d['id'].'">'.$d['title'].'</a></p>
  
                      <p class="attribute"><a href="shop.php?brand='.$d['brand'].'">'.$d['brand'].'</a></p>
                      <p class="cartPrice m-0">'.$attr[0][0].'  </p>
                      <p class="cartPrice m-0">&#8377; '.$attr[0][2].' <strike class="cartMrp">&#8377; '.$attr[0][1].'</strike> </p>
                      <p class="attribute">'.substr($d['short_desc'], 0, 170).'...</p>
  
                    </div>
  
  
                  </div>
                    ';
                  }
                }else{
                  echo '<h1 class="text-center">No Record Found</h1>';
                }
                 


                ?>


        

              </div>
            </div>


          </div>
        </div>
      </div>
    </div>



  </main>
<?php
  include "partials/footer.php";
?>

  <script src="assets/js/plugins/bootstrap.bundle.min.js"></script>
  <script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>