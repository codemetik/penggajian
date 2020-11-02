<?php 
include "../../koneksi.php";

$cek = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman WHERE id_pinjaman = '".$_GET['id']."'");
$dcek = mysqli_fetch_array($cek);

if ($dcek['jumlah_pinjaman'] > 0 ) {

	echo "<script>
	alert('Maaf Data Pinjaman masih ada tagihan');
	document.location.href = '../../index.php?page=pinjaman_karyawan';
	</script>";

}else{

	$sql = mysqli_query($koneksi, "DELETE FROM tb_pinjaman WHERE id_pinjaman = '".$dcek['id_pinjaman']."'");

	if ($sql) {
		echo "<script>
		alert('Data Pinjaman berhasil dihapus');
		document.location.href = '../../index.php?page=pinjaman_karyawan';
		</script>";
	}else{
		echo "<script>
		alert('Data Pinjaman berhasil dihapus');
		document.location.href = '../../index.php?page=pinjaman_karyawan';
		</script>";
	}

}

?>