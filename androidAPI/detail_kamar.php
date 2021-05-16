<?php

include_once('koneksi.php');

$id = $_POST['id'];

$query = "SELECT * FROM `kamarkos` where `id` = '$id'";
$result = mysqli_query($koneksi,$query);
$response = array();

while($baris = mysqli_fetch_assoc($result)) {
	$response=$baris;
}

echo json_encode($response);

?>

