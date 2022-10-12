<?php
  session_start();

  if(!isset($_SESSION["username"])){
        header("Location: ../auth/login.php");
        exit;
  }
  include "../../config/koneksi.php";
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
          include "../../send_message.php";
      ?>

      <!-- Tabel Data --> 
      <div class="container jarak">
          <form action="" method="POST">
          <a href="input_data_kegiatan.php" class="btn card-button btn-sm">Tambah Data</a>
          <button type="submit" value="kirim" name="kirim" class="btn card-button2 btn-sm"><span class="fas fa-bell"></span> Kirim Notifikasi</button>
          </form>
      </div>

      <?php
          $sql = "select * from kegiatan";
          $hasil = mysqli_query($kon,$sql);
          if(!$hasil)
            die("Gagal query..".mysqli_error($kon));
      ?>

      <!-- Tampil Data tabel kegiatan -->
      <div class="container">
      <div class="table-responsive-sm">
      <table class="table">
          <thead>
            <tr style='background-color:#4f0099; color: white;' text-white>
              <th>ID</th>
              <th>Nama Kegiatan</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Jenis Kegiatan</th>
              <th>ID Admin</th>
              <th>Operasi</th>
            </tr>
          </thead>

      <tbody>

      <?php
          while ($row = mysqli_fetch_assoc($hasil)){
            echo " <tr style='background-color:#e6e6ff;'> ";
            echo " <td> ".$row['id_kgt']." </td> ";
            echo " <td> ".$row['nama_kegiatan']." </td> ";
            echo " <td> ".$row['tgl_kegiatan']." </td> ";
            echo " <td> ".$row['waktu']." </td> ";
            echo " <td> ".$row['jenis_kegiatan']." </td> ";
            echo " <td> ".$row['id_admin']." </td> ";

            echo " <td> ";
            echo " <a href='kegiatan_edit.php?id_kgt=". $row['id_kgt'] . " '> EDIT </a> " ;
            echo " &nbsp;&nbsp; " ;
            echo " <a href='javascript:hapusData(".$row['id_kgt'].")'>HAPUS</a> ";
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
            function hapusData(id_kgt){
              if (confirm("Apakah anda yakin akan menghapus data ini?")){
                window.location.href = 'kegiatan_hapus.php?id_kgt=' + id_kgt;
              }
            }
      </script>

  </body>
</html>