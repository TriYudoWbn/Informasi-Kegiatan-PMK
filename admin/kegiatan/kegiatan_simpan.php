<?php
    
    if (isset($_POST['id_kgt'])) {
    	$id_kgt = $_POST['id_kgt'];
    	$simpan = "Perbaharui";
    }else{
    	$simpan = "BARU";
    }
    
    include "../../config/koneksi.php";
    
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $tanggal = $_POST['tgl_kegiatan'];
    $waktu = $_POST['waktu'];
    $catatan = $_POST['catatan'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $id_admin = $_POST['id_admin'];
    $colapse = $_POST['colapse'];
    
    $dataValid = "YA";
    
    if(strlen(trim($catatan)) == 0){
    	echo "<center>Catatan Kegiatan harus diisi!</center>";
    	$dataValid = "TIDAK";
    }
    if($dataValid == "TIDAK"){
    	echo "<center>Masih ada kesalahan, silakan perbaiki!</center><br/>";
    	echo "<center><input type='button' value='Kembali' onClick='self.history.back()'/></center>";
    }else{
    
    	if($simpan == "Perbaharui"){
    		$sql = "UPDATE kegiatan SET
    				nama_kegiatan = '$nama',
    				jenis_kegiatan = '$jenis',
    				tgl_kegiatan = '$tanggal',
    				waktu = '$waktu',
    				catatan = '$catatan',
    				latitude = $latitude,
    				longitude = $longitude,
    				colapse = '$colapse'
    				WHERE id_kgt = $id_kgt";
    	}
    	else{
    	$sql = "INSERT INTO kegiatan(nama_kegiatan,tgl_kegiatan,waktu,jenis_kegiatan,catatan,id_admin,latitude,longitude,colapse)
    				VALUES ('$nama','$tanggal','$waktu','$jenis','$catatan','$id_admin',$latitude,$longitude,'$colapse')";
    	}
    
    	$hasil = mysqli_query($kon, $sql);
    
    	if(!$hasil){
    		echo "<center>Gagal simpan, silakan diulangi!<br/></center>";
    		echo mysqli_error($kon);
    		echo "<center><br/><input type='button' value='Kembali' onClick='self.history.back()'/></center>";
    	}
    	else{
    		header("Location: ../kegiatan/tampil_data_kegiatan.php");
    	}
    }
