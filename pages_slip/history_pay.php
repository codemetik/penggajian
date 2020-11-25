<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">History Payroll</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="card">
	<div class="card-header bg-orange">
		<h5 class="card-title">History Payroll <b><?= $_SESSION['nama_user']; ?></b></h5>
		<div class="card-tools">
			<form action="" method="POST">
	          <div class="input-group input-group-sm" style="width: 150px;">
	            <input type="text" name="search" class="form-control float-right" placeholder="Search">

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
	            	<option>-- Pilih Periode --</option>
	            	<?php 
	            	$ssea = mysqli_query($koneksi, "SELECT * FROM tb_penggajian WHERE id_user = '".$_SESSION['id_user']."' GROUP BY tgl_periode_gaji");
	            	while ($dsea = mysqli_fetch_array($ssea)){ ?> 
	            		<option value="<?= $dsea['tgl_periode_gaji']; ?>"><?= $dsea['tgl_periode_gaji']; ?></option>
	            	<?php }
	            	?>
	            </select>

	            <div class="input-group-append">
	              <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
	            </div>
	          </div>
	      </form>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive p-0" style="height: 450px;">
			<table class="table table-hover table-bordered table-head-fixed text-nowrap font-10">
				<thead>
					<tr>
						<th>No</th>
                      <th>NIP</th>
                      <th>Nama User</th>
                      <th>Gaji Pokok</th>
                      <th>Hadir</th>
                      <th>Lembur</th>
                      <th>Jam /Hari</th>
                      <th>Total Jam kerja</th>
                      <th>Upah /Jam</th>
                      <th>Upah Lembur</th>
                      <th>Total Gaji</th>
                      <th>Tgl Periode</th>
                      <th>Tgl Input</th>
                      <th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				if (isset($_POST['tampil'])) {
					$search = $_POST['search'];
					$sql =mysqli_query($koneksi, "SELECT * FROM tb_penggajian X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE x.id_user = '".$_SESSION['id_user']."' AND tgl_periode_gaji = '".$search."'  GROUP BY id_penggajian DESC");
				}else{
					$sql =mysqli_query($koneksi, "SELECT * FROM tb_penggajian X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE x.id_user = '".$_SESSION['id_user']."' GROUP BY id_penggajian DESC");	
				}
				
				$no=1;
				while ($data = mysqli_fetch_array($sql)) { ?>
					<tr>
						<td><?= $no++; ?></td>
                        <td><?= $data['nip']; ?></td>
                        <td><?= $data['nama_user']; ?></td>
                        <td><?= rupiah($data['gaji_pokok']); ?></td>
                        <td><?= $data['hadir']." hari"; ?></td>
                        <td><?= $data['lembur']. " jam"; ?></td>
                        <td><?= $data['jam_perhari']." jam"; ?></td>
                        <td><?= $data['tot_jamkerja']." jam"; ?></td>
                        <td><?= rupiah($data['upah_prjam']) ?></td>
                        <td><?= rupiah($data['upah_lembur']); ?></td>
                        <td><?= rupiah($data['gaji']); ?></td>
                        <td><?= $data['tgl_periode_gaji']; ?></td>
                        <td><?= $data['tgl_input']; ?></td>
						<td>
							<a href="pages_slip/download/laporan_payroll.php?id=<?= $data['id_user']; ?>&tglin=<?= $data['tgl_input']; ?>" target="_blank" class="btn bg-blue"><i class="fa fa-download"></i></a>
						</td>
					</tr>
				<?php }
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>