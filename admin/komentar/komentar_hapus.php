<?php  
  
  // defenisikan koneksi
  include "../../config/koneksi.php";
  // cek apakah ada parameter ID dikirim
  if (isset($_GET['id'])) {
    // jika ada, ambil nilai id
    $id_komen    = $_GET['id'];

    // get id_kgt ketika data komentar di hapus data kegiatan tetap di tampilkan
    $sql2 = "select * from komentar where id = '$id_komen'";
    $hasil = mysqli_query($kon,$sql2);
    $data = mysqli_fetch_array($hasil);
    $id_kgt = $data['id_kgt'];
    
    // query SQL menghapus data berdasarkan id yg dipilih
    $sql    = "DELETE from komentar WHERE id ='".$id_komen."'";

    // hapus data pada database
    $query  = mysqli_query($kon,$sql);
    
    // cek apakah proses hapus data berhasil
    if(mysqli_affected_rows($kon)) {
        
      // jika berhasil, redirect kehalaman index.php
      header("Location:../../user/kegiatan/info_kegiatan.php");
   } else {
      // jika tidak redirect juga kehalaman index.php
       header("Location:../../user/kegiatan/info_kegiatan.php");
    }
  }

?>