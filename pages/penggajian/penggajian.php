<?php 
$gj = mysqli_query($koneksi, "SELECT max(id_penggajian) AS maxCode FROM tb_penggajian");
$idgj = mysqli_fetch_array($gj);
$idg = $idgj['maxCode'];
$nOg = (int) substr($idg, 2, 7);
$nOg++; 
$idgaji = "GJ";
$id_penggajian = $idgaji . sprintf("%07s", $nOg);
?>
<div class="row mt-2">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Penggajian</a></li>
      <li class="breadcrumb-item active">Penggajian</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
  <div class="col-2">
    <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Input Penggajian</a>
  </div>
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-blue">
        <h3 class="card-title">Penggajian</h3>

      
        <div class="card-tools">
      <form action="" method="POST">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
      </form>
        </div>
      

      
        <div class="card-tools mr-2">
        <form action="" method="POST">
          <div class="input-group input-group-sm" style="width: 250px;">
            <input type="date" name="search" class="form-control float-right" placeholder="Search">

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
              <th>ID User</th>
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
              $sql = mysqli_query($koneksi, "SELECT * FROM tb_penggajian WHERE YEAR(tgl_input) LIKE YEAR('".$search."') AND MONTH(tgl_input) LIKE MONTH('".$search."') OR id_user LIKE '".$search."' ");  
            }else{
              $sql = mysqli_query($koneksi, "SELECT * FROM tb_penggajian WHERE MONTH(tgl_input) = MONTH(NOW())");
            }
            while ($data = mysqli_fetch_array($sql)) { ?>
              <tr>
                <td><?= $data['id_user']; ?></td>
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

<div class="modal fade" id="modal-default">
<div class="modal-dialog modal-default">
  <div class="modal-content bg-green">
    <div class="modal-header bg-blue">
      <h4 class="modal-title">Input Penggajian</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<form action="pages/proses/proses_input_penggajian.php" method="POST">
    <div class="modal-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label>ID Gajian</label>
            <input type="text" name="id_penggajian" class="form-control" value="<?= $id_penggajian; ?>" readonly>
          </div>
          <div class="form-group">
            <label>Periode Tanggal Penggajian</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Tgl</span>
                </div>
                <input type="date" name="tgl_periode_gaji" class="form-control" placeholder="Username" required>
              </div>
          </div>
          <div class="form-group">
              <label>Nama User</label>
              <select class="form-control-sm select2" name="id_user" id="id_user" style="width: 100%;" required>
                <option value="">--Pilih--</option>
                <?php 
                $user = mysqli_query($koneksi, "SELECT * FROM tb_user");
                  while ($duser = mysqli_fetch_array($user)) {
                    $cek = mysqli_query($koneksi, "SELECT * FROM tb_absensi WHERE id_user = '".$duser['id_user']."' AND MONTH(tgl_ab_akhir) = MONTH(NOW())");
                    $dcek = mysqli_num_rows($cek);
                    if ($dcek > 0 ) {

                      $cp = mysqli_query($koneksi, "SELECT * FROM tb_penggajian WHERE id_user = '".$duser['id_user']."' AND MONTH(tgl_input) = MONTH(NOW())");
                      $dp = mysqli_num_rows($cp);
                      if ($dp > 0) {
                        echo "";
                      }else{
                        echo "<option value='".$duser['id_user']."'>".$duser['nama_user']."</option>"; 
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
    <div class="modal-footer justify-content-between mt-5">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" name="simpan_gaji" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin menyimpan data ini?')">Save </button>
    </div>
</form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->