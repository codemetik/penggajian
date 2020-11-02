<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Absensi</a></li>
      <li class="breadcrumb-item"><a href="?page=absensi_karyawan">Absensi Karyawan</a></li>
      <li class="breadcrumb-item active">Input Absen</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-blue">
				Input Absensi Karyawan
			</div>
			<div class="card-body">
			<form action="pages/proses/proses_input_absensi.php" method="POST">
				<div class="row">
					<div class="col-sm-3">
						<a href="?page=absensi_karyawan" class="btn bg-blue mb-2">Kembali</a>
						<a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-plus"></i> Add </a>
					</div>
          <div class="col-sm-8">
            <div class="form-group">
              <select class="form-control-sm select2" style="width: 100%;">
                <option value=""> -- Data Karyawan -- </option>
                <?php 
                $user = mysqli_query($koneksi, "SELECT * FROM tb_rols_user X INNER JOIN tb_user Y ON  y.id_user = x.id_user INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan");
                  while ($duser = mysqli_fetch_array($user)) {
                    $sqlcek = mysqli_query($koneksi, "SELECT * FROM tb_olah_absen WHERE id_user = '".$duser['id_user']."'");
                    $cek = mysqli_num_rows($sqlcek);
                    $ce = mysqli_fetch_array($sqlcek);
                    $cekabsen = mysqli_query($koneksi, "SELECT * FROM tb_absensi WHERE id_user = '".$duser['id_user']."' AND YEAR(tgl_ab_akhir) LIKE YEAR(NOW()) AND MONTH(tgl_ab_akhir) LIKE MONTH(NOW())");
                    $ab = mysqli_num_rows($cekabsen);

                    if ($ab > 0) {
                      echo "";
                    }else{
                      if ($cek > 0) {
                        echo "";
                      }else{
                        echo "<option value='" . $duser['id_user'] . "'>" . $duser['nama_user'] ." - ".$duser['nama_jabatan']. "</option>";
                      }
                    }
                    
                  }
                ?>
              </select>
            </div>
          </div>
					<div class="col-sm-12">
						<div class="table-responsive p-0" style="height: 400px;">
							<table class="table table-head-fixed text-nowrap table-bordered font-10">
								<thead>
									<tr>
										<th>No</th>
										<th>ID User</th>
										<th>Hadir</th>
										<th>Sakit</th>
										<th>Ijin</th>
										<th>Lembur</th>
										<th>Tgl Awal</th>
										<th>Tgl Akhir</th>
                    <th>Delete</th>
									</tr>
								</thead>
								<tbody>
					<?php 
					$olah = mysqli_query($koneksi, "SELECT * FROM tb_olah_absen");
					$no=1;
					while ($dolah = mysqli_fetch_array($olah)) { ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><input type="text" readonly style="width: 150px;" name="id_user[]" class="form-control-sm" value="<?= $dolah['id_user']; ?>"></td>
						<td><input type="text" readonly style="width: 50px;" name="hadir[]" class="form-control-sm" value="<?= $dolah['hadir']; ?>"></td>
						<td><input type="text" style="width: 50px;" name="sakit[]" class="form-control-sm" value="<?= $dolah['sakit']; ?>"></td>
						<td><input type="text" style="width: 50px;" name="ijin[]" class="form-control-sm" value="<?= $dolah['ijin']; ?>"></td>
						<td><input type="text" style="width: 50px;" name="lembur[]" class="form-control-sm" value="<?= $dolah['lembur']; ?>"></td>
						<td><input type="date" name="tgl_ab_awal[]" class="form-control-sm" value="<?= $dolah['tgl_ab_awal']; ?>"></td>
						<td><input type="date" name="tgl_ab_akhir[]" class="form-control-sm" value="<?= $dolah['tgl_ab_akhir']; ?>"></td>
            <td>
              <a href="pages/proses/proses_delete_olah_absen.php?idolah=<?= $dolah['id_olah_absen']; ?>" class="btn bg-red" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fa fa-trash-alt"></i></a>
            </td>
					</tr>
					<?php }
					?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-sm-3">
					<?php 
					$cekolah = mysqli_query($koneksi, "SELECT * FROM tb_olah_absen");
					$ol = mysqli_num_rows($cekolah);
					if ($ol > 0) { ?>
						<div class="form-group">
							<button name="simpan_absen" type="submit" class="btn btn-primary" onclick="confirm('Anda akan menyimpan data absensi');" ><i class="fa fa-save"></i> SIMPAN ABSENSI</button>
						</div>
					<?php }else{

					} ?>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-xl">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Input Absen</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<form action="pages/proses/proses_input_olah_absen.php" method="POST">
    <div class="modal-body">
      <div class="row">
      	<div class="card-body col-sm-3 bg-blue">
      		<div class="form-group">
      			<label>Periode Tanggal Absen</label>
      			<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Tgl Awal</span>
                  </div>
                  <input type="date" name="tgl_ab_awal" class="form-control-sm" placeholder="Username" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Tgl Akhir</span>
                  </div>
                  <input type="date" name="tgl_ab_akhir" class="form-control-sm" placeholder="Username" required>
                </div>
      		</div>
      	</div>
      	<div class="col-sm-3">
      		<div class="form-group">
      			<label>Jabatan</label>
      			<select class="form-control" name="id_jabatan" id="id_jabatan" required>
				<option value=""></option>
				</select>
      		</div>
      		<div class="form-group">
      			<label>ID User</label>
      			<select class="form-control" name="id_user" id="id_user" required>
					<option value=""></option>
				</select>
      		</div>
      	</div>
      	<div class="col-sm-3">
      		<!-- <div class="form-group">
      			<label>Hadir</label>
      			<input type="text" name="hadir" class="form-control" value="0">
      		</div> -->
      		<div class="form-group">
      			<label>Sakit</label>
      			<input type="text" name="sakit" class="form-control" value="0">
      		</div>
      		<div class="form-group">
      			<label>Ijin</label>
      			<input type="text" name="ijin" class="form-control" value="0">
      		</div>
      	</div>
      	<div class="col-sm-3">
      		<div class="form-group">
      			<label>Lembur</label>
      			<input type="text" name="lembur" class="form-control" value="0">
      		</div>
      	</div>
     </div>
    </div>
    <div class="modal-footer justify-content-between mt-5">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" name="simpan_olah_absen" class="btn btn-primary">Save </button>
    </div>
</form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
          	$.ajax({
          		type: 'POST',
              	url: "pages/penggajian/getJabatan.php",
              	cache: false,
              	success: function(msg){
                  $("#id_jabatan").html(msg);
                }
            });

	        $("#id_jabatan").change(function(){
          	var id_jabatan = $("#id_jabatan").val();
	          	$.ajax({
	          		type: 'POST',
	              	url: "pages/penggajian/getUser.php",
	              	data: {id_jabatan:id_jabatan},
	              	cache: false,
	              	success: function(msg){
	                  $("#id_user").html(msg);
	                }
	            });
            });

          });
      </script>