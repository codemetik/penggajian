<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistem Informasi Penggajian</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <body class="skin-black">

        <header class="header">
            <a href="index.html" class="logo">
Penggajian
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
               
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                                      
                        <!-- Notifications: style can be found in dropdown.less -->
                        
                        <!-- Tasks: style can be found in dropdown.less -->
                        
                                      
                                     
                                    
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>User </span>
                            </a>
                            
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php?pages=home">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="index.php?pages=karyawan">
                                <i class="fa fa-dashboard"></i> <span>Data Karyawan</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="index.php?pages=divisi">
                                <i class="fa fa-dashboard"></i> <span>Divisi</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="index.php?pages=jabatan">
                                <i class="fa fa-dashboard"></i> <span>Jabatan</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="index.php?pages=absensi">
                                <i class="fa fa-dashboard"></i> <span>Absensi</span>
                            </a>
                        </li>
                        
                        <li class="active">
                            <a href="index.php?pages=pinjaman">
                                <i class="fa fa-dashboard"></i> <span>Pinjaman</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="index.php?pages=user">
                                <i class="fa fa-dashboard"></i> <span>User</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="index.php?pages=penggajian">
                                <i class="fa fa-dashboard"></i> <span>Penggajian</span>
                            </a>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            
        <?php
        if(isset($_GET['pages'])){
            $page = $_GET['pages'];
            switch ($page){

                case 'home':
                include "pages/karyawan/home.php";
                break;    
                case 'karyawan':
                include "pages/karyawan/karyawan.php";
                break;
                case 'tambahkaryawan':
                include "pages/karyawan/input_karyawan.php";
                break;
                case 'ubahkaryawan':
                include "pages/karyawan/edit_karyawan.php";
                break;
                case 'hapuskaryawan':
                include "pages/karyawan/hapuskaryawan.php";
                break;
                case 'divisi':
                include "pages/karyawan/divisi.php";
                break;
                 case 'tambahdivisi':
                include "pages/karyawan/input_divisi.php";
                break;
                case 'jabatan':
                include "pages/karyawan/jabatan.php";
                break;
                case 'tambahjabatan':
                include "pages/karyawan/input_jabatan.php";
                break;
                case 'absensi':
                include "pages/karyawan/absensi.php";
                break;
                case 'tambahabsensi':
                include "pages/karyawan/input_absensi.php";
                break;
                case 'pinjaman':
                include "pages/karyawan/pinjaman.php";
                break;
                case 'tambahpinjaman':
                include "pages/karyawan/input_pinjaman.php";
                break;
                case 'user':
                include "pages/karyawan/tabel_user.php";
                break;                
                case 'tambahuser':
                include "pages/karyawan/input_user.php";
                break;
                case 'ubahuser':
                include "pages/karyawan/edit_user.php";
                break;
                case 'hapususer':
                include "pages/karyawan/hapususer.php";
                break;
                case 'penggajian':
                include "pages/karyawan/penggajian.php";
                break;
                case 'tambahpenggajian':
                include "pages/karyawan/input_penggajian.php";
                break;

            }
        }else{
            include "pages/karyawan/home.php";
        }

        ?>



        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/plugins/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/plugins/AdminLTE/app.js" type="text/javascript"></script>

    </body>
</html>