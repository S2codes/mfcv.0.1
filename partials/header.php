<?php 
    
    include "./admin/includes/db.php";
    $DB = new Database();
    $csql = "SELECT * FROM `categories` WHERE `status` = 'Available'";
    $catg = $DB->RetriveArray($csql);
    
    $bsql = "SELECT * FROM `manufacturers` WHERE `status` = 'Available'";
    $brand = $DB->RetriveArray($bsql);
    $userId = '';
    $userName = '';
    $logged = true;
    $name = '<small>Hello, Sign in</small>My Account';
    $link = "signin.php";
    $cartNum = 0;
    include "./config/config.php";
    // echo 'user id : '.$userId; 
    // echo '<br>';
    // echo 'user name : '.$userName; 
    // echo '<br>';
    // echo 'user cartno : '.$cartNum; 
    // echo '<br>';

?>
<header class="shadow-sm">
    <!-- Topbar-->
    <div class="topbar topbar-dark bg-dark" >
        <div class="container p-3">
            <ul class="text-light list-unstyled d-flex justify-content-between align-items-center m-0">
                <li>Support : <a href="#" >980981231</a></li>
                <li>Email : <a href="#" >info@muscleandfinesscare.com</a></li>
            </ul>
        </div>
    </div>

    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <div class="bg-light whiteBg">
        <div class="navbar navbar-expand-lg navbar-light p-3">
            <div class="container">
                <!-- <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="index.php">
            <img src="img/logo-dark.png" width="142" alt="Cartzilla">
        </a> -->
            <a class="navbar-brand flex-shrink-0 me-2" href="index.php" >
                    <img src="assets/img/logo/logo.png" width="90" alt="muscleandfinesscare" class="logo">
                </a>

                <div class="input-group d-none d-lg-flex mx-4">
                    
                    <input class="form-control rounded-end py-2 pe-5 " type="text" placeholder="Search for products" id="searchInput"><i
                        class="bx bx-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3" id="search1"></i>
                </div>
                <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                    
                    
                    <!-- sign in icon  -->
                   
                    <a class="navbar-tool nav-mr" href="<?php echo $link;?>">
                        <div class="navbar-tool-icon-box me-2">
                            <i class="navbar-tool-icon bx bx-user"></i>
                        </div>
                        <div class="navbar-tool-text ms-n3"><?php echo $name?></div>
                    </a>

                    <div class="navbar-tool">
                        <!-- <i class='bx bx-cart-alt'></i> -->
                        <a class="navbar-tool-icon-box text-light" href="cart.php">
                            <span class="navbar-tool-label"><?php echo $cartNum;?></span>
                            <i class="navbar-tool-icon bx bx-cart-alt"></i>
                        </a>
                        <a class="navbar-tool-text" href="cart.php">My Cart</a>
                    </div>

                    <!-- humabarger  -->
                    <button class="navbar-toggler collapsed me-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <!-- responsive search  -->
                <div class="input-group d-lg-none my-3"><i
                  class="bx bx-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base ms-3 p-3" id="resSearchBtn"></i>
                  <!-- <input class="form-control rounded-start" type="text" placeholder="Search for mobile products" id="resSearchInput" value="asd"> -->
                  <input type="text" class="form-control rounded-start" id="resSearchInput">
                </div>

            </div>
        </div>

        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
            <div class="container">
                <div class="navbar-collapse collapse" id="navbarCollapse" >
                    <!-- Search-->
                   
                    <!-- Primary menu-->
                    <ul class="navbar-nav">
                        <li class="nav-item me-3"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item me-3"><a class="nav-link" href="shop.php">Shop</a></li>

                        <!-- shop menu  -->
                        <li class="nav-item dropdown me-3">
                            <a href ="shop.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <!-- shop drop down  -->
                            <div class="dropdown-menu p-0 whiteBg">
                                <div class="d-flex flex-wrap flex-sm-nowrap px-2">
                                    <div class="mega-dropdown-column pt-1 pt-lg-4 pb-4 px-2 px-lg-3">

                                        <div class="widget widget-links mb-4">
                                            <!-- <h6 class="fs-base mb-3">Categories</h6> -->
                                            <ul class="widget-list">
                                                <?php
                                                    foreach ($catg as  $c) {
                                                        echo '<li class="widget-list-item"><a href="shop.php?catg='.$c['name'].'" class="widget-list-link">'.$c['name'].'</a></li>';
                                                    }
                                                ?>
                                               
                                            </ul>
                                        </div>
                                        
                                        
                                    </div>

                                   

                                </div>
                            </div>
                        </li>

                        <!-- brands  -->
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">Brands</a>
                            <ul class="dropdown-menu brand-dropdown p-3">
                                <?php
                                    foreach($brand as $b){
                                        echo '<li class="widget-list-link">
                                        <a class="dropdown-item " href="shop.php?brand='.$b['name'].'">'.$b['name'].'</a>
                                        </li>';
                                    }
                                ?>
                              <!-- <li class="widget-list-link"><a class="dropdown-item " href="shop.php?brand=">Brand 1</a></li>
                              <li class="widget-list-link"><a class="dropdown-item " href="product.php">Brand 2</a></li>
                              <li class="widget-list-link"><a class="dropdown-item " href="product.php">Brand 3</a></li> -->
                              
                            </ul>
                          </li>


                        <li class="nav-item  active me-3"><a class="nav-link " href="aboutus.php">About</a></li>
                        <li class="nav-item  active me-3"><a class="nav-link " href="support.php">Support</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>


        

    </div>
  </header>