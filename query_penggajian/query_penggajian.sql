SELECT * FROM tb_user
SELECT * FROM tb_jenis_kelamin

SELECT * FROM tb_rols_user
SELECT * FROM tb_jabatan

SELECT * FROM tb_rols_user X
INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan
GROUP BY id_rols_user ASC

SELECT * FROM tb_absensi

SELECT * FROM tb_olah_absen WHERE MONTH(tgl_ab_akhir) = '11'

SELECT (200/100)*100

/*potongan gaji*/
SELECT CONCAT('Rp',FORMAT(ROUND(((5000000/100)*100)/30)*30,0))

SELECT ROUND(33333*30)
SELECT ROUND(((1000000/100)*100)/30)*30
SELECT ROUND(33333*30)

SELECT * FROM tb_gaji

SELECT id_jabatan, gaji_pokok, CONCAT('Rp. ',FORMAT((((gaji_pokok/100)*100)/21)*21,0)) FROM tb_gaji


SELECT * FROM tb_absensi X INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan 
WHERE YEAR(tgl_ab_akhir) = YEAR(NOW()) AND MONTH(tgl_ab_akhir) = MONTH(NOW()) OR MONTH(tgl_ab_akhir) LIKE '10'

SELECT id_user, tgl_ab_awal, tgl_ab_akhir, TIMESTAMPDIFF(DAY,tgl_ab_awal, tgl_ab_akhir) FROM tb_absensi


SELECT * FROM tb_absensi WHERE tgl_ab_akhir = DATE(NOW())

SELECT MONTH(tgl_ab_akhir) FROM tb_absensi

SELECT MONTH(NOW())
SELECT CONCAT(YEAR(NOW()),'-',MONTH(NOW()))

SELECT * FROM tb_absensi WHERE YEAR(tgl_ab_akhir) LIKE YEAR(NOW()) AND MONTH(tgl_ab_akhir) LIKE MONTH(NOW())

SELECT * FROM tb_absensi WHERE YEAR(tgl_ab_akhir) = YEAR(NOW()) AND MONTH(tgl_ab_akhir) = MONTH(NOW())

SELECT CURDATE()

SELECT id_jabatan, gaji_pokok, CONCAT('Rp. ',FORMAT((((gaji_pokok/100)*100)/21)*21,0)) FROM tb_gaji

SELECT x.id_user, hadir, sakit, ijin, lembur, TIMESTAMPDIFF(DAY, tgl_ab_awal, tgl_ab_akhir) AS selisih_tgl, 
gaji_pokok, uang_makan, uang_transport, gaji_pokok+uang_makan+uang_transport AS tot_gaji
FROM tb_absensi X
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user
INNER JOIN tb_gaji z ON z.id_jabatan = y.id_jabatan

SELECT * FROM tb_pinjaman

SELECT COUNT(*) FROM tb_absensi X
INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_rols_user z ON z.id_user = x.id_user
INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan
WHERE YEAR(tgl_ab_akhir) = YEAR(NOW()) AND MONTH(tgl_ab_akhir) = MONTH(NOW())


SELECT TIMESTAMPDIFF(DAY,tgl_ab_awal, tgl_ab_akhir) + 1 AS hasil FROM tb_absensi

SELECT COUNT(*) AS isi FROM tb_rols_user X INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan GROUP BY id_rols_user ASC

SELECT * FROM tb_pinjaman X
INNER JOIN tb_user Y ON y.id_user = x.id_user

SELECT * FROM tb_pengembalian_pinjaman X
INNER JOIN tb_user Y ON y.id_user = x.id_user

SELECT * FROM tb_jabatan X
INNER JOIN tb_gaji Y ON y.id_jabatan = x.id_jabatan

SELECT * FROM tb_tunjangan

SELECT x.id_user, nip, nama_user, jenis_kelamin, nama_jabatan, tgl_masuk_user, TIMESTAMPDIFF(MONTH, tgl_masuk_user,NOW()) AS masa_kerja 
FROM tb_rols_user X 
INNER JOIN tb_user Y ON y.id_user = x.id_user 
INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan 
GROUP BY id_rols_user ASC

SELECT * FROM tb_tunjangan X
INNER JOIN tb_tunjangan_user Y ON y.id_tunjangan = x.id_tunjangan
INNER JOIN tb_user z ON z.id_user = y.id_user

SELECT * FROM tb_tunjangan_user

SELECT * FROM tb_user
SELECT * FROM tb_rols_user
SELECT * FROM tb_jabatan
SELECT * FROM tb_gaji
SELECT * FROM tb_tunjangan_user
SELECT * FROM tb_tunjangan

SELECT * FROM tb_rols_user X
INNER JOIN tb_gaji Y ON y.id_jabatan = x.id_jabatan
INNER JOIN tb_tunjangan_user z ON z.id_user = x.id_user

INNER JOIN tb_pinjaman a ON a.id_user = x.id_user


SELECT * FROM tb_rols_user X
INNER JOIN tb_gaji Y ON y.id_jabatan = x.id_jabatan
INNER JOIN tb_tunjangan_user z ON z.id_user = x.id_user
INNER JOIN tb_tunjangan a ON a.id_tunjangan = z.id_tunjangan

SELECT * FROM tb_user
SELECT * FROM tb_rols_user
SELECT * FROM tb_jabatan
SELECT * FROM tb_gaji
SELECT * FROM tb_tunjangan_user
SELECT * FROM tb_tunjangan
SELECT * FROM tb_pinjaman

SELECT x.id_user, x.id_jabatan, id_gaji, z.id_tunjangan,gaji_pokok, uang_makan, uang_transport, nominal_tunjangan
FROM tb_rols_user X
INNER JOIN tb_gaji Y ON y.id_jabatan = x.id_jabatan
INNER JOIN tb_tunjangan_user z ON z.id_user = x.id_user
INNER JOIN tb_tunjangan a ON a.id_tunjangan = z.id_tunjangan
INNER JOIN tb_pinjaman b ON b.id_user = x.id_user

SELECT x.id_user, nip, nama_user, y.id_jabatan, nama_jabatan,id_gaji, gaji_pokok, uang_makan, uang_transport, b.id_user, jumlah_pinjaman 
FROM tb_user X
LEFT JOIN tb_pinjaman b ON b.id_user = x.id_user
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user
INNER JOIN tb_jabatan z ON z.id_jabatan = y.id_jabatan
INNER JOIN tb_gaji a ON a.id_jabatan = y.id_jabatan
 
WHERE x.id_user != b.id_user

SELECT * FROM tb_pinjaman
SELECT COUNT(*) AS isi FROM tb_absensi X 
INNER JOIN tb_user Y ON y.id_user = x.id_user
INNER JOIN tb_rols_user z ON z.id_user = x.id_user 
INNER JOIN tb_jabatan a ON a.id_jabatan = z.id_jabatan 
WHERE YEAR(tgl_ab_akhir) = YEAR(NOW()) AND MONTH(tgl_ab_akhir) = MONTH(NOW())

SELECT DISTINCT x.id_user, IF(x.id_user != y.id_user, 'yes', 'no')  FROM tb_user X
INNER JOIN tb_absensi Y 
WHERE y.id_user != x.id_user

SELECT * FROM tb_olah_absen

SELECT * FROM tb_rols_user X
INNER JOIN tb_user Y ON  y.id_user = x.id_user
INNER JOIN tb_jabatan z ON z.id_jabatan = x.id_jabatan

SELECT x.id_user, nip, nama_user, y.id_jabatan, nama_jabatan,id_gaji, gaji_pokok, uang_makan, uang_transport, b.id_user, jumlah_pinjaman 
FROM tb_user X
LEFT JOIN tb_pinjaman b ON b.id_user = x.id_user
INNER JOIN tb_rols_user Y ON y.id_user = x.id_user
INNER JOIN tb_jabatan z ON z.id_jabatan = y.id_jabatan
INNER JOIN tb_gaji a ON a.id_jabatan = y.id_jabatan

SELECT x.id_user, x.id_jabatan,id_pinjaman, nama_user, gaji_pokok, uang_makan, uang_transport, jumlah_pinjaman,
IF(x.id_user = y.id_user, 'benar','salah') AS hasil 
FROM tb_rols_user X
LEFT JOIN tb_pinjaman Y ON y.id_user = x.id_user
INNER JOIN tb_gaji b ON b.id_jabatan = x.id_jabatan
INNER JOIN tb_user z ON z.id_user = x.id_user
LEFT JOIN tb_tunjangan_user a ON a.id_user = x.id_user

IF(x.id_user = y.id_user, (gaji_pokok+uang_makan+uang_transport)-jumlah_pinjaman AS tot,gaji_pokok+uang_makan+uang_transport AS tot2 ) AS hasil

SELECT * FROM tb_pinjaman
jumlah_pinjaman

SELECT * FROM tb_pengembalian_pinjaman
jumlah_pengembalian

SELECT IF(550000 > 0, 'benar','salah')

SELECT id_user, id_pinjaman FROM tb_user
NATURAL LEFT JOIN tb_pinjaman

SELECT * FROM tb_user
NATURAL LEFT JOIN tb_tunjangan_user 
GROUP BY id_user

SELECT * FROM tb_absensi
SELECT * FROM tb_rols_user
SELECT * FROM tb_gaji

SELECT id_jabatan, gaji_pokok, ROUND((gaji_pokok/30)*30/100)*100 AS jml_ptongan  FROM tb_gaji

SELECT id_jabatan, gaji_pokok, (gaji_pokok/100)*50 FROM tb_gaji

SELECT x.id_user, x.id_jabatan, id_absensi ,gaji_pokok, hadir  FROM tb_rols_user X
INNER JOIN tb_gaji Y ON y.id_jabatan = x.id_jabatan 
INNER JOIN tb_absensi z ON z.id_user = x.id_user

SELECT x.id_jabatan, gaji_pokok, ROUND((gaji_pokok/30)*hadir/100)*100 AS jml_ptongan,
ROUND(((gaji_pokok/30)*hadir/100)*100) + uang_makan + uang_transport
FROM tb_gaji X
INNER JOIN tb_rols_user Y ON y.id_jabatan = x.id_jabatan
INNER JOIN tb_absensi z ON z.id_user = y.id_user

SELECT * FROM tb_rols_user

//gaji_pokok
SELECT y.id_user, y.id_jabatan, id_gaji,id_absensi, gaji_pokok, hadir, 8 AS jam_perhari,
@tot:= 8 * TIMESTAMPDIFF(DAY, tgl_ab_awal,tgl_ab_akhir) AS tot_jamkerja,
@upah:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) AS upah_prjam,
hadir * 8 * @upah AS gaji
FROM tb_gaji X
INNER JOIN tb_rols_user Y ON y.id_jabatan = x.id_jabatan 
INNER JOIN tb_absensi z ON z.id_user = y.id_user
//gaji_pokok

//potong_pinjaman
SELECT y.id_user, y.id_jabatan, id_gaji,id_absensi, gaji_pokok, hadir, 8 AS jam_perhari,
@tot:= 8 * TIMESTAMPDIFF(DAY, tgl_ab_awal,tgl_ab_akhir) AS tot_jamkerja,
@upah:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) AS upah_prjam,
(hadir * 8 * @upah) - jumlah_pinjaman AS gaji
FROM tb_gaji X
INNER JOIN tb_rols_user Y ON y.id_jabatan = x.id_jabatan 
INNER JOIN tb_absensi z ON z.id_user = y.id_user
INNER JOIN tb_pinjaman a ON a.id_user = y.id_user
//potong_pinjaman

SELECT * FROM tb_pinjaman
SELECT * FROM tb_absensi
SELECT * FROM tb_tunjangan_user

//potong_tunjangan
SELECT y.id_user, y.id_jabatan, id_gaji,id_absensi, gaji_pokok, hadir, 8 AS jam_perhari,
@tot:= 8 * TIMESTAMPDIFF(DAY, tgl_ab_awal,tgl_ab_akhir) AS tot_jamkerja,
@upah:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) AS upah_prjam,
hadir * 8 * @upah - SUM(nominal_tunjangan) AS gaji
FROM tb_gaji X
INNER JOIN tb_rols_user Y ON y.id_jabatan = x.id_jabatan 
INNER JOIN tb_absensi z ON z.id_user = y.id_user
LEFT JOIN tb_tunjangan_user a ON a.id_user = y.id_user
INNER JOIN tb_tunjangan b ON b.id_tunjangan = a.id_tunjangan GROUP BY y.id_user ASC
//potong_tunjangan

//potongan_pinjaman_tunjangan
SELECT y.id_user, y.id_jabatan, id_gaji,id_absensi, gaji_pokok, hadir, 8 AS jam_perhari,
@tot:= 8 * TIMESTAMPDIFF(DAY, tgl_ab_awal,tgl_ab_akhir) AS tot_jamkerja,
@upah:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) AS upah_prjam,
hadir * 8 * @upah - SUM(nominal_tunjangan) - jumlah_pinjaman AS gaji
FROM tb_gaji X
INNER JOIN tb_rols_user Y ON y.id_jabatan = x.id_jabatan 
INNER JOIN tb_absensi z ON z.id_user = y.id_user
INNER JOIN tb_pinjaman c ON c.id_user = y.id_user
INNER JOIN tb_tunjangan_user a ON a.id_user = y.id_user
INNER JOIN tb_tunjangan b ON b.id_tunjangan = a.id_tunjangan GROUP BY y.id_user ASC
//potongan_pinjaman_tunjangan

SELECT * FROM tb_penggajian

SELECT id_user, SUM(nominal_tunjangan) AS tunjangan FROM tb_tunjangan_user X
INNER JOIN tb_tunjangan Y ON y.id_tunjangan = x.id_tunjangan GROUP BY id_user ASC

SELECT TIMESTAMPDIFF(DAY, tgl_ab_awal,tgl_ab_akhir) FROM tb_absensi
SELECT TIMESTAMPDIFF(DAY, '2020-09-22','2020-010-22')

SELECT * FROM tb_absensi WHERE MONTH(tgl_ab_akhir) = MONTH(NOW()) 

SELECT YEAR(NOW())

SELECT * FROM tb_penggajian WHERE MONTH(tgl_input) = MONTH(NOW())

SELECT * FROM tb_penggajian WHERE YEAR(tgl_input) = '2020' AND MONTH(tgl_input) = '10'

SELECT * FROM tb_pinjaman
SELECT * FROM tb_pengembalian_pinjaman
SELECT * FROM tb_pengembalian_pinjaman X INNER JOIN tb_user Y ON y.id_user = x.id_user GROUP BY x.id_user DESC

SELECT * FROM tb_absensi X
INNER JOIN tb_user Y ON y.id_user = x.id_user

SELECT * FROM tb_user

SELECT * FROM tb_tunjangan
SELECT * FROM tb_tunjangan_user X
INNER JOIN tb_tunjangan Y ON y.id_tunjangan = x.id_tunjangan

SELECT COUNT(*) FROM tb_tunjangan_user WHERE id_user = 'USER0000005'

SELECT * FROM tb_tabungan_tunjangan

id_tabungan, id_tunjangan, id_user, nominal_tunjangan, tgl_angsuran

SELECT x.id_user, y.id_tunjangan , nominal_tunjangan FROM tb_penggajian X
INNER JOIN tb_tunjangan_user Y ON y.id_user = x.id_user
INNER JOIN tb_tunjangan z ON z.id_tunjangan = y.id_tunjangan GROUP BY x.id_user


SELECT y.id_user, y.id_jabatan, id_gaji,id_absensi, gaji_pokok, hadir,lembur, 8 AS jam_perhari,
@tot:= 8 * TIMESTAMPDIFF(DAY, tgl_ab_awal,tgl_ab_akhir) + lembur AS tot_jamkerja,
@upah:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) AS upah_prjam,
@lembur:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) * lembur AS upah_lembur,
hadir * 8 * @upah + @lembur AS gaji,
@upah:= ROUND((gaji_pokok + uang_makan + uang_transport )/@tot) * lembur AS lembur
FROM tb_gaji X
INNER JOIN tb_rols_user Y ON y.id_jabatan = x.id_jabatan 
INNER JOIN tb_absensi z ON z.id_user = y.id_user

SELECT * FROM tb_tunjangan_user

SELECT x.id_user, y.id_tunjangan , nominal_tunjangan FROM tb_penggajian X
INNER JOIN tb_tunjangan_user Y ON y.id_user = x.id_user
INNER JOIN tb_tunjangan z ON z.id_tunjangan = y.id_tunjangan WHERE y.id_tunjangan = 'TUNJ001' AND x.id_user = 'USER0000005'

SELECT * FROM tb_tabungan_tunjangan X
INNER JOIN tb_user Y ON y.id_user = x.id_user

SELECT CONCAT(MONTH(tgl_masuk_user),'-',YEAR(tgl_masuk_user)) AS tgl_bulan FROM tb_rols_user GROUP BY MONTH(tgl_masuk_user) DESC

SELECT CONCAT(tgl_ab_awal,' ',tgl_ab_akhir) AS tgl FROM tb_absensi GROUP BY tgl_ab_awal,tgl_ab_akhir DESC

SELECT CONCAT(tgl_ab_awal,' ',tgl_ab_akhir) AS tgl FROM tb_absensi GROUP BY tgl_ab_awal,tgl_ab_akhir DESC

2020-09-22 2020-10-22

SELECT TIMESTAMPDIFF(DAY, tgl_ab_awal, tgl_ab_akhir) AS jarak FROM tb_absensi 
SELECT id_absensi, x.id_user, hadir, sakit, ijin, lembur, tgl_ab_awal, tgl_ab_akhir ,CONCAT(tgl_ab_awal,' & ',tgl_ab_akhir) AS tgl 
FROM tb_absensi X
INNER JOIN tb_user Y ON y.id_user = x.id_user
WHERE CONCAT(tgl_ab_awal,' & ',tgl_ab_akhir) = '2020-09-22 & 2020-10-22'
GROUP BY tgl_ab_awal,tgl_ab_akhir DESC

SELECT * FROM tb_jabatan X
INNER JOIN tb_gaji Y ON y.id_jabatan = x.id_jabatan

SELECT * FROM tb_penggajian X
INNER JOIN tb_user Y ON y.id_user = x.id_user
WHERE MONTH(tgl_input) = MONTH(NOW())

SELECT SUM(tunjangan_kesehatan) AS kesehatan, SUM(tunjangan_bpjs) AS bpjs FROM tb_tabungan_tunjangan X INNER JOIN tb_user Y ON y.id_user = x.id_user 
WHERE nama_user = 'admin'