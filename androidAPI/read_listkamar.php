<?php

    include('koneksi.php');

    $id = $_POST['id'];

    $query = "SELECT * FROM `kamarkos` where `id_kos` = '$id'";
    
    
    $result = mysqli_query($koneksi,$query);
    $arraydata = array();

    while ($baris = mysqli_fetch_assoc($result)){
        $arraydata[]=$baris;    
    }
    echo json_encode($arraydata);


?>