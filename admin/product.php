<?php
include "includes/auth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- ===== CSS ===== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Add New Product</title>
</head>

<body id="body-pd">

    <!-- sidenav  -->
    <?php
    include "views/sidenav.php";
    include "includes/db.php";
    $DAO = new Database();
    $cs = "SELECT `name` FROM `categories` ORDER BY `id` DESC";
    $catg = $DAO->RetriveArray($cs);
    $scs = "SELECT `name` FROM `subcategories` ORDER BY `id` DESC";
    $scatg = $DAO->RetriveArray($scs);
    $bs = "SELECT `name` FROM `manufacturers` ORDER BY `manufacturers`.`id` DESC";
    $brand = $DAO->RetriveArray($bs);

    $exits = false;
    if (isset($_GET['edit'])) {
        $exits = true;
        $id = $_GET['edit'];
        $singleFetchQuery = "SELECT * FROM `products` WHERE id = $id";
        $data = $DAO->RetriveSingle($singleFetchQuery);
    }

    ?>
    <!-- sidenav  -->
    <section class="componentContainer">
        <!-- <h1>Component</h1> -->
        <div class="navigation mb-3">
            <span class="rootMenu"><a href="#">Home</a> / </span><Span class="mainMenu"><a href="#">Add New
                    Products</a></Span>
        </div>

        <div class="row">
            <div class="col">
                <h3 style="font-weight: 600;">Product Details</h3>
            </div>

        </div>

        <!-- from  -->
        <form action="controller/manage_product.php" method="post" class="row" id="uploadProduct">
            <div class="col-md-8 px-3">
                <?php
                    if ($exits) {
                        echo '<input type="hidden" name="prdct_id" id="prdct_id" value="'.$id.'">';        
                    }
                ?>
                
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="prdct_name" name="prdct_name" placeholder="Enter Product Name" value="<?php if ($exits) echo $data["title"]; ?>" required>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="prdct_category" id="prdct_category" class="form-select" required>
                                <?php if ($exits) echo '<option value="' . $data['category'] . '" selected>' . $data['category'] . '</option>'; ?>"

                                <option value="">Select Category</option>
                                <?php
                                foreach ($catg as $c) {
                                    echo '<option value="' . $c['name'] . '">' . $c['name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="col">
                            <div class="mb-3" >
                                <label for="category" class="form-label">Sub Category</label>
                                <select name="prdct_subcategory" id="category" class="form-select">
                                    <option selected disabled>Select Your Sub Category</option>
                                    </?php
                                       foreach ($scatg as $c) {
                                           echo '<option value="'.$c['name'].'">'.$c['name'].'</option>';
                                       }
                                   ?>
                                </select>
                            </div> 
                        </div>-->

                    <div class="col">
                        <div class="mb-3">
                            <label for="subcategory" class="form-label">Brands</label>
                            <select name="prdct_brand" id="prdct_brand" class="form-select" required>
                                <?php if ($exits) echo '<option value="' . $data['brand'] . '" selected>' . $data['brand'] . '</option>'; ?>"
                                <option value="">Select Brand</option>
                                <?php
                                foreach ($brand as $b) {
                                    echo '<option value="' . $b['name'] . '">' . $b['name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>



                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Short Description</label>
                    <textarea name="prdct_shrt_desc" id="prdct_shrt_desc" cols="30" rows="2" class="form-control" required><?php if ($exits) echo $data['short_desc']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Long Description</label>
                    <textarea name="prdct_lg_desc" id="prdct_lg_desc" cols="30" rows="5" class="form-control"><?php if ($exits) echo $data['long_decs']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Product Image</label>
                    <div class="row border p-3">
                        <div class="col-lg-6 mb-3" style="min-height: 20rem;">
                            <div class="feature-img product-img p-3 border h-100" style="cursor: pointer;">
                                <img src="<?php if ($exits) echo $data['feature_img'];
                                            else echo 'assets/img/photo_upload.jpg' ?>" alt="" class="img-fluid" id="feature-preview">
                                <input type="file" name="prdct_featureimg" id="feature-img" class="form-control" placeholder="Feature Image">
                            </div>
                        </div>

                        <div class="col-lg-6 col-12 mb-3 p-0">
                            <div class="row">
                                <div class="col-md-6 col-12 mb-2">
                                    <div class="feature-img product-img border">
                                        <!-- <img src="assets/img/photo_upload.jpg" alt="" class="img-fluid" id="previewImg1"> -->

                                        <?php
                                        if ($exits) {
                                            $data['imgs'] = json_decode($data['imgs']);
                                        }
                                        ?>

                                        <img src="<?php if ($exits) echo $data['imgs'][0];
                                                    else echo 'assets/img/photo_upload.jpg' ?>" alt="" class="img-fluid" id="previewImg1">

                                        <input type="file" name="product-img1" id="product-img1" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-2">
                                    <div class="feature-img product-img border">
                                        <img src="<?php if ($exits) echo $data['imgs'][1];
                                                    else echo 'assets/img/photo_upload.jpg' ?>" alt="" class="img-fluid" id="previewImg2">
                                        <input type="file" name="product-img2" id="product-img2" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="feature-img product-img border">
                                        <img src="<?php if ($exits) echo $data['imgs'][2];
                                                    else echo 'assets/img/photo_upload.jpg' ?>" alt="" class="img-fluid" id="previewImg3">
                                        <input type="file" name="product-img3" id="product-img3" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="feature-img product-img border">
                                        <img src="<?php if ($exits) echo $data['imgs'][3];
                                                    else echo 'assets/img/photo_upload.jpg' ?>" alt="" class="img-fluid" id="previewImg4">
                                        <input type="file" name="product-img4" id="product-img4" class="form-control">

                                    </div>
                                </div>


                            </div>

                        </div>


                    </div>



                </div>






            </div>

            <div class="col-md-4 px-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Stock</label>
                    <input type="text" class="form-control" id="prdct_stock" name="prdct_stock" placeholder="stock" value="<?php if ($exits) echo $data['stock']; ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Current Stock</label>
                    <input type="text" class="form-control" id="prdct_current_stock" name="prdct_current_stock" placeholder="Current stock" value="<?php if ($exits) echo $data['current_stock']; ?>" readonly>
                </div>

                <?php
                if ($exits) {
                    $data['attributes'] = json_decode($data['attributes']);
                   
                    $attributes = $data['attributes'];
               
                }
                ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Attributes</label>
                    <small class="text-danger">Max : 3</small>
                    <div class="row mb-3" id="attrItem">
                        <div class="col-md-12 col-12 mb-2">
                            <input type="text" class="form-control" id="prdct_attributes" name="prdct_attribute_w[]" placeholder="Weight" value="<?php if ($exits) echo $attributes[0][0]; ?>" required>
                        </div>
                        <div class="col-md-6 col-6 mb-2">
                            <input type="text" class="form-control" id="prdct_attributes" name="prdct_attribute_mrp[]" placeholder="MRP" value="<?php if ($exits) echo $attributes[0][1]; ?>" required>
                        </div>
                        <div class="col-md-6 col-6">
                            <input type="text" class="form-control" id="prdct_attributes" name="prdct_attribute_sell[]" placeholder="Selling price" value="<?php if ($exits) echo $attributes[0][2]; ?>" required>
                        </div>

                        <!-- <small class="mt-2 text-danger" style="cursor: pointer;" ><span class="removeA">Remove Attribute <i class='bx bx-trash'></i></span></small> -->

                    </div>

                    <div id="attrList">
                        <?php
                        if ($exits) {
                            for ($i = 1; $i < count($attributes); $i++) {

                                if (count($attributes[$i]) > 0) {

                                    echo '<div class="row mb-3" class="attrItem" id="attrItem' . $i . '">
                                        <div class="col-md-12 col-12 mb-2">
                                            <input type="text" class="form-control" id="prdct_attributes" name="prdct_attribute_w[]" placeholder="Weight" value="' . $attributes[$i][0] . '">
                                        </div>
                                        <div class="col-md-6 col-12 mb-2">
                                            <input type="text" class="form-control" id="prdct_attributes" name="prdct_attribute_mrp[]" placeholder="MRP" value="' . $attributes[$i][1] . '">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <input type="text" class="form-control" id="prdct_attributes" name="prdct_attribute_sell[]" placeholder="Selling Price" value="' . $attributes[$i][2] . '">
                                        </div>
                                        <small class="mt-2 text-danger" style="cursor: pointer;" ><span class="removeA" data-item="' . $i . '">Remove Attribute <i class="bx bx-trash"></i></span></small>
                                    </div>';
                                }
                            }
                        }
                        ?>
                    </div>



                    <small class="text-primary" id="addAttribute" style="cursor: pointer;">Add more <i class='bx bx-plus'></i></small>
                </div>

                <?php
                if ($exits) {
                    $data['flavors'] = json_decode($data['flavors']);
                }
                ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Flavors</label> <small class="text-danger">Max : 5</small>
                    <input type="text" class="form-control mb-2" id="prdct_stock" name="prdct_flv[]" placeholder="Flavor" value="<?php if ($exits) echo $data['flavors'][0]; ?>">

                    <div id="flavorList">
                        <?php
                        if ($exits) {
                            for ($i = 1; $i < count($data['flavors']); $i++) {

                                echo '<div id="flvItem' . $i . '">
                                  <input type="text" class="form-control mb-2" id="prdct_stock" name="prdct_flv[]" placeholder="Flavor" value="' . $data['flavors'][$i] . '">
                                  <small class="mt-2 text-danger" style="cursor: pointer;">
                                      <span class="removeFlv" data-flv="' . $i . '">Remove Flavor <i class="bx bx-trash"></i>
                                      </span>
                                  </small>
                                  </div>';
                            }
                        }
                        ?>
                    </div>

                    <small class="text-primary mt-3" id="addFlavor" style="cursor: pointer;">
                        Add more <i class='bx bx-plus'></i>
                    </small>
                </div>
                <?php
                    if ($exits) {
                        $status = $data['status'];
                        $statuschek= '';
                        
                    }
                ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Product Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="prdct_status" id="prdct_status1" value="1" <?php if ($exits) if ($status == 1) { echo 'checked';}?> >
                        <label class="form-check-label" for="prdct_status1">Available</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="prdct_status" id="prdct_status2" value="0" <?php if ($exits) if ($status == 0) { echo 'checked'; }?> >
                        <label class="form-check-label" for="prdct_status2">Not Available</label>
                    </div>
                </div>


                <div class="mb-3">
                    
                    <?php
                        if ($exits) {
                            echo '<button type="button" class="btn btn-primary" id="prdct_update">Update</button>
                            <button class="btn btn-danger ms-2" type="button" id="prdct_remove">Remove</button>';
                        }else {
                            echo '<button type="submit" class="btn btn-primary" id="prdct_save">Save</button>';
                        }
                    ?>
                </div>



            </div>


        </form>

    </section>

    <!-- footer  -->
    <?php
    include "views/footer.php";
    ?>

    <!--===== MAIN JS =====-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    <script>
        var imgInput = document.getElementById('feature-img');
        var previewImg = document.getElementById('feature-preview')

        var pimg1 = document.getElementById('product-img1');
        var previewimg1 = document.getElementById('previewImg1');

        // product photo 1 
        document.getElementById('product-img1').addEventListener('change', (event) => {
            preImg(event, document.getElementById('previewImg1'))
        })
        // product photo 2 
        document.getElementById('product-img2').addEventListener('change', (event) => {
            preImg(event, document.getElementById('previewImg2'))
        })
        // product photo 2 
        document.getElementById('product-img3').addEventListener('change', (event) => {
            preImg(event, document.getElementById('previewImg3'))
        })
        // product photo 2 
        document.getElementById('product-img4').addEventListener('change', (event) => {
            preImg(event, document.getElementById('previewImg4'))
        })
        // feature product 
        imgInput.addEventListener('change', (event) => {
            preImg(event, previewImg)
        });

        function preImg(event, Target) {
            if (event.target.files.length == 0) {
                console.log('no file');
                return;
            }
            var tempUrl = URL.createObjectURL(event.target.files[0])
            Target.setAttribute('src', tempUrl)
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./controller/product_manage.js"></script>
    <!-- <script>
      
    </script> -->

</body>

</html>