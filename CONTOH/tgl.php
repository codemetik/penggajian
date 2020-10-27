<?php include "../koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>contoh</title>
</head>
<body>
<div class="">
	<label>tgl a</label>
	<input type="date" name="tgla" id="tgla">
</div>
<div>
	<label>tgl b</label>
	<input type="date" name="tglb" id="tglb">
</div>
<br>
<div>
	<label>Angka 1</label>
	<input type="text" name="angka1" id="angka1">
</div>
<br>
<div>
	<label>Angka 2</label>
	<input type="text" name="angka2" id="angka2">
</div>
<br>
<div>
	<label>Selisih</label>
	<input type="text" name="selisih" id="selisih">
</div>
<br>
<input type="button" name="klik" id="klik" onclick="klik()" value="submit">
<script type="text/javascript">
	function klik() {
		var tglaa = document.getElementById('tgla').value;
		var tglbb = document.getElementById('tglb').value;
		<?php 
		$dataa = "tglaa"; 
		$datab = "tglbb"; ?> 

		document.getElementById('angka1').value = <?= $dataa; ?>;
		document.getElementById('angka2').value = <?= $datab; ?>;

		var abe = document.getElementById('angka1').value;
		var bece = document.getElementById('angka2').value;
		<?php
		$t1 = "abe";
		$t2 = "bece";

		$tgl1 = new DateTime($t1);
		$tgl2 = new DateTime($t2);
		$d = $tgl2->diff($tgl1)->days + 1;

		?>
		document.getElementById('selisih').value = <?= $d; ?>
	}
</script>
</body>
</html>