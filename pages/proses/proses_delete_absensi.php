<?php 
include "../../koneksi.php";

$sql = mysqli_query($koneksi, "DELETE FROM tb_absensi WHERE id_absensi = '".$_GET['idabsen']."'");
if ($sql) {
	echo "<script>
	alert('Data absensi berhasil dihapus');
	document.location.href = '../../index.php?page=absensi_karyawan';
	</script>";
}else{
	echo "<script>
	alert('Data absensi gagal dihapus');
	document.location.href = '../../index.php?page=absensi_karyawan';
	</script>";
}
?>