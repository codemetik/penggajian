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
                                    <h3 class="box-title">Edit data user</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($db, "SELECT * FROM user WHERE id_user='$id'");
    while ($tampil = mysqli_fetch_assoc($query)) {
    $id  = $tampil['id_user'];
    $nm = $tampil['nama'];
    $pswd = $tampil['password'];
    $usrnm = $tampil['username'];
    $eml = $tampil['email'];
    $stts = $tampil['status'];
}
}
?>
                                <form method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label >Nama</label>
                                            <input type="text" class="form-control" name="nama" value="<?php echo $nm;?>" required>
                                            <input type="hidden" class="form-control" name="id_u" value="<?php echo $id;?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label >username</label>
                                            <input type="text" class="form-control" name="username" value="<?php echo $usrnm;?>">
                                        </div>

                                        <div class="form-group">
                                            <label >password</label>
                                            <input type="text" class="form-control" name="password" value="<?php echo $pswd;?>">
                                        </div>

                                        <div class="form-group">
                                            <label >email</label>
                                            <input type="text" class="form-control" name="email" value="<?php echo $eml;
                                            ?>">
                                        </div>

                                        <div class="form-group">
                                            <label >status</label>
                                            <input type="text" class="form-control" name="status" value="<?php echo $stts;
                                            ?>">
                                        </div>
                            
                                    
                                    <div class="box-footer">
                                        <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

</section>
                           </aside>
     
<?php

if (isset($_POST['simpan'])) {

        $id_usr = $_POST['id_u'];
        $nama          = $_POST['nama'];
        $username      = $_POST['username'];
        $password      = $_POST['password'];
        $email         = $_POST['email'];
        $stst        = $_POST['status'];

       
        $query = mysqli_query($db, "UPDATE user SET  nama            = '$nama',
                                                        username        = '$username',
                                                        password        = '$password',
                                                        email           = '$email',
                                                        status           = '$stst'
                                                  WHERE id_user         = '$id'");      

        if ($query) {
        echo'<script LANGUAGE="JavaScript">
        alert("DATA Tersimpan")
        window.location.href="index.php?pages=user";
        </script>';
    } else {
        echo'<script LANGUAGE="JavaScript">
        alert("Gagal Tersimpan")
        window.location.href="index.php?pages=user";
        </script>';
    }
}
             
?>

