<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    include "../includes/db.php";
    $DAO = new Database();
     $id = $_POST['prdct_id'];
    $d ="DELETE FROM `products` WHERE id = $id";

    if ($DAO->Query($d)) {
        echo 'Delete sucess';
    }else{
        echo 'query error';
    }
    

}

