<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_absen'])) {
	$id_user = $_POST['id_user'];
	$hadir = $_POST['hadir'];
	$sakit = $_POST['sakit'];
	$ijin = $_POST['ijin'];
	$lembur = $_POST['lembur'];
	$tgl_ab_awal = $_POST['tgl_ab_awal'];
	$tgl_ab_akhir = $_POST['tgl_ab_akhir'];

	$isi = count($id_user);

	for ($i=0; $i < $isi ; $i++) { 

		$sqlhadir = mysqli_query($koneksi, "SELECT TIMESTAMPDIFF(DAY, '$tgl_ab_awal[$i]', '$tgl_ab_akhir[$i]') AS hadir");
		$dhadir[$i] = mysqli_fetch_array($sqlhadir);

		$tothadir[$i] = $dhadir[$i]['hadir'] - ($sakit[$i] + $ijin[$i]);

		$sql = mysqli_query($koneksi, "INSERT INTO tb_absensi(id_user, hadir, sakit, ijin, lembur, tgl_ab_awal, tgl_ab_akhir) VALUES('$id_user[$i]', '$tothadir[$i]', '$sakit[$i]', '$ijin[$i]', '$lembur[$i]', '$tgl_ab_awal[$i]', '$tgl_ab_akhir[$i]')");

		$delete = mysqli_query($koneksi, "DELETE FROM tb_olah_absen WHERE id_user = '$id_user[$i]'");

		if ($sql && $delete) {
			echo "<script>
			alert('Data Absensi berhasil disimpan');
			document.location.href = '../../index.php?page=absensi_karyawan';
			</script>";
		}else{
			echo "<script>
			alert('Data Absensi gagal disimpan');
			document.location.href = '../../index.php?page=absensi_karyawan';
			</script>";
		}
	}

}
?>