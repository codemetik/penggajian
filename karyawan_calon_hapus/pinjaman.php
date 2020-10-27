<aside class="right-side">
	<section class="content-header">
<div id="page-wrapper">
	<div class="container-fluid">


		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h4>
						<i class="glyphicon glyphicon-user"></i>Data pinjaman


					</h4>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="penel-tittle">Nama pinjaman <a class="btn-info btn-xs" href="index.php?pages=tambahpinjaman">
							<i class="fa fa-plus "></i> tambah
						</a></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									
								<tr>
									<th>no</th>
									<th>no pinjaman</th>
									<th>nama karyawan</th>
									<th>jumlah pinjaman</th>
									<th>tanggal pinjaman</th>
									<th>keterangan</th>
								</tr>
								</thead>

								<tbody>
									<?php
									$no = 1;

									$query = mysqli_query($db, "SELECT * FROM pinjaman");
									while ($tampil = mysqli_fetch_assoc($query)) {
									
									echo"

									 
									<tr>
										<td>$no</td>
										<td>$tampil[no_pinjaman]</td>
										<td>$tampil[nama_karyawan]</td>
										<td>Rp. ".number_format($tampil['jumlah_pinjaman'])."</td>
										<td>$tampil[tanggal_pinjaman]</td>
										<td>$tampil[keterangan]</td>
										<td>Edit
										</td>";
										?>

									</tr> 
									<?php
									$no++;
								}
									?>
									</tr>	
								</tbody>
							</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</aside>
						
