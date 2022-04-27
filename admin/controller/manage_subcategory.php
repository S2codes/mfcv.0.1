<?php

// update
include "../includes/db.php";
    if (isset($_POST['update'])) {
        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            $DAO = new Database();
            
                $sql = "UPDATE `subcategories` SET `name`='".$_POST['sub_catg_name']."',`description`='".$_POST['sub_catg_desc']."',`category` = '".$_POST['sub_catg_catg']."', `status`='".$_POST['catg_status']."' WHERE id = ".$_POST['sub_catg_id']."";

                if ($DAO->query($sql)) {
                    header('Location:../subcategories.php');
                }else{
                    echo "<script>alert('Error')</script>";
                }
            

        }
    }



    // save
    if (isset($_POST['submit'])) {
        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            // include "../includes/db.php";
            $DAO = new Database();
            $name = $_POST['sub_catg_name'];
            if ($DAO->CountRows("SELECT * FROM `subcategories` WHERE name = '$name'") < 1) {
                
                $sql = "INSERT INTO `subcategories`(`name`, `description`, `category`, `status`) VALUES ('".$_POST['sub_catg_name']."','".$_POST['sub_catg_desc']."','".$_POST['sub_catg_catg']."', '".$_POST['sub_catg_status']."')";
                if ($DAO->query($sql)) {
                    header('Location:../subcategories.php');
                }else{
                    echo "<script>alert('Error')</script>";
                }
            }else{
                echo "<script>alert('Category with this Name Already Added'); window:location = '../subcategories.php';</script>";
            }

        }
    }


    // delete 
    if (isset($_POST['remove'])) {
        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            // include "../includes/db.php";
            $DAO = new Database();
                $sql = "DELETE FROM `subcategories` WHERE id = ".$_POST['sub_catg_id']."";

                if ($DAO->query($sql)) {
                    header('Location:../subcategories.php');
                }else{
                    echo "<script>alert('Error')</script>";
                }
            

        }
    }



?>