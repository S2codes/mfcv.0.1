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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Products</title>
</head>

<body id="body-pd">
    <!-- sidenav  -->
    <?php
        include "views/sidenav.php";
        include "includes/db.php";
    ?>
    <!-- sidenav  -->
    <section class="componentContainer">
        <!-- <h1>Component</h1> -->
        <div class="navigation mb-3">
            <span class="rootMenu"><a href="#">Home</a> / </span><Span class="mainMenu"><a href="#">Products</a></Span>
        </div>

        <div class="row">
            <div class="col">
                <h3 style="font-weight: 600;">All Products</h3>
            </div>
            <div class="col d-flex flex-row-reverse">
                <a href="product.php" class="btn btn-primary mr-2 ">Add New</a>
            </div>
           
           
        </div>

        <!-- filter from  -->
        <!-- <div class="row">
            <div class="col">
                <span class="formLabel">Search</span>
                <input type="text" class="form-control mt-2" placeholder="Search Product" aria-label="Search">
            </div>
            <div class="col">
                <span class="formLabel">Category</span>
                <select class="form-select mt-2" id="floatingSelect" aria-label="Floating label select example">
                    <option selected>Select Category</option>
                    <option value="1">Category One</option>
                    <option value="2">Category Two</option>
                    <option value="3">Category Three</option>
                </select>
            </div>
            <div class="col">
                <span class="formLabel">Sub Category</span>
                <select class="form-select mt-2" id="floatingSelect" aria-label="Floating label select example">
                    <option selected>Select Sub category</option>
                    <option value="1">Sub Category One</option>
                    <option value="2">Sub Category Two</option>
                    <option value="3">Sub Category Three</option>
                </select>
            </div>
            <div class="col">
                <span class="formLabel">Filter</span>
                <select class="form-select mt-2" id="floatingSelect" aria-label="Floating label select example">
                    <option value="1" selected>Newest First</option>
                    <option value="2">Older First</option>
                    <option value="3">Price - Low to High</option>
                    <option value="3">Price - High to Low</option>
                </select>
            </div>
        </div> -->

        <div class="dataContainer mt-3">
            <div class="row ">
                <div class="col-md-12 col-12">
                    <table class="table" id="ProductData">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Name</th>
                               <th>Category</th>
                               <th>Brand</th>
                               <th>Current Stock</th>
                               <th>Status</th>
                           </tr>
                       </thead>
                        <tbody>
                            <?php
                                include "script/view_products.php";
                            ?>
                            
                           
                        </tbody>
                    </table>

                </div>
               
            </div>
        </div>


    </section>


   <!-- footer  -->
   <?php
       include "views/footer.php";
   ?>

    <!--===== MAIN JS =====-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#ProductData').DataTable();
            $('#navProducts').addClass('active');
        } );
    </script>
</body>

</html>