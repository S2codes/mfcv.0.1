<?php
    

    include "../includes/db.php";
    $DAO = new Database();
    $s = "SELECT * FROM `categories` ORDER BY `id` DESC";
    $categories = array();
    $data = $DAO->RetriveArray($s);
    foreach($data as $d){
        $temp = array(
            "id" => $d['id'],
            "name" => $d['name'],
            "description" => $d['description'],
            "status" => $d['status']
        );
        array_push($categories, $temp);
    }
    echo json_encode($categories);

    

    
?>