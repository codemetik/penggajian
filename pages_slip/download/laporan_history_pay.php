<?php 
session_start();
include "../../koneksi.php";
if (!isset($_SESSION['username'])) {
  header('location:index.php');
}

$sql = mysqli_query($koneksi, "SELECT * FROM tb_penggajian X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan INNER JOIN tb_gaji b ON b.id_jabatan = a.id_jabatan WHERE x.id_user = '".$_GET['id']."' AND tgl_periode_gaji = '".$_GET['tglper']."' AND tgl_input = '".$_GET['tglin']."'");
$data = mysqli_fetch_array($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>PT. ZEUSS ALIANSI</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
	<section class="invoice">
		<!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <small>PT. ZEUSS ALIANSI</small>
          <small class="float-right">Date: <?= date("Y/m/d"); ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
   	<!-- info row -->
    <div class="row invoice-info">
    	<div class="col-sm-12 bg-orange pt-5">
        <center><h5>PT. ZEUSS ALIANSI</h5></center>
        <center><h5>Payroll</h5></center>
        <hr>
      </div>
      <!-- <div class="col-sm-4 invoice-col">
        <address>
          Dari Tanggal: <br>
          Sampai Tanggal: <br>
          Oleh : <br>
        </address>
      </div> -->
      <!-- /.col -->
      <!-- 
      <div class="col-sm-4 invoice-col">
        <b>Invoice #007612</b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
      </div> -->
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <br>
    <div class="row">
      <div class="col-sm-4 invoice-col">
        <address>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>ID Slip</th>
                <td>:</td>
                <td> <?= $data['id_gaji']; ?></td>
              </tr>
              <tr>
                <th>Tgl Periode Gaji</th>
                <td>:</td>
                <td> <?= $data['tgl_periode_gaji']; ?></td>
              </tr>
            </table>
          </div>
        </address>
      </div>
      <div class="col-sm-2">
        
      </div>
      <div class="col-sm-4 invoice-col">
        <address>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>NIP</th>
                <td>:</td>
                <td> <?= $data['nip']; ?></td>
              </tr>
              <tr>
                <th>Nama Karyawan</th>
                <td>:</td>
                <td> <?= $data['nama_user']; ?></td>
              </tr>
              <tr>
                <th>Jabatan</th>
                <td>:</td>
                <td> <?= $data['nama_jabatan']; ?></td>
              </tr>
            </table>
          </div>
        </address>
      </div>
    </div>
    <hr>
      
    <?php 
    $sqpin = mysqli_query($koneksi, "SELECT * FROM tb_history_pinjaman WHERE id_user = '".$data['id_user']."' AND tgl_periode_gaji = '".$data['tgl_periode_gaji']."'");
    $cek = mysqli_num_rows($sqpin);
    $pin = mysqli_fetch_array($sqpin);
    //cek di pinjaman
    if ($cek > 0) {
      //cek di tunjangan
      $sqltun = mysqli_query($koneksi, "SELECT * FROM tb_tunjangan_user WHERE id_user = '".$data['id_user']."' GROUP BY id_user");
      $sqltunjang = mysqli_query($koneksi, "SELECT id_user, (SELECT nominal_tunjangan FROM tb_tunjangan_user X 
INNER JOIN tb_tunjangan Y ON y.id_tunjangan = x.id_tunjangan WHERE x.id_tunjangan = 'TUNJ001' AND id_user = '".$data['id_user']."') AS bpjs_kesehatan,
(SELECT nominal_tunjangan FROM tb_tunjangan_user X 
INNER JOIN tb_tunjangan Y ON y.id_tunjangan = x.id_tunjangan WHERE x.id_tunjangan = 'TUNJ002' AND id_user = '".$data['id_user']."') AS bpjs_kerja
FROM tb_tunjangan_user X
INNER JOIN tb_tunjangan Y ON y.id_tunjangan = x.id_tunjangan
WHERE id_user = '".$data['id_user']."' GROUP BY id_user");
      $cektun = mysqli_num_rows($sqltun);
      $dj = mysqli_fetch_array($sqltunjang);
      if ($cektun > 0) {
        //buka di pinjaman dan tunjangan
      ?>
      <div class="card">
        <div class="card-bdy">
          <div class="row">
            <div class="col-sm-6">
              <table class="table table-responsive">
                <tbody>
                <tr>
                  <th>Gaji Pokok</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['gaji_pokok']); ?></td>
                </tr>
                <tr>
                  <th>Uang Makan</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['uang_makan']); ?></td>
                </tr>
                <tr>
                  <th>Uang Transport</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['uang_transport']); ?></td>
                </tr>
                <tr>
                  <th>Total</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['gaji_pokok'] + $data['uang_makan'] + $data['uang_transport']); ?></td>
                  <td>/</td>
                </tr>
                <tr>
                  <td>Total Jam Kerja</td>
                  <td>:</td>
                  <td class="float-right"> <?= $data['tot_jamkerja']." jam"; ?></td>
                </tr>
                <tr>
                  <th>Upah Perjam</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_prjam']); ?></td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Lembur</td>
                  <td>:</td>
                  <td class="float-right"> <?= $data['lembur']." jam"; ?></td>
                </tr>
                <tr>
                  <th>Upah Lembur</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_lembur']); ?></td>
                </tr>
              </tbody>
              </table>
            </div>
            <div class="col-sm-6">
              <table class="table table-responsive">
                <tr>
                  <td>Hadir</td>
                  <td>:</td>
                  <td class="float-right"> <?= $data['hadir']." x 8"; ?></td>
                </tr>
                <tr>
                  <th>Upah Perjam</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_prjam']); ?></td>
                  <td>+</td>
                </tr>
                <tr>
                  <th>Upah Lembur</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_lembur']); ?></td>
                </tr>
                <tr>
                  <th>Total Gaji</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['hadir'] * 8 * $data['upah_prjam'] + $data['upah_lembur']); ?></td>
                  <td>-</td>
                </tr>
                <tr>
                  <th>BPJS Kesehatan</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($dj['bpjs_kesehatan']); ?></td>
                  <td>-</td>
                </tr>
                <tr>
                  <th>BPJS Ketenaga kerjaan</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($dj['bpjs_kerja']); ?></td>
                  <td>-</td>
                </tr>
                <tr>
                  <th>Pinjaman</th>
                  <td>:</td>
                  <td class="float-right"><?= rupiah($pin['jumlah_pinjaman']); ?></td>
                  <td>=</td>
                </tr>
                <tr>
                  <th>Take Home Pay</th>
                  <td>:</td>
                  <th class="float-right"> <?= rupiah($data['gaji']); ?></th>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php 
        //tutup di pinjaman dan tunjangan
      }else{
        //buka hanya di pinjaman
      ?>
      <div class="card">
        <div class="card-bdy">
          <div class="row">
            <div class="col-sm-6">
              <table class="table table-responsive">
                <tbody>
                <tr>
                  <th>Gaji Pokok</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['gaji_pokok']); ?></td>
                </tr>
                <tr>
                  <th>Uang Makan</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['uang_makan']); ?></td>
                </tr>
                <tr>
                  <th>Uang Transport</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['uang_transport']); ?></td>
                </tr>
                <tr>
                  <th>Total</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['gaji_pokok'] + $data['uang_makan'] + $data['uang_transport']); ?></td>
                  <td>/</td>
                </tr>
                <tr>
                  <td>Total Jam Kerja</td>
                  <td>:</td>
                  <td class="float-right"> <?= $data['tot_jamkerja']." jam"; ?></td>
                </tr>
                <tr>
                  <th>Upah Perjam</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_prjam']); ?></td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Lembur</td>
                  <td>:</td>
                  <td class="float-right"> <?= $data['lembur']." jam"; ?></td>
                </tr>
                <tr>
                  <th>Upah Lembur</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_lembur']); ?></td>
                </tr>
              </tbody>
              </table>
            </div>
            <div class="col-sm-6">
              <table class="table table-responsive">
                <tr>
                  <td>Hadir</td>
                  <td>:</td>
                  <td class="float-right"> <?= $data['hadir']." x 8"; ?></td>
                </tr>
                <tr>
                  <th>Upah Perjam</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_prjam']); ?></td>
                  <td>+</td>
                </tr>
                <tr>
                  <th>Upah Lembur</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_lembur']); ?></td>
                </tr>
                <tr>
                  <th>Total Gaji</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['hadir'] * 8 * $data['upah_prjam'] + $data['upah_lembur']); ?></td>
                  <td>-</td>
                </tr>
                <tr>
                  <th>Pinjaman</th>
                  <td>:</td>
                  <td class="float-right"><?= rupiah($pin['jumlah_pinjaman']); ?></td>
                  <td>=</td>
                </tr>
                <tr>
                  <th>Take Home Pay</th>
                  <td>:</td>
                  <th class="float-right"> <?= rupiah($data['gaji']); ?></th>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php 
      //tutup hanya di pinjaman
      }

    }else{
      
      //cek di tunjangan
      $sqltun = mysqli_query($koneksi, "SELECT * FROM tb_tunjangan_user WHERE id_user = '".$data['id_user']."' GROUP BY id_user");
      $sqltunjang = mysqli_query($koneksi, "SELECT id_user, (SELECT nominal_tunjangan FROM tb_tunjangan_user X 
INNER JOIN tb_tunjangan Y ON y.id_tunjangan = x.id_tunjangan WHERE x.id_tunjangan = 'TUNJ001' AND id_user = '".$data['id_user']."') AS bpjs_kesehatan,
(SELECT nominal_tunjangan FROM tb_tunjangan_user X 
INNER JOIN tb_tunjangan Y ON y.id_tunjangan = x.id_tunjangan WHERE x.id_tunjangan = 'TUNJ002' AND id_user = '".$data['id_user']."') AS bpjs_kerja
FROM tb_tunjangan_user X
INNER JOIN tb_tunjangan Y ON y.id_tunjangan = x.id_tunjangan
WHERE id_user = '".$data['id_user']."' GROUP BY id_user");
      $cektun = mysqli_num_rows($sqltun);
      $dj = mysqli_fetch_array($sqltunjang);
      if ($cektun > 0) {
        //buka di tunjangan
      ?>
      <div class="card">
        <div class="card-bdy">
          <div class="row">
            <div class="col-sm-6">
              <table class="table table-responsive">
                <tbody>
                <tr>
                  <th>Gaji Pokok</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['gaji_pokok']); ?></td>
                </tr>
                <tr>
                  <th>Uang Makan</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['uang_makan']); ?></td>
                </tr>
                <tr>
                  <th>Uang Transport</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['uang_transport']); ?></td>
                </tr>
                <tr>
                  <th>Total</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['gaji_pokok'] + $data['uang_makan'] + $data['uang_transport']); ?></td>
                  <td>/</td>
                </tr>
                <tr>
                  <td>Total Jam Kerja</td>
                  <td>:</td>
                  <td class="float-right"> <?= $data['tot_jamkerja']." jam"; ?></td>
                </tr>
                <tr>
                  <th>Upah Perjam</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_prjam']); ?></td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Lembur</td>
                  <td>:</td>
                  <td class="float-right"> <?= $data['lembur']." jam"; ?></td>
                </tr>
                <tr>
                  <th>Upah Lembur</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_lembur']); ?></td>
                </tr>
              </tbody>
              </table>
            </div>
            <div class="col-sm-6">
              <table class="table table-responsive">
                <tr>
                  <td>Hadir</td>
                  <td>:</td>
                  <td class="float-right"> <?= $data['hadir']." x 8"; ?></td>
                </tr>
                <tr>
                  <th>Upah Perjam</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_prjam']); ?></td>
                  <td>+</td>
                </tr>
                <tr>
                  <th>Upah Lembur</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_lembur']); ?></td>
                </tr>
                <tr>
                  <th>Total Gaji</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['hadir'] * 8 * $data['upah_prjam'] + $data['upah_lembur']); ?></td>
                  <td>-</td>
                </tr>
                <tr>
                  <th>BPJS Kesehatan</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($dj['bpjs_kesehatan']); ?></td>
                  <td>-</td>
                </tr>
                <tr>
                  <th>BPJS Ketenaga kerjaan</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($dj['bpjs_kerja']); ?></td>
                  <td>=</td>
                </tr>
                <tr>
                  <th>Take Home Pay</th>
                  <td>:</td>
                  <th class="float-right"> <?= rupiah($data['gaji']); ?></th>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php 
        //tutup di tunjangan
      }else{
        //bukan di pinjaman dan tunjangan
      ?>
      <div class="card">
        <div class="card-bdy">
          <div class="row">
            <div class="col-sm-6">
              <table class="table table-responsive">
                <tbody>
                <tr>
                  <th>Gaji Pokok</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['gaji_pokok']); ?></td>
                </tr>
                <tr>
                  <th>Uang Makan</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['uang_makan']); ?></td>
                </tr>
                <tr>
                  <th>Uang Transport</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['uang_transport']); ?></td>
                </tr>
                <tr>
                  <th>Total</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['gaji_pokok'] + $data['uang_makan'] + $data['uang_transport']); ?></td>
                  <td>/</td>
                </tr>
                <tr>
                  <td>Total Jam Kerja</td>
                  <td>:</td>
                  <td class="float-right"> <?= $data['tot_jamkerja']." jam"; ?></td>
                </tr>
                <tr>
                  <th>Upah Perjam</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_prjam']); ?></td>
                  <td>x</td>
                </tr>
                <tr>
                  <td>Lembur</td>
                  <td>:</td>
                  <td class="float-right"> <?= $data['lembur']." jam"; ?></td>
                </tr>
                <tr>
                  <th>Upah Lembur</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_lembur']); ?></td>
                </tr>
              </tbody>
              </table>
            </div>
            <div class="col-sm-6">
              <table class="table table-responsive">
                <tr>
                  <td>Hadir</td>
                  <td>:</td>
                  <td class="float-right"> <?= $data['hadir']." x 8"; ?></td>
                </tr>
                <tr>
                  <th>Upah Perjam</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_prjam']); ?></td>
                  <td>+</td>
                </tr>
                <tr>
                  <th>Upah Lembur</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['upah_lembur']); ?></td>
                </tr>
                <tr>
                  <th>Total Gaji</th>
                  <td>:</td>
                  <td class="float-right"> <?= rupiah($data['hadir'] * 8 * $data['upah_prjam'] + $data['upah_lembur']); ?></td>
                  <td>=</td>
                </tr>
                <tr>
                  <th>Take Home Pay</th>
                  <td>:</td>
                  <th class="float-right"> <?= rupiah($data['gaji']); ?></th>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php 
      //tutup bukan di pinjaman dan tunjangan
      }

    }
    ?>

	</section>
</div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../plugins/raphael/raphael.min.js"></script>
<script src="../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../../dist/js/pages/dashboard2.js"></script>
<script src="../../plugins/select2/js/select2.min.js"></script>
<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>