<?php

include_once('koneksi.php');

$hargakos = $_POST['hargakos'];
$namapemilik = $_POST['namapemilik'];
$namapenyewa = $_POST['namapenyewa'];
$jumlahkamar = $_POST['jumlahkamar'];
$tgl_kos = $_POST['tgl_kos'];
$lamasewa = $_POST['lamasewa'];
$namakos = $_POST['namakos'];

$response = array();

$insert = "INSERT INTO `transaksi` (`id`,`Namakos`,`Namapemilik`,`Namauser`,`Buktipembayaran`,`Tglmulai`,`Lamasewa`,`Jumlahkamar`,`Totalharga`,`Status`) VALUES (NULL,'$namakos','$namapemilik','$namapenyewa','Pending','$tgl_kos','$lamasewa','$jumlahkamar','$hargakos','None')";

	$exeinsert = mysqli_query($koneksi, $insert);
	if($exeinsert){
		
		$response['status']="berhasil";
	}else{
	
		$response['status']="gagal";
	}
	echo json_encode($response);
	
?>