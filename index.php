<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include "partials/.head.php";
  ?>
  <link rel="stylesheet" href="assets/css/plugins/slick.css">
  <title>Home | muscleandfinesscare</title>
</head>

<body>
  <!-- navbar  -->
  <?php
    include "partials/header.php";
    // include "admin/includes/db.php";
    // $b = "SELECT * FROM `products` ORDER BY `products`.`category` ASC LIMIT 4";
    // $bpr = $DB->RetriveArray($b);
    // print_r($bpr);
  ?>

  <!-- header  -->
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/covers/1.jpg" class="display-lg w-100" alt="...">
        <img src="assets/img/covers/a.jpg" class="display-md w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assets/img/covers/2.jpg" class="display-lg w-100" alt="...">
        <img src="assets/img/covers/b.jpg" class="display-md w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assets/img/covers/3.jpg" class="display-lg w-100" alt="...">
        <img src="assets/img/covers/c.jpg" class="display-md w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assets/img/covers/4.jpg" class="display-lg w-100" alt="...">
        <img src="assets/img/covers/d.jpg" class="display-md w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assets/img/covers/5.jpg" class="display-lg w-100" alt="...">
        <img src="assets/img/covers/e.jpg" class="display-md w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <main>

    <!-- feature products  -->
    <!-- <div class="container-fluid p-0 mt-3 mb-5">
      <div class="row">
        <div class="col-md-11 col-12 mx-auto feature_product_container px-0 pt-4">
          <p class="heading-small text-center">Shop our New Releases</p>
          <h1 class="heading text-center">Featured Products</h1>

          <div class="row mt-2">
            <div class="col-md-4 col-12  mt-2">
              <a href="product.php">
                <div class="feature-card m0 b_shadow">
                  <img src="assets/img/protien/1.png" alt="">

                  <div class="feature-details">
                    <div class="feature-data my-2">
                      <p class="product-title">Feature product</p>
                      <p class="product-price" style="color: #388e3c;">5999&#8377;  <strike class="text-secondary fs-5">7999&#8377;</strike></p>
                    </div>
                    <i class='bx bx-cart-add feature-cart'></i>
                  </div>
                </div>
              </a>

            </div>
            <div class="col-md-8 col-12 mt-2 p-0">
              <div class="row">
                <div class="col-md-6 col-12">
                  <a href="product.php">
                    <div class="feature-card feature-card-secondary b_shadow">
                      <img src="assets/img/protien/8.png" alt="">

                      <div class="feature-details feature-details-secondary ">
                        <div class="feature-data-secondary my-2">
                          <p class="product-title">product name 2</p>
                          <p class="product-price">5999 &#8377; &nbsp;&nbsp; <span style="color: #388e3c;">20% OFF</span></p>
                          <ul class="d-flex justify-content-between align-items-center feature-cta mt-3 p-0">
                            <li><i class='bx bx-cart-add feature-cart'></i></li>
                            <li><button class="feature-btn">Buy Now</button></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </a>

                </div>
                <div class="col-md-6 col-12">
                  <a href="product.php">
                    <div class="feature-card feature-card-secondary b_shadow">
                      <img src="assets/img/protien/10.png" alt="">

                      <div class="feature-details feature-details-secondary">
                        <div class="feature-data-secondary my-2">
                          <p class="product-title">product name 3</p>
                          <p class="product-price">5999 &#8377; &nbsp;&nbsp; <span style="color: #388e3c;">10% OFF</span></p>
                          <ul class="d-flex justify-content-between align-items-center feature-cta mt-3 p-0">
                            <li><i class='bx bx-cart-add feature-cart'></i></li>
                            <li><button class="feature-btn">Buy Now</button></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

              </div>
              <div class="row">

                <div class="col-md-6 col-12">
                  <a href="product.php">
                    <div class="feature-card feature-card-secondary b_shadow">
                      <img src="assets/img/protien/8.png" alt="">

                      <div class="feature-details feature-details-secondary">
                        <div class="feature-data-secondary my-2">
                          <p class="product-title">product name 2</p>
                          <p class="product-price">5999 &#8377; &nbsp;&nbsp; <span style="color: #388e3c;">30% OFF</span></p>
                          <ul class="d-flex justify-content-between align-items-center feature-cta mt-3 p-0">
                            <li><i class='bx bx-cart-add feature-cart'></i></li>
                            <li><button class="feature-btn">Buy Now</button></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-12">
                  <a href="product.php">
                    <div class="feature-card feature-card-secondary b_shadow">
                      <img src="assets/img/protien/10.png" alt="">

                      <div class="feature-details feature-details-secondary">
                        <div class="feature-data-secondary my-2">
                          <p class="product-title">product name 3</p>
                          <p class="product-price">5999 &#8377; &nbsp;&nbsp; <span style="color: #388e3c;">50% OFF</span></p>
                          <ul class="d-flex justify-content-between align-items-center feature-cta mt-3 p-0">
                            <li><i class='bx bx-cart-add feature-cart'></i></li>
                            <li><button class="feature-btn">Buy Now</button></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <?php
  //  include "views/view_featureProducts.php";
   include "views/view_brandProduct.php";
   include "views/view_catgProduct.php";
 ?>

    <!-- about us -->
    <div class="row mt-5">
      <div class="col-md-11 col-12 mx-auto">
        <div class="row whiteBg aboutRow">
          <div class="col-md-6 col-12 aboutDetails">
            <small class="heading-small">About Us</small>
            <h2 class="heading">Who we Are</h2>
            <p class="para">Muscle and Fitness Care deals in Authentic Health Supplement, Imported Brands and top-notch Products to provide customers with best source of high-quality sports and body building Nutrition and Supplements available in the market.</p>
            <div class="mt-3">
              <a href="aboutus.php" class="aboutBtn">Know More</a>
            </div>
          </div>
          <div class="col-md-6 col-12 aboutImg p-5">
            <img src="assets/img/protien/4.png" alt="" class="qualityImg">
          </div>
        </div>
      </div>
    </div>


    <!-- categories  offer -->
    <div class="row">
      <div class="col-md-11 col-12 mx-auto">
        <div class="catgContainer">

          <div class="catgCard">
            <div class="card-details">
              <h3>Popular Brand</h3>
              <p>Big Muscle</p>
              <p class="m-0"><a href="shop.php" class="m-0"> Order Now</a></p>
            </div>
          </div>
          <div class="catgCard catgCard-2">
            <div class="card-details">
              <h3>Popular Brand</h3>
              <p>Dymatize</p>
              <p class="m-0"><a href="shop.php" class="m-0"> Order Now</a></p>
            </div>
          </div>
          <div class="catgCard catgCard-3">
            <div class="card-details">
              <h3>Popular Brand</h3>
              <p>Optimum Nutrition</p>
              <p class="m-0"><a href="shop.php" class="m-0"> Order Now</a></p>
            </div>
          </div>

          <div class="catgCard catgCard-4">
            <div class="card-details">
              <h3>Popular Brand</h3>
              <p>One Science</p>
              <p class="m-0"><a href="shop.php" class="m-0"> Order Now</a></p>
            </div>
          </div>

        </div>
      </div>
    </div>


    <!-- Quality -->
    <div class="row">
      <div class="col-md-11 col-12 mx-auto">
        <div class="row whiteBg p-3 b_shadow">
          <div class="col-md-6 col-12 aboutImg p-5">
            <img src="assets/img/protien/1.png" alt="" class="qualityImg">
          </div>

          <div class="col-md-6 col-12 aboutDetails ">
            <h2 class="heading">Quality of Product</h2>
            <p class="para">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita</p>
            <p class="qualityHead m-0"> proten</p>
            <p class="para"> Lorem ipsum dolor sit amet.</p>
            <p class="qualityHead m-0"> Carbs</p>
            <p class="para"> Lorem ipsum dolor sit amet.</p>
            <p class="qualityHead m-0"> Calories</p>
            <p class="para"> Lorem ipsum dolor sit amet.</p>
            <div>
              <a href="shop.php" class="aboutBtn">Shop Now</a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- product by category  -->
 <?php
   include "views/view_brandProduct.php";
   include "views/view_catgProduct.php";
 ?>


  </main>

  <!-- partners  -->

  <div class="container-fluid p-5 partnerContainer mt-5">
    <h4 class="heading text-center">Our partners</h4>


    <div class="allPartners ">

      <div class="row m-3 partners">

        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/bmf.png" alt="">
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/an f.png" alt="">
          </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/bpi f.png" alt="">
          </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/bsn f.png" alt="">
          </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/DC f.jpg" alt="">
          </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/Labrada f.png" alt="">
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/mtf.png" alt="">
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/osn f.png" alt="">
          </div>
        </div>


      </div>


      <div class="row m-3 partners">

        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/redcone_11zon.webp" alt="">
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/pole-min_11zon.webp" alt="">
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/bp_11zon.webp" alt="">
          </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/cell_11zon.webp" alt="">
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/dymatize png-min_11zon.webp" alt="">
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/gaspari-min_11zon.webp" alt="">
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/isopure-min_11zon.webp" alt="">
          </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
          <div class="partnerItem shadow d-flex justify-content-center align-items-center">
            <img src="assets/img/partners/now-min_11zon.webp" alt="">
          </div>
        </div>


      </div>

    </div>

  </div>


  <!-- footer bar-->

  <?php
  include "partials/footer.php";
  ?>

  <script src="assets/js/plugins/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/js/plugins/jquery-3.6.0.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/slider.js"></script> -->
  <script src="assets/js/main.js"></script>

</body>

</html>