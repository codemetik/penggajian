<?php 
$sql = mysqli_query($koneksi, "SELECT * FROM tb_tunjangan WHERE id_tunjangan = '".$_GET['id']."'");
$data = mysqli_fetch_array($sql);
?>
<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Data Asset</a></li>
      <li class="breadcrumb-item">Data Tunjangan</li>
      <li class="breadcrumb-item active">Update Tunjangan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-dark">
				<h3 class="card-title">Update Data Tunjangan</h3>
			</div>
			<div class="card-body">
			<form action="" method="POST">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>ID Tunjangan</label>
							<input type="text" name="id_tunjangan" class="form-control" value="<?= $data['id_tunjangan']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama Tunjangan</label>
							<input type="text" name="nama_tunjangan" class="form-control" value="<?= $data['nama_tunjangan']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nominal Tunjangan</label>
							<input type="text" name="nominal_tunjangan" class="form-control" value="<?= $data['nominal_tunjangan']; ?>">
						</div>			
					</div>
					<div class="col-sm-12">
						<button class="btn bg-dark" type="submit" name="simpan"><i class="fa fa-save"></i> Simpan Perubahan</button>
						<a href="?page=tunjangan" class="btn bg-dark">Cencel</a>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

<?php 
if (isset($_POST['simpan'])) {
	$id_tunjangan = $_POST['id_tunjangan'];
	$nominal_tunjangan = $_POST['nominal_tunjangan'];

	$sqlup = mysqli_query($koneksi, "UPDATE tb_tunjangan SET nominal_tunjangan = '".$nominal_tunjangan."' WHERE id_tunjangan = '".$id_tunjangan."'");
	if ($sqlup) {
		echo "<script>
		alert('Data Berhasil diupdate');
		document.location.href = 'index.php?page=tunjangan';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal diupdate');
		document.location.href = 'index.php?page=update_tunjangan';
		</script>";
	}
}
?>