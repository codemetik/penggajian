<?php 
include "../../koneksi.php";

$sql = mysqli_query($koneksi, "DELETE FROM tb_olah_absen WHERE id_olah_absen = '".$_GET['idolah']."'");

if ($sql) {
	echo "<script>
	alert('Data berhasil dihapus');
	document.location.href = '../../index.php?page=input_absen';
	</script>";
}else{
	echo "<script>
	alert('Data berhasil dihapus');
	document.location.href = '../../index.php?page=input_absen';
	</script>";
}
?>