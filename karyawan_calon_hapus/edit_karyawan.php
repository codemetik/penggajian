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
                                            <label >Nip Karyawan</label>
                                            <input type="text" class="form-control" name="nip" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label >Nama Karyawan</label>
                                            <input type="text" class="form-control" name="nama" required>
                                        </div>
                            
                                        <div class="form-group">
                                            <label >Divisi</label>
                                            <input type="text" class="form-control" name="divisi"required>
                                        </div>

                                        <div class="form-group">
                                            <label >Alamat</label>
                                            <input type="text" class="form-control" name="alamat"required>
                                        </div>

                                        <div class="form-group">
                                            <label >Pendidikan</label>
                                            <input type="text" class="form-control" name="pendidikan"required>
                                        </div>

                                        <div class="form-group">
                                            <label >Tgl masuk</label>
                                            <input type="date" class="form-control" name="tgl"required>
                                        </div>

                                        <div class="form-group">
                                            <label >Jabatan</label>
                                            <input type="text" class="form-control" name="jabatan"required>
                                        </div>

                                        <div class="form-group">
                                            <label >Status</label>
                                            <input type="text" class="form-control" name="status"required>
                                        </div>

                                        <div class="form-group">
                                            <label >Agama</label>
                                            <input type="text" class="form-control" name="agama"required>
                                        </div>

                                        <div class="form-group">
                                            <label >Jenis Kelamin</label>
                                            <input type="text" class="form-control" name="Jenis"required>
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
    
    $Nip_karyawan = $_POST['Nip_k'];
    $nama = $_POST['nama'];
    $divisi = $_POST['divisi'];
    $alamat = $_POST['alamat'];
    $pendidikan = $_POST['pendidikan'];
    $tgl = $_POST['tgl'];
    $status = $_POST['status'];
    $agama = $_POST['agama'];
    $jenis = $_POST['Jenis'];
    $jabatan = $_POST ['jabatan'];

    $query = mysqli_query($db, "UPDATE user SET  nama                = '$nama',
                                                        divisi       = '$divisi',
                                                        alamat       = '$alamat',
                                                        pendidikan   = '$pendidikan',
                                                        tgl          = '$tgl'
                                                        status       = '$status'
                                                        agama        = '$agama'
                                                        jenis        = '$Jenis'
                                                        jabatan      = '$jabatan'
                                                  WHERE Nip_karyawan      = '$Nip'");      

        if ($query) {
        echo'<script LANGUAGE="JavaScript">
        alert("DATA Tersimpan")
        window.location.href="index.php?pages=karyawan";
        </script>';
    } else {
        echo'<script LANGUAGE="JavaScript">
        alert("Gagal Tersimpan")
        window.location.href="index.php?pages=karyawan";
        </script>';
    }
}
             
?>
