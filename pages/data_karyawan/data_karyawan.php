<?php 
date_default_timezone_set('Asia/Jakarta'); 
$tgl_skrng = date("Y-m-d h:i:s");

$usersql = mysqli_query($koneksi, "SELECT max(id_user) AS maxCode FROM tb_user");
$iduser = mysqli_fetch_array($usersql);
$id = $iduser['maxCode'];
$nO = (int) substr($id, 4, 7);
$nO++; 
$idus = "USER";
$id_user = $idus . sprintf("%07s", $nO);

$usernip = mysqli_query($koneksi, "SELECT max(nip) AS maxCode FROM tb_user");
$idnip = mysqli_fetch_array($usernip);
$id = $idnip['maxCode'];
$nOn = (int) substr($id, 8, 4);
$nOn++; 
$idn = date("Ymd");
$nip = $idn . sprintf("%04s", $nOn);

?>
<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Data Karyawan</a></li>
      <li class="breadcrumb-item active">Data Karyawan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-3">
		<a href="" class="btn bg-dark mb-2" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-plus"></i> Add User</a>
	</div>
	<div class="col-3">
	<?php 
		if (isset($_POST['tampil'])) {
			$search = $_POST['search'];
			$sqli = mysqli_query($koneksi, "SELECT COUNT(*) AS isi FROM tb_rols_user X INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan WHERE x.id_jabatan = '".$search."' OR nama_user LIKE '%".$search."%'");
			$cekli = mysqli_fetch_array($sqli);
			?>
	<a href="" class="btn bg-danger"><?= $cekli['isi']; ?></a>
		<?php }else{ 
			$sqli = mysqli_query($koneksi, "SELECT COUNT(*) AS isi FROM tb_rols_user X INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan");
			$cekli = mysqli_fetch_array($sqli);
			?>
	<a href="" class="btn bg-danger"><?= $cekli['isi']; ?></a>
		<?php }
	?>
	</div>
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-dark">
        <h3 class="card-title">Data Karyawan</h3>

        <div class="card-tools">
        <form action="" method="POST">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="search" class="form-control float-right" placeholder="Search name">

            <div class="input-group-append">
              <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
      </form>
        </div>

        <div class="card-tools mr-2">
        <form action="" method="POST">
          <div class="input-group input-group-sm" style="width: 250px;">
            <select type="text" name="search" class="form-control float-right">
            	<option>--Search jabatan--</option>
            	<?php 
				$jbtn = mysqli_query($koneksi, "SELECT * FROM tb_jabatan");
				while ($djb = mysqli_fetch_array($jbtn)) {
					echo "<option value='".$djb['id_jabatan']."'>".$djb['nama_jabatan']."</option>";
				}
				?>
            </select>
			<div class="input-group-append">
              <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
      </form>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 450px;">
        <table class="table table-head-fixed text-nowrap font-10">
          <thead>
            <tr>
              <th>ID User</th>
              <th>Nip</th>
              <th>Nama User</th>
              <th>Jenis Kelamin</th>
              <th>Jabatan</th>
              <th>TGL Masuk Jabatan</th>
              <th>Masa Kerja</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if (isset($_POST['tampil'])) {
            	$search = $_POST['search'];
            	$sql = mysqli_query($koneksi, "SELECT x.id_user, nip, nama_user, jenis_kelamin, nama_jabatan, tgl_masuk_user, TIMESTAMPDIFF(MONTH, tgl_masuk_user,NOW()) AS masa_kerja FROM tb_rols_user X INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan WHERE x.id_jabatan LIKE '%".$search."%' OR nama_user LIKE '%".$search."%' GROUP BY id_rols_user ASC");
            }else{
            	$sql = mysqli_query($koneksi, "SELECT x.id_user, nip, nama_user, jenis_kelamin, nama_jabatan, tgl_masuk_user, TIMESTAMPDIFF(MONTH, tgl_masuk_user,NOW()) AS masa_kerja FROM tb_rols_user X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan GROUP BY id_rols_user ASC");
            }

            while ($data = mysqli_fetch_array($sql)) { ?>
            	<tr>
            		<td><?= $data['id_user']; ?></td>
            		<td><?= $data['nip']; ?></td>
            		<td><?= $data['nama_user']; ?></td>
            		<td><?= $data['jenis_kelamin']; ?></td>
            		<td><?= $data['nama_jabatan']; ?></td>
            		<td><?= $data['tgl_masuk_user']; ?></td>
            		<td><?= $data['masa_kerja']." , bln"; ?></td>
            		<td>
            			<a href="?page=update_karyawan&id=<?= $data['id_user']; ?>" class="btn bg-dark"><i class="fa fa-edit"></i></a> || <a href="pages/proses/proses_delete_user.php?id=<?= $data['id_user']; ?>" class="btn bg-orange" onclick="confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-alt"></i></a>
            		</td>
            	</tr>
            <?php }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<!-- /.row -->

<div class="modal fade" id="modal-xl">
<div class="modal-dialog modal-xl">
<form action="pages/proses/proses_input_user.php" method="POST">
  <div class="modal-content">
    <div class="modal-header bg-dark">
      <h4 class="modal-title">Input Data User Baru</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label>Jabatan User</label>
					<select class="form-control" name="id_jabatan" required>
						<option>--Pilih--</option>
						<?php 
						$jbtn = mysqli_query($koneksi, "SELECT * FROM tb_jabatan");
						while ($djb = mysqli_fetch_array($jbtn)) {
							echo "<option value='".$djb['id_jabatan']."'>".$djb['nama_jabatan']."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>NIP</label>
					<input type="text" name="nip" class="form-control" value="<?= $nip; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" id="username" onkeyup="tulis();" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" id="password" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>Nama User</label>
					<input type="text" name="nama_user" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" name="tempat_lahir" class="form-control">
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" name="tanggal_lahir" class="form-control">
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select class="form-control" name="jenis_kelamin">
						<?php 
						$sqljk = mysqli_query($koneksi, "SELECT * FROM tb_jenis_kelamin");
						while ($jk = mysqli_fetch_array($sqljk)) {
							echo "<option value='".$jk['jenis_kelamin']."'>".$jk['jenis_kelamin']."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea name="alamat" class="form-control"></textarea>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>Agama</label>
					<input type="text" name="agama" class="form-control">
				</div>
				<div class="form-group">
					<label>No Telpn</label>
					<input type="text" name="no_telp" class="form-control">
				</div>
				<div class="form-group">
					<label>No Rekening</label>
					<input type="text" name="no_rekening" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Bank</label>
					<input type="text" name="nama_bank" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Nama Pemilik Rekening</label>
					<input type="text" name="nama_pemilik_rekening" class="form-control" required>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>ID User</label>
					<input type="text" name="id_user" class="form-control" value="<?= $id_user; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Tgl Masuk User</label>
					<input type="date" name="tgl_masuk_user" class="form-control" required>
				</div>
			</div>
		</div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" name="simpan" class="btn bg-dark"><i class="fa fa-save"></i> Save</button>
    </div>
  </div>
  <!-- /.modal-content -->
</form>
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
	function tulis() {
		var user = document.getElementById('username').value;
		document.getElementById('password').value = user;
		document.getElementById('confirm_password').value = user;
	}
</script>