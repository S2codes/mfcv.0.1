<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "partials/.head.php";
    ?>
    <title>User Profile | muscleandfinesscare</title>
</head>

<body>
    <!-- navbar  -->
    <?php
    include "partials/header.php";
    if (!isset($_SESSION['loggedin'])) {
        echo "<script>window.location='signin.php'</script>";
    }
    ?>
    <main class="pt-5">

        <div class="container-fluid p-0 mt-3">
            <!-- feature products  -->
            <div class="row">
                <div class="col-md-11 col-12 mx-auto feature_product_container p-0">
                    <div class="row d-flex" >


                        <div class="col-md-4 col-12 shadow mb-3">
                            <div class="ProfileBand whiteBg p-5">
                                <p class="text-center stuffItem"><i class='bx bxs-user'></i> <?php echo $userName; ?></p>
                            </div>
                        </div>

                        <div class="col-md-4 col-12 shadow mb-3">
                            <a href="orders.php">
                            <div class="ProfileBand whiteBg p-5">
                                <p class="text-center stuffItem"><i class='bx bx-package'></i>  Orders</p>
                            </div>

                            </a>
                        </div>
                        <div class="col-md-4 col-12 shadow mb-3">
                            <a href="logout.php">
                            <div class="ProfileBand whiteBg p-5">
                                <p class="text-center stuffItem"><i class='bx bx-log-out-circle'></i>  Logout</p>
                            </div>

                            </a>
                        </div>

                        


                    </div>
                    




                    <!-- <div class="row mt-2">

                        <div class="col-md-3 col-12 p-2 m-0">

                            <div class="ProfileBand whiteBg">
                                <p><?php echo $userName; ?></p>
                            </div>

                            <div class="profileStuff m-0 whiteBg">
                                
                                    <ul class="stuffItemList m-0">
                                        <li class="stuffItem mb-3"><a href="#"><i class='bx bxs-user'></i> My Info</a></li>
                                        <li class="stuffItem mb-3"><a href="orders.php"><i class='bx bxs-package'></i> Orders</a></li>
                                        <li class="stuffItem mb-3"><a href="logout.php"><i class='bx bx-log-out-circle'></i> Logout</a></li>
                                    </ul>
                            </div>


                        </div>

                        <div class="col-md-9 col-12 p-2">

                            <div class="cart-list mb-3">
                                <h4 class="cart-title">Personal Information  <a href="#"><span class="text-primary ms-3 edit">Edit<i class='bx bx-plus'></i></span></a></h4>

                                <div class="user-details">
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb-3">
                                                <input type="text" placeholder="Name" value="Username" class="form-control p-3">
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <input type="text" placeholder="Email" value="" class="form-control p-3">
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <input type="text" placeholder="Contact" value="" class="form-control p-3">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="cart-list mb-3">
                                <h4 class="cart-title">Manage Address  <a href="#"><span class="text-primary ms-3 edit">Add New Address<i class='bx bx-plus'></i></span></a></h4>

                                <div class="user-details">
                                    <form action="#" method="post">
                                        <div class="row mt-3">
                                            <div class="col-md-6 col-12">
                                                <input type="text" name="" id="" placeholder="Name"
                                                    class="form-control p-3 mb-3">
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <input type="tel" name="" id="" placeholder="Phone"
                                                    class="form-control p-3 mb-3">
                                            </div>
    
                                            <div class="col-md-6 col-12">
                                                <select name="state" id="state" class="form-control p-3">
                                                    <option selected disabled>Select State</option>
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
                                                <input type="tel" name="" id="" placeholder="City / Town"
                                                    class="form-control mb-3 p-3">
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <textarea name="address" id="" cols="30" rows="3" class="form-control mb-3 p-3"
                                                    placeholder="Address (Area & Street)"></textarea>
                                            </div>
    
                                            <div class="col-md-6 col-12">
                                                <input type="text" name="" id="" placeholder="Pincode"
                                                    class="form-control mb-3 p-3">
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <input type="tel" name="" id="" placeholder="Landmark"
                                                    class="form-control mb-3 p-3">
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <input type="text" name="" id="" placeholder="Alternative Number(optional)"
                                                    class="form-control mb-3 p-3">
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <select name="" id="" class="form-control p-3">
                                                    <option selected disabled>Select Order Type</option>
                                                    <option value="home">All day delivery</option>
                                                    <option value="work">Delivery between 10AM - 5PM</option>
                                                </select>
                                            </div>
    
                                            <div class="col-md-6 col-12">
                                                <button class="btn btn-primary  me-2">Add Address</button>
                                                <button class="btn btn-outline-info ">Edit Address</button>
                                            </div>
    
    
                                        </div>
    
                                    </form>

                                    <div class="address-details mt-3">
                                        <div class="row">
                                            <div class="col-md-12 col-12 mt-5 p-3 addressList">
                                                <p class="addressList-item">Subhankar Sarkar</p>
                                                <p class="addressList-item">+91 0984512354</p>

                                                <p class="Aarea">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora rem laudantium, recusandae nulla magnam illo cupiditate omnis saepe consectetur! Optio sit unde dolore iusto facilis perferendis porro nisi expedita aperiam?</p>
                                                <div class="col-md-6 col-12">
                                                    <button class="btn btn-danger  me-2">remove</button>
                                                    <button class="btn btn-outline-info ">Edit Address</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                            </div>

                        </div>



                    </div> -->

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