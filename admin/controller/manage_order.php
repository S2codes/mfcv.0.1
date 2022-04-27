<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        include "../includes/db.php";
        $DAO = new Database();
        $id = $_POST['order_id'];
        $status = $_POST['order_status'];
        $sql = "UPDATE `allorders` SET `status`='$status' WHERE orderid = '$id'";
        if ($DAO->Query($sql)) {
            echo 'suceess';
        }else{
            echo 'failed';
        }

    }
?>