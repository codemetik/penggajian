<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Data Laporan</a></li>
      <li class="breadcrumb-item active">Laporan Tunjangan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12 mb-2">
		<?php 
		if (isset($_POST['tampil'])) {
			$search = $_POST['search'];
			$sql = mysqli_query($koneksi, "SELECT SUM(tunjangan_kesehatan) AS kesehatan, SUM(tunjangan_bpjs) AS bpjs FROM tb_tabungan_tunjangan X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE nama_user LIKE '%".$search."%' GROUP BY x.id_user");
			$cek = mysqli_num_rows($sql);
			$dat = mysqli_fetch_array($sql);
			if ($cek > 0) {
				$show1 = rupiah($dat['kesehatan']);
				$show2 = rupiah($dat['bpjs']);	
			}else{
				$show1 = "0";
				$show2 = "0";
			}
			
		}else{
			$show1 = "0";
			$show2 = "0";
		}
		?>
		<a href="" class="btn bg-success">Tunjangan Kesehatan : <?= $show1; ?></a> <a href="" class="btn bg-success">Tunjangan BPJS : <?= $show2; ?></a>
	</div>
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-danger">
				Laporan Tunjangan

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
			<div class="card-body table-responsive p-0" style="height: 450px;">
				<table class="table table-head-fixed text-nowrap">
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
<!-- SELECT CONCAT(MONTH(tgl_masuk_user),'-',YEAR(tgl_masuk_user)) AS tgl_bulan FROM tb_rols_user GROUP BY MONTH(tgl_masuk_user) DESC -->