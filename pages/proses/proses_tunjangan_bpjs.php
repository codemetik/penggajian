<?php 

include "../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_user = $_POST['id_user'];
	$tgl_input = $_POST['tgl_input'];
	$id_tunjangan = "TUNJ002";

	$sql = mysqli_query($koneksi, "INSERT INTO tb_tunjangan_user(id_tunjangan, id_user, tgl_input) VALUES('$id_tunjangan', '$id_user','$tgl_input')");
	if ($sql) {
		echo "<script>
		alert('Data perubahan Pinjaman Berhasil disimpan');
		document.location.href = '../../index.php?page=tunjangan_bpjs';
		</script>";
	}else{
		echo "<script>
		alert('Data perubahan Pinjaman Berhasil disimpan');
		document.location.href = '../../index.php?page=tunjangan_bpjs';
		</script>";
	}

}
?>