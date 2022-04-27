<div class="row mt-4">
    <div class="col-md-11 col-12 mx-auto">
        <div class="row whiteBg mt-3 shadow-sm pt-3">
            <?php
            $catg_sql = "SELECT * FROM `products` ORDER BY `products`.`category` ASC LIMIT 4";
            $brandProduct = $DB->RetriveArray($catg_sql);
            foreach ($brandProduct as $d) {
                $attr = json_decode($d['attributes']);
                $mrp = $attr[0][1] . ' ₹';
                $sell = $attr[0][2] . ' ₹';
                if ($sell == 0) {
                    $sell = $mrp;
                    $mrp = '';
                }
                echo '<div class="col-md-3 col-6 aboutImg mb-3 ps-0">
                <div class="productCard whiteBg ">
                    <a href="product-details.php?querry=' . $d['id'] . '">
                        <img src="admin/' . $d['feature_img'] . '" alt="" class="productImg">
                        <div class="productDetails">
                            <a href="shop.php?filter=' . $d['brand'] . '">
                                <small class="productBrand">' . $d['brand'] . '</small>
                            </a>

                            <a href="product-details.php?querry=' . $d['id'] . '">
                                <p class="productName">' . substr($d['title'], 0, 50) . '</p>
                            </a>
                            <p class="productPrice ">' . $sell . ' <strike class="price-cut">' . $mrp . '</strike></p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="product-details.php?querry=' . $d['id'] . '">
                                    <button class="btn btn-sm btn-primary cartBtn m-0" title="Add to Cart"><i class="bx bx-cart-add"></i></button>

                                </a>
                                <a href="product-details.php?querry=' . $d['id'] . '">
                                    <button class="btn btn-sm btn-primary cartBtn m-0" title="Buy Now">Buy Now</button>
                                </a>

                            </div>
                        </div>
                    </a>
                </div>
            </div>';
            }


            ?>

        </div>
    </div>
</div>