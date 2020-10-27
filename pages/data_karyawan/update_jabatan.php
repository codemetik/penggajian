<?php 

$sql = mysqli_query($koneksi, "SELECT * FROM tb_jabatan X INNER JOIN tb_gaji Y ON y.id_jabatan = x.id_jabatan WHERE x.id_jabatan = '".$_GET['id']."'");
$data = mysqli_fetch_array($sql);
?>
<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Data Asset</a></li>
      <li class="breadcrumb-item"><a href="?page=jabatan">Jabatan</a></li>
      <li class="breadcrumb-item active">Update Jabatan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-blue">
				<h3 class="card-title">Data Karyawan</h3>
			</div>
			<div class="card-body">
			<form action="" method="POST">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>ID Jabatan</label>
							<input type="text" name="id_jabatan" class="form-control" value="<?= $data['id_jabatan']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama Jabatan</label>
							<input type="text" name="nama_jabatan" class="form-control" value="<?= $data['nama_jabatan']; ?>">
						</div>
						<div class="form-group">
							<label>Gaji Pokok</label>
							<input type="text" name="gaji_pokok" class="form-control" value="<?= $data['gaji_pokok']; ?>">
						</div>			
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>ID Gaji</label>
							<input type="text" name="id_gaji" class="form-control" value="<?= $data['id_gaji']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Uang Makan</label>
							<input type="text" name="uang_makan" class="form-control" value="<?= $data['uang_makan']; ?>">
						</div>
						<div class="form-group">
							<label>Uang Transport</label>
							<input type="text" name="uang_transport" class="form-control" value="<?= $data['uang_transport']; ?>">
						</div>
					</div>
					<div class="col-sm-12">
						<button class="btn bg-blue" type="submit" name="simpan"><i class="fa fa-save"></i> Simpan Perubahan</button>
						<a href="?page=jabatan" class="btn bg-blue">Cencel</a>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

<?php 

if (isset($_POST['simpan'])) {
	$id_jabatan = $_POST['id_jabatan'];
	$id_gaji = $_POST['id_gaji'];
	$nama_jabatan = $_POST['nama_jabatan'];
	$gaji_pokok = $_POST['gaji_pokok'];
	$uang_makan = $_POST['uang_makan'];
	$uang_transport = $_POST['uang_transport'];

	$sql1 = mysqli_query($koneksi, "UPDATE tb_jabaran SET nama_jabatan WHERE id_jabatan = '".$id_jabatan."'");
	$sql2 = mysqli_query($koneksi, "UPDATE tb_gaji SET gaji_pokok = '".$gaji_pokok."', uang_makan = '".$uang_makan."', uang_transport = '".$uang_transport."' WHERE id_gaji = '".$id_gaji."'");

	if ($sql1 && $sql2) {
		echo "<script>
		alert('Data Jabatan berhasil diupdate');
		document.location.href = 'index.php?page=jabatan'
		</script>";
	}else{
		echo "<script>
		alert('Data Jabatan berhasil diupdate');
		document.location.href = 'index.php?page=jabatan'
		</script>";
	}
}
?>