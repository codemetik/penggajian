<?php 
$sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user ='".$_SESSION['id_user']."'");
$data = mysqli_fetch_array($sql);
?>
<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Profil</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->


<div class="card">
	<div class="card-header bg-dark">
		<h5>Data Profil</h5>
	</div>
	<div class="card-body">
		<form action="" method="POST">
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label>ID User</label>
					<input type="text" name="id_user" class="form-control" value="<?= $data['id_user']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>NIP</label>
					<input type="text" name="nip" class="form-control" value="<?= $data['nip']; ?>">
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
					<label>Confirmasi Password</label>
					<input type="password" name="confirm_password" class="form-control" value="<?= $data['confirm_password']; ?>">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama_user" class="form-control" value="<?= $data['nama_user']; ?>" >
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" name="tempat_lahir" class="form-control" value="<?= $data['tempat_lahir']; ?>">
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="text" name="tanggal_lahir" class="form-control" value="<?= $data['tanggal_lahir']; ?>">
				</div>
				<div class="form-group">
					<label>Jenis kelamin</label>
					<select class="form-control" name="jenis_kelamin">
						<?php 
						$jk = mysqli_query($koneksi, "SELECT * FROM tb_jenis_kelamin");
						while ($dk = mysqli_fetch_array($jk)) { 
							if ($data['jenis_kelamin'] == $dk['jenis_kelamin']) {
								$select = "selected";
							}else{
								$select = "";
							}
							echo "<option value='jenis_kelamin' ".$select.">".$dk['jenis_kelamin']."</option>";
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" name="alamat"><?= $data['alamat']; ?></textarea>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label>Agama</label>
					<input type="text" name="agama" class="form-control" value="<?= $data['agama']; ?>">
				</div>
				<div class="form-group">
					<label>No Telp</label>
					<input type="text" name="no_telp" class="form-control" value="<?= $data['no_telp']; ?>">
				</div>
				<div class="form-group">
					<label>No Rekening</label>
					<input type="text" name="no_rekening" class="form-control" value="<?= $data['no_rekening']; ?>">
				</div>
				<div class="form-group">
					<label>nama Bank</label>
					<input type="text" name="nama_bank" class="form-control" value="<?= $data['nama_bank']; ?>">
				</div>
				<div class="form-group">
					<label>Nama Pemilik Bank</label>
					<input type="text" name="nama_pemilik_rekening" class="form-control" value="<?= $data['nama_pemilik_rekening']; ?>">
				</div>
			</div>
			<div class="col-sm-3">
				<button type="submit" class="form-control bg-dark" name="simpan"><i class="fa fa-save"></i> Simpan Perubahan</button>
				<a href="mydirektur.php?pages_direct=home" class="btn bg-dark">Cencel</a>
			</div>
		</div>
		</form>	
	</div>
</div>
<?php
if (isset($_POST['simpan'])) {
	$id_user = $_POST['id_user'];
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

	$sql = mysqli_query($koneksi, "UPDATE tb_user SET username = '".$username."', password = '".$password."', confirm_password = '".$confirm_password."', nama_user = '".$nama_user."', tempat_lahir = '".$tempat_lahir."', tanggal_lahir = '".$tanggal_lahir."', jenis_kelamin = '".$jenis_kelamin."', alamat = '".$alamat."', agama = '".$agama."', no_telp = '".$no_telp."', no_rekening = '".$no_rekening."', nama_bank = '".$nama_bank."', nama_pemilik_rekening = '".$nama_pemilik_rekening."' WHERE id_user = '".$id_user."'");
	if ($sql) {
		echo "<script>
		alert('Data User berhasil diupdate');
		document.location.href = 'mydirektur.php?pages_direct=profile';
		</script>";
	}else{
		echo "<script>
		alert('Data User gagal diupdate');
		document.location.href = 'mydirektur.php?pages_direct=profile';
		</script>";
	}
}
?>