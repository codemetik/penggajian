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
                                    <h3 class="box-title">Tambah data pinjaman</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form method="POST">
                                    <div class="box-body">
                                    
                                        <div class="form-group">
                                            <label >No pinjaman</label>
                                            <input type="text" class="form-control" name="pinjaman" required>
                                        </div>
                                            
                                        <div class="form-group">
                                            <label >Nama karyawan</label>
                                            <input type="text" class="form-control" name="nama" required>
                                        </div>

                                        <div class="form-group">
                                            <label >Jumlah pinjaman</label>
                                            <input type="text" class="form-control" name="jumlah" required>
                                        </div>

                                        <div class="form-group">
                                            <label >Tanggal pinjaman</label>
                                            <input type="date" class="form-control" name="tanggal" required>
                                        </div>

                                        <div class="form-group">
                                            <label >Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan" required>
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
    
    $pinjaman = $_POST['pinjaman'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    $query = mysqli_query($db, "INSERT INTO pinjaman ( no_pinjaman, nama_karyawan, jumlah_pinjaman, tanggal_pinjaman, keterangan)VALUES('$pinjaman','$nama','$jumlah','$tanggal','$keterangan')");
    if ($query) {
        echo'<script LANGUAGE="JavaScript">
        alert("DATA Tersimpan")
        window.location.href="index.php?pages=pinjaman";
        </script>';
    } else {
        echo'<script LANGUAGE="JavaScript">
        alert("Gagal Tersimpan")
        window.location.href="index.php?pages=tambahpinjaman";
        </script>';
    }

}
?>
