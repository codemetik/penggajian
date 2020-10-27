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
                                    <h3 class="box-title">Tambah data user</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label >nama</label>
                                            <input type="text" class="form-control" name="nama" required>
                                        </div>

                                        <div class="form-group">
                                            <label >username</label>
                                            <input type="text" class="form-control" name="username" required>
                                        </div>

                                        <div class="form-group">
                                            <label >password</label>
                                            <input type="text" class="form-control" name="password" required>
                                        </div>

                                        <div class="form-group">
                                            <label >email</label>
                                            <input type="text" class="form-control" name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label >status</label>
                                            <input type="text" class="form-control" name="status" required>
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
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    $query = mysqli_query($db, "INSERT INTO user ( nama, username, password, email, status)VALUES('$nama','$username','$password','$email','$status')");
    if ($query) {
        echo'<script LANGUAGE="JavaScript">
        alert("DATA Tersimpan")
        window.location.href="index.php?pages=user";
        </script>';
    } else {
        echo'<script LANGUAGE="JavaScript">
        alert("Gagal Tersimpan")
        window.location.href="index.php?pages=tambahuser";
        </script>';
    }

}
?>
