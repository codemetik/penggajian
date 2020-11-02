<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Data Master</a></li>
      <li class="breadcrumb-item active">Data Karyawan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-3">
	<?php 
		if (isset($_POST['tampil'])) {
			$search = $_POST['search'];
			$sqli = mysqli_query($koneksi, "SELECT COUNT(*) AS isi FROM tb_rols_user X INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan WHERE x.id_jabatan = '".$search."' OR nama_user LIKE '%".$search."%'");
			$cekli = mysqli_fetch_array($sqli);
			?>
	<a href="" class="btn bg-danger mb-2">Jumlah Karyawan : <?= $cekli['isi']; ?></a>
		<?php }else{ 
			$sqli = mysqli_query($koneksi, "SELECT COUNT(*) AS isi FROM tb_rols_user X INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan");
			$cekli = mysqli_fetch_array($sqli);
			?>
	<a href="" class="btn bg-danger mb-2">Jumlah Karyawan : <?= $cekli['isi']; ?></a>
		<?php }
	?>
	</div>
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-blue">
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