<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Data Laporan</a></li>
      <li class="breadcrumb-item active">Laporan Pinjaman</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-danger">
				Laporan Pinjaman
			<div class="card-tools">
			<?php 
			if (isset($_POST['tampil'])) {
				$search = $_POST['search'];
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE z.id_jabatan = '".$search."' GROUP BY z.id_jabatan DESC");
				$dt = mysqli_fetch_array($sql);
				$show = $dt['id_jabatan'];
			}else{
				$show = "";
			}
			?>
				<div class="input-group input-group-sm" style="width: 150px;">
					<a href="pages/download/laporan_pinjaman.php?id=<?= $show; ?>" target="_blank"><button class="btn bg-dark"> <i class="fa fa-download"></i> Download</button></a>
				</div>

			</div>

			<div class="card-tools mr-2">
	    	<form action="" method="POST">
	       	  <div class="input-group input-group-sm" style="width: 250px;">
	            <select name="search" class="form-control float-right">
	            	<option>== Pilih Jabatan ==</option>
	            	<?php
	            	$sqlp = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan");
	            	while ($dp = mysqli_fetch_array($sqlp)) { ?>
	            		<option value="<?= $dp['id_jabatan']; ?>"><?= $dp['nama_jabatan']; ?></option>
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
			<div class="card-body table-responsive p-0" style="height: 400px;">
				<table class="table table-head-fixed text-nowrap table-bordered font-10">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Pinjaman</th>
							<th>NIP</th>
							<th>Nama User</th>
							<th>Jabatan</th>
							<th>Jumlah Pinjaman</th>
							<th>Tgl Pinjaman</th>
							<th>Tgl Perubahan</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if (isset($_POST['tampil'])) {
						$search = $_POST['search'];
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE z.id_jabatan = '".$search."' GROUP BY id_pinjaman DESC");
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan GROUP BY id_pinjaman DESC");	
					}
					
					$no=1;
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data['id_pinjaman']; ?></td>
							<td><?= $data['nip']; ?></td>
							<td><?= $data['nama_user']; ?></td>
							<td><?= $data['nama_jabatan'] ?></td>
							<td><?= rupiah($data['jumlah_pinjaman']); ?></td>
							<td><?= $data['tgl_pinjaman']; ?></td>
							<td><?= $data['tgl_update']; ?></td>
							<td><?= $data['keterangan']; ?></td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>