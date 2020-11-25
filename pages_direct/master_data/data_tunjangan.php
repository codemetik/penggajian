<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Data Master</a></li>
      <li class="breadcrumb-item active">Data Tunjangan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-dark">
				<h5 class="card-title">Laporan Tunjangan</h5>
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
			</div>
			<div class="card-body table-responsive p-0" style="height: 450px;">
				<table class="table table-head-fixed text-nowrap font-10">
					<thead>
						<tr>
							<th>ID User</th>
							<th>Nama User</th>
							<th>Tunjangan Kesehatan</th>
							<th>Tunjangan BPJS</th>
							<th>Tgl Periode Angsur</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if (isset($_POST['tampil'])) {
						$search = $_POST['search'];
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_tabungan_tunjangan X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE nama_user LIKE '%".$search."%'");
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_tabungan_tunjangan X INNER JOIN tb_user Y ON y.id_user = x.id_user");	
					}
					
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $data['id_user']; ?></td>
							<td><?= $data['nama_user']; ?></td>
							<td><?= rupiah($data['tunjangan_kesehatan']); ?></td>
							<td><?= rupiah($data['tunjangan_bpjs']); ?></td>
							<td><?= $data['tgl_angsuran']; ?></td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>