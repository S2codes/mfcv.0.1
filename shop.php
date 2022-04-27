<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include "partials/.head.php";
  ?>
  <title>Shop | muscleandfinesscare</title>
</head>

<body>
  <!-- navbar  -->
  <?php
  include "partials/header.php";
  // include "./admin/includes/db.php";
  $DAO = new Database();
  $cs = "SELECT * FROM `categories` WHERE status = 'Available'";
  $categories = $DAO->RetriveArray($cs);

  $bs = "SELECT * FROM `manufacturers` WHERE status = 'Available'";
  $brands = $DAO->RetriveArray($bs);

  $limit= 10;
  if (isset($_GET['tab'])) {
    $tab = $_GET['tab'];
  }else{
    $tab = 1;
  }

  $offset = ($tab - 1) * $limit;
  $filter = '';
  if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
    $q= "select * from products where match (title, category, brand, flavors) against ('$filter') LIMIT {$offset}, {$limit}";
  }else{
    $q = "SELECT * FROM `products` ORDER BY `products`.`date` DESC LIMIT {$offset}, {$limit}";
  }
  $products = $DAO->RetriveArray($q);


  ?>

  <main class="pt-5">

    <div class="container-fluid p-0 mt-3">
      <!-- feature products  -->
      <div class="row">
        <div class="col-md-11 col-12 mx-auto feature_product_container">
          <div class="d-flex">
            <!-- filters  -->
            <div class="productFilter_lists">
              <div class="filter_list mb-3 whiteBg">
                <div class="productFilter_heading">
                  <p>Categories</p>
                </div>

                <ul class="filter_list_items">
                  <?php
                  foreach ($categories as $c) {
                    echo '<li class="mb-3"><a href="shop.php?filter=' . $c['name'] . '" class="catgId" data-val="' . $c['name'] . '">' . $c['name'] . '</a></li>';
                  }
                  ?>

                </ul>

              </div>
              <div class="filter_list mb-3 whiteBg">
                <div class="productFilter_heading">
                  <p>Brand</p>
                </div>

                <ul class="filter_list_items">
                  <?php
                  foreach ($brands as $b) {
                    echo '<li class="mb-3"><a href="shop.php?filter=' . $b['name'] . '" class="brandId" data-val="' . $b['name'] . '">' . $b['name'] . '</a></li>';
                  }
                  ?>
                </ul>

              </div>

            </div>
            <div class="product_container whiteBg">
              <!-- <div class="container-fluid product_container_header">
                <h2 class="heading">All Products</h2>
                <form action="#">
                  <select name="" id="" class="form-control product_shortner">
                    <option value="Sort By High to Low">Sort By Brand</option>
                    <option value="Sort By High to Low">Sort By Price High to Low</option>
                    <option value="Sort By Low to High">Sort By Price Low to High</option>
                  </select>
                </form>
              </div> -->

              <div class="row">
                <div class="col-md-12 col-12 m-0 p-0">
                  <div class="row whiteBg mt-2" id="loadProducts">
                    <!-- load all products  -->
                    <?php

                    foreach ($products as $prdct) {

                      $attr = json_decode($prdct['attributes']);
                      $mrp = $attr[0][1] . ' ₹';
                      $sell = $attr[0][2] . ' ₹';
                      if ($sell == 0) {
                        $sell = $mrp;
                        $mrp = '';
                      }
                      echo '<div class="col-md-4 col-6 aboutImg p-1 mb-3">
                               <div class="productCard ">
                                 <a href="product-details.php?querry=' . $prdct['id'] . '">
                                   <img src="admin/' . $prdct['feature_img'] . '" alt="" class="productImg">
                                 </a>
                                 <div class="productDetails">
                                   <a href="shop.php?category=' . $prdct['category'] . '">
                                     <small class="productBrand">' . $prdct['category'] . '</small>
                                   </a>
                                   <a href="product-details.php?querry=' . $prdct['id'] . '">
                                     <p class="productName">' . substr($prdct['title'], 0, 50) . '</p>
                                   </a>
                                   <p class="productPrice ">' . $sell . ' <strike class="price-cut">' . $mrp . '</strike></p>
                  
                  
                                   <div class="d-flex justify-content-between align-items-center mt-3">
                                   <div>
                                     <a href = "product-details.php?querry=' . $prdct['id'] . '" class="btn btn-sm btn-primary cartBtn m-0" title="Add to Cart"><i
                                         class="bx bx-cart-add"></i></a>
                                   </div>
                                   <div>
                                     <a href= "product-details.php?querry=' . $prdct['id'] . '" class="btn btn-sm btn-primary cartBtn m-0" title="Buy Now">Buy Now</a>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                             </div>';
                    }

                    $q1 = "SELECT * FROM `products`";
                    $total_records = $DAO->CountRows($q1);
                    // echo "Total Records :".$total_records;
                    
                    $total_page = ceil($total_records / $limit);
                    
                    // echo "<br> Total Page :".$total_page;
                    echo '<ul class="pagination justify-content-center" style="font-size: 1.6rem;">';
                    if ($tab > 1) {
                      echo '<li class="page-item me-2" ><a class="page-link bg-light text-dark" href="shop.php?tab='.($tab-1).'">Previous</a></li>';
                    }

                    for ($i=1; $i <= $total_page; $i++) { 
                      $active= 'text-dark';
                      if ($i == $tab) {
                        $active = 'bg-dark text-light';
                      }

                      echo '<li class="page-item"><a class="page-link '.$active.'" href="shop.php?filter='.$filter.'&tab='.$i.'">'.$i.'</a></li>';
                    }
                    if ($total_page > $tab) {
                      echo '<li class="page-item ms-2"><a class="page-link bg-light text-dark" href="shop.php?tab='.($tab+1).'">Next</a></li>';
                    }
                    echo '</ul>';


                    ?>

                    <!-- <ul class="pagination justify-content-center" style="font-size: 1.6rem;">
                      <li class="page-item" ><a class="page-link " href="#">Previous</a></li>
                      <li class="page-item"><a class="page-link bg-primary text-light" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul> -->

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
  <!-- <script src="assets/js/plugins/jquery-3.6.0.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/manage_shop.js"></script>
</body>

</html>