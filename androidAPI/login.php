<?php

include_once('koneksi.php');

$username = $_POST['Username'];
$password = $_POST['Password'];

$query = "SELECT * FROM `user` where `Username`='$username' AND `Password`='$password' ";

$result = mysqli_query($koneksi,$query);

$arraydata= array ();

if ($data = mysqli_fetch_assoc($result)){

	$arraydata = array (
		"id" => $data['id'],
		"Nama" => $data['Nama'],
		"Alamat" => $data['Alamat'],
		"No_telp" => $data['No_telp'],
		"Jenis_kelamin" => $data['Jenis_kelamin'],
		"Username" => $data['Username'],
		"Password" => $data['Password'],
		"status_login" => "berhasil",
	);

}else{
	$arraydata = array (
			"Status login" => "gagal",
	);
}
echo json_encode($arraydata);

?>