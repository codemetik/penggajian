<?php 
include "../../koneksi.php";

$sql = mysqli_query($koneksi, "DELETE FROM tb_pinjaman WHERE id_pinjaman = '".$_GET['id']."'");

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
?>