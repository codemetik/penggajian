<?php 
include "../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_pengembalian = $_POST['id_pengembalian'];
	$id_user = $_POST['id_user'];
	$jumlah_pengembalian = $_POST['jumlah_pengembalian'];
	$tgl_pengembalian = $_POST['tgl_pengembalian'];
	$keterangan = $_POST['keterangan'];


	$sqlcek = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman WHERE id_user = '".$id_user."'");
	$cek = mysqli_num_rows($sqlcek);
	$dcek = mysqli_fetch_array($sqlcek);

	if ($cek > 0 ) {
		if ($jumlah_pengembalian > $dcek['jumlah_pinjaman']) {
			echo "<script>
			alert('Maaf Uang anda kelebihan');
			document.location.href = '../../index.php?page=pengembalian_pinjaman';
			</script>";
		}else{
			$sql = mysqli_query($koneksi, "INSERT INTO tb_pengembalian_pinjaman(id_pengembalian, id_pinjaman, id_user, jumlah_pinjaman, jumlah_pengembalian, tgl_pengembalian, keterangan) VALUES('$id_pengembalian', '".$dcek['id_pinjaman']."','$id_user', '".$dcek['jumlah_pinjaman']."', '$jumlah_pengembalian', '$tgl_pengembalian', '$keterangan')");

		if ($sql) {
			echo "<script>
			alert('Data Pengembalian Berhasil disimpan');
			document.location.href = '../../index.php?page=pengembalian_pinjaman';
			</script>";
		}else{
			echo "<script>
			alert('Data Pengembalian Berhasil disimpan');
			document.location.href = '../../index.php?page=pengembalian_pinjaman';
			</script>";
		}
		}

	}else{
		echo "<script>
		alert('Maaf User yg anda maksud tidak ada');
		document.location.href = '../../index.php?page=pengembalian_pinjaman';
		</script>";
	}

}
?>