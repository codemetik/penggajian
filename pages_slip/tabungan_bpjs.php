<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Tabungan BPJS Ketenaga Kerjaan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-orange">
				<h5 class="card-title">BPJS Ketenaga Kerjaan : <?= $_SESSION['nama_user']; ?></h5>
				<div class="card-tools">
					<div class="input-group input-group-sm" style="width: 150px;">
						<a href="pages_slip/download/laporan_bpjs_ketenagaker.php" target="_blank"><button class="btn bg-dark"> <i class="fa fa-download"></i> Download</button></a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive p-0" style="height: 450px;">
					<table class="table table-head-fixed table-nowrap table-hover table-bordered">
						<thead>
							<tr>
								<th>ID User</th>
								<th>NIP</th>
								<th>Nama User</th>
								<th>Jabatan</th>
								<th>BPJS Ketenaga Kerjaan</th>
								<th>Tgl Periode Angsur</th>
								<th>Masa Kerja</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$sql = mysqli_query($koneksi, "SELECT x.id_user, nip, nama_user, nama_jabatan, tunjangan_kesehatan, tunjangan_bpjs, tgl_angsuran, TIMESTAMPDIFF(MONTH, tgl_masuk_user,NOW()) AS masa_kerja FROM tb_tabungan_tunjangan X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan AND z.id_user = '".$_SESSION['id_user']."'");
						$no=1;
						while ($data = mysqli_fetch_array($sql)) { ?>
							<tr>
								<td><?= $data['id_user']; ?></td>
								<td><?= $data['nip']; ?></td>
								<td><?= $data['nama_user']; ?></td>
								<td><?= $data['nama_jabatan']; ?></td>
								<td><?= rupiah($data['tunjangan_bpjs']); ?></td>
								<td><?= $data['tgl_angsuran']; ?></td>
								<td><?= $data['masa_kerja']." th"; ?></td>
							</tr>
						<?php }
						$bpjs = mysqli_query($koneksi, "SELECT SUM(tunjangan_bpjs) AS bpjs_ketenagakerjaan FROM tb_tabungan_tunjangan X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE x.id_user = '".$_SESSION['id_user']."'");
						$sqb = mysqli_fetch_array($bpjs);
						?>
						<tr>
							<td colspan="4">Total :</td>
							<td colspan="3"><?= rupiah($sqb['bpjs_ketenagakerjaan']); ?></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>