<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Data Asset</a></li>
      <li class="breadcrumb-item active">Jabatan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-blue">
			<h3 class="card-title">Data Jabatan + Gaji</h3>

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

			</div>
			<div class="card-body table-responsive p-0" style="height: 450px;">
				<table class="table table-head-fixed text-nowrap table-hover font-10">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Jabatan</th>
							<th>Nama Jabatan</th>
							<th>Gaji Pokok</th>
							<th>Uang Makan</th>
							<th>Uang Transport</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if (isset($_POST['tampil'])) {
						$search = $_POST['search'];
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_jabatan X INNER JOIN tb_gaji Y ON y.id_jabatan = x.id_jabatan WHERE nama_jabatan LIKE '%".$search."%'");	
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_jabatan X INNER JOIN tb_gaji Y ON y.id_jabatan = x.id_jabatan");
					}
					$no=1;
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data['id_jabatan']; ?></td>
							<td><?= $data['nama_jabatan']; ?></td>
							<td><?= rupiah($data['gaji_pokok']); ?></td>
							<td><?= rupiah($data['uang_makan']); ?></td>
							<td><?= rupiah($data['uang_transport']); ?></td>
							<td>
								<a href="?page=update_jabatan&id=<?= $data['id_jabatan']; ?>" class="btn bg-blue"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>