<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../admin/includes/db.php";
    $DAO = new Database();
    $add = $_POST['addr'];
    $address = array(
        "name" => $add[0],
        "phone" => $add[1],
        "state" => $add[2],
        "city" => $add[3],
        "area" => $add[4],
        "pin" => $add[5],
        "landmark" => $add[6],
        "additional phone" => $add[7],
        "type" => $add[8]
    );
    $addr_arr = json_encode($address);
    $addr_arr = mysqli_real_escape_string($con, $addr_arr);

    $payment_status = 'pending';
    if ($_POST['payType'] == 'payondelivery') {
        $payment_status = 'Pay on Delivery';
    }


    $sql = "INSERT INTO `allorders`(`orderid`, `userid`, `productid`, `productname`, `attribute`, `flavors`, `price`, `quantity`, `totalprice`, `address`, `payment`, `payment_id`, `payment_status`, `status`) VALUES ('".$_POST['orderid']."','".$_POST['userid']."','".$_POST['product_id']."','".$_POST['title']."','".$_POST['attr']."','".$_POST['flv']."','".$_POST['price']."','".$_POST['qty']."','".$_POST['total']."','$addr_arr','".$_POST['payType']."','p1', '$payment_status', 'Order')";
    
    if ($DAO->Query($sql)) {
        echo "success";
    }else {
        echo "faild";
    }




}

?>