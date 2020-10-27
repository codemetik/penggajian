<?php 
include "../../koneksi.php";

echo "<option value=''>-- Pilih Jabatan --</option>";

$jbtn = mysqli_query($koneksi, "SELECT * FROM tb_jabatan");
while ($djb = mysqli_fetch_array($jbtn)) {
	echo "<option value='".$djb['id_jabatan']."'>".$djb['nama_jabatan']."</option>";
}
?>