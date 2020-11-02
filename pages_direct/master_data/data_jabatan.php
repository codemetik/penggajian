<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Data Master</a></li>
      <li class="breadcrumb-item active">Data Jabatan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-blue">
				Data Jabatan
			</div>
			<div class="card-body table-responsive p-0" style="height: 450px;">
				<table class="table table-head-fixed text-nowrap font-10">
					<thead>
						<tr>
							<th>ID Jabatan</th>
							<th>ID Gaji</th>
							<th>Nama Jabatan</th>
							<th>Gaji Pokok</th>
							<th>Uang Makan</th>
							<th>Uang Transport</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sql = mysqli_query($koneksi, "SELECT * FROM tb_jabatan X INNER JOIN tb_gaji Y ON y.id_jabatan = x.id_jabatan");
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $data['id_jabatan']; ?></td>
							<td><?= $data['id_gaji']; ?></td>
							<td><?= $data['nama_jabatan']; ?></td>
							<td><?= rupiah($data['gaji_pokok']); ?></td>
							<td><?= rupiah($data['uang_makan']); ?></td>
							<td><?= rupiah($data['uang_transport']); ?></td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>