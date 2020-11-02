<?php 
include "../../koneksi.php";

if (isset($_POST['simpan_gaji'])) {
	$id_penggajian = $_POST['id_penggajian'];
	$tgl_periode_gaji = $_POST['tgl_periode_gaji'];
	$id_user = $_POST['id_user'];
	$tgl_input = $_POST['tgl_input'];

	//cek tb_pinjaman
	$sqlpin = mysqli_query($koneksi, "SELECT * FROM tb_pinjaman WHERE id_user = '".$id_user."'");
	$dpin = mysqli_num_rows($sqlpin);
	if ($dpin > 0 ) {
		//cek tb_tunjangan
		$sqltun = mysqli_query($koneksi, "SELECT * FROM tb_tunjangan_user WHERE id_user = '".$id_user."'");
		$dtun = mysqli_num_rows($sqltun);
		if ($dtun > 0 ) {
			
			//insert tb_pinjaman dan tb_tunjangan
			$sql = mysqli_query($koneksi, "SELECT y.id_user, y.id_jabatan, id_gaji,id_absensi, gaji_pokok, hadir, lembur,8 AS jam_perhari, @tot:= 8 * TIMESTAMPDIFF(DAY, tgl_ab_awal,tgl_ab_akhir) AS tot_jamkerja, @upah:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) AS upah_prjam, @lembur:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) * lembur AS lemb, hadir * 8 * @upah + @lembur - SUM(nominal_tunjangan) - jumlah_pinjaman AS gaji FROM tb_gaji X INNER JOIN tb_rols_user Y ON y.id_jabatan = x.id_jabatan INNER JOIN tb_absensi z ON z.id_user = y.id_user INNER JOIN tb_pinjaman c ON c.id_user = y.id_user INNER JOIN tb_tunjangan_user a ON a.id_user = y.id_user INNER JOIN tb_tunjangan b ON b.id_tunjangan = a.id_tunjangan WHERE y.id_user = '".$id_user."' GROUP BY y.id_user ASC");
			$data = mysqli_fetch_array($sql);

			$insert = mysqli_query($koneksi, "INSERT INTO tb_penggajian(id_penggajian, id_user, id_jabatan, id_gaji, id_absensi, gaji_pokok, hadir, lembur, jam_perhari, tot_jamkerja, upah_prjam, upah_lembur, gaji, tgl_periode_gaji, tgl_input) VALUES('$id_penggajian', '".$data['id_user']."', '".$data['id_jabatan']."', '".$data['id_gaji']."', '".$data['id_absensi']."', '".$data['gaji_pokok']."', '".$data['hadir']."', '".$data['lembur']."', '".$data['jam_perhari']."', '".$data['tot_jamkerja']."', '".$data['upah_prjam']."', '".$data['lemb']."', '".$data['gaji']."', '".$tgl_periode_gaji."', '".$tgl_input."')");

			$delete = mysqli_query($koneksi, "DELETE FROM tb_pengembalian_pinjaman WHERE id_user = '".$id_user."'");
			$update = mysqli_query($koneksi, "UPDATE tb_pinjaman SET jumlah_pinjaman = '0', keterangan = 'LUNAS' WHERE id_user = '".$id_user."'");

			//mendapatkan nominal_tunjangan kesehatan
			$sqlkes = mysqli_query($koneksi, "SELECT x.id_user, y.id_tunjangan , nominal_tunjangan FROM tb_penggajian X INNER JOIN tb_tunjangan_user Y ON y.id_user = x.id_user INNER JOIN tb_tunjangan z ON z.id_tunjangan = y.id_tunjangan WHERE y.id_tunjangan = 'TUNJ001' AND x.id_user = '".$id_user."'");
			//mendapatkan nominal_tunjangan bpjs
			$sqlbpjs = mysqli_query($koneksi, "SELECT x.id_user, y.id_tunjangan , nominal_tunjangan FROM tb_penggajian X INNER JOIN tb_tunjangan_user Y ON y.id_user = x.id_user INNER JOIN tb_tunjangan z ON z.id_tunjangan = y.id_tunjangan WHERE y.id_tunjangan = 'TUNJ002' AND x.id_user = '".$id_user."'");
			$dkes = mysqli_fetch_array($sqlkes);
			$dbpjs = mysqli_fetch_array($sqlbpjs);
			//insert tb_tabungan_bpjs
			$insert_tabungan = mysqli_query($koneksi, "INSERT INTO tb_tabungan_tunjangan(id_user, tunjangan_kesehatan, tunjangan_bpjs, tgl_angsuran) VALUES('".$id_user."','".$dkes['nominal_tunjangan']."','".$dbpjs['nominal_tunjangan']."','".$tgl_input."')");
			

			if ($insert && $update && $delete && $insert_tabungan) {
				echo "<script>
				alert('Data Penggajian Berhasil disimpan');
				document.location.href = '../../index.php?page=penggajian';
				</script>";
			}else{
				echo "<script>
				alert('Data Penggajian Berhasil disimpan');
				document.location.href = '../../index.php?page=penggajian';
				</script>";
			}

		}else{
			//insert hanya tb_pinjaman
			$sql = mysqli_query($koneksi, "SELECT y.id_user, y.id_jabatan, id_gaji,id_absensi, gaji_pokok, hadir, lembur, 8 AS jam_perhari, @tot:= 8 * TIMESTAMPDIFF(DAY, tgl_ab_awal,tgl_ab_akhir) AS tot_jamkerja, @upah:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) AS upah_prjam, @lembur:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) * lembur AS lemb, (hadir * 8 * @upah + @lembur) - jumlah_pinjaman AS gaji FROM tb_gaji X INNER JOIN tb_rols_user Y ON y.id_jabatan = x.id_jabatan INNER JOIN tb_absensi z ON z.id_user = y.id_user INNER JOIN tb_pinjaman a ON a.id_user = y.id_user WHERE y.id_user = '".$id_user."'");
			$data = mysqli_fetch_array($sql);

			$insert = mysqli_query($koneksi, "INSERT INTO tb_penggajian(id_penggajian, id_user, id_jabatan, id_gaji, id_absensi, gaji_pokok, hadir, lembur,jam_perhari, tot_jamkerja, upah_prjam, upah_lembur , gaji, tgl_periode_gaji, tgl_input) VALUES('$id_penggajian', '".$data['id_user']."', '".$data['id_jabatan']."', '".$data['id_gaji']."', '".$data['id_absensi']."', '".$data['gaji_pokok']."', '".$data['hadir']."', '".$data['lembur']."', '".$data['jam_perhari']."', '".$data['tot_jamkerja']."', '".$data['upah_prjam']."', '".$data['lemb']."','".$data['gaji']."', '".$tgl_periode_gaji."', '".$tgl_input."')");

			$delete = mysqli_query($koneksi, "DELETE FROM tb_pengembalian_pinjaman WHERE id_user = '".$id_user."'");
			$update = mysqli_query($koneksi, "UPDATE tb_pinjaman SET jumlah_pinjaman = '0', keterangan = 'LUNAS' WHERE id_user = '".$id_user."'");


			if ($insert && $update && $delete) {
				echo "<script>
				alert('Data Penggajian Berhasil disimpan');
				document.location.href = '../../index.php?page=penggajian';
				</script>";
			}else{
				echo "<script>
				alert('Data Penggajian Berhasil disimpan');
				document.location.href = '../../index.php?page=penggajian';
				</script>";
			}

		}

	}else{

		//cek tb_tunjangan
		$sqltun = mysqli_query($koneksi, "SELECT * FROM tb_tunjangan_user WHERE id_user = '".$id_user."'");
		$dtun = mysqli_num_rows($sqltun);
		if ($dtun > 0 ) {
			
			//insert hanya tb_tunjangan
			$sql = mysqli_query($koneksi, "SELECT y.id_user, y.id_jabatan, id_gaji,id_absensi, gaji_pokok, hadir, lembur, 8 AS jam_perhari, @tot:= 8 * TIMESTAMPDIFF(DAY, tgl_ab_awal,tgl_ab_akhir) AS tot_jamkerja, @upah:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) AS upah_prjam, @lembur:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) * lembur AS lemb, hadir * 8 * @upah + @lembur - SUM(nominal_tunjangan) AS gaji FROM tb_gaji X INNER JOIN tb_rols_user Y ON y.id_jabatan = x.id_jabatan INNER JOIN tb_absensi z ON z.id_user = y.id_user LEFT JOIN tb_tunjangan_user a ON a.id_user = y.id_user INNER JOIN tb_tunjangan b ON b.id_tunjangan = a.id_tunjangan WHERE y.id_user = '".$id_user."' GROUP BY y.id_user ASC");
			$data = mysqli_fetch_array($sql);

			$insert = mysqli_query($koneksi, "INSERT INTO tb_penggajian(id_penggajian, id_user, id_jabatan, id_gaji, id_absensi, gaji_pokok, hadir, lembur,jam_perhari, tot_jamkerja, upah_prjam, upah_lembur, gaji, tgl_periode_gaji, tgl_input) VALUES('$id_penggajian', '".$data['id_user']."', '".$data['id_jabatan']."', '".$data['id_gaji']."', '".$data['id_absensi']."', '".$data['gaji_pokok']."', '".$data['hadir']."', '".$data['lembur']."','".$data['jam_perhari']."', '".$data['tot_jamkerja']."', '".$data['upah_prjam']."', '".$data['lemb']."','".$data['gaji']."', '".$tgl_periode_gaji."', '".$tgl_input."')");

			//mendapatkan nominal_tunjangan kesehatan
			$sqlkes = mysqli_query($koneksi, "SELECT x.id_user, y.id_tunjangan , nominal_tunjangan FROM tb_penggajian X INNER JOIN tb_tunjangan_user Y ON y.id_user = x.id_user INNER JOIN tb_tunjangan z ON z.id_tunjangan = y.id_tunjangan WHERE y.id_tunjangan = 'TUNJ001' AND x.id_user = '".$id_user."'");
			//mendapatkan nominal_tunjangan bpjs
			$sqlbpjs = mysqli_query($koneksi, "SELECT x.id_user, y.id_tunjangan , nominal_tunjangan FROM tb_penggajian X INNER JOIN tb_tunjangan_user Y ON y.id_user = x.id_user INNER JOIN tb_tunjangan z ON z.id_tunjangan = y.id_tunjangan WHERE y.id_tunjangan = 'TUNJ002' AND x.id_user = '".$id_user."'");
			$dkes = mysqli_fetch_array($sqlkes);
			$dbpjs = mysqli_fetch_array($sqlbpjs);
			//insert tb_tabungan_bpjs
			$insert_tabungan = mysqli_query($koneksi, "INSERT INTO tb_tabungan_tunjangan(id_user, tunjangan_kesehatan, tunjangan_bpjs, tgl_angsuran) VALUES('".$id_user."','".$dkes['nominal_tunjangan']."','".$dbpjs['nominal_tunjangan']."','".$tgl_input."')");

			if ($insert && $insert_tabungan) {
				echo "<script>
				alert('Data Penggajian Berhasil disimpan');
				document.location.href = '../../index.php?page=penggajian';
				</script>";
			}else{
				echo "<script>
				alert('Data Penggajian Berhasil disimpan');
				document.location.href = '../../index.php?page=penggajian';
				</script>";
			}

		}else{

			//insert tanpa tb_pinjaman dan tb_tunjangan
			$sql = mysqli_query($koneksi, "SELECT y.id_user, y.id_jabatan, id_gaji,id_absensi, gaji_pokok, hadir, lembur, 8 AS jam_perhari, @tot:= 8 * TIMESTAMPDIFF(DAY, tgl_ab_awal,tgl_ab_akhir) AS tot_jamkerja, @upah:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) AS upah_prjam, @lembur:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) * lembur AS lemb, hadir * 8 * @upah + @lembur AS gaji FROM tb_gaji X INNER JOIN tb_rols_user Y ON y.id_jabatan = x.id_jabatan INNER JOIN tb_absensi z ON z.id_user = y.id_user WHERE y.id_user = '".$id_user."'");
			$data = mysqli_fetch_array($sql);

			
			$insert = mysqli_query($koneksi, "INSERT INTO tb_penggajian(id_penggajian, id_user, id_jabatan, id_gaji, id_absensi, gaji_pokok, hadir, lembur, jam_perhari, tot_jamkerja, upah_prjam, upah_lembur, gaji, tgl_periode_gaji, tgl_input) VALUES('$id_penggajian', '".$data['id_user']."', '".$data['id_jabatan']."', '".$data['id_gaji']."', '".$data['id_absensi']."', '".$data['gaji_pokok']."', '".$data['hadir']."', '".$data['lembur']."','".$data['jam_perhari']."', '".$data['tot_jamkerja']."', '".$data['upah_prjam']."', '".$data['lemb']."', '".$data['gaji']."', '".$tgl_periode_gaji."', '".$tgl_input."')");
			if ($insert) {
				echo "<script>
				alert('Data Penggajian Berhasil disimpan');
				document.location.href = '../../index.php?page=penggajian';
				</script>";
			}else{
				echo "<script>
				alert('Data Penggajian Berhasil disimpan');
				document.location.href = '../../index.php?page=penggajian';
				</script>";
			}

		}

	}
}
?>