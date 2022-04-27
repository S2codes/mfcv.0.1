<?php
    if(isset($_GET['oid'])){
        echo 'Invoice<br>';
        echo $_GET['oid'];
        include "./includes/db.php";
        $DAO = new Database();
        $id = $_GET['oid'];
        $d = $DAO->RetriveSingle("SELECT * FROM `allorders` WHERE orderid = '$id'");

        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Order Invlice</title>
        </head>
        <body>
            <h1>Muscle & Fitness Care</h1>
            <p class="mb-2"><strong>Order Id : </strong>'.$d['orderid'].'</p>
            <p class="mb-2"><strong>Product Name : </strong> '.$d['productname'].'</p>
            <p class="mb-2"><strong>Attribute : </strong>'. $d['attribute'].'</p>
            <p class="mb-2"><strong>Flavors : </strong>'.$d['flavors'].'</p>
            <p class="mb-2"><strong>Price : </strong>₹'.$d['price'].' X .'.$d['quantity'].'</p>
            <p class="mb-2"><strong>Total Price : </strong> ₹'.$d['totalprice'].'</p>
        </body>
        </html>';

        include "vendor/autoload.php";
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output($file, 'I');

    }
?>

