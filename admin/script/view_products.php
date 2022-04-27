<?php
    
    // include "includes/db.php";
    $DAO = new Database();
    $sql = "SELECT * FROM `products`";
    $data = $DAO->RetriveArray($sql);
    $sn = 1;
    $status = '';
    foreach($data as $d){
        if ($d['status'] == 1 ) {
            $status = '<span class="bg-success text-light p-2">Availabe</span>';
        }else{
            $status = '<span class="bg-danger text-light p-2">Unavailabe</span>';
        }
        echo ' <tr>
        <td>'.$sn.'</td>
        <td class="recentProduct"><a href="product.php?edit='.$d['id'].'">'.$d['title'].'</a></td>
        <td class="recentDate">'.$d['category'].'</td>
        <td class="recentDate">'.$d['brand'].'</td>
        <td class="recentDate">'.$d['current_stock'].'</td>
        <td class="recentDate">'.$status.'</td>
    </tr>';
    $sn ++;
    }

?>