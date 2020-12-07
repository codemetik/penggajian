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
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right bg-orange">
          <span class="dropdown-item dropdown-header">SETTINGS</span>
          <div class="dropdown-divider"></div>
          <a href="mydirektur.php?pages_direct=profile" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
          <a href="#" class="dropdown-item dropdown-footer">-</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary bg-orange elevation-4">
    <!-- Brand Logo -->
    <a href="mydirektur.php?pages_direct=home" class="brand-link bg-orange">
      <img src="img/logo.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>PT. ZEUSS</b> ALIANSI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user4-128x128.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="mydirektur.php?pages_direct=home" class="d-block text-white"><?= $_SESSION['nama_user']; ?> &raquo; <p><?= $_SESSION['nama_jabatan']; ?></p></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview">
            <a href="mydirektur.php?pages_direct=home" class="nav-link text-white">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?pages_direct=data_jabatan" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jabatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?pages_direct=data_karyawan" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?pages_direct=data_tunjangan" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Tunjangan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?pages_direct=laporan_absensi" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Absensi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?pages_direct=laporan_pinjaman" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Pinjaman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?pages_direct=laporan_penggajian" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Penggajian</p>
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
        if (isset($_GET['pages_direct'])) {
          $page = $_GET['pages_direct'];
          switch ($page) {
            case 'home':
              include "pages_direct/home.php";
              break;
            case 'data_jabatan':
              include "pages_direct/master_data/data_jabatan.php";
              break;
            case 'data_karyawan':
              include "pages_direct/master_data/data_karyawan.php";
              break;
            case 'data_tunjangan':
              include "pages_direct/master_data/data_tunjangan.php";
              break;
            case 'laporan_absensi':
              include "pages_direct/laporan/laporan_absensi.php";
              break;
            case 'laporan_pinjaman':
              include "pages_direct/laporan/laporan_pinjaman.php";
              break;
            case 'laporan_penggajian':
              include "pages_direct/laporan/laporan_penggajian.php";
              break;
            case 'profile':
              include "pages_direct/profile.php";
              break;
            
            default:
              # code...
              break;
          }
        }else{
          include "pages_direct/home.php";
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