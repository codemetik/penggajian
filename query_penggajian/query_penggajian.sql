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