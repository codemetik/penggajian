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


			<div class="card-tools mr-2">
	    	<form action="" method="POST">
	       	  <div class="input-group input-group-sm" style="width: 150px;">
	            <input type="text" name="search" class="form-control float-right" placeholder="Search name">

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
							<th>Nama User</th>
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
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE nama_user LIKE '%".$search."%' GROUP BY id_pinjaman DESC");
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman X INNER JOIN tb_user Y ON y.id_user = x.id_user GROUP BY id_pinjaman DESC");	
					}
					
					$no=1;
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data['id_pinjaman']; ?></td>
							<td><?= $data['nama_user']; ?></td>
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