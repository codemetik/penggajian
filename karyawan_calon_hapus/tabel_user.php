<aside class="right-side">
	<section class="content-header">
<div id="page-wrapper">
	<div class="container-fluid">


		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h4>
						<i class="glyphicon glyphicon-user"></i>Data user


					</h4>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="penel-tittle">Tabel User <a class="btn-info btn-xs" href="index.php?pages=tambahuser">
							<i class="fa fa-plus "></i> tambah
						</a></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									
								<tr >
									<th>Nama karyawan</th>
									<th>Password</th>
									<th>Email</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
								</thead>
								<tbody>


								<?php
								$query = mysqli_query($db, "SELECT * FROM user")or die(mysqli_error($query));
								while ($tampil = mysqli_fetch_assoc($query)) {
									
								echo"
								<tr>
									<td>$tampil[nama]</td>
									<td>$tampil[username]</td>
									<td>$tampil[password]</td>
									<td>$tampil[email]</td>
									<td>
									<a href='index.php?pages=ubahuser&id=$tampil[id_user]'><i class='fa fa-pencil' title='edit data'></i></a>

									";
									?>
									<a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-xs" href="index.php?pages=hapususer&id=<?php echo $tampil['id_user'];?>" onclick="return confirm('Anda yakin ingin menghapus  <?php echo $data['nama']; ?>?');">
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
						
