<?php

header("Location: tampil_data_artikel.php");


if (isset($_POST['id_artkl'])) {
	$id_artkl = $_POST['id_artkl'];
	$foto_lama = $_POST['foto_lama'];
	$simpan = "Perbaharui";
} else {
	$simpan = "BARU";
}


include "../../config/koneksi.php";


$judul = $_POST['judul'];
$isi_artikel = $_POST['isi_artikel'];
$tgl_artikel = $_POST['tgl_artikel'];
$id_admin = $_POST['id_admin'];
$colapse = $_POST['colapse'];

$foto = $_FILES['foto']['name'];
$tmpName = $_FILES['foto']['tmp_name'];
$size = $_FILES['foto']['size'];
$type = $_FILES['foto']['type'];



$maxsize = 2000000;
$typeYgBoleh = array("image/jpeg", "image/png", "image/pjpeg", "image/jpg");

$dirFoto = "pict";
if (!is_dir($dirFoto)) {
	mkdir($dirFoto);
}
$fileTujuanFoto = $dirFoto . "/" . $foto;

$dirThumb = "thumb";
if (!is_dir($dirThumb)) {
	mkdir($dirThumb);
}
$fileTujuanThumb = $dirThumb . "/t_" . $foto;

$dataValid = "YA";


if ($size > 0) {
	if ($size > $maxsize) {
		echo "Ukuran file terlalu besar <br/>";
		$dataValid = "TIDAK";
	}
	if (!in_array($type, $typeYgBoleh)) {
		echo "Type File tidak Dikenal <br/>";
		$dataValid = "TIDAK";
	}
}



if (strlen(trim($judul)) == 0) {
	echo "<center>Judul Artikel harus diisi!</center>";
	$dataValid = "TIDAK";
}
if (strlen(trim($isi_artikel)) == 0) {
	echo "<center>Isi Artikel harus diisi!</center>";
	$dataValid = "TIDAK";
}
if (strlen(trim($tgl_artikel)) == 0) {
	echo "<center>Tanggal Artikel harus diisi!</center>";
	$dataValid = "TIDAK";
}
if ($dataValid == "TIDAK") {
	echo "<center>Masih ada kesalahan, silakan perbaiki!</center><br/>";
	echo "<center><input type='button' value='Kembali' onClick='self.history.back()'/></center>";
}



if ($simpan == "Perbaharui") {
	if ($size == 0) {
		$foto = $foto_lama;
	}

	$sql = "UPDATE artikel SET
				judul = '$judul',
				isi_artikel = '$isi_artikel',
				tgl_artikel = '$tgl_artikel',
				gambar = '$foto'
				WHERE id_artkl = $id_artkl";
} else {
	$sql = "INSERT INTO artikel(judul,isi_artikel,tgl_artikel,gambar,colapse,id_admin)
				VALUES ('$judul','$isi_artikel','$tgl_artikel','$foto','$colapse','$id_admin')";
}


$hasil = mysqli_query($kon, $sql);



if (!$hasil) {
	echo "<center>Gagal simpan, silakan diulangi!<br/></center>";
	echo mysqli_error($kon);
	echo "<center><br/><input type='button' value='Kembali' onClick='self.history.back()'/></center>";
} else {
	echo "<center>DATA BERHASIL DI SIMPAN</center>";
}
if ($size > 0) {
	if (!move_uploaded_file($tmpName, $fileTujuanFoto)) {
		echo "Gagal Upload Gambar.. <br/>";
	} else {
		buat_thumbnail($fileTujuanFoto, $fileTujuanThumb);
	}
}

echo "<br/><center>File sudah diupload.</center><br/>";


function buat_thumbnail($file_src, $file_dst)
{
	list($w_src, $h_src, $type) = getimagesize($file_src);

	switch ($type) {
		case 1:
			$img_src = imagecreatefromgif($file_src);
			break;
		case 2:
			$img_src = imagecreatefromjpeg($file_src);
			break;
		case 3:
			$img_src = imagecreatefrompng($file_src);
			break;
	}

	$thumb = 100;
	if ($w_src > $h_src) {
		$w_dst = $thumb;
		$h_dst = round($thumb / $w_src * $h_src);
	} else {
		$w_dst = round($thumb / $h_src * $w_src);
		$h_dst = $thumb;
	}

	$img_dst = imagecreatetruecolor($w_dst, $h_dst);

	imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0, $w_dst, $h_dst, $w_src, $h_src);
	imagejpeg($img_dst, $file_dst);

	imagedestroy($img_src);
	imagedestroy($img_dst);
}
