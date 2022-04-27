<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    include "../includes/db.php";
    $DAO = new Database();


    // product images 
    print_r($_POST); 

    // attributes 
    $attributes = array($_POST['prdct_attribute_w'], $_POST['prdct_attribute_mrp'], $_POST['prdct_attribute_sell']);
    $temp_a= array();
    $temp_b= array();
    $temp_c= array();
    foreach ($attributes as $v) {
        
        for ($i=0; $i < count($v); $i++) { 
            if ($i == 0) {
                array_push($temp_a, $v[$i]);
            }
            if ($i == 1) {
                array_push($temp_b, $v[$i]);
            }
            if ($i == 2) {
                array_push($temp_c, $v[$i]);
            }
        }
    }

    $attrData = array($temp_a, $temp_b, $temp_c);
    $attrData = json_encode($attrData);
    // echo 'attribute : ';
    // print_r($attrData);

    $flvors = json_encode($_POST['prdct_flv']);
    // echo 'Flavor : ';
    // print_r($flvors);

    // $s = "INSERT INTO `products`(`title`, `category`, `subcategory`, `brand`, `short_desc`, `long_decs`, `feature_img`, `imgs`, `stock`, `current_stock`, `attributes`, `flavors`, `status`) VALUES ('".$_POST['prdct_name']."','".$_POST['prdct_category']."','sub','".$_POST['prdct_brand']."','".$_POST['prdct_shrt_desc']."','".$_POST['prdct_lg_desc']."','".$featureImg."','$imgArray','".$_POST['prdct_stock']."','".$_POST['prdct_stock']."','".$attrData."','$flvors','".$_POST['prdct_status']."')";
    $id = $_POST['prdct_id'];
    $u = "UPDATE `products` SET `title`='".$_POST['prdct_name']."',`category`='".$_POST['prdct_category']."',`subcategory`='u',`brand`='".$_POST['prdct_brand']."',`short_desc`='".$_POST['prdct_shrt_desc']."',`long_decs`='".$_POST['prdct_lg_desc']."',`stock`='".$_POST['prdct_stock']."',`current_stock`='".$_POST['prdct_stock']."',`attributes`='".$attrData."',`flavors`='".$flvors."',`status`='".$_POST['prdct_status']."' WHERE id = $id";
    
    if ($DAO->Query($u)) {
        echo 'Update sucess';
    }else{
        echo 'query error';
        echo mysqli_error($con);
    }
    

}

