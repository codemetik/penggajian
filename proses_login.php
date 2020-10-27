<?php 
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sqlcek = mysqli_query($koneksi, "SELECT * FROM tb_rols_user X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan WHERE username = '".$username."' AND password = '".$password."' GROUP BY id_rols_user ASC");
	$cek = mysqli_num_rows($sqlcek);
	$data = mysqli_fetch_array($sqlcek);

	if ($cek > 0) {

		$cekjb = mysqli_query($koneksi, "SELECT * FROM tb_rols_user WHERE id_user = '".$data['id_user']."'");
		$jb = mysqli_fetch_array($cekjb);

		if ($jb['id_jabatan'] != 'JBT001' && $jb['id_jabatan'] != 'JBT002') {
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['nama_user'] = $data['nama_user'];
			$_SESSION['nama_jabatan'] = $data['nama_jabatan'];
			
			echo "<script>
			alert('Terimakasih Anda berhasil masuk');
			document.location.href = 'myslip.php';
			</script>";

			//mendapatkan id_jabatan dengan level admin
		}else if($jb['id_jabatan'] == 'JBT002'){

			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['nama_user'] = $data['nama_user'];
			$_SESSION['nama_jabatan'] = $data['nama_jabatan'];

			echo "<script>
			alert('Terimakasih Anda berhasil masuk');
			document.location.href = 'index.php';
			</script>";

			//mendapatkan id_jabatan dengan level direktur
		}else if($jb['id_jabatan'] == 'JBT001'){

			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['nama_user'] = $data['nama_user'];
			$_SESSION['nama_jabatan'] = $data['nama_jabatan'];

			echo "<script>
			alert('Terimakasih Anda berhasil masuk');
			document.location.href = 'mydirektur.php';
			</script>";

		}
		
	}else{
		echo "<script>
		alert('Maaf Anda gagal masuk');
		document.location.href = 'login.php';
		</script>";
	}

}
?>