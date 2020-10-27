<?php
// Panggil koneksi database


if (isset($_GET['Nip'])) {

	$id = $_GET['Nip'];
	
	// perintah query untuk menghapus data pada tabel is_siswa
	$query = mysqli_query($db, "DELETE FROM karyawan WHERE Nip_karyawan='$Nip'");

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		echo '<script LANGUAGE="JavaScript">
            alert("Anggota berhasil di hapus")
            window.location.href="index.php?pages=karyawan";
            </script>'; 
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}	
}				
?>	
}							
?>