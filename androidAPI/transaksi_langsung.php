<?php

include_once('koneksi.php');

$id = $_POST['id'];
$namakos = $_POST['namakos'];
$namapemilik = $_POST['namapemilik'];
$namapenyewa = $_POST['namapenyewa'];
$bukti = base64_decode($_POST['bukti']);
$tgl_kos = $_POST['tgl_kos'];
$lamasewa = $_POST['lamasewa'];
$jumlahkamar = $_POST['jumlahkamar'];
$hargakos = $_POST['hargakos'];

$nmb_rndm = rand(1000, 9999);
$tgl = date("Y-m-d");

$nama_image = "Bukti-".$tgl.$nmb_rndm.$namapenyewa.".jpeg";

$response = array();

$insert = "INSERT INTO `transaksi` (`id`,`Namakos`,`Namapemilik`,`Namauser`,`Buktipembayaran`,`Tglmulai`,`Lamasewa`,`Jumlahkamar`,`Totalharga`,`Status`) VALUES (NULL,'$namakos','$namapemilik','$namapenyewa','$nama_image','$tgl_kos','$lamasewa','$jumlahkamar','$hargakos','Pending')";


$simpan_foto_folder = "Image/BuktiPembayaran/".$nama_image;


if(file_put_contents($simpan_foto_folder, $bukti)){
	$exeinsert = mysqli_query($koneksi, $insert);
	if($exeinsert){
		
		$response['status']="berhasil";
	}else{
	
		$response['status']="gagal";
	}
}else{
		$response['status']="gagal_upload_foto";
	}
	echo json_encode($response);
	
?>