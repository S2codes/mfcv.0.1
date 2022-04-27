<?php
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       include "../admin/includes/db.php";
       $DAO = new Database();
        $querry = "INSERT INTO `orders`(`id`, `userid`, `product_id`, `ft_img`, `product_name`, `product_weight`, `product_flv`, `product_price`, `product_qty`) VALUES (1,'".$_POST['puser']."','".$_POST['pid']."','".$_POST['pimg']."','".$_POST['pname']."','".$_POST['pweight']."','".$_POST['pflv']."','".$_POST['pprice']."','".$_POST['pqty']."')";
        if ($DAO->Query($querry)) {
            
        }

    }



?>