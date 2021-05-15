<?php

include_once('koneksi.php');

$id_kos = $_POST['id_kos'];
$id_pemilik = $_POST['id_pemilik'];
$id_penyewa = $_POST['id_penyewa'];
$hargakos = $_POST['hargakos'];
$namapemilik = $_POST['namapemilik'];
$namapenyewa = $_POST['namapenyewa'];
$jumlahkamar = $_POST['jumlahkamar'];
$tgl_kos = $_POST['tgl_kos'];
$lamasewa = $_POST['lamasewa'];
$namakos = $_POST['namakos'];
$namakamar = $_POST['namakamar'];

$response = array();

$insert = "INSERT INTO `transaksi` (`id`,`id_namakos`,`Namakos`,`id_namapemilik`,`Namapemilik`,`id_namauser`,`Namauser`,`id_namakamar`,`Namakamar`,`Buktipembayaran`,`Tglmulai`,`Lamasewa`,`Jumlahkamar`,`Totalharga`,`Status`) VALUES (NULL,'$id_namakos','$namakos','$id_namapemilik','$namapemilik','$id_penyewa','$namapenyewa','$id_namakamar','$namakamar','Pending','$tgl_kos','$lamasewa','$jumlahkamar','$hargakos','None')";

	$exeinsert = mysqli_query($koneksi, $insert);
	if($exeinsert){
		
		$response['status']="berhasil";
	}else{
	
		$response['status']="gagal";
	}
	echo json_encode($response);
	
?>