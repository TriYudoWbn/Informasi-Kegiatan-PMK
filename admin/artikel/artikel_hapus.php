  <?php
  session_start();

  if (!isset($_SESSION["username"])) {
    header("Location: ../auth/login.php");
    exit;
  }

  // defenisikan koneksi
  include "../../config/koneksi.php";
  // cek apakah ada parameter ID dikirim
  if (isset($_GET['id_artkl'])) {
    // jika ada, ambil nilai id
    $id_artkl    = $_GET['id_artkl'];
    // query SQL menghapus data berdasarkan id yg dipilih
    $sql    = "DELETE from artikel WHERE id_artkl ='" . $id_artkl . "'";
    // hapus data pada database
    $query  = mysqli_query($kon, $sql);

    header("Location: tampil_data_artikel.php");
    exit();
  }
  ?>