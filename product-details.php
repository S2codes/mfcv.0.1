<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "partials/.head.php";
    ?>
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <title>Product | muscleandfinesscare</title>
</head>

<body>
    <!-- navbar  -->
    <?php
    if (!isset($_GET['querry'])) {
        header('Location: ./shop.php');
    }
    include "partials/header.php";
    $id = $_GET['querry'];

    $DAO = new Database();
    $s = "SELECT * FROM `products` WHERE id = $id";
    $data = $DAO->RetriveSingle($s);
    $status = '';
    if ($data['current_stock'] == 0 || $data['current_stock'] == '') {
        $status = '<span class="text-danger">Out of Stock</span>';
    } else {
        $status = 'In Stock';
    }
    $attr = $data['attributes'];
    $attr = json_decode($attr);
    $weight = $attr[0][0];
    $mrp = $attr[0][1];
    $sell = $attr[0][2];

    //    attribute html 
    $strike = '';
    if ($sell != 0) {
        $strike = '<strike class="price-cut"> ' . $mrp . ' &#8377;</strike>';
    } else {
        $sell = $mrp;
    }


    ?>


    <main>

        <div id="alert"></div>

        <div class="container-fluid p-0">
            <!-- individual product  -->
            <div class="row mt-5">
                <div class="col-md-11 col-12 mx-auto ">

                    <div class="row whiteBg">
                        <!-- product img  -->
                        <div class="col-md-6 col-12 m-0 p-5">
                            <div class="product_thumbnail">
                                <img src="admin/<?php echo $data['feature_img'] ?>" alt="" id="featureProductImg">
                            </div>

                            <ul class="product_img_list mt-2 p-0">
                                <?php
                                echo '<li>
                                <img src="admin/' . $data['feature_img'] . '" alt="" onclick="changeImg(this)">
                            </li>';
                                $photos = json_decode($data['imgs']);
                                for ($i = 0; $i < count($photos); $i++) {
                                    if ($photos[$i] != '') {
                                        echo '<li>
                                                <img src="admin/' . $photos[$i] . '" alt="" onclick="changeImg(this)">
                                            </li>';
                                    }
                                }


                                ?>

                            </ul>
                        </div>

                        <div class="col-md-6 col-12 m-0 p-5">
                            <form action="placeorder.php" method="post" id="cartForm">
                                <div class="invd_prodcut_details">
                                    <input type="hidden" name="uid" value="<?php echo $userId; ?>">
                                    <input type="hidden" name="cart_prduct_name" value="<?php echo $data['title']; ?>">
                                    <input type="hidden" name="cart_prduct" value="<?php echo $data['id']; ?>">
                                    <h1 class="m-0" id="ProductTitle"><?php echo $data['title']; ?></h1>
                                    <p class="invd_product_catg m-0" id="prduct_brand">By <?php echo '<a href="' . $data['brand'] . '">' . $data['brand'] . '</a>'; ?></p>

                                    <p class="invd_product_catg mb-2" id="prduct_catg"><?php echo '<a href="' . $data['category'] . '">' . $data['category'] . '</a>'; ?></p>
                                    <div class="invd_rating mb-2">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bx-star'></i> <span class="ms-2 invd_total_rating">10 reviews</span>
                                    </div>
                                    <p class="product_stock mb-3"><?php echo $status; ?></p>
                                    <p class="invd_product_price" id="prduct_attr_item">
                                        <?php echo $sell; ?> &#8377; <?php echo $strike; ?>
                                        <span class="invd_total_rating"><?php echo '(' . $weight . ')'; ?></span>
                                    </p>


                                    <ul class="invd_product_price invd_product_attr list-unstyled d-flex" id="prduct_attr">
                                        <?php
                                        foreach ($attr as $i) {
                                            if (count($i) > 0) {
                                                echo '<li class="me-3 p-2 attrItem" data-w="' . $i[0] . '" data-m="' . $i[1] . '" data-s="' . $i[2] . '">' . $i[0] . '</li>';
                                            }
                                        }
                                        ?>
                                        <!-- <li class="me-3 p-2" data-w="1kg" data-m="200" data-s="100">weight 1</li> -->
                                        <!-- <li class="me-3 p-2">weight 2</li>
                                    <li class="me-3 p-2">weight 3</li> -->
                                    </ul>
                                    <div id="attrData">
                                        <input type="hidden" name="cart_weight" value="<?php echo $weight; ?>">
                                        <input type="hidden" name="cart_price" value="<?php echo $sell; ?>">
                                    </div>

                                    <?php

                                    if ($data['flavors'] != '') {
                                        echo '<div class="flavors mb-3">
                                        <select name="cart_flavors" required>
                                            <option value="" selected>Select Flavors</option>';
                                        $flv = json_decode($data['flavors']);
                                        foreach ($flv as $f) {
                                            echo '<option value="' . $f . '">' . $f . '</option>';
                                        }

                                        echo '</select>
                                    </div>';
                                    } else {
                                        echo '<input type="hidden" name="cart_flavors" value="">';
                                    }
                                    ?>


                                    <p class="invd_product_shortDesc"><?php echo $data['short_desc'] ?></p>
                                    <ul class="d-flex list-unstyled align-items-center mb-2">
                                        <li class="me-4 invd_qty">Qty </li>
                                        <li>
                                            <input type="number" name="cart_quantity" value="1" max="5" min="1" class="invd_qty_input">
                                            <small id="qalert" class="text-danger"></small>
                                        </li>
                                    </ul>
                                    <div class="invd_btn_grop mt-4">
                                        <?php
                                        if ($logged) {
                                            echo '<a href="signin.php" class="aboutBtn productp_Btn" >
                                            <i class="bx bx-cart-add"></i> Add to Cart 
                                        </a>
                                        <a href="signin.php" class="invd-ms aboutBtn aboutBtn-reverse productp_Btn">Buy Now</a>';
                                        } else {
                                            echo '<button type="submit" class="aboutBtn productp_Btn" id="cartBtn">
                                            <i class="bx bx-cart-add"></i> Add to Cart 
                                        </button>
                                        <button type="submit" name= "buynow" class="invd-ms aboutBtn aboutBtn-reverse productp_Btn">Buy Now</button>';
                                        }

                                        ?>

                                    </div>

                                    <p class="invd_product_shortDesc mt-4"><?php echo $data['long_decs'] ?></p>



                                </div>

                            </form>
                        </div>
                    </div>

                    <!-- reviews  -->
                    <div class="row mt-4">
                        <div class="col-md-12 col-12 m-0 p-0">
                            <p class="heading">Reviews</p>

                            <div class="row whiteBg">
                                <div class="col-md-6 col-12 m-0 py-3 px-5">

                                    <div class="review_item p-2 ">
                                        <p class="review_user mb-1">BeetaBie</p>
                                        <div class="user_rating ">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bx-star'></i>
                                        </div>
                                        <p class="review_date mb-2">24-03-2022</p>
                                        <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Corporis nam iusto amet dignissimos unde. Maxime esse totam illo eos ut quia
                                            a sapiente vero consequuntur molestias. Dolores corrupti praesentium ab!</p>

                                    </div>

                                    <div class="review_item p-2 ">
                                        <p class="review_user mb-1">Subhankar</p>
                                        <div class="user_rating ">
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                            <i class='bx bxs-star'></i>
                                        </div>
                                        <p class="review_date mb-2">24-03-2022</p>
                                        <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Corporis nam iusto amet dignissimos unde. Maxime esse totam illo eos ut quia
                                            a sapiente vero consequuntur molestias. Dolores corrupti praesentium ab!</p>

                                    </div>

                                </div>

                                <!-- <div class="col-md-6 col-12 m-0 py-3 px-5">
                                    <form action="#" method="post" class="p-2">

                                        <label for="exampleFormControlTextarea1" class="form-label review-label">Your Rating</label>
                                        <div class="user-review mb-3">
                                            <i class='bx bx-star'></i>
                                            <i class='bx bx-star'></i>
                                            <i class='bx bx-star'></i>
                                            <i class='bx bx-star'></i>
                                            <i class='bx bx-star'></i>
                                        </div>

                                        <label for="exampleFormControlTextarea1" class="form-label review-label">Your Review</label>
                                        <textarea class="form-control user-review" id="exampleFormControlTextarea1"
                                            rows="3"></textarea>
                                        <button class="aboutBtn mt-4">Submit</button>

                                    </form>
                                </div> -->



                            </div>

                        </div>
                    </div>


                    <!-- related products  -->
                    <div class="row mt-4">
                        <div class="col-md-12 col-12 m-0 p-0">
                            <p class="heading">Related Product</p>
                            <!-- <h4 class="subheading">Product By Category</h4> -->
                            <div class="row whiteBgg mt-3">

                                <div class="col-md-3 col-6 aboutImg p-1 m-0">
                                    <div class="productCard whiteBg">
                                        <img src="assets/img/protien/3.png" alt="" class="productImg">
                                        <div class="productDetails">
                                            <small class="productBrand">Brand</small>
                                            <p class="productName">Product Name</p>

                                            <!-- <button class="addtoCart">Add to Cart <i class='bx bx-cart-add'></i></button> -->
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <button class="btn btn-sm btn-primary cartBtn m-0" title="Add to Cart"><i class='bx bx-cart-add'></i></button>
                                                <button class="btn btn-sm btn-primary cartBtn m-0" title="Buy Now">Buy
                                                    Now</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 aboutImg p-1 m-0">
                                    <div class="productCard whiteBg">
                                        <img src="assets/img/protien/2.png" alt="" class="productImg">
                                        <div class="productDetails">
                                            <small class="productBrand">Brand</small>
                                            <p class="productName">Product Name</p>

                                            <!-- <button class="addtoCart">Add to Cart <i class='bx bx-cart-add'></i></button> -->
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <button class="btn btn-sm btn-primary cartBtn m-0" title="Add to Cart"><i class='bx bx-cart-add'></i></button>
                                                <button class="btn btn-sm btn-primary cartBtn m-0" title="Buy Now">Buy
                                                    Now</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 aboutImg p-1 m-0">
                                    <div class="productCard whiteBg">
                                        <img src="assets/img/protien/8.png" alt="" class="productImg">
                                        <div class="productDetails">
                                            <small class="productBrand">Brand</small>
                                            <p class="productName">Product Name</p>

                                            <!-- <button class="addtoCart">Add to Cart <i class='bx bx-cart-add'></i></button> -->
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <button class="btn btn-sm btn-primary cartBtn m-0" title="Add to Cart"><i class='bx bx-cart-add'></i></button>
                                                <button class="btn btn-sm btn-primary cartBtn m-0" title="Buy Now">Buy
                                                    Now</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 aboutImg p-1 m-0">
                                    <div class="productCard whiteBg">
                                        <img src="assets/img/protien/4.png" alt="" class="productImg">
                                        <div class="productDetails">
                                            <small class="productBrand">Brand</small>
                                            <p class="productName">Product Name</p>

                                            <!-- <button class="addtoCart">Add to Cart <i class='bx bx-cart-add'></i></button> -->
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <button class="btn btn-sm btn-primary cartBtn m-0" title="Add to Cart"><i class='bx bx-cart-add'></i></button>
                                                <button class="btn btn-sm btn-primary cartBtn m-0" title="Buy Now">Buy
                                                    Now</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

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
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <!-- <script src="assets/js/plugins/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php
    include "script/_product_details.php";
    ?>
    <script src="assets/js/plugins/zoomsl.min.js"></script>
    <!-- <script>
        $(document).ready(function () {
            $('#featureProductImg').imagezoomsl({
                zoomrange: [4, 4],
            });
        })
    </script> -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/slider.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        function changeImg(img) {
            document.getElementById('featureProductImg').src = img.src;

        }
    </script>


</body>

</html>