<?php

include_once('koneksi.php');

$id = $_POST['id'];
$namapenyewa = $_POST['namapenyewa'];
$bukti = base64_decode($_POST['bukti']);


$nmb_rndm = rand(1000, 9999);
$tgl = date("Y-m-d");

$nama_image = "Bukti-".$tgl.$nmb_rndm.$namapenyewa.".jpeg";

$response = array();

$update = "UPDATE `transaksi` SET `id` = '$id', `Buktipembayaran` = '$nama_image', `Status` = 'Pending' WHERE `transaksi`.`id` = '$id'";


$simpan_foto_folder = "Image/BuktiPembayaran/".$nama_image;


if(file_put_contents($simpan_foto_folder, $bukti)){
	$exeinsert = mysqli_query($koneksi, $update);
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