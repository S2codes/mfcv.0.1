<?php
    
    // if (isset($_POST['querry'])) {
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["sdata"];
           
    include "../includes/db.php";
    $DAO = new Database();
    // $s = "SELECT * FROM `products` WHERE id = '17'";
    $s = "SELECT * FROM `products` WHERE id = '$id'";
    $categories = array();
    $d = $DAO->RetriveSingle($s);
    // foreach($data as $d){
        $temp = array(
            "id" => $d['id'],
            "name" => $d['title'],
            "category" => $d['category'],
            "brand" => $d['brand'],
            "short_description" => $d['short_desc'],
            "long_description" => $d['long_decs'],
            "featureImg" => $d['feature_img'],
            "imgs" => $d['imgs'],
            "current_stock" => $d['stock'],
            "attributes" => $d['attributes'],
            // "mrp" => $d['mrp'],
            // "selling_price" => $d['selling_price'],
            "flavors" => $d['flavors'],
            "status" => $d['status']
        );
        array_push($categories, $temp);
    // }
    echo json_encode($categories);

}
  


    
?>