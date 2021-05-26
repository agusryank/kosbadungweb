<?php

include_once('koneksi.php');

$id_kamar = $_POST['id'];
$id_kos = $_POST['id_kos'];
$id_pemilik = $_POST['id_pemilik'];
$id_penyewa = $_POST['id_penyewa'];
$namakos = $_POST['namakos'];
$namakamar = $_POST['namakamar'];
$namapemilik = $_POST['namapemilik'];
$namapenyewa = $_POST['namapenyewa'];
$tgl_kos = $_POST['tgl_kos'];
$lamasewa = $_POST['lamasewa'];
$jumlahkamar = $_POST['jumlahkamar'];
$hargakos = $_POST['hargakos'];

$response = array();

$insert = "INSERT INTO `transaksi` (`id`,`id_namakos`,`Namakos`,`id_namapemilik`,`Namapemilik`,`id_namauser`,`Namauser`,`id_namakamar`,`Namakamar`,`Buktipembayaran`,`Tglmulai`,`Lamasewa`,`Jumlahkamar`,`Totalharga`,`Status`) VALUES (NULL,'$id_kos','$namakos','$id_pemilik','$namapemilik','$id_penyewa','$namapenyewa','$id_kamar','$namakamar','Pending','$tgl_kos','$lamasewa','$jumlahkamar','$hargakos','Pending')";

	$exeinsert = mysqli_query($koneksi, $insert);
	if($exeinsert){
		
		$response['status']="berhasil";
	}else{
	
		$response['status']="gagal";
	}
	echo json_encode($response);
	
?>