<aside class="right-side">
	<section class="content-header">
<div id="page-wrapper">
	<div class="container-fluid">


		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h4>
						<i class="glyphicon glyphicon-user"></i>Data jabatan


					</h4>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="penel-tittle">Nama Jabatan <a class="btn-info btn-xs" href="index.php?pages=tambahjabatan">
							<i class="fa fa-plus "></i> tambah
						</a></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									
								<tr>
									<th>No</th>
									<th>Kode Jabatan</th>
									<th>Nama Jabatan</th>
									<th>Aksi</th>
								</tr>
								</thead>

								<tbody>
									<?php
									$no = 1;

									$query = mysqli_query($db, "SELECT * FROM jabatan");
									while ($tampil = mysqli_fetch_assoc($query)) {
									
									echo"

									 
									<tr>
										<td>$no</td>
										<td>$tampil[kd_jabatan]</td>
										<td>$tampil[nama_jabatan]</td>
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
						
