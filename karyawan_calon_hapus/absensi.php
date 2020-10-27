<aside class="right-side">
	<section class="content-header">
<div id="page-wrapper">
	<div class="container-fluid">


		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h4>
						<i class="glyphicon glyphicon-user"></i>Data absensi


					</h4>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="penel-tittle">Nama Absensi <a class="btn-info btn-xs" href="index.php?pages=tambahabsensi">
							<i class="fa fa-plus "></i> tambah
						</a></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									
								<tr>
									<th>$no</th>
									<th>nama</th>
									<th>absen bulan</th>
									<th>jumlah absen</th>
									<th>jumlah sakit</th>
									<th>jumlah izin</th>
									<th>jumlah lembur</th>
								</tr>
								</thead>

								<tbody>
									<?php
									$no = 1;

									$query = mysqli_query($db, "SELECT * FROM absensi");
									while ($tampil = mysqli_fetch_assoc($query)) {
									
									echo"

									 
									<tr>
										<td>$no</td>
										<td>$tampil[nama]</td>
										<td>$tampil[absen_bulan]</td>
										<td>$tampil[jumlah_absen]</td>
										<td>$tampil[jumlah_sakit]</td>
										<td>$tampil[jumlah_izin]</td>
										<td>$tampil[jumlah_lembur]</td>
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
						
