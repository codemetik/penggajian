<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_pinjaman'])) {
	$id_user = $_POST['id_user'];
	$id_pinjaman = $_POST['id_pinjaman'];
	$tgl_pinjaman = $_POST['tgl_pinjaman'];
	$jumlah_pinjaman = $_POST['jumlah_pinjaman'];
	$keterangan = $_POST['Keterangan'];

	$query = mysqli_query($koneksi, "INSERT INTO tb_pinjaman(id_pinjaman, id_user, jumlah_pinjaman, tgl_pinjaman, Keterangan) VALUES('$id_pinjaman', '$id_user', '$jumlah_pinjaman', '$tgl_pinjaman', '$keterangan')");
	if ($query) {
		echo "<script>
		alert('Data Pinjaman Berhasil disimpan');
		document.location.href = '../../index.php?page=pinjaman_karyawan';
		</script>";
	}else{
		echo "<script>
		alert('Data Pinjaman Gagal disimpan');
		document.location.href = '../../index.php?page=pinjaman_karyawan';
		</script>";
	}
}else{

}
?>