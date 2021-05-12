<?php

include_once('koneksi.php');

$nama = $_POST['nama'];
$telp = $_POST['telp'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$response = array();

$insert = "INSERT INTO `user` (`id`,`Nama`,`Alamat`,`No_telp`,`Jenis_kelamin`,`Username`,`Password`) VALUES (NULL,'$nama','$alamat','$telp','$jenis_kelamin','$username','$password')";

	$exeinsert = mysqli_query($koneksi, $insert);
	if($exeinsert){
		
		$response['status']="berhasil";
	}else{
	
		$response['status']="gagal";
	}
	echo json_encode($response);
	
?>