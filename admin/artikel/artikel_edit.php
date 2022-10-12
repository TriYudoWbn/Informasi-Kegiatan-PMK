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

  <!-- Mengambil Data Artikel Berdasarkan ID -->
  <?php
  include_once('../layout/header.php');

  $id_artkl = $_GET['id_artkl'];
  include "../../config/koneksi.php";
  $sql = "select * from artikel where id_artkl = '$id_artkl'";
  $hasil = mysqli_query($kon, $sql);
  if (!$hasil) {
    die("gagal query....");
  }

  $data = mysqli_fetch_array($hasil);
  $judul = $data['judul'];
  $isi_artikel = $data['isi_artikel'];
  $tgl_artikel = $data['tgl_artikel'];
  $foto = $data['gambar'];
  $colapse = $data['colapse'];
  $idadmin = $data['id_admin'];
  ?>

  <!-- Form Input -->
  <div class="container jarak1">

    <h5 class="text-center">Edit Data Artikel</h5>
    <br>
    <form action="artikel_simpan.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_artkl" value="<?php echo $id_artkl; ?>">
      <input type="hidden" name="colapse" value="<?php echo $colapse; ?>">

      <div class="row">
        <div class="col-md-6">

          <div class="form-group">
            <label for="judul">Judul Artikel</label>
            <input type="text" name="judul" id="judul" value="<?php echo $judul; ?>" class="form-control" placeholder="Masukkan Judul Artikel ..." required>
          </div>

        </div>
        <div class="col-md-6">

          <div class="form-group">
            <fieldset>
              <label for="tanggal">Tanggal Terbit</label><br>
              <input type="date" name="tgl_artikel" value="<?php echo $tgl_artikel; ?>" class="form-control" required>
            </fieldset>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-md-6">

          <div class="form-group">
            <label for="foto">Masukkan Gambar [Max: 2Mb]</label><br>
            <input type="file" name="foto"><br>
            <input type="hidden" name="foto_lama" value="<?php echo $foto; ?>" /><br />
            <img src="<?php echo "thumb/t_" . $foto; ?>" width="100px" />
          </div>

        </div>
        <div class="col-md-6">

          <div class="form-group">
            <input type="hidden" type="text" name="id_admin" value="<?php echo $_SESSION['id_admin'] ?>">

          </div>

        </div>
      </div>

      <div class="form-group">
        <label for="isi_artikel">Isi Artikel</label>
        <textarea class="form-control" name="isi_artikel" rows="3"> <?php echo $isi_artikel; ?></textarea>
      </div>

      <button type="tambah" value="Perbaharui" name="Perbaharui" class="btn card-button btn-sm">Simpan</button>

    </form>
  </div>

  <!--Footer-->
  <?php
  include_once('../layout/footer.php');
  ?>

</body>

</html>