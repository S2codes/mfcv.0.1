<?php

$DAO = new Database();
$sData = "SELECT * FROM `products` ORDER BY `products`.`id` DESC LIMIT 1";
$mainFeatureProduct = $DAO->RetriveSingle($sData);
$mData = "SELECT * FROM `products` ORDER BY `products`.`id` ASC LIMIT 4";
$multiProducts = $DAO->RetriveArray($mData);

?>

<div class="container-fluid p-0 mt-3 mb-5">
    <div class="row">
        <div class="col-md-11 col-12 mx-auto feature_product_container px-0 pt-4">
            <p class="heading-small text-center">Shop our New Releases</p>
            <h1 class="heading text-center">Featured Products</h1>

            <div class="row mt-2">
                <div class="col-md-4 col-12  mt-2">
                   
                    <a href="product-details.php?querry=<?php $mainFeatureProduct['id'] ?>">
                        <div class="feature-card m0 b_shadow">
                            <img src="admin/<?php echo $mainFeatureProduct['feature_img']; ?>" alt="">

                            <div class="feature-details">
                                <div class="feature-data my-2">
                                    <?php
                                        $attr = json_decode($mainFeatureProduct['attributes']);
                                        $mrp = $attr[0][1] . ' ₹';
                                        $sell = $attr[0][2] . ' ₹';
                                        if ($sell == 0) {
                                            $sell = $mrp;
                                            $mrp = '';
                                        }
                                    ?>
                                    <a href="shop.php" class="product-title">title</a>
                                    <!-- <p class="product-title"><?php echo $mainFeatureProduct['title']; ?></p> -->
                                    <p class="product-price" style="color: #388e3c;"><?php echo $sell ?>  <strike class="text-secondary fs-5"><?php echo $mrp ?></strike></p>
                                </div>
                                <i class='bx bx-cart-add feature-cart'></i>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-md-8 col-12 mt-2 p-0">
                    <div class="row">

                    <!-- </?php
                        foreach ($multiProducts as $d) {
                            echo '';
                        }
                    ?> -->

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
</div>