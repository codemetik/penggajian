<?php 
$pin = mysqli_query($koneksi, "SELECT max(id_pinjaman) AS maxCode FROM tb_pinjaman");
$idpin = mysqli_fetch_array($pin);
$idp = $idpin['maxCode'];
$nOp = (int) substr($idp, 4, 7);
$nOp++; 
$idpinjam = "PINJ";
$id_pinjaman = $idpinjam . sprintf("%07s", $nOp);
?>
<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Pinjaman</a></li>
      <li class="breadcrumb-item active">Pinjaman Karyawan</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
		<a href="" class="btn bg-blue mb-2" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-plus"></i> Add Pinjaman</a>
	</div>
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-blue">
				Pinjaman
			</div>
			<div class="card-body table-responsive p-0" style="height: 400px;">
				<table class="table table-head-fixed text-nowrap table-bordered font-10">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Pinjaman</th>
							<th>Nama User</th>
							<th>Jumlah Pinjaman</th>
							<th>Tgl Pinjaman</th>
							<th>Tgl Perubahan</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sql = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman X INNER JOIN tb_user Y ON y.id_user = x.id_user GROUP BY id_pinjaman DESC");
					$no=1;
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data['id_pinjaman']; ?></td>
							<td><?= $data['nama_user']; ?></td>
							<td><?= rupiah($data['jumlah_pinjaman']); ?></td>
							<td><?= $data['tgl_pinjaman']; ?></td>
							<td><?= $data['tgl_update']; ?></td>
							<td><?= $data['keterangan']; ?></td>
							<td>
								<a href="?page=update_pinjaman&id=<?= $data['id_pinjaman']; ?>" class="btn bg-blue"><i class="fa fa-edit"></i></a> || <a href="pages/proses/proses_delete_pinjaman.php?id=<?= $data['id_pinjaman']; ?>" class="btn bg-danger"><i class="fa fa-trash-alt"></i></a>
							</td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-xl">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
    <div class="modal-header bg-blue">
      <h4 class="modal-title">Inpu Pinjaman</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<form action="pages/proses/proses_input_pinjaman.php" method="POST">
    <div class="modal-body">
      <div class="row">
      	<div class="col-sm-4">
      		<div class="form-group">
              <label>Nama User</label>
              <select class="form-control-sm select2" name="id_user" id="id_user" style="width: 100%;" required>
              	<option value="">--Pilih--</option>
                <?php 
                $user = mysqli_query($koneksi, "SELECT * FROM tb_user");
				while ($duser = mysqli_fetch_array($user)) {
					$cekuser = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman WHERE id_user = '".$duser['id_user']."'");
					$dcek = mysqli_num_rows($cekuser);
					if ($dcek > 0) {
						echo "";
					}else{
						echo "<option value='".$duser['id_user']."'>".$duser['nama_user']."</option>";
					}
					
				}
                ?>
              </select>
            </div>
            <div class="form-group">
      			<label>Tgl Pinjaman</label>
      			<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Tgl</span>
                  </div>
                  <?php 
                date_default_timezone_set('Asia/Jakarta'); 
				$tgl_pinjam = date("Y-m-d h:i:s");
                  ?>
                  <input type="text" name="tgl_pinjaman" class="form-control" value="<?= $tgl_pinjam; ?>" readonly>
                </div>
      		</div>
      	</div>
      	<div class="col-sm-4">
      		<div class="form-group">
      			<label>ID Pinjaman</label>
      			<input type="text" name="id_pinjaman" class="form-control" value="<?= $id_pinjaman; ?>" readonly>
      		</div>
      		<div class="form-group">
      			<label>Jumlah Pinjaman</label>
      			<input type="text" name="jumlah_pinjaman" class="form-control" required>
      		</div>
      	</div>
      	<div class="col-sm-4">
      		<div class="form-group">
      			<label>Keterangan</label>
      			<textarea class="form-control" name="Keterangan"></textarea>
      		</div>
      	</div>
      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" name="simpan_pinjaman" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Pinjaman</button>
    </div>
</form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->