<?php
    
    // include "includes/db.php";
    $DAO = new Database();
    $data = $DAO->RetriveArray('SELECT * FROM `manufacturers`');
    $sn = 1;
    foreach ($data as $d) {
        $status = '';
        if ($d['status'] == 'Available') {
            $status = '<span class="bg-success text-light px-1">Available</span>';
        }else{
            $status = '<span class="bg-danger text-light px-3">Draft</span>';
        }
        echo ' <tr>
        <td>'.$sn.'</td>
        <td class="recentProduct"><a href="brand.php?edit='.$d['id'].'">'.$d['name'].'</a></td>
        <td>'.$status.'</td>
        </tr>';
        $sn += 1;

    }



?>