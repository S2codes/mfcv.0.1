<?php

// update
    if (isset($_POST['update'])) {
        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            include "../includes/db.php";
            $DAO = new Database();
            
                $sql = "UPDATE `manufacturers` SET `name`='".$_POST['brand_name']."',`description`='".$_POST['brand_desc']."',`status`='".$_POST['brand_status']."' WHERE id = ".$_POST['brand_id']."";

                if ($DAO->query($sql)) {
                    header('Location:../brands.php');
                }else{
                    echo "<script>alert('Error')</script>";
                }
            

        }
    }



    // save
    if (isset($_POST['save'])) {
        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            include "../includes/db.php";
            $DAO = new Database();
            $name = $_POST['catg_name'];
            if ($DAO->CountRows("SELECT * FROM `manufacturers` WHERE name = '$name'") < 1) {

                $sql = "INSERT INTO `manufacturers`(`name`, `description`, `status`) VALUES ('".$_POST['brand_name']."','".$_POST['brand_desc']."','".$_POST['brand_status']."')";
                if ($DAO->query($sql)) {
                    header('Location:../brands.php');
                }else{
                    echo "<script>alert('Erro')</script>";
                }
            }else{
                echo "<script>alert('Category with this Name Already Added'); window:location = '../brands.php';</script>";
            }

        }
    }


    // delete 
    if (isset($_POST['remove'])) {
        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            include "../includes/db.php";
            $DAO = new Database();
                $sql = "DELETE FROM `manufacturers` WHERE id = ".$_POST['ctag_id']."";

                if ($DAO->query($sql)) {
                    header('Location:../brands.php');
                }else{
                    echo "<script>alert('Error')</script>";
                }
            

        }
    }



?>