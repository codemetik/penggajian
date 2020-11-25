<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Laporan</a></li>
      <li class="breadcrumb-item active">Laporan Absensi</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-danger">
				Laporan Absensi
			
				<div class="card-tools">
				<?php 
				if (isset($_POST['tampil'])) {
					$search = $_POST['search'];
					$sql = mysqli_query($koneksi, "SELECT CONCAT(tgl_ab_awal,'&tglb=',tgl_ab_akhir) AS tgl, TIMESTAMPDIFF(DAY, tgl_ab_awal, tgl_ab_akhir) AS jrk FROM tb_absensi WHERE CONCAT(tgl_ab_awal,' & ',tgl_ab_akhir) = '".$search."' GROUP BY tgl_ab_awal,tgl_ab_akhir DESC");
					$dt = mysqli_fetch_array($sql);
					$show = $dt['tgl'];
				}else{
					$show = "";
				}
				?>
					<div class="input-group input-group-sm" style="width: 150px;">
						<a href="pages/download/laporan_absensi.php?tgla=<?= $show; ?>" target="_blank"><button class="btn bg-dark"> <i class="fa fa-download"></i> Download</button></a>
					</div>

				</div>

				<div class="card-tools mr-2">
		     <form action="" method="POST">
		          <div class="input-group input-group-sm" style="width: 300px;">
		            <select type="text" name="search" class="form-control float-right">
		            	<option>-- Periode Tanggal--</option>
		            	<?php 
						$jbtn = mysqli_query($koneksi, "SELECT CONCAT(tgl_ab_awal,' & ',tgl_ab_akhir) AS tgl, TIMESTAMPDIFF(DAY, tgl_ab_awal, tgl_ab_akhir) AS jrk FROM tb_absensi GROUP BY tgl_ab_awal,tgl_ab_akhir DESC");
						while ($djb = mysqli_fetch_array($jbtn)) {
							echo "<option value='".$djb['tgl']."'>".$djb['tgl']." &raquo; ".$djb['jrk']." hari"."</option>";
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
			<div class="card-body table-responsive p-0" style="height: 450px;">
				<table class="table table-head-fixed text-nowrap font-10">
					<thead>
						<tr>
							<th>ID Absensi</th>
							<th>ID User</th>
							<th>NIP</th>
							<th>Nama User</th>
							<th>hadir</th>
							<th>Sakit</th>
							<th>Ijin</th>
							<th>Lembur</th>
							<th>Tgl Periode Absensi</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if (isset($_POST['tampil'])) {
						$search = $_POST['search'];
						$sql = mysqli_query($koneksi, "SELECT id_absensi, x.id_user, nip, nama_user, hadir, sakit, ijin, lembur, tgl_ab_awal, tgl_ab_akhir ,CONCAT(tgl_ab_awal,' & ',tgl_ab_akhir) AS tgl FROM tb_absensi X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE CONCAT(tgl_ab_awal,' & ',tgl_ab_akhir) = '".$search."'");
					}else{
						$sql = mysqli_query($koneksi, "SELECT id_absensi, x.id_user, nip, nama_user, hadir, sakit, ijin, lembur, tgl_ab_awal, tgl_ab_akhir ,CONCAT(tgl_ab_awal,' & ',tgl_ab_akhir) AS tgl FROM tb_absensi X INNER JOIN tb_user Y ON y.id_user = x.id_user");	
					}
					
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $data['id_absensi']; ?></td>
							<td><?= $data['id_user']; ?></td>
							<td><?= $data['nip'] ?></td>
							<td><?= $data['nama_user']; ?></td>
							<td><?= $data['hadir']; ?></td>
							<td><?= $data['sakit']; ?></td>
							<td><?= $data['ijin']; ?></td>
							<td><?= $data['lembur']; ?></td>
							<td><?= $data['tgl_ab_awal']." & ".$data['tgl_ab_akhir']; ?></td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>