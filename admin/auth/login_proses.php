<?php
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);


$dataValid = "YA";
if (strlen(trim($username)) == 0) {
	echo "Username harus di isi! <br/>";
	$dataValid = "TIDAK";
}
if (strlen(trim($password)) == 0) {
	echo "password harus di isi! <br/>";
	$dataValid = "TIDAK";
}
if (strlen(trim($password)) < 6) {
	echo "password harus di isi! <br/>";
	$dataValid = "TIDAK";
}
if ($dataValid == "TIDAK") {
	echo "Masih ada kesalahan, silahkan perbaiki! </br>";
	exit;
}


//include_once ('koneksi.php') ; 
include "../../config/koneksi.php";

$sql = "select * from admin where username='" . $username . "' and password='" . $password . "' limit 1";

//ngecek bug
//var_dump($sql);
//print_r($jumlah);
//die();

$hasil = mysqli_query($kon, $sql) or die('Gagal Akses! <br/>');

$jumlah = mysqli_num_rows($hasil);


if ($jumlah > 0) {
	$row = mysqli_fetch_assoc($hasil);
	var_dump($row);
	$_SESSION["id_admin"] = $row["id_admin"];
	$_SESSION["username"] = $row["username"];
	$_SESSION["password"] = $row["password"];
	header("Location: ../kegiatan/tampil_data_kegiatan.php");
} else {
	echo "User atau Password salah! <br/>";
}
