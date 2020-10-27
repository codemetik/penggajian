<?php 
include "../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_user = $_POST['id_user'];
	$nip = $_POST['nip'];
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
	$id_jabatan = $_POST['id_jabatan'];
	$tgl_masuk_user = $_POST['tgl_masuk_user'];

	$roluser = mysqli_query($koneksi, "SELECT max(id_rols_user) AS maxCode FROM tb_rols_user");
	$idrol = mysqli_fetch_array($roluser);
	$idr = $idrol['maxCode'];
	$nOr = (int) substr($idr, 4, 7);
	$nOr++; 
	$idro = "ROLS";
	$id_rols_user = $idro . sprintf("%07s", $nOr);

	$sql = mysqli_query($koneksi, "INSERT INTO tb_user(id_user, nip, username, password, confirm_password, nama_user, tempat_lahir, tanggal_lahir,jenis_kelamin, alamat, agama, no_telp, no_rekening, nama_bank, nama_pemilik_rekening) VALUES('$id_user', '$nip', '$username', '$password', '$confirm_password', '$nama_user', '$tempat_lahir', '$tanggal_lahir','$jenis_kelamin', '$alamat', '$agama', '$no_telp', '$no_rekening', '$nama_bank', '$nama_pemilik_rekening')");

	$rol = mysqli_query($koneksi, "INSERT INTO tb_rols_user(id_rols_user, id_user, id_jabatan, tgl_masuk_user) VALUES('$id_rols_user', '$id_user', '$id_jabatan', '$tgl_masuk_user')");

	if ($sql && $rol) {
		echo "<script>
		alert('Data User berhasil disimpan');
		document.location.href = '../../index.php?page=data_karyawan'
		</script>";
	}else{
		echo "<script>
		alert('Data User gagal disimpan');
		document.location.href = '../../index.php?page=data_karyawan'
		</script>";
	}
}
?>