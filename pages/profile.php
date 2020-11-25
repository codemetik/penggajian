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
		<form action="pages/proses/proses_simpan_profile.php" method="POST">
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
				<a href="index.php" class="btn bg-dark">Cencel</a>
			</div>
		</div>
		</form>	
	</div>
</div>