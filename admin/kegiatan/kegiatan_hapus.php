  <?php
  session_start();

  if (!isset($_SESSION["username"])) {
    header("Location: ../auth/login.php");
    exit;
  }
  ?>

  <?php
  // defenisikan koneksi
  include "../../config/koneksi.php";
  // cek apakah ada parameter ID dikirim
  if (isset($_GET['id_kgt'])) {
    // jika ada, ambil nilai id
    $id_kgt    = $_GET['id_kgt'];
    // query SQL menghapus data berdasarkan id yg dipilih
    $sql    = "DELETE from kegiatan WHERE id_kgt ='" . $id_kgt . "'";
    // hapus data pada database
    $query  = mysqli_query($kon, $sql);

    header("Location: tampil_data_kegiatan.php");
  }
  ?>
