<?php 
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Menghitung selisih tanggal</h1>
	<hr>
<form action="" method="POST">
	<label>Tanggal Awal</label>
	<input type="date" name="tga">
	<br>
	<label>Tanggal Akhir</label>
	<input type="date" name="tgb">
	<br><input type="submit" name="simpan">
</form>
<?php 
if (isset($_POST['simpan'])) {
	$tga = date($_POST['tga']);
	$tgb = date($_POST['tgb']);

	$sql = mysqli_query($koneksi, "SELECT TIMESTAMPDIFF(DAY, '$tga', '$tgb') + 1 AS hasil");
	$data = mysqli_fetch_array($sql);

	echo $data['hasil'];
}
?>
</body>
</html>