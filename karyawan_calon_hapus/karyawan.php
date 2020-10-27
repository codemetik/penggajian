<aside class="right-side">
	<section class="content-header">
<div id="page-wrapper">
	<div class="container-fluid">


		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h4>
						<i class="glyphicon glyphicon-user"></i>Data karyawan


					</h4>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="penel-tittle">Data karyawan <a class="btn-info btn-xs" href="index.php?pages=tambahkaryawan">
							<i class="fa fa-plus "></i> tambah
						</a></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									
								<tr>
									<th>No.</th>
									<th>Nip</th>
									<th>Nama</th>
									<th>Jenis kelamin</th>
									<th>Alamat</th>
									<th>Tanggalmasuk</th>
									<th>Agama</th>
									<th>Jabatan</th>
									<th>Divisi</th>
								</tr>
								</thead>
								<tbody>

									<?php
									$no = 1;

									$query = mysqli_query($db, "SELECT * FROM karyawan");
									while ($tampil = mysqli_fetch_assoc($query)) {
									
									echo"
									<tr>
										<td>$no</td>
										<td>$tampil[Nip_karyawan]</td>
										<td>$tampil[Nama_karyawan]</td>
										<td>$tampil[Jenis_karyawan]</td>
										<td>$tampil[Alamat_karyawan]</td>
										<td>$tampil[masuk]</td>
										<td>$tampil[Agama_karyawan]</td>
										<td>$tampil[Id_Jabatan]</td>
										<td>$tampil[Id_Divisi]</td>
										<td>
										<a href='index.php?pages=ubahkaryawan&id=$tampil[Nip_karyawan]'><i class='fa fa-pencil' title='edit data'></i></a>
										
										";
										?>

									<a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-xs" href="index.php?pages=hapuskaryawan&id=<?php echo $tampil['id_user'];?>" onclick="return confirm('Anda yakin ingin menghapus  <?php echo $data['nama']; ?>?');">
                            <i class="glyphicon glyphicon-trash"></i>
                          </a>
              <?php
                echo "
                        </div>
                      </td>
                    </tr>";
                
              }
              ?>
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
						
