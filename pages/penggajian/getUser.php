<?php
include '../../koneksi.php';
$id_jabatan = $_POST['id_jabatan'];

echo "<option value=''>-- Pilih User -- </option>";

$query = mysqli_query($koneksi, "SELECT * FROM tb_rols_user X INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan WHERE x.id_jabatan = '".$id_jabatan."' GROUP BY id_rols_user ASC");
while ($row = mysqli_fetch_array($query)) {
	$sqlcek = mysqli_query($koneksi, "SELECT * FROM tb_olah_absen WHERE id_user = '".$row['id_user']."'");
	$cek = mysqli_num_rows($sqlcek);
	$ce = mysqli_fetch_array($sqlcek);
	$cekabsen = mysqli_query($koneksi, "SELECT * FROM tb_absensi WHERE id_user = '".$row['id_user']."' AND YEAR(tgl_ab_akhir) LIKE YEAR(NOW()) AND MONTH(tgl_ab_akhir) LIKE MONTH(NOW())");
	$ab = mysqli_num_rows($cekabsen);

	if ($ab > 0) {
		echo "";
	}else{
		if ($cek > 0) {
			echo "";
		}else{
			echo "<option value='" . $row['id_user'] . "'>" . $row['nama_user'] . "</option>";
		}
	}
}
?>