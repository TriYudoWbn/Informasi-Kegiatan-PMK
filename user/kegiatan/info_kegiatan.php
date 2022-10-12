<!DOCTYPE html>
<html lang="en">
  <head>

    <?PHP 
        include_once ('../layout/library.php') ;
    ?>

  </head>
  <body>

      <!-- NAVBAR-->
      <?PHP 
        include_once ('../layout/header.php') ;
      ?>

      <!--Tampilan Konten-->  
      <?php
        include "../../config/koneksi.php";
            $sql = "select * from kegiatan ORDER BY created_at DESC limit 5";
            $hasil = mysqli_query($kon,$sql); 

           echo "<div class='container post2'>";
           echo"</div>";
          
          while ($data = mysqli_fetch_assoc($hasil)) {
           $id_kgt = $data['id_kgt'];
           $nama = $data['nama_kegiatan'];
           $latitude = $data['latitude'];
           $longitude = $data['longitude'];
           $colapse = $data['colapse'];

           echo"<div class='container post5'>";
            echo"<div class='card' style='background-color:#f2f2f2;'>";
              echo"<div class='card-header text-center'>
               <h4>Informasi Kegiatan</h4>
              </div>";
              echo"<div class='container'>";
              echo"<div class='card-body' style='background-color:#f2f2f2;'>";
              
              echo"<div class='row'>";
              echo"<div class='col-md-1'>";
              echo"</div>";

              echo"<div class='col-md-10'>";
              
              echo"<table align='center' class='table table-sm'>";
              echo"<tr>";
              echo"<th>Nama Kegiatan</th>";
                echo"<td>{$data['nama_kegiatan']}</td>";
              echo"</tr>";
              echo"<tr>";
                echo"<th>Tanggal Kegiatan</th>";
                echo"<td>{$data['tgl_kegiatan']}</td>";
              echo"</tr>";
              echo"<tr>";
              echo"<th>Waktu Pelaksanaan</th>";
                echo"<td>{$data['waktu']}</td>";
              echo"</tr>";
              echo"<tr>";
                echo"<th>Jenis Kegiatan</th>";
                echo"<td>{$data['jenis_kegiatan']}</td>";
              echo"</tr>";
              echo"<tr>";
              echo"<th>Catatan</th>";
                echo"<td>{$data['catatan']}</td>";
              echo"</tr>";
              echo"<tr>";
                echo"<th>Lokasi Kegiatan</th>";
                echo"<td>";?>
                <a href="#" onclick="window.open('https://www.openstreetmap.org/directions?from=&to='+<?php echo $latitude; ?>+'%2C'+<?php echo $longitude; ?>, '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400');"><button type="button" class="btn card-button">Lihat</button></a></td>
              <?php
              echo"</tr>";
              echo"</table>";

              echo"</div>";

              echo"<div class='col-md-1'>";
              echo"</div>";
              echo"</div>";
              
              echo"</div>";
            echo"</div>";
          echo"</div>";

          echo "<div class='container post4'>";
          echo"</div>";

          echo"<p>";
            echo"<button type='button' class='btn card-button' data-toggle='collapse' data-target='#$colapse'>Komentar</button>";
          echo"</p>";
            echo"<div class='col'>";
              echo"<div class='collapse multi-collapse' id='$colapse'>";
                echo"<div class='card card-body card-komen'>";

                //script komentar
                  $sql = "select * from komentar where id_kgt = '$id_kgt'";
                  $hasil2 = mysqli_query($kon,$sql); 

                  while ($data = mysqli_fetch_assoc($hasil2)) {          
                          echo"<blockquote class='blockquote mb-0'>
                            <p style='color: blue;' class='font-weight-bold'>{$data['nama_pengirim']}</p>
                            <p <p style='font-size: 16px;'>{$data['isi_komentar']}</p>";
                            echo"<footer style='font-size: 10px; color: blue;' class='blockquote-footer'>{$data['created_at']}  |  <a href='javascript:hapusData(".$data['id'].")'><p class='fas fa-trash'></p></a> </footer>";
                          echo"</blockquote>";
                          echo"<hr>";     
                  }

                echo "<div class='container post6'>";
                echo"</div>";
                ?>     

                <!-- Form Input Komentar -->
                <form action="../../admin/komentar/komentar_simpan.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_kgt" value="<?php echo $id_kgt; ?>"> 

                  <div class="row">
                  <div class="col-md-6">
                 
                  <div class="form-group">
                  <input type="text" name="pengirim" id="pengirim" class="form-control" placeholder="Masukkan Nama Anda ..." required>
                  </div>

                  </div>
                  <div class="col-md-6">

                  <div class="form-group">
                  <textarea class="form-control" name="isi_komentar" id="isi_komentar" rows="3" placeholder="Masukkan Komentar Anda ..." required></textarea>
                  </div>

                  <button type="submit"  name="simpan" class="btn card-button">Komentar</button>

                  </div>
                  </div>

                </form>

                <div class='container post4'>
                </div>

                <?php
                echo"</div>";
              echo"</div>";
            echo"</div>";
          echo"</div>";

          echo"</div>";

          }
    
          echo "<div class='container post3'>";
           echo"</div>";
        ?>
      
      <!--Footer-->
      <?PHP 
          include_once ('../layout/footer.php') ;
      ?>

      <!--query hapus komentar-->
      <script language="JavaScript" type="text/javascript">
            function hapusData(id){
              if (confirm("Apakah anda yakin akan menghapus komentar ini?")){
                window.location.href = '../../admin/komentar/komentar_hapus.php?id=' + id;
              }
            }
      </script>

  </body>
</html>