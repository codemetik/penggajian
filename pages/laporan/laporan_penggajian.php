<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Data Laporan</a></li>
      <li class="breadcrumb-item active">Laporan Penggajian</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-danger">
        <h3 class="card-title">laporan Penggajian</h3>

       	<div class="card-tools">
				<?php 
				if (isset($_POST['tampil'])) {
					$search = $_POST['search'];
					$sql = mysqli_query($koneksi, "SELECT tgl_periode_gaji FROM tb_penggajian WHERE tgl_periode_gaji = '".$search."' GROUP BY tgl_periode_gaji ASC");
					$dt = mysqli_fetch_array($sql);
					$show = $dt['tgl_periode_gaji'];
				}else{
					$show = "";
				}
				?>
					<div class="input-group input-group-sm" style="width: 150px;">
						<a href="pages/download/laporan_penggajian.php?tgl=<?= $show; ?>" target="_blank"><button class="btn bg-dark"> <i class="fa fa-download"></i> Download</button></a>
					</div>

				</div>

        <div class="card-tools mr-2">
    	<form action="" method="POST">
       	  <div class="input-group input-group-sm" style="width: 300px;">
            <select name="search" class="form-control float-right">
              <option>== Pilih Periode Gaji ==</option>
              <?php 
              $pilih = mysqli_query($koneksi, "SELECT tgl_periode_gaji FROM tb_penggajian GROUP BY tgl_periode_gaji ASC");
              while ($dpil = mysqli_fetch_array($pilih)) { ?>
                <option value="<?= $dpil['tgl_periode_gaji']; ?>"><?= $dpil['tgl_periode_gaji']; ?></option>
              <?php }
              ?>
            </select>

            <div class="input-group-append">
              <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
    	</form>
        </div>

      </div>
    
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 450px;">
        <table class="table table-head-fixed text-nowrap table-hover font-12">
          <thead>
            <tr>
              <th>NIP</th>
              <th>Nama User</th>
              <th>Gaji Pokok</th>
              <th>Hadir</th>
              <th>Lembur</th>
              <th>Jam /Hari</th>
              <th>Total Jam kerja</th>
              <th>Upah /Jam</th>
              <th>Upah Lembur</th>
              <th>Total Gaji</th>
              <th>Tgl Periode</th>
              <th>Tgl Input</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if (isset($_POST['tampil'])) {
              $search = $_POST['search'];
              $sql = mysqli_query($koneksi, "SELECT * FROM tb_penggajian X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE tgl_periode_gaji LIKE '".$search."'");
            }else{
              $sql = mysqli_query($koneksi, "SELECT * FROM tb_penggajian X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE YEAR(tgl_input) = YEAR(tgl_input) AND MONTH(tgl_input) = MONTH(NOW())");
            }
            while ($data = mysqli_fetch_array($sql)) { ?>
              <tr>
                <td><?= $data['nip']; ?></td>
                <td><?= $data['nama_user']; ?></td>
                <td><?= rupiah($data['gaji_pokok']); ?></td>
                <td><?= $data['hadir']." hari"; ?></td>
                <td><?= $data['lembur']." jam"; ?></td>
                <td><?= $data['jam_perhari']." jam"; ?></td>
                <td><?= $data['tot_jamkerja']." jam"; ?></td>
                <td><?= rupiah($data['upah_prjam']); ?></td>
                <td><?= rupiah($data['upah_lembur']); ?></td>
                <td><?= rupiah($data['gaji']); ?></td>
                <td><?= $data['tgl_periode_gaji']; ?></td>
                <td><?= $data['tgl_input']; ?></td>
              </tr>
            <?php }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<!-- /.row -->