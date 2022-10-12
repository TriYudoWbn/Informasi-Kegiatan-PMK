 <?php
  session_start();

  if (!isset($_SESSION["username"])) {
    header("Location: ../auth/login.php");
    exit;
  }
  ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>

   <?php
    include_once('../layout/library.php');
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
    include_once('../layout/header.php');
    ?>

   <!-- script random string untuk colapse -->
   <?php
    $n = 10;
    function getName($n)
    {
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

     <h5 class="text-center">Input Data Artikel</h5>
     <br>
     <form action="artikel_simpan.php" method="post" enctype="multipart/form-data">
       <input type="hidden" name="colapse" value="<?php echo getName($n); ?>">

       <div class="row">
         <div class="col-md-6">

           <div class="form-group">
             <label for="judul">Judul Artikel</label>
             <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan Judul Artikel ..." required>
           </div>

         </div>
         <div class="col-md-6">

           <div class="form-group">
             <fieldset>
               <label for="tanggal">Tanggal Terbit</label><br>
               <input type="date" name="tgl_artikel" class="form-control" required>
             </fieldset>
           </div>

         </div>
       </div>

       <div class="row">
         <div class="col-md-6">

           <div class="form-group">
             <label for="gambar">Masukkan Gambar [Max: 2Mb]</label>
             <input type="file" name="foto" class="form-control-file" id="gambar">
           </div>

         </div>
         <div class="col-md-6">

           <div class="form-group">
             <input type="hidden" type="text" name="id_admin" value="<?php echo $_SESSION['id_admin'] ?>">

           </div>

         </div>
       </div>

       <div class="form-group">
         <label for="isi">Isi Artikel</label>
         <textarea class="form-control" name="isi_artikel" id="isi" rows="3"></textarea>
       </div>

       <button type="tambah" value="Perbaharui" name="Perbaharui" class="btn card-button btn-sm">Tambah</button>

     </form>
   </div>

   <!--Footer-->
   <?php
    include_once('../layout/footer.php');
    ?>

 </body>

 </html>