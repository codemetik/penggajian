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
                                    <h3 class="box-title">Tambah data karyawan</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label >Kode divisi</label>
                                            <input type="text" class="form-control" name="kode" required>
                                        </div>

                                        <div class="form-group">
                                            <label >Nama divisi</label>
                                            <input type="text" class="form-control" name="nama" required>
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
    
    
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];

    $query = mysqli_query($db, "INSERT INTO divisi ( nama_divisi, kd_divisi)VALUES('$nama','$kode')");
    if ($query) {
        echo'<script LANGUAGE="JavaScript">
        alert("DATA Tersimpan")
        window.location.href="index.php?pages=divisi";
        </script>';
    } else {
        echo'<script LANGUAGE="JavaScript">
        alert("Gagal Tersimpan")
        window.location.href="index.php?pages=tambahdivisi";
        </script>';
    }

}
?>
