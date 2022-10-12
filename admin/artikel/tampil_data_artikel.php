<?php
  session_start();

  if(!isset($_SESSION["username"])){
        header("Location: ../auth/login.php");
        exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <?php
        include_once ('../layout/library.php') ; 
    ?>

  </head>
  <body>

      <!-- NAVBAR -->
      <?php
          include_once ('../layout/header.php') ; 
      ?>

      <!-- Button Tambah --> 
      <div class="container jarak">
          <a href="input_data_artikel.php" class="btn card-button btn-sm">Tambah Data</a>
      </div>

      <?php
          include "../../config/koneksi.php";
          $sql = "select * from artikel";
          $hasil = mysqli_query($kon,$sql);
          if(!$hasil)
            die("Gagal query..".mysqli_error($kon));
      ?>

      <!-- Tabel Tampil Data --> 
      <div class="container">
      <div class="table-responsive-sm">
      <table class="table">
          <thead>
            <tr style='background-color:#4f0099; color: white;' text-white>
              <th>ID</th>
              <th>Judul Artikel</th>
              <th>Tanggal Terbit</th>
              <th>Gambar</th>
              <th>ID Admin</th>
              <th>Isi Artikel</th>
              <th>Operasi</th>
            </tr>
          </thead>

      <tbody>

      <?php

          // $no = 0;
          while ($row = mysqli_fetch_assoc($hasil)){
            echo " <tr style='background-color:#e6e6ff;'> ";
            echo " <td> ".$row['id_artkl']." </td> ";
            echo " <td> ".$row['judul']." </td> ";
            echo " <td> ".$row['tgl_artikel']." </td> ";
            echo " <td> ".$row['gambar']." </td> ";
            echo " <td> ".$row['id_admin']." </td> ";
             echo " <td> ".substr($row['isi_artikel'], 0,40).".... </td> ";

            echo " <td> ";
            echo " <a href='artikel_edit.php?id_artkl=". $row['id_artkl'] . " '> EDIT </a> " ;
            echo " &nbsp;&nbsp; " ;
            echo " <a href='javascript:hapusData(".$row['id_artkl'].")'>HAPUS</a> ";
            echo " </td> ";

            echo " </tr> ";
          }
      ?>

      </tbody>
      </table>
    </div>
    </div>
    <div class='container post3'>
    </div>

      <!--Footer-->
      <?php
        include_once ('../layout/footer.php') ; 
      ?>

      <!--query hapus-->
      <script language="JavaScript" type="text/javascript">
          function hapusData(id_artkl){
            if (confirm("Apakah anda yakin akan menghapus data ini?")){
              window.location.href = 'artikel_hapus.php?id_artkl=' + id_artkl;
            }
          }
      </script>
      
  </body>
</html>