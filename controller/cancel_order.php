<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $id = $_POST['id'];
    include "../admin/includes/db.php";
    $DAO = new Database();
    $sql = "UPDATE `allorders` SET `status`='cancel' WHERE `orderid` = '$id'";
    if ($DAO->Query($sql)) {
        echo 'canceled';
    }
}
?>