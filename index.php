<?php include "header.php"; ?>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">SETTINGS</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Logout
          </a>
          <a href="#" class="dropdown-item dropdown-footer">-</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="img/gaji.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Penggajian</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-2 pb-0 mb-0 d-flex">
        <div class="image">
          <img src="dist/img/user4-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['nama_user']; ?> &raquo; <p><?= $_SESSION['nama_jabatan']; ?></p></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        </ul>
        <hr style="background-color: grey;" class="mb-0 mt-0">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Absensi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=absensi_karyawan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Absensi Karyawan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Penggajian
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=penggajian" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penggajian</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <hr style="background-color: grey;" class="mb-0 mt-0">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Pinjaman
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=pinjaman_karyawan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pinjaman Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=pengembalian_pinjaman" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengembalian Pinjaman</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tunjangan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=tunjangan_kesehatan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tunjangan Kesehatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=tunjangan_bpjs" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tunjangan BPJS</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <hr style="background-color: grey;" class="mb-0 mt-0">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Karyawan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=data_karyawan" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Asset
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=jabatan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jabatan</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <hr style="background-color: grey;" class="mb-0 mt-0">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Data Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=jabatan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap. Absensi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=jabatan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap. Penggajian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=jabatan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lap. Pinjaman</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <hr>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <?php 
        if (isset($_GET['page'])) {
          $page = $_GET['page'];

          switch ($page) {
            case 'absensi_karyawan':
              include "pages/penggajian/absensi_karyawan.php";
              break;
            case 'penggajian':
              include "pages/penggajian/penggajian.php";
              break;
            case 'pinjaman_karyawan':
              include "pages/pinjaman/pinjaman_karyawan.php";
              break;
            case 'data_karyawan':
              include "pages/data_karyawan/data_karyawan.php";
              break;
            case 'update_karyawan':
              include "pages/data_karyawan/update_karyawan.php";
              break;
            case 'input_absen':
              include "pages/penggajian/input_absen.php";
              break;
            case 'update_absensi':
              include "pages/penggajian/update_absensi.php";
              break;
            case 'update_pinjaman':
              include "pages/pinjaman/update_pinjaman.php";
              break;
            case 'pengembalian_pinjaman':
              include "pages/pinjaman/pengembalian_pinjaman.php";
              break;
            case 'jabatan':
              include "pages/data_karyawan/jabatan.php";
              break;
            case 'update_jabatan':
              include "pages/data_karyawan/update_jabatan.php";
              break;
            case 'tunjangan_bpjs':
              include "pages/data_tunjangan/tunjangan_bpjs.php";
              break;
            case 'tunjangan_kesehatan':
              include "pages/data_tunjangan/tunjangan_kesehatan.php";
              break;
            
            default:
              # code...
              break;
          }
        }else{
          include "home.php";
        }
        ?>

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<?php include "footer.php"; ?>