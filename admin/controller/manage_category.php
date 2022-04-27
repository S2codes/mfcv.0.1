<?php

// update
    if (isset($_POST['update'])) {
        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            include "../includes/db.php";
            $DAO = new Database();
            
                $sql = "UPDATE `categories` SET `name`='".$_POST['catg_name']."',`description`='".$_POST['catg_desc']."',`status`='".$_POST['catg_status']."' WHERE id = ".$_POST['ctag_id']."";

                if ($DAO->query($sql)) {
                    header('Location:../categories.php');
                }else{
                    echo "<script>alert('Erro')</script>";
                }
            

        }
    }



    // save
    if (isset($_POST['submit'])) {
        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            include "../includes/db.php";
            $DAO = new Database();
            $name = $_POST['catg_name'];
            if ($DAO->CountRows("SELECT * FROM `categories` WHERE name = '$name'") < 1) {
                
                $sql = "INSERT INTO `categories`(`name`, `description`, `status`) VALUES ('".$_POST['catg_name']."','".$_POST['catg_desc']."','".$_POST['catg_status']."')";
                if ($DAO->query($sql)) {
                    header('Location:../categories.php');
                }else{
                    echo "<script>alert('Erro')</script>";
                }
            }else{
                echo "<script>alert('Category with this Name Already Added'); window:location = '../categories.php';</script>";
            }

        }
    }


    // delete 
    if (isset($_POST['remove'])) {
        if ($_SERVER['REQUEST_METHOD']== 'POST') {
            include "../includes/db.php";
            $DAO = new Database();
                $sql = "DELETE FROM `categories` WHERE id = ".$_POST['ctag_id']."";

                if ($DAO->query($sql)) {
                    header('Location:../categories.php');
                }else{
                    echo "<script>alert('Erro')</script>";
                }
            

        }
    }



?>