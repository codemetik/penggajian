<?php 
session_start();
include "../../koneksi.php";
if (!isset($_SESSION['username'])) {
  header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>PT. ZEUSS ALIANSI</title>
  <link rel="icon" href="img/logo.jpeg" type="image/x-icon">
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
        <center><h5>Laporan Penggajian Karyawan</h5></center>
        <center><h5>Periode : <?= $_GET['tgl']; ?></h5></center>
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
      <!-- <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>John Doe</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com
        </address>
      </div>
      
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
    <?php 
    if (isset($_GET['tgl'])) {
      $tgl = $_GET['tgl'];
      ?>

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            
          </div>
          <div class="card-body">
            <?php 
            $dsql = mysqli_query($koneksi, "SELECT * FROM tb_penggajian X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE tgl_periode_gaji = '".$tgl."' GROUP BY z.id_jabatan ASC");
            while ($dta = mysqli_fetch_array($dsql)) { ?>
              <br>
              <h5><b>Jabatan : <?= $dta['nama_jabatan']; ?></b></h5>
              <div class="table-responsive">
                <table class="table table-hover table-bordered table-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
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
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_penggajian X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan WHERE tgl_periode_gaji = '".$tgl."'");
                    $no=1;
                    while ($data = mysqli_fetch_array($sql)) { 
                      if ($dta['id_jabatan'] == $data['id_jabatan']) { ?>
                      
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nip']; ?></td>
                        <td><?= $data['nama_user']; ?></td>
                        <td><?= $data['gaji_pokok']; ?></td>
                        <td><?= $data['hadir']; ?></td>
                        <td><?= $data['lembur']; ?></td>
                        <td><?= $data['jam_perhari']; ?></td>
                        <td><?= $data['tot_jamkerja']; ?></td>
                        <td><?= $data['upah_prjam']; ?></td>
                        <td><?= $data['upah_lembur']; ?></td>
                        <td><?= $data['gaji']; ?></td>
                        <td><?= $data['tgl_periode_gaji']; ?></td>
                        <td><?= $data['tgl_input']; ?></td>
                      </tr>

                    <?php }
                    }
                    ?>
                  </tbody>
                </table>
              </div>

            <?php }
            ?>

          </div>
        </div>
      </div>
    </div>

    <?php }
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