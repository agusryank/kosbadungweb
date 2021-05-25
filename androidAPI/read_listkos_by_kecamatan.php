<?php

    include('koneksi.php');

    $kecamatan = $_POST['kecamatan'];

    $query = "SELECT * FROM `kos` where `Kecamatan` = '$kecamatan' AND `Status` = 'Sukses'";
    
    
    $result = mysqli_query($koneksi,$query);
    $arraydata = array();

    while ($baris = mysqli_fetch_assoc($result)){
        $arraydata[]=$baris;    
    }
    echo json_encode($arraydata);


?>