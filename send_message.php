<?php
	include "../../config/koneksi.php";
    $query = "select * from kegiatan ORDER BY id_kgt DESC limit 1";
    $result = mysqli_query($kon,$query);
    
    $dt = mysqli_fetch_array($result);
    $nama = $dt['nama_kegiatan'];

function sendMessage($nama){

	$content = array(
		"en" => "Informasi Kegiatan Baru !!!\n".$nama
	);

	$fields = array(
		'app_id' => "cac4891a-72a6-43b7-937e-dbf115060d8e",
		'included_segments' => array('All'),
		'contents' => $content
	);

	$fields = json_encode($fields);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charset=utf-8',
			'Authorization: Basic MjVkYjg3Y2MtMmY1OS00NDVjLWFkZGItZjQ3MDMwMmVlZDU4'
		)
	);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

	$response = curl_exec($ch);
	curl_close($ch);

	return $response;
}

if(isset($_POST['kirim'])){
 sendMessage($nama);
}
	
?>

