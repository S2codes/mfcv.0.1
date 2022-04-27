<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include "../admin/includes/db.php";
        $DAO = new Database();
        $id = $_POST['crtid'];
        $q = "DELETE FROM `carts` WHERE id = $id";
            if ($DAO->Query($q)) {
                echo "true";
            }else{
                echo "false";
            }
    }

?>