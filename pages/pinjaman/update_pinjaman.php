<div class="row mt-2">
<?php 

$sql = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman WHERE id_pinjaman = '".$_GET['id']."'");
$data = mysqli_fetch_array($sql);
?>
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Pinjaman</a></li>
      <li class="breadcrumb-item"><a href="?page=pinjaman_karyawan">Pinjaman Karyawan</a></li>
      <li class="breadcrumb-item active">Update Pinjaman</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<div class=card>
			<div class="card-header bg-blue">
				Update Data Pinjaman
			</div>
			<div class="card-body">
			<form action="" method="POST">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>ID Pinjaman</label>
							<input type="text" name="id_pinjaman" class="form-control" value="<?= $data['id_pinjaman']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>ID User</label>
							<input type="text" name="id_user" class="form-control" value="<?= $data['id_user']; ?>" readonly>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Tgl Perubahan</label>
							<?php 
							date_default_timezone_set('Asia/Jakarta'); 
							$tgl_update = date("Y-m-d h:i:s");
							?>
							<input type="text" name="tgl_update" class="form-control" value="<?= $tgl_update; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Jumlah Pinjaman</label>
							<input type="text" name="jumlah_pinjaman" class="form-control" value="<?= $data['jumlah_pinjaman']; ?>">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Keterangan</label>
							<textarea class="form-control" value="<?= $data['keterangan']; ?>" name="keterangan"><?= $data['keterangan']; ?></textarea>
						</div>
					</div>
					<div class="col-sm-12">
						<button type="submit" class="btn bg-blue" name="simpan_pinjaman"><i class="fa fa-save"></i> Simpan Perubahan</button>
						<a href="?page=pinjaman_karyawan" class="btn bg-blue">Cencel</a>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

<?php 

if (isset($_POST['simpan_pinjaman'])) {
	$id_pinjaman = $_POST['id_pinjaman'];
	$id_user = $_POST['id_user'];
	$tgl_pinjaman = $_POST['tgl_update'];
	$jumlah_pinjaman = $_POST['jumlah_pinjaman'];
	$keterangan = $_POST['keterangan'];

	$sqlcek = mysqli_query($koneksi, "SELECT * FROM tb_pengembalian_pinjaman WHERE id_pinjaman = '".$id_pinjaman."'");
	$num = mysqli_num_rows($sqlcek);
	if ($num > 0) {
		echo "<script>
		alert('Maaf Data pinjaman sudah pernah ada pengembalian');
		document.location.href = 'index.php?page=pinjaman_karyawan';
		</script>";
	}else{
		$sqlup = mysqli_query($koneksi, "UPDATE tb_pinjaman SET tgl_update = '".$tgl_update."', jumlah_pinjaman = '".$jumlah_pinjaman."', keterangan = '".$keterangan."' WHERE id_pinjaman = '".$id_pinjaman."'");

		if ($sqlup) {
			echo "<script>
			alert('Data perubahan Pinjaman Berhasil disimpan');
			document.location.href = 'index.php?page=pinjaman_karyawan';
			</script>";
		}else{
			echo "<script>
			alert('Data perubahan Pinjaman Gagal disimpan');
			document.location.href = 'index.php?page=pinjaman_karyawan';
			</script>";
		}
		
	}

}
?>