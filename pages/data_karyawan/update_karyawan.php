<?php 

$sql = mysqli_query($koneksi, "SELECT * FROM tb_rols_user X INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan WHERE x.id_user = '".$_GET['id']."' GROUP BY id_rols_user ASC");
$data = mysqli_fetch_array($sql);
?>
<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Data Karyawan</a></li>
      <li class="breadcrumb-item"><a href="?page=data_karyawan">Data Karyawan</a></li>
      <li class="breadcrumb-item active">Update Karyawan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-dark">
				<h3 class="card-title">Update Karyawan</h3>
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label>Jabatan User</label>
								<select class="form-control" name="id_jabatan">
									<option>--Pilih--</option>
									<?php 
									$jbtn = mysqli_query($koneksi, "SELECT * FROM tb_jabatan");
									while ($djb = mysqli_fetch_array($jbtn)) {
										if ($data['id_jabatan'] == $djb['id_jabatan']) {
											$select = "selected";
										}else{
											$select = "";
										}
										echo "<option value='".$djb['id_jabatan']."' ".$select.">".$djb['nama_jabatan']."</option>";
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>NIP</label>
								<input type="text" name="nip" class="form-control" value="<?= $data['nip']; ?>" readonly>
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control" value="<?= $data['username']; ?>">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" value="<?= $data['password']; ?>">
							</div>
							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" name="confirm_password" class="form-control" value="<?= $data['confirm_password']; ?>">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Nama User</label>
								<input type="text" name="nama_user" class="form-control" value="<?= $data['nama_user']; ?>">
							</div>
							<div class="form-group">
								<label>Tempat Lahir</label>
								<input type="text" name="tempat_lahir" class="form-control" value="<?= $data['tempat_lahir']; ?>">
							</div>
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input type="date" name="tanggal_lahir" class="form-control" value="<?= $data['tanggal_lahir']; ?>">
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control" name="jenis_kelamin">
									<?php 
									$sqljk = mysqli_query($koneksi, "SELECT * FROM tb_jenis_kelamin");
									while ($jk = mysqli_fetch_array($sqljk)) {
										if ($data['jenis_kelamin'] == $jk['jenis_kelamin']) {
											$select = "selected";
										}else{
											$select = "";
										}
										echo "<option value='".$jk['jenis_kelamin']."' ".$select.">".$jk['jenis_kelamin']."</option>";
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea name="alamat" class="form-control" value="<?= $data['alamat']; ?>"><?= $data['alamat']; ?></textarea>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Agama</label>
								<input type="text" name="agama" class="form-control" value="<?= $data['agama']; ?>">
							</div>
							<div class="form-group">
								<label>No Telpn</label>
								<input type="text" name="no_telp" class="form-control" value="<?= $data['no_telp']; ?>">
							</div>
							<div class="form-group">
								<label>No Rekening</label>
								<input type="text" name="no_rekening" class="form-control" value="<?= $data['no_rekening']; ?>">
							</div>
							<div class="form-group">
								<label>Bank</label>
								<input type="text" name="nama_bank" class="form-control" value="<?= $data['nama_bank']; ?>">
							</div>
							<div class="form-group">
								<label>Nama Pemilik Rekening</label>
								<input type="text" name="nama_pemilik_rekening" class="form-control" value="<?= $data['nama_pemilik_rekening']; ?>">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>ID User</label>
								<input type="text" name="id_user" class="form-control" value="<?= $data['id_user']; ?>" readonly>
							</div>
							<div class="form-group">
								<label>Tgl Masuk User</label>
								<input type="date" name="tgl_masuk_user" class="form-control" value="<?= $data['tgl_masuk_user']; ?>">
							</div>
							<div class="form-group">
								<button type="submit" name="simpan_perubahan" class="btn bg-dark"><i class="fa fa-save"></i> Simpan Perubahan</button>
							</div>
							<div class="form-group">
								<a href="index.php?page=data_karyawan">Cencel</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 
if (isset($_POST['simpan_perubahan'])) {
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

	$update = mysqli_query($koneksi, "UPDATE tb_user SET username = '".$username."', password = '".$password."', confirm_password = '".$confirm_password."', nama_user = '".$nama_user."', tempat_lahir = '".$tempat_lahir."', tanggal_lahir = '".$tanggal_lahir."', jenis_kelamin = '".$jenis_kelamin."', alamat = '".$alamat."', agama = '".$agama."', no_telp = '".$no_telp."', no_rekening = '".$no_rekening."', nama_bank = '".$nama_bank."', nama_pemilik_rekening = '".$nama_pemilik_rekening."' WHERE id_user = '".$id_user."'");

	$uprol = mysqli_query($koneksi, "UPDATE tb_rols_user SET id_jabatan = '".$id_jabatan."', tgl_masuk_user = '".$tgl_masuk_user."' WHERE id_user = '".$id_user."'");

	if ($update && $uprol) {
		echo "<script>
		alert('Data User berhasil diupdate');
		document.location.href = 'index.php?page=data_karyawan'
		</script>";
	}else{
		echo "<script>
		alert('Data User gagal diupdate');
		document.location.href = 'index.php?page=data_karyawan'
		</script>";
	}
}
?>