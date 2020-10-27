<?php 
include "../../koneksi.php";

$sql = mysqli_query($koneksi, "DELETE FROM tb_pengembalian_pinjaman WHERE id_pengembalian = '".$_GET['id']."'");

if ($sql) {
	echo "<script>
	alert('Data Pengembalian Berhasil dihapus');
	document.location.href = '../../index.php?page=pengembalian_pinjaman';
	</script>";
}else{
	echo "<script>
	alert('Data Pengembalian Berhasil dihapus');
	document.location.href = '../../index.php?page=pengembalian_pinjaman';
	</script>";
}
?>