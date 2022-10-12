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

    <!-- Mengatur input textarea dengan tinymce -->
      <script src="https://cdn.tiny.cloud/1/helfgcjo7anx8ox09ycg2i0m1lrtuyfmqrg1hnzxst46bb7d/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      
      <script>
            tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            });
      </script>

      <!-- NAVBAR-->
      <?php
          include_once ('../layout/header.php') ; 
      ?>

      <!-- script random string untuk colapse -->
      <?php 
          $n=10; 
          function getName($n) { 
              $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
              $randomString = ''; 
            
              for ($i = 0; $i < $n; $i++) { 
                  $index = rand(0, strlen($characters) - 1); 
                  $randomString .= $characters[$index]; 
              } 
              return $randomString; 
          } 
      ?> 

      <!-- Form Input -->
      <div class="container jarak1">
      
      <h5 class="text-center">Input Data Kegiatan</h5>
      <br>
      <form action="kegiatan_simpan.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="colapse" value="<?php echo getName($n); ?>">

        <div class="row">
        <div class="col-md-6">      

        <div class="form-group">
          <label for="nama">Nama Kegiatan</label>
          <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Kegiatan ..." required>
        </div>

        </div>
        <div class="col-md-6">

        <div class="form-group">
          <label for="jenis">Jenis Kegiatan</label>
          <select name="jenis" class="form-control" required>
            <option value="">- Pilih -</option>
            <option value="ibadah">Ibadah</option>
            <option value="keakraban">Keakraban</option>
            <option value="Bakti Sosial">Bakti Sosial</option>
          </select>
        </div>

        </div>
        </div>

        <div class="row">
        <div class="col-md-6">

        <div class="form-group">
        <fieldset>
          <label for="tgl">Tanggal Kegiatan</label><br>
          <input type="date" name="tgl_kegiatan" class="form-control" required>
        </fieldset>   
        </div>

        </div>
        <div class="col-md-6">

        <div class="form-group">
        <fieldset>
          <label for="waktu">Waktu Kegiatan</label><br>
          <input type="time" name="waktu" class="form-control" required>
        </fieldset>   
        </div>

        </div>
        </div>

        <div class="row">
        <div class="col-md-6">
       
        <div class="form-group">
          <label for="lattitude">Latitude</label>
          <input type="text" name="latitude" class="form-control" placeholder="Masukkan Lokasi Lattitude Kegiatan ..." required>
        </div>

        </div>
        <div class="col-md-6">

        <div class="form-group">
          <label for="longitude">Longitude</label>
          <input type="text" name="longitude" class="form-control" placeholder="Masukkan Lokasi Longitude Kegiatan ..." required>
        </div>
       
        </div>
        </div>

        <div class="form-group">
          <label for="catatan">Catatan</label>
          <textarea class="form-control" name="catatan" id="catatan" rows="3"></textarea>
        </div>

         <div class="form-group">
          <input type="hidden" type="text" name="id_admin" value="<?php echo $_SESSION['id_admin'] ?>"> 

        </div>

        <button type="submit" name="proses" class="btn card-button btn-sm">Tambah</button>

      </form>
      </div>

    </div>
  </div>

      <!--Footer-->
      <?php
          include_once ('../layout/footer.php') ; 
      ?>

  </body>
</html>