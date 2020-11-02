<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Tunjangan</a></li>
      <li class="breadcrumb-item active">Tunjangan Kesehatan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-3">
		<a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add Tunjangan</a>
	</div>
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-blue">
				<h3 class="card-title">Tunjangan Kesehatan</h3>
			</div>
			<div class="card-body table-responsive p-0" style="height: 450px;">
				<table class="table table-head-fixed text-nowrap font-10">
					<thead>
						<tr>
							<th>ID Tunjangan User</th>
							<th>ID User</th>
							<th>Nama User</th>
							<th>Nama Tunjangan</th>
							<th>Nominal Tunjangan</th>
							<th>Tgl Input</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sql = mysqli_query($koneksi, "SELECT * FROM tb_tunjangan X INNER JOIN tb_tunjangan_user Y ON y.id_tunjangan = x.id_tunjangan INNER JOIN tb_user z ON z.id_user = y.id_user WHERE y.id_tunjangan = 'TUNJ001'");
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $data['id_tunjangan_user']; ?></td>
							<td><?= $data['id_user']; ?></td>
							<td><?= $data['nama_user']; ?></td>
							<td><?= $data['nama_tunjangan']; ?></td>
							<td><?= rupiah($data['nominal_tunjangan']); ?></td>
							<td><?= $data['tgl_input']; ?></td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-default">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Input Tunjangan Kesehatan Karyawan</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<form action="pages/proses/proses_tunjangan_kesehatan.php" method="POST">
    <div class="modal-body">
      <div class="row">
      	<div class="col-sm-12">
      		<div class="alert bg-success"><p>Data karyawan yang tertera adalah karyawan yang sudah memiliki masa kerja >= 12 bulan</p></div>
      	</div>
      	<div class="col-sm-12">
      		<div class="form-group">
              <label>Nama User</label>
              <select class="form-control-sm select2" name="id_user" id="id_user" style="width: 100%;" required>
              	<option value="">--Pilih--</option>
                <?php 
                $user = mysqli_query($koneksi, "SELECT * FROM tb_user");
  				while ($duser = mysqli_fetch_array($user)) {
  					$cekuser = mysqli_query($koneksi, "SELECT x.id_user, nip, nama_user, jenis_kelamin, nama_jabatan, tgl_masuk_user, TIMESTAMPDIFF(MONTH, tgl_masuk_user,NOW()) AS masa_kerja FROM tb_rols_user X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan WHERE x.id_user = '".$duser['id_user']."' GROUP BY id_rols_user ASC");
  					$dcek = mysqli_fetch_array($cekuser);
  					//cek jika masa kerja lebih atau sama dengan batas waktu yakni 12 bulan
  					if ($dcek['masa_kerja'] >= 12) {

  						$cektu = mysqli_query($koneksi, "SELECT * FROM tb_tunjangan_user WHERE id_user = '".$dcek['id_user']."' AND id_tunjangan = 'TUNJ001'");
  						$tucek = mysqli_num_rows($cektu);
  						//cek jika ada di table tunangan maka tidak ditampilkan 
  						if ($tucek > 0) {
  							echo "";
  						}else{
  							echo "<option value='".$duser['id_user']."'>".$duser['nama_user'].", Masa Kerja : ".$dcek['masa_kerja']." Bln"."</option>";	
  						}
  						
  					}else{
  						echo "";
  					}
  					
  				}
                ?>
              </select>
            </div>
            <div class="form-group">
            	<label>Tgl Input</label>
            	<?php 
            	date_default_timezone_set('Asia/Jakarta'); 
				$tgl_input = date("Y-m-d h:i:s");
            	?>
            	<input type="text" name="tgl_input" class="form-control" value="<?= $tgl_input; ?>" readonly>
            </div>
        </div>
      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Karyawan</button>
    </div>
</form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->