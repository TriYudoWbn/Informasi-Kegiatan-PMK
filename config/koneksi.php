<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "exodus";

$kon = mysqli_connect($host, $user, $pass, $db);

if ($kon->connect_error) {
	die("koneksi ke database gagal");
}
