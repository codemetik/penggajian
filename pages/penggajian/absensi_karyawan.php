<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Absensi</a></li>
      <li class="breadcrumb-item active">Absensi Karyawan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-2">
		<a href="?page=input_absen" class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Input Absen</a>
	</div>
	<div class="col-3">
	<?php 
		if (isset($_POST['tampil'])) {
			$search = $_POST['search'];
			$sqli = mysqli_query($koneksi, "SELECT COUNT(*) AS isi FROM tb_absensi X INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE YEAR(tgl_ab_akhir) = YEAR(NOW()) AND MONTH(tgl_ab_akhir) = MONTH(NOW()) AND z.id_jabatan LIKE '%".$search."%' OR nama_user LIKE '%".$search."%' OR MONTH(tgl_ab_akhir) LIKE MONTH('%".$search."%') ");	
			$cekli = mysqli_fetch_array($sqli);
			?>
	<a href="" class="btn bg-danger"><?= $cekli['isi']; ?></a>
		<?php }else{ 
			$sqli = mysqli_query($koneksi, "SELECT COUNT(*) AS isi FROM tb_absensi X INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE YEAR(tgl_ab_akhir) = YEAR(NOW()) AND MONTH(tgl_ab_akhir) = MONTH(NOW())"); 
			$cekli = mysqli_fetch_array($sqli);
			?>
	<a href="" class="btn bg-success">Jumlah Absensi : <?= $cekli['isi']; ?></a>
		<?php }
	?>
	</div>
  <div class="col-3">
    <?php 
    $ywan = mysqli_query($koneksi, "SELECT COUNT(*) as tot FROM tb_user");
    $dywan = mysqli_fetch_array($ywan);
    ?>
    <a href="" class="btn bg-success">Total Karyawan : <?= $dywan['tot']; ?> </a>
  </div>
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-blue">
        <h3 class="card-title">Absensi Karyawan</h3>

        
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
            <select name="search" class="form-control float-right">
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

        <div class="card-tools mr-2">
        <form action="" method="POST">
          <div class="input-group input-group-sm" style="width: 250px;">
            <input type="date" name="search" class="form-control float-right" placeholder="Search Periode">

            <div class="input-group-append">
              <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
        </div>

      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 450px;">
        <table class="table table-head-fixed text-nowrap table-hover">
          <thead>
            <tr>
            	<th>No</th>
              <th>ID Absensi</th>
              <th>ID User</th>
              <th>Nama</th>
              <th>Hadir</th>
              <th>Sakit</th>
              <th>Ijin</th>
              <th>Lembur</th>
              <th>Periode Tgl Absen</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if (isset($_POST['tampil'])) {
            	$search = $_POST['search'];

            	$sql = mysqli_query($koneksi, "SELECT * FROM tb_absensi X INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE YEAR(tgl_ab_akhir) = YEAR(NOW()) AND MONTH(tgl_ab_akhir) = MONTH(NOW()) AND z.id_jabatan LIKE '%".$search."%' OR nama_user LIKE '%".$search."%' OR MONTH(tgl_ab_akhir) LIKE MONTH('".$search."') ");	
            }else{
            	$sql = mysqli_query($koneksi, "SELECT * FROM tb_absensi X INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE YEAR(tgl_ab_akhir) = YEAR(NOW()) AND MONTH(tgl_ab_akhir) = MONTH(NOW())");
            }

            $no= 1;
            while ($data = mysqli_fetch_array($sql)) { ?>
            	<tr>
            		<td><?= $no++; ?></td>
            		<td><?= $data['id_absensi']; ?></td>
            		<td><?= $data['id_user']; ?></td>
            		<td><?= $data['nama_user']; ?></td>
            		<td><?= $data['hadir']; ?></td>
            		<td><?= $data['sakit']; ?></td>
            		<td><?= $data['ijin']; ?></td>
            		<td><?= $data['lembur']; ?></td>
            		<td><?= $data['tgl_ab_awal']." / ".$data['tgl_ab_akhir']; ?></td>
            		<td>
            			<a href="?page=update_absensi&id=<?= $data['id_absensi']; ?>" class="btn bg-blue"><i class="fa fa-edit"></i></a> || <a href="pages/proses/proses_delete_absensi.php?idabsen=<?= $data['id_absensi']; ?>" class="btn bg-red" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fa fa-trash-alt"></i></a>
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