 	<?php

		include "../../config/koneksi.php";


		$user = $_POST['pengirim'];

		if ($user == 12345) {
			$pengirim = "Admin";
		} else if (strtolower($user) == "admin") {
			$pengirim = "Anonymous";
		} else if ($user != 12345 && 54321 && strtolower($user)) {
			$pengirim = $user;
		}


		$isi_komentar = $_POST['isi_komentar'];
		$id_kegiatan = $_POST['id_kgt'];

		$dataValid = "YA";

		if (strlen(trim($pengirim)) == 0) {
			echo "<center>Nama pengirim harus diisi!</center>";
			$dataValid = "TIDAK";
		}
		if (strlen(trim($isi_komentar)) == 0) {
			echo "<center>Isi Komentar harus diisi!</center>";
			$dataValid = "TIDAK";
		}
		if ($dataValid == "TIDAK") {
			header("Location: ../../user/kegiatan/info_kegiatan.php");
		} else {

			$sql = "INSERT INTO komentar(nama_pengirim, isi_komentar, id_kgt)
				VALUES ('$pengirim','$isi_komentar','$id_kegiatan')";
		}

		$hasil = mysqli_query($kon, $sql);


		if (!$hasil) {
			echo "<center>Gagal simpan, silakan diulangi!<br/></center>";
			echo mysqli_error($kon);
			echo "<center><br/><input type='button' value='Kembali' onClick='self.history.back()'/></center>";
		} else {
			//echo "<center>DATA BERHASIL DI SIMPAN</center>";
			header("Location: ../../user/kegiatan/info_kegiatan.php");
		}
		?>


