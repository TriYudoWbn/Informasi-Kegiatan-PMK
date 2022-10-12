<!DOCTYPE html>
<html lang="en">

<head>

  <?PHP
  include_once('../layout/library.php');
  ?>

</head>

<body>

  <!-- NAVBAR-->
  <?PHP
  include_once('../layout/header.php');
  ?>

  <!--Tampilan Konten-->
  <?php
  include "../../config/koneksi.php";
  $sql = "select * from artikel ORDER BY created_at DESC";
  $hasil = mysqli_query($kon, $sql);

  echo "<div class='container post2'>";
  echo "</div>";

  while ($data = mysqli_fetch_assoc($hasil)) {
    $judul = $data['judul'];
    $foto = $data['gambar'];
    $isi_artikel = $data['isi_artikel'];
    $tgl_artikel = $data['tgl_artikel'];
    $colapse = $data['colapse'];

    echo "<div class='container post5'>";
    echo "<div class='card' style='background-color:#f2f2f2;'>";
    echo "<div class='card-header text-center'><h4>$judul</h4></div>";

    echo "<div class='card-body'>";
    echo "<blockquote class='blockquote mb-0'>";
    echo "<div class='text-center'><img src='../../admin/artikel/thumb/t_$foto' width='100px' height='100px'/></div>";

    echo "<p>";
    echo "<center><button type='button' class='btn card-button' data-toggle='collapse' data-target='#$colapse'>Lihat Artikel</button></center>";
    echo "</p>";
    echo "<div class='col'>";
    echo "<div class='collapse multi-collapse' id='$colapse'>";
    echo "<div class='card card-body'>";
    echo "<p>$isi_artikel</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo "<footer class='blockquote-footer' style='font-size: 14px;'>$tgl_artikel</footer>";
    echo "</blockquote>";
    echo "</div>";
    echo "</div>";

    echo "<div class='container post6'>";
    echo "</div>";
  }
  echo "<div class='container post3'>";
  echo "</div>";
  ?>

  <!--Footer-->
  <?PHP
  include_once('../layout/footer.php');
  ?>

</body>

</html>