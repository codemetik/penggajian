<?php 
$sql = mysqli_query($koneksi, "SELECT * FROM tb_absensi WHERE id_absensi = '".$_GET['id']."'");
$data = mysqli_fetch_array($sql);
?>
<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Absensi</a></li>
      <li class="breadcrumb-item"><a href="?page=absensi_karyawan">Absensi Karyawan</a></li>
      <li class="breadcrumb-item active">Update Absensi Karyawan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-dark">
				<h3 class="card-title">Data Karyawan</h3>
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>ID Absensi</label>
								<input type="text" name="id_absensi" class="form-control" value="<?= $data['id_absensi']; ?>" readonly>
							</div>
							<div class="form-group">
								<label>ID User</label>
								<input type="text" name="id_user" class="form-control" value="<?= $data['id_user']; ?>" readonly>
							</div>	
							<div class="form-group">
								<label>Hadir</label>
								<input type="text" name="hadir" class="form-control" value="<?= $data['hadir']; ?>" readonly>
							</div>
							<div class="form-group">
								<label>Sakit</label>
								<input type="text" name="sakit" class="form-control" value="<?= $data['sakit']; ?>">
							</div>			
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Ijin</label>
								<input type="text" name="ijin" class="form-control" value="<?= $data['ijin']; ?>">
							</div>	
							<div class="form-group">
								<label>Lembur</label>
								<input type="text" name="lembur" class="form-control" value="<?= $data['lembur']; ?>">
							</div>	
							<div class="form-group">
								<label>Tgl Awal</label>
								<input type="date" name="tgl_ab_awal" class="form-control" value="<?= $data['tgl_ab_awal']; ?>">
							</div>	
							<div class="form-group">
								<label>Tgl Akhir</label>
								<input type="date" name="tgl_ab_akhir" class="form-control" value="<?= $data['tgl_ab_akhir']; ?>">
							</div>	
						</div>
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary" name="simpan_absensi"><i class="fa fa-save"></i> Simpan Perubahan</button>
							<a href="?page=absensi_karyawan" class="btn bg-blue">Cencel</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 

if (isset($_POST['simpan_absensi'])) {
	$id_absensi = $_POST['id_absensi'];
	$id_user = $_POST['id_user'];
	$hadir = $_POST['hadir'];
	$sakit = $_POST['sakit'];
	$ijin = $_POST['ijin'];
	$lembur = $_POST['lembur'];
	$tgl_ab_awal = $_POST['tgl_ab_awal'];
	$tgl_ab_akhir = $_POST['tgl_ab_akhir'];

	$sqlhadir = mysqli_query($koneksi, "SELECT TIMESTAMPDIFF(DAY, '$tgl_ab_awal', '$tgl_ab_akhir') + 1 AS hadir");
	$dhadir = mysqli_fetch_array($sqlhadir);

	$tothadir = $dhadir['hadir'] - ($sakit + $ijin);

	$update = mysqli_query($koneksi, "UPDATE tb_absensi SET hadir = '".$tothadir."', sakit = '".$sakit."', ijin = '".$ijin."', lembur = '".$lembur."', tgl_ab_awal = '".$tgl_ab_awal."', tgl_ab_akhir = '".$tgl_ab_akhir."' WHERE id_absensi = '".$id_absensi."'");

	if ($update) {
		echo "<script>
		alert('Data Absensi berhasil diupdate');
		document.location.href = 'index.php?page=absensi_karyawan';
		</script>";
	}else{
		echo "<script>
		alert('Data Absensi gagal diupdate');
		document.location.href = 'index.php?page=absensi_karyawan';
		</script>";
	}
}
?>
