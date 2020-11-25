<?php 
include "../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_user = $_POST['id_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$nama_user = $_POST['nama_user'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$alamat = $_POST['alamat'];
	$agama = $_POST['agama'];
	$no_telp = $_POST['no_telp'];
	$no_rekening = $_POST['no_rekening'];
	$nama_bank = $_POST['nama_bank'];
	$nama_pemilik_rekening = $_POST['nama_pemilik_rekening'];

	$sql = mysqli_query($koneksi, "UPDATE tb_user SET username = '".$username."', password = '".$password."', confirm_password = '".$confirm_password."', nama_user = '".$nama_user."', tempat_lahir = '".$tempat_lahir."', tanggal_lahir = '".$tanggal_lahir."', jenis_kelamin = '".$jenis_kelamin."', alamat = '".$alamat."', agama = '".$agama."', no_telp = '".$no_telp."', no_rekening = '".$no_rekening."', nama_bank = '".$nama_bank."', nama_pemilik_rekening = '".$nama_pemilik_rekening."' WHERE id_user = '".$id_user."'");
	if ($sql) {
		echo "<script>
		alert('Data User berhasil diupdate');
		document.location.href = '../../myslip.php?pages_slip=mydata'
		</script>";
	}else{
		echo "<script>
		alert('Data User gagal diupdate');
		document.location.href = '../../myslip.php?pages_slip=mydata'
		</script>";
	}
}
?>