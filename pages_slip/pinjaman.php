<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Pinjaman</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-orange">
				<h5>Pinjaman <?= $_SESSION['nama_user']; ?></h5>
			</div>
			<div class="card-body">
				<div class="table-responsive p-0" style="height: 450px;">
					<table class="table table-thead-fixed table-nowrap table-hover">
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
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE x.id_user = '".$_SESSION['id_user']."'");
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
</div>