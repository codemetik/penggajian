<?php 
include "../../koneksi.php";
$sql = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_user = '".$_GET['id']."'");

if ($sql) {
	echo "<script>
	alert('Data User berhasil didelete');
	document.location.href = '../../index.php?page=data_karyawan'
	</script>";
}else{
	echo "<script>
	alert('Data User gagal didelete');
	document.location.href = '../../index.php?page=data_karyawan'
	</script>";
}
?>