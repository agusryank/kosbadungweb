<?php

    include('koneksi.php');

    $query = "SELECT * FROM `transaksi` where `Status` = 'Sukses'";
    
    
    $result = mysqli_query($koneksi,$query);
    $arraydata = array();

    while ($baris = mysqli_fetch_assoc($result)){
        $arraydata[]=$baris;    
    }
    echo json_encode($arraydata);


?>