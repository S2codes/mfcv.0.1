<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // print_r($_POST);
        $oid = $_POST['oId'];
        $paymentId = $_POST['paymentId'];

        include "../admin/includes/db.php";
        $DAO = new Database();
        $sql = "UPDATE `allorders` SET `payment_status`='success', `payment_id` = '$paymentId' WHERE `orderid` = '$oid'"; 
        if ($DAO->Query($sql)) {
            echo 'success';
        }else{
            echo 'failed';
        }


    }
?>