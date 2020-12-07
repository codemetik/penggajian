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
          <a href="myslip.php?pages_slip=mydata" class="dropdown-item">
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
    <a href="myslip.php?page=home" class="brand-link bg-orange">
      <img src="img/logo.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MySlip</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user4-128x128.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="myslip.php?page=home" class="d-block text-white"><?= $_SESSION['nama_user']; ?> &raquo; <p><?= $_SESSION['nama_jabatan']; ?></p></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview">
            <a href="myslip.php?page=home" class="nav-link text-white">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-table"></i>
              <p>
                My Pay
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="myslip.php?pages_slip=payroll" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payroll</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="myslip.php?pages_slip=history_pay" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>History</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tanggungan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="myslip.php?pages_slip=pinjaman" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pinjaman</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tabungan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="myslip.php?pages_slip=tabungan_kesehatan" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kesehatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="myslip.php?pages_slip=tabungan_bpjs" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BPJS</p>
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
        if (isset($_GET['pages_slip'])) {
          $page = $_GET['pages_slip'];
          switch ($page) {
            case 'home':
              include "pages_slip/home.php";
              break;
            case 'payroll':
              include "pages_slip/payroll.php";
              break;
            case 'history_pay':
              include "pages_slip/history_pay.php";
              break;
            case 'pinjaman':
              include "pages_slip/pinjaman.php";
              break;
            case 'tabungan_kesehatan':
              include "pages_slip/tabungan_kesehatan.php";
              break;
            case 'tabungan_bpjs':
              include "pages_slip/tabungan_bpjs.php";
              break;
            case 'mydata':
              include "pages_slip/mydata.php";
              break;
            
            default:
              # code...
              break;
          }
        }else{
          include "pages_slip/home.php";
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