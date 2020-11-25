<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_olah_absen'])) {
	$tgl_ab_awal = $_POST['tgl_ab_awal'];
	$tgl_ab_akhir = $_POST['tgl_ab_akhir'];
	$id_user = $_POST['id_user'];
	// $hadir = $_POST['hadir'];
	$sakit = $_POST['sakit'];
	$ijin = $_POST['ijin'];
	$lembur = $_POST['lembur'];

	$sqlhadir = mysqli_query($koneksi, "SELECT TIMESTAMPDIFF(DAY, '$tgl_ab_awal', '$tgl_ab_akhir') AS hadir");
	$dhadir = mysqli_fetch_array($sqlhadir);

	$tothadir = $dhadir['hadir'] - ($sakit + $ijin);

	$sqlolah = mysqli_query($koneksi, "INSERT INTO tb_olah_absen(id_user, hadir, sakit, ijin, lembur, tgl_ab_awal, tgl_ab_akhir) VALUES('$id_user', '$tothadir', '$sakit', '$ijin', '$lembur', '$tgl_ab_awal', '$tgl_ab_akhir')");

	if ($sqlolah) {
		header('location:../../index.php?page=input_absen');
	}else{
		header('location:../../index.php?page=input_absen');
	}
}
?>