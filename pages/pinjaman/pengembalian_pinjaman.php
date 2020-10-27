<?php 
$kem = mysqli_query($koneksi, "SELECT max(id_pengembalian) AS maxCode FROM tb_pengembalian_pinjaman");
$idkem = mysqli_fetch_array($kem);
$idk = $idkem['maxCode'];
$nOk = (int) substr($idk, 4, 7);
$nOk++; 
$idkembali = "KEMB";
$id_pengembalian = $idkembali . sprintf("%07s", $nOk);
?>
<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Pinjaman</a></li>
      <li class="breadcrumb-item active">Pengembalian Pinjaman</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12 mb-2">
		<a href="" class="btn bg-blue" data-toggle="modal" data-target="#modal-xl"><i class="fa fa-plus"></i> Add Pengembalian</a>
	</div>
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-blue">
				Pengembalian Pinjaman
			</div>
			<div class="card-body table-responsive p-0" style="height: 400px;">
				<table class="table table-head-fixed text-nowrap table-bordered table-hover font-8">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Pengembalain</th>
							<th>ID Pinjaman</th>
							<th>Nama User</th>
							<th>Jumlah Pinjaman</th>
							<th>Jumlah Pengembalian</th>
							<th>Tgl Pengembalian</th>
							<th>Keterangan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sql = mysqli_query($koneksi, "SELECT * FROM tb_pengembalian_pinjaman X INNER JOIN tb_user Y ON y.id_user = x.id_user GROUP BY x.id_user DESC");
					$no=1;
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data['id_pengembalian']; ?></td>
							<td><?= $data['id_pinjaman']; ?></td>
							<td><?= $data['nama_user']; ?></td>
							<td><?= rupiah($data['jumlah_pinjaman']); ?></td>
							<td><?= rupiah($data['jumlah_pengembalian']); ?></td>
							<td><?= $data['tgl_pengembalian']; ?></td>
							<td><?= $data['keterangan']; ?></td>
							<td>
								<a href="pages/proses/proses_delete_pengembalian.php?id=<?= $data['id_pengembalian']; ?>" class="btn bg-danger"><i class="fa fa-trash-alt"></i></a>
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
      <h4 class="modal-title">Input Pengembalian</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<form action="pages/proses/proses_input_pengembalian.php" method="POST">
    <div class="modal-body">
      <div class="row">
      	<div class="col-sm-4">
      		<div class="form-group">
              <label>Nama User</label>
              <select class="form-control-sm select2" name="id_user" id="id_user" style="width: 100%;" required>
              	<option value="">--Pilih--</option>
                <?php 
                $user = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman X INNER JOIN tb_user Y ON y.id_user = x.id_user");
              	while ($duser = mysqli_fetch_array($user)) {
					echo "<option value='".$duser['id_user']."'>".$duser['nama_user'].", Jml Pinjamn : ".rupiah($duser['jumlah_pinjaman'])."</option>";
				}
                ?>
              </select>
            </div>
            <div class="form-group">
      			<label>Tgl Pengembalian</label>
      			<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Tgl</span>
                  </div>
	              <?php 
	            date_default_timezone_set('Asia/Jakarta'); 
				$tgl_pengembalian = date("Y-m-d h:i:s");
	              ?>
                  <input type="text" name="tgl_pengembalian" class="form-control" value="<?= $tgl_pengembalian; ?>" readonly>
                </div>
      		</div>
      	</div>
      	<div class="col-sm-4">
      		<div class="form-group">
      			<label>ID Pengembalian</label>
      			<input type="text" name="id_pengembalian" class="form-control" value="<?= $id_pengembalian; ?>" readonly>
      		</div>
      		<div class="form-group">
      			<label>Jumlah Pengembalian</label>
      			<input type="text" name="jumlah_pengembalian" class="form-control" required>
      		</div>
      	</div>
      	<div class="col-sm-4">
      		<div class="form-group">
      			<label>Keterangan</label>
      			<textarea class="form-control" name="keterangan"></textarea>
      		</div>
      	</div>
      	<div class="col-sm-3">
      		
      	</div>
      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
    </div>
</form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->