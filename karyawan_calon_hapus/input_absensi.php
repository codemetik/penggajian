<aside class="right-side">
    <section class="content-header">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Tambah data absensi</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label >Nama</label>
                                            <input type="text" class="form-control" name="nama" required>
                                        </div>

                                        <div class="form-group">
                                            <label >Absen bulan</label>
                                            <input type="text" class="form-control" name="absen" required>
                                        </div>
                                            
                                        <div class="form-group">
                                            <label >Jumlah absen</label>
                                            <input type="text" class="form-control" name="bulan" required>
                                        </div>

                                        <div class="form-group">
                                            <label >Jumlah izin</label>
                                            <input type="text" class="form-control" name="izin" required>
                                        </div>

                                        <div class="form-group">
                                            <label >Jumlah sakit</label>
                                            <input type="text" class="form-control" name="sakit" required>
                                        </div>

                                        <div class="form-group">
                                            <label >Jumlah lembur</label>
                                            <input type="text" class="form-control" name="lembur" required>
                                        </div>

                                    <div class="box-footer">
                                        <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

</section>
                           </aside>
     
<?php
include "config/koneksi.php";

if (isset($_POST['simpan'])) {
    
    
    $nama = $_POST['nama'];
    $absen = $_POST['absen bulan'];
    $bulan = $_POST['jumlah bulan'];
    $izin = $_POST['jumlah izin'];
    $sakit = $_POST['jumlah sakit'];
    $jumlah_lembur = $_POST['jumlah lembur'];

    $query = mysqli_query($db, "INSERT INTO absensi ( nama, absen_bulan, jumlah_absen, jumlah_izin, jumlah_sakit, jumlah_lembur)VALUES('$nama','$absen bulan','$jumlah bulan','$jumlah izin','$jumlah sakit','$jumlah lembur')");
    if ($query) {
        echo'<script LANGUAGE="JavaScript">
        alert("DATA Tersimpan")
        window.location.href="index.php?pages=absensi";
        </script>';
    } else {
        echo'<script LANGUAGE="JavaScript">
        alert("Gagal Tersimpan")
        window.location.href="index.php?pages=tambahabsensi";
        </script>';
    }

}
?>
