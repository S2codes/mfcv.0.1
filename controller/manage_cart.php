<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include "../admin/includes/db.php";
        $DAO = new Database();
        $id = $_POST['uid'];
        $pid = $_POST['cart_prduct'];
        $q = "SELECT * FROM `carts` WHERE userid = '$id' AND productid = '$pid'";
        if (($DAO->CountRows($q)) < 1) {
            // INSERT INTO `carts`(`id`, `userid`, `productName`, `productid`, `weight`, `price`, `flavors`, `qty`, `date`)
                $sql = "INSERT INTO `carts`(`userid`, `productName`, `productid`, `weight`, `price`, `flavors`, `qty`) VALUES ('".$_POST['uid']."','".$_POST['cart_prduct_name']."', '".$_POST['cart_prduct']."','".$_POST['cart_weight']."','".$_POST['cart_price']."','".$_POST['cart_flavors']."','".$_POST['cart_quantity']."')";

            if ($DAO->Query($sql)) {
                echo "success";
            }else{
                echo "error";
            }
        }else {
            echo 'present';
        }

        

    }

?>