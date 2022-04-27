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
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Add New Category</title>
</head>

<body id="body-pd">
    <!-- sidenav  -->
<?php
    include "views/sidenav.php";
    $exits = false;
    if (isset($_GET['edit'])) {
        $exits = true;
        include "./includes/db.php";
        $DAO = new Database();
        $id = $_GET['edit'];
        $d = $DAO->RetriveSingle("SELECT * FROM `categories` WHERE id = $id");
        $sa = '';
        $su = '';
        if ($d['status'] == 'Available') {
            $sa = 'checked';
        }else{
            $su = 'checked';
        }
    }
?>
    <!-- sidenav  -->
    <section class="componentContainer">
        <!-- <h1>Component</h1> -->
        <div class="navigation mb-3">
            <span class="rootMenu"><a href="#">Home</a> / </span><Span class="mainMenu"><a href="#">Add New
                    Categoty</a></Span>
        </div>

        <div class="row">
            <div class="col">
                <h3 style="font-weight: 600;">Product Details</h3>
            </div>

        </div>

        <!-- from  -->
        <div class="mt-2 px-3">
            <form action="controller/manage_category.php" method="post" class="row">
                <div class="col-md-7 col-12 px-3">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control"  name="catg_name" placeholder="Enter Product Name" value="<?php if($exits){ echo $d['name'];}?>">
                        
                        <?php
                            if($exits){
                                echo '<input type="hidden" name="ctag_id" value="'.$d['id'].'">';
                            }
                        ?>

                    </div>
          
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Description</label>
                        <textarea name="catg_desc" class="form-control" id="" cols="30" rows="5"><?php if($exits){ echo $d['description'];}?></textarea>
                    </div>
          
                </div>

                <div class="col-md-5 col-12 px-3">
                 
                    <div class="mb-3">
                        <label for="name" class="form-label"> Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="catg_status" value="Available" <?php if($exits){  echo $sa;} else echo 'checked'; ?> >
                            <label class="form-check-label" for="flexRadioDefault1">Available</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="catg_status" value="Unavailable"  <?php if($exits){  echo $su;} ?>>
                            <label class="form-check-label" for="flexRadioDefault2">Not Available</label>
                          </div>

                    </div>
                    
                    <?php
                        if ($exits) {
                            echo '<button type="submit" name="update" class="btn btn-primary">Update</button>
                            <button type="sumit" name="remove" class="btn btn-danger">Remove</button>';
                        }     
                        else {
                            echo '<button type="submit" name="submit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-danger">Discard</button>';
                        }         
                        
                        
                    ?>
                    

                    


                </div>


            </form>

        </div>

    </section>


    <footer class="mt-5">
        <ul>
            <li>Copyright &copy; 2022 Beetabie.All Right Reserved</li>
            <li>Developed by <a href="#">Subhankar sarkar</a></li>
        </ul>
    </footer>

    <!--===== MAIN JS =====-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       
    <script src="assets/js/main.js"></script>
</body>

</html>