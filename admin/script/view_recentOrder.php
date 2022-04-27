<?php
    
    // include "includes/db.php";
    $DAO = new Database();
    $sql = "SELECT * FROM `allorders` WHERE status = 'Order' ORDER BY `allorders`.`id` DESC";
    $data = $DAO->RetriveArray($sql);
    $sn = 1;
    $status = '';
    foreach($data as $d){
       
        echo ' <tr>
        <td>'.$sn.'</td>
        <td class="recentProduct"><a href="order.php?oid='.$d['orderid'].'">'.$d['orderid'].'</a></td>
        <td class="recentDate">'.$d['productname'].'</td>
        <td class="recentDate">'.$d['attribute'].' X '.$d['quantity'].'</td>
        <td class="recentDate">'.$d['price'].'</td>
        <td class="recentDate">'.$d['totalprice'].'</td>
        <td class="recentDate">'.$d['status'].'</td>
    </tr>';
    $sn ++;
    }

?>