<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    include "../includes/db.php";
    $DAO = new Database();
    // feature img 
    $featureImg = '';
    
    if ($_FILES['prdct_featureimg']['name'] != '') {
        $filename = $_FILES['prdct_featureimg']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $vaild_extension = array('jpg', 'jpeg', 'png', 'webp');

        if (in_array($extension, $vaild_extension)) {
            $new_name = rand().'.'.$extension;
            $path = '../Products/'.$new_name;
            if (move_uploaded_file($_FILES['prdct_featureimg']['tmp_name'], $path)) {
                $featureImg = 'Products/'.$new_name;
            }
        }

    }

    // product images 

    $pimg1 = '';
    $pimg2 = '';
    $pimg3 = '';
    $pimg4 = '';

    if ($_FILES['product-img1']['name'] != '') {
        $filename = $_FILES['product-img1']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $vaild_extension = array('jpg', 'jpeg', 'png', 'webp');

        if (in_array($extension, $vaild_extension)) {
            $new_name = rand().'.'.$extension;
            $path = '../Products/'.$new_name;
            if (move_uploaded_file($_FILES['product-img1']['tmp_name'], $path)) {
                $pimg1 = 'Products/'.$new_name;
            }
        }

    }
    if ($_FILES['product-img2']['name'] != '') {
        $filename = $_FILES['product-img2']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $vaild_extension = array('jpg', 'jpeg', 'png', 'webp');

        if (in_array($extension, $vaild_extension)) {
            $new_name = rand().'.'.$extension;
            $path = '../Products/'.$new_name;
            if (move_uploaded_file($_FILES['product-img2']['tmp_name'], $path)) {
                $pimg2 = 'Products/'.$new_name;
            }
        }

    }
    if ($_FILES['product-img3']['name'] != '') {
        $filename = $_FILES['product-img3']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $vaild_extension = array('jpg', 'jpeg', 'png', 'webp');

        if (in_array($extension, $vaild_extension)) {
            $new_name = rand().'.'.$extension;
            $path = '../Products/'.$new_name;
            if (move_uploaded_file($_FILES['product-img3']['tmp_name'], $path)) {
                $pimg3 = 'Products/'.$new_name;
            }
        }

    }
    if ($_FILES['product-img4']['name'] != '') {
        $filename = $_FILES['product-img4']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $vaild_extension = array('jpg', 'jpeg', 'png', 'webp');

        if (in_array($extension, $vaild_extension)) {
            $new_name = rand().'.'.$extension;
            $path = '../Products/'.$new_name;
            if (move_uploaded_file($_FILES['product-img4']['tmp_name'], $path)) {
                $pimg4 = 'Products/'.$new_name;
            }
        }

    }
    
    $imgArray = array();
    $imgArray = [$pimg1, $pimg2, $pimg3, $pimg4];
    $imgStr = implode(",", $imgArray);
    $imgArray = json_encode($imgArray);
 

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

    $flvors = json_encode($_POST['prdct_flv']);


    $s = "INSERT INTO `products`(`title`, `category`, `subcategory`, `brand`, `short_desc`, `long_decs`, `feature_img`, `imgs`, `stock`, `current_stock`, `attributes`, `flavors`, `status`) VALUES ('".$_POST['prdct_name']."','".$_POST['prdct_category']."','sub','".$_POST['prdct_brand']."','".$_POST['prdct_shrt_desc']."','".$_POST['prdct_lg_desc']."','".$featureImg."','$imgArray','".$_POST['prdct_stock']."','".$_POST['prdct_stock']."','".$attrData."','$flvors','".$_POST['prdct_status']."')";
    
    if ($DAO->Query($s)) {
        echo 'submit sucess';
    }else{
        echo 'query error';
        echo mysqli_error($con);
    }
    

}

