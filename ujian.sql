/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80029
 Source Host           : localhost:55000
 Source Schema         : ujian

 Target Server Type    : MySQL
 Target Server Version : 80029
 File Encoding         : 65001

 Date: 18/11/2022 09:27:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jawaban_materi_dua
-- ----------------------------
DROP TABLE IF EXISTS `jawaban_materi_dua`;
CREATE TABLE `jawaban_materi_dua` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `pengguna_id` bigint DEFAULT NULL,
  `materi_dua_id` bigint DEFAULT NULL,
  `ujian_id` bigint DEFAULT NULL,
  `jawaban` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of jawaban_materi_dua
-- ----------------------------
BEGIN;
INSERT INTO `jawaban_materi_dua` VALUES (1, 2, 7, 32, NULL, '2022-11-14 18:28:50', '2022-11-14 18:41:54');
INSERT INTO `jawaban_materi_dua` VALUES (2, 2, 9, 32, NULL, '2022-11-14 18:28:50', '2022-11-14 18:42:05');
INSERT INTO `jawaban_materi_dua` VALUES (3, 2, 8, 32, NULL, '2022-11-14 18:28:50', '2022-11-14 18:43:33');
INSERT INTO `jawaban_materi_dua` VALUES (4, 2, 6, 32, NULL, '2022-11-14 18:28:50', '2022-11-14 18:43:35');
INSERT INTO `jawaban_materi_dua` VALUES (5, 2, 5, 32, NULL, '2022-11-14 18:28:50', '2022-11-14 18:43:37');
INSERT INTO `jawaban_materi_dua` VALUES (11, 2, 8, 36, 'a', '2022-11-16 17:53:07', '2022-11-16 17:53:20');
INSERT INTO `jawaban_materi_dua` VALUES (12, 2, 6, 36, 'b', '2022-11-16 17:53:07', '2022-11-16 17:54:28');
INSERT INTO `jawaban_materi_dua` VALUES (13, 2, 5, 36, 'a', '2022-11-16 17:53:07', '2022-11-16 17:54:29');
INSERT INTO `jawaban_materi_dua` VALUES (14, 2, 7, 36, 'c', '2022-11-16 17:53:07', '2022-11-16 17:54:31');
INSERT INTO `jawaban_materi_dua` VALUES (15, 2, 9, 36, NULL, '2022-11-16 17:53:07', '2022-11-16 17:53:07');
COMMIT;

-- ----------------------------
-- Table structure for jawaban_materi_satu
-- ----------------------------
DROP TABLE IF EXISTS `jawaban_materi_satu`;
CREATE TABLE `jawaban_materi_satu` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `pengguna_id` bigint DEFAULT NULL,
  `materi_satu_id` bigint DEFAULT NULL,
  `ujian_id` bigint DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ujian_id` (`ujian_id`),
  CONSTRAINT `jawaban_materi_satu_ibfk_1` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of jawaban_materi_satu
-- ----------------------------
BEGIN;
INSERT INTO `jawaban_materi_satu` VALUES (5, 2, 5, 35, 'c', '2022-11-14 19:23:24', '2022-11-14 19:40:22');
INSERT INTO `jawaban_materi_satu` VALUES (6, 2, 2, 35, 'a', '2022-11-14 19:23:24', '2022-11-14 19:40:24');
INSERT INTO `jawaban_materi_satu` VALUES (7, 2, 3, 35, 'b', '2022-11-14 19:23:24', '2022-11-14 19:40:43');
INSERT INTO `jawaban_materi_satu` VALUES (8, 2, 1, 35, 'a', '2022-11-14 19:23:24', '2022-11-14 19:40:46');
INSERT INTO `jawaban_materi_satu` VALUES (9, 2, 4, 35, 'd', '2022-11-14 19:23:24', '2022-11-14 19:40:33');
COMMIT;

-- ----------------------------
-- Table structure for materi_dua
-- ----------------------------
DROP TABLE IF EXISTS `materi_dua`;
CREATE TABLE `materi_dua` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `soal` longtext,
  `a` int DEFAULT NULL,
  `b` int DEFAULT NULL,
  `c` int DEFAULT NULL,
  `d` int DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of materi_dua
-- ----------------------------
BEGIN;
INSERT INTO `materi_dua` VALUES (5, '<p>Jika&nbsp;ada&nbsp;kesempatan&nbsp;berbagi&nbsp;saya&nbsp;akan&nbsp;memilih&nbsp;melakukannya&nbsp;dengan&nbsp;orang-orang&nbsp;yang&nbsp;telah&nbsp;saya&nbsp;kenal.</p>', 1, 2, 3, 4, NULL, '2022-10-20 12:33:29', '2022-10-20 12:35:12', NULL);
INSERT INTO `materi_dua` VALUES (6, '<p>Saya&nbsp;tidak&nbsp;akan menerima&nbsp;tugas yang diberikan&nbsp;senior&nbsp;karena&nbsp;belum&nbsp;pernah&nbsp;saya&nbsp;lakukan&nbsp;sebelumnya.</p>', 3, 2, 1, 4, NULL, '2022-10-20 12:35:26', '2022-10-20 12:35:26', NULL);
INSERT INTO `materi_dua` VALUES (7, '<p>Berusaha&nbsp;untuk mencapai&nbsp;prestasi maksimal menurut&nbsp;saya&nbsp;adalah&nbsp;sikap&nbsp;yang&nbsp;berlebihan.</p>', 2, 3, 4, 1, NULL, '2022-10-20 12:36:56', '2022-10-20 12:36:56', NULL);
INSERT INTO `materi_dua` VALUES (8, '<p>Dalam&nbsp;sebuah&nbsp;acara&nbsp;reuni&nbsp;akbar&nbsp;sekolah,&nbsp;berkumpul&nbsp;bersama&nbsp;teman-teman&nbsp;sekelas&nbsp;lebih&nbsp;penting daripada&nbsp;mencoba&nbsp;mencari kenalan&nbsp;baru&nbsp;dari angkatan lain.</p>', 2, 3, 1, 4, NULL, '2022-10-20 12:37:05', '2022-10-20 12:37:05', NULL);
INSERT INTO `materi_dua` VALUES (9, '<p>Bagi saya&nbsp;menjadi seorang&nbsp;penulis lebih&nbsp;menjanjikan&nbsp;daripada&nbsp;profesi pemandu&nbsp;wisata.</p>', 3, 4, 2, 1, NULL, '2022-10-20 12:37:15', '2022-10-20 12:37:15', NULL);
COMMIT;

-- ----------------------------
-- Table structure for materi_satu
-- ----------------------------
DROP TABLE IF EXISTS `materi_satu`;
CREATE TABLE `materi_satu` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `soal` longtext,
  `a` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `b` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `c` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `d` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `e` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `kunci` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of materi_satu
-- ----------------------------
BEGIN;
INSERT INTO `materi_satu` VALUES (1, '<p>Aku X ….</p>', '<p>Kronis</p>', '<p>Normal</p>', '<p>Sadar</p>', '<p>Parah</p>', '<p>Kanker</p>', 'a', NULL, '2022-10-03 12:30:06', '2022-10-03 12:45:59', NULL);
INSERT INTO `materi_satu` VALUES (2, '<p>Berapakah jumlah bangun yang tersusun pada gambar dibawah ini ?&nbsp;</p><p><img src=\"http://ujian.test/media/image_1664801297.png\"></p>', '<p>16</p>', '<p>17</p>', '<p>18</p>', '<p>19</p>', '<p>20</p>', 'a', NULL, '2022-10-03 12:49:15', '2022-10-03 12:49:15', NULL);
INSERT INTO `materi_satu` VALUES (3, '<p>Delusi&nbsp; X&nbsp; …..</p>', '<p>Ilusi</p>', '<p>Khayal</p>', '<p>Angan</p>', '<p>Samar</p>', '<p>Nyata</p>', 'a', NULL, '2022-10-03 12:51:23', '2022-11-14 19:21:04', NULL);
INSERT INTO `materi_satu` VALUES (4, '<p>Bahari =&nbsp; …..</p>', '<p>Kekayaan alam</p>', '<p>Marina</p>', '<p>Kepulauan</p>', '<p>Laut</p>', '<p>Wahana</p>', 'a', NULL, '2022-10-03 12:51:32', '2022-11-14 19:21:44', NULL);
INSERT INTO `materi_satu` VALUES (5, '<p>Darma&nbsp; =&nbsp; …..</p>', '<p>Jasa</p>', '<p>Panggung</p>', '<p>Pengabdian</p>', '<p>Berkorban</p>', '<p>Perang</p>', 'a', NULL, '2022-11-14 19:22:21', '2022-11-14 19:22:21', NULL);
COMMIT;

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `no_peserta` varchar(255) DEFAULT NULL,
  `kata_sandi` varchar(255) DEFAULT NULL,
  `level` tinyint DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_peserta` (`no_peserta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
BEGIN;
INSERT INTO `pengguna` VALUES (1, 'Administrator', 'admin', '$2y$10$lKLpjTyhQBqWqmYeGfa65OT/3Txs..Jjb9ExIcCZq23NjDJt1/jHW', 1, NULL, '2022-09-01 00:00:00', '2022-11-16 17:51:33');
INSERT INTO `pengguna` VALUES (2, 'Andi Fajar Nugraha', '123456789', '$2y$10$VLwqeJ/Oiz.Zi7KQk8WqDemmeJxskZV8qUyU8Khnhzxa8/MddlJVi', 2, NULL, '2022-09-01 00:00:00', '2022-11-16 17:51:52');
COMMIT;

-- ----------------------------
-- Table structure for petunjuk
-- ----------------------------
DROP TABLE IF EXISTS `petunjuk`;
CREATE TABLE `petunjuk` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `materi` int DEFAULT NULL,
  `isi` longtext,
  `operator` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `materi` (`materi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of petunjuk
-- ----------------------------
BEGIN;
INSERT INTO `petunjuk` VALUES (1, 1, '<p><strong>PETUNJUK PENGERJAAN&nbsp;</strong></p><p><strong>&nbsp;</strong></p><p>Sebelum mengerjakan tes, bacalah petunjuk pengerjaan tes ini dengan saksama.</p><p>Anda diminta untuk membaca setiap <strong>Soal</strong> yang ada, lalu pilih satu jawab dari lima pilihan jawaban yang menurut Anda paling benar. Adapun petunjuk untuk mengerjakan soal berpedoman pada beberapa tipe soal yang dicontohkan berikut ini ;</p><figure class=\"table\"><table><tbody><tr><td><strong>Contoh&nbsp; 1.</strong></td><td><p>Mudah&nbsp; =&nbsp; ……..............&nbsp;</p><p>a) Gampang&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;b) Buruk&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;c) Sulit&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;d) Sedih&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;e) Jelek</p></td></tr></tbody></table></figure><p>Pada tipe soal ini Anda diminta untuk mencari satu kata dari pilihan jawaban yang <strong>mempunyai arti sama&nbsp;</strong>atau <strong>yang paling dekat dengan arti kata soal</strong>. Pada contoh soal diatas terdapat kata <i>”Mudah”</i> dan pilihan jawaban yang memiliki arti sama dengan kata mudah adalah kata ”<i>Gampang</i>”&nbsp;maka klik huruf&nbsp; <strong>a</strong>.</p><figure class=\"image\"><img src=\"http://ujian.test/media/image_1666270411.png\"></figure><figure class=\"table\"><table><tbody><tr><td><strong>Contoh 2.</strong></td><td><p>&nbsp; &nbsp; &nbsp;Keras&nbsp; X&nbsp; &nbsp;……..............</p><p>&nbsp; &nbsp; &nbsp;a) Batu&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; b) Lembut&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; c) Licin&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;d) Lemas&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; e) Kaku</p></td></tr></tbody></table></figure><p>Pada tipe soal ini Anda diminta untuk mencari satu kata dari pilihan jawaban yang <strong>mempunyai arti berlawanan&nbsp;</strong>atau <strong>yang paling jauh dengan arti kata soal</strong>. Pada contoh soal diatas terdapat kata \"<i>Keras”</i> dan pilihan jawaban yang memiliki arti berlawanan dengan kata keras adalah kata ”<i>Lembut</i>”,&nbsp;maka klik huruf&nbsp; <strong>b</strong>.</p><figure class=\"image\"><img src=\"http://ujian.test/media/image_1666270419.png\"></figure><figure class=\"table\"><table><tbody><tr><td><strong>Contoh 3.</strong></td><td><p>Basah : Kering&nbsp; &nbsp;= ………&nbsp; :&nbsp; ……….</p><p>a)Baik, Buruk&nbsp; &nbsp; &nbsp;b)Basi, Busuk&nbsp; &nbsp;c)Bagus, Indah&nbsp; &nbsp;d)Tipis, Rentan&nbsp; &nbsp;e)Halus, Lembut</p></td></tr></tbody></table></figure><p>Pada tipe soal ini Anda akan menemui <strong>pasangan kata yang memiliki hubungan</strong>, dan Anda diminta untuk <strong>mencari jawaban pasangan kata yang memiliki hubungan yang sama dengan pasangan kata pada soal</strong>. Pada contoh diatas, hubungan dari kata ”<i>Basah”</i> dan <i>”Kering”</i> adalah lawan katanya, maka dari pilihan jawaban yang memiliki hubungan lawan kata adalah <i>”Baik”&nbsp;</i>dan<i> ”Buruk”.</i> Sesuai dengan pilihan jawaban, maka klik&nbsp;huruf&nbsp; <strong>a</strong>.</p><figure class=\"image\"><img src=\"http://ujian.test/media/image_1666270427.png\"></figure><figure class=\"table\"><table><tbody><tr><td><strong>Contoh 4.</strong></td><td><p>Semua pelamar kerja adalah lulusan S1 .</p><p>Sarjana pasti datang dengan membawa ijazahnya.</p><p>Maka kesimpulan yang dapat ditarik dari kedua kalimat diatas adalah .........</p><p>a) Ada pelamar kerja yang berijazah SMA&nbsp; &nbsp; &nbsp;</p><p>b) Semua pelamar membawa ijazah S1.</p><p>c) Semua pelamar tidak diharuskan membawa ijazah.</p><p>d) Pelamar kerja minimal membawa ijazahnya.&nbsp;</p><p>e) Tidak ada kesimpulan</p></td></tr></tbody></table></figure><p>Pada tipe soal ini, terdapat dua buah kalimat. Tugas Anda adalah <strong>mencari kesimpulan yang paling tepat dari kedua kalimat tersebut</strong>. Pada contoh soal diatas maka jawaban yang benar adalah ”Semua pelamar membawa ijazah S1”, sehingga&nbsp;klik huruf&nbsp; <strong>b</strong>.</p><figure class=\"image\"><img src=\"http://ujian.test/media/image_1666270439.png\"></figure><figure class=\"table\"><table><tbody><tr><td><strong>Contoh 5.</strong></td><td><p>3 x 5 - 2 = ……</p><p>a) 10&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; b) 11&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;c) 12&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; d) 13&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;e) 15</p></td></tr></tbody></table></figure><p>Pada tipe soal ini Anda akan menemui <strong>perhitungan matematika sederhana</strong>. Anda diminta untuk <strong>mencari angka yang tepat</strong> dari pilihan jawaban untuk <strong>melengkapi perhitungan soal sehingga menjadi perhitungan yang benar</strong>. Pada contoh soal diatas, angka 13 adalah angka yang tepat dari hasil perhitungan matematika tersebut. Maka&nbsp;klik huruf&nbsp; <strong>d</strong>.</p><figure class=\"image\"><img src=\"http://ujian.test/media/image_1666270464.png\"></figure><figure class=\"table\"><table><tbody><tr><td><strong>Contoh 6.</strong></td><td><p>Bila Orin membeli sepasang sepatu seharga Rp.50.000,-, berapakah yang harus Orin bayarkan jika ia membeli 3 pasang sepatu?</p><p>a)Rp.50.000,-&nbsp; &nbsp; &nbsp;b)Rp.75.000,-&nbsp; &nbsp;c)Rp.100.000,-&nbsp; &nbsp; d)Rp.120.000,-&nbsp; &nbsp; e)Rp.150.000,-</p></td></tr></tbody></table></figure><p>Pada tipe soal ini Anda akan menemui <strong>soal cerita matematika sederhana</strong>, dan Anda diminta untuk <strong>mencari jawaban yang benar dari perhitungan soal tersebut</strong>. Pada contoh soal cerita diatas, maka perhitungannya adalah Rp. 50.000,- x 3 pasang = Rp. 150.000,-. Sesuai dengan pilihan jawaban, maka klik huruf&nbsp;<strong>e</strong>.</p><figure class=\"image\"><img src=\"http://ujian.test/media/image_1666270471.png\"></figure><figure class=\"table\"><table><tbody><tr><td><strong>Contoh 7.</strong></td><td><p><img src=\"http://ujian.test/media/image_1666270478.png\"></p><p>a) 6, 8&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;b) 7, 9&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;c) 6, 10&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; d) 7, 8&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; e) 6, 9</p></td></tr></tbody></table></figure><p>Pada tipe soal ini, terdapat sebuah gambar deret angka dan tugas anda adalah <strong>melengkapi kotak X dan Y tersebut dengan angka yang tepat sesuai dengan pola yang ada</strong>.&nbsp;</p><p><strong>Pada tipe gambar ini dapat berisi jenis deret angka, huruf maupun kombinasi diantara keduanya dengan tugas melengkapi kotak X dan Y maupun kotak titik titik untuk diisi dengan jawaban yang tepat.</strong></p><p>Pada contoh soal diatas pola deret angka atas (kotak X) antara satu angka dengan lainnya adalah +1, dan pada pola deret angka bawah (kotak Y) adalah +2, maka jawaban yang tepat untuk mengisi kotak X dan Y berturut -turut adalah 6, 12. Oleh karena itu&nbsp;klik huruf&nbsp; <strong>c</strong>.</p><figure class=\"image\"><img src=\"http://ujian.test/media/image_1666270503.png\"></figure><figure class=\"table\"><table><tbody><tr><td><p><strong>Contoh 8.</strong></p><p>&nbsp;</p></td><td><img src=\"http://ujian.test/media/image_1666270539.png\"></td></tr></tbody></table></figure><p>Pada tipe soal ini, terdapat sebuah pola gambar dimana pola gambar kiri dan kanan memiliki persamaan pola pengerjaannya. Tugas anda adalah <strong>melengkapi kotak tanda tanya tersebut dengan gambar yang tepat sehingga menjadi pola yang tepat</strong>.&nbsp;</p><p><strong>Pada tipe gambar ini dapat berisi jenis pola gambar maupun pola angka.</strong></p><p>Pada contoh soal diatas pola gambar kiri adalah gambar dengan jumlah bertambah 1 dengan bentuk yang sama, maka jawaban yang tepat untuk mengisi kotak tanda tanya tersebut adalah dengan bentuk yang sama dan jumlah berambah satu (segitiga berjumlah 4). Oleh karena itu&nbsp;maka klik huruf&nbsp; <strong>c</strong>.</p><figure class=\"image\"><img src=\"http://ujian.test/media/image_1666270515.png\"></figure><p><strong>Apabila Anda telah selesai, periksalah kembali jawaban Anda.&nbsp;</strong></p><p><strong>SELAMAT MENGERJAKAN</strong></p>', NULL, '2022-10-20 12:56:43', '2022-10-20 12:57:08');
INSERT INTO `petunjuk` VALUES (2, 2, '<p><strong>PETUNJUK MENJAWAB</strong></p><p>Bacalah&nbsp;petunjuk cara menjawab&nbsp;dengan&nbsp;saksama.</p><p>Pada&nbsp;tes&nbsp;ini&nbsp;anda&nbsp;akan&nbsp;dihadapkan dengan beberapa persoalan/pernyataan<strong>.&nbsp;</strong>Anda disarankan&nbsp;membaca&nbsp;pernyataan&nbsp;dalam&nbsp;setiap&nbsp;soal dan&nbsp;menjawabnya&nbsp;dengan&nbsp;segera,&nbsp;secara&nbsp;spontan&nbsp;dan&nbsp;jujur&nbsp;sesuai&nbsp;dengan&nbsp;apa&nbsp;yang&nbsp;anda&nbsp;anggap&nbsp;paling&nbsp;sesuai&nbsp;dengan diri anda.&nbsp;</p><p><strong>Berikut adalah cara&nbsp;menjawab soal</strong>:</p><p><i>Klik <strong>A </strong>bila&nbsp;anda&nbsp;merasa pernyataan&nbsp;tersebut&nbsp;<strong>SANGAT TIDAK SESUAI&nbsp;</strong>dengan&nbsp;diri anda.</i></p><p><i>Klik <strong>B </strong>bila&nbsp;anda&nbsp;merasa pernyataan&nbsp;tersebut&nbsp;<strong>TIDAK SESUAI&nbsp;</strong>dengan&nbsp;diri anda.</i></p><p><i>Klik <strong>C&nbsp;</strong>bila&nbsp;anda&nbsp;merasa pernyataan&nbsp;tersebut&nbsp;<strong>SESUAI&nbsp;</strong>dengan diri anda.</i></p><p><i>Klik <strong>D&nbsp;</strong>bila&nbsp;anda&nbsp;merasa pernyataan&nbsp;tersebut&nbsp;<strong>SANGAT SESUAI&nbsp;</strong>dengan&nbsp;diri anda.</i></p><p><strong>CONTOH :</strong></p><figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td><strong>NO</strong></td><td>&nbsp;</td><td><strong>PERNYATAAN</strong></td><td>&nbsp;</td></tr><tr><td colspan=\"5\">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dengan&nbsp;kemampuan&nbsp;yang&nbsp;saya&nbsp;miliki,&nbsp;saya&nbsp;turut&nbsp;serta&nbsp;membantu&nbsp;pemerintah&nbsp;dalam&nbsp;penanganan pandemi Covid-19&nbsp;di wilayah&nbsp;saya.</td></tr></tbody></table></figure><p>Jika&nbsp;anda&nbsp;merasa&nbsp;bahwa&nbsp;<strong>Pernyataan&nbsp;</strong>dalam&nbsp;soal&nbsp;tersebut&nbsp;<strong>SESUAI&nbsp;</strong>dengan&nbsp;diri&nbsp;anda,&nbsp;maka&nbsp;klik&nbsp;<strong>jawaban&nbsp;C </strong>dan otomatis jawaban akan tersimpan dan tidak bisa dirubah serta otomatis akan tampil pernyataan nomor berikujtnya. Anda tidak bisa mengerjakan nomor berikutnya sebelum anda menjawab.</p><p><strong>“Selamat&nbsp;Bekerja”</strong></p>', NULL, '2022-10-20 13:02:08', '2022-10-20 13:02:26');
INSERT INTO `petunjuk` VALUES (3, 3, '<p>PETUNJUK PENGERJAAN</p><ul><li>&nbsp;SUBTES INI TERDIRI DARI 10 KOLOM DENGAN MASING-MASING KOLOM DIBERIKAN WAKTU 1 MENIT UNTUK MENJAWAB.</li><li>TUGAS ANDA ADALAH MENCARI ANGKA/HURUF/SIMBOL YANG HILANG/TIDAK ADA PADA PERSOALAN PADA PILIHAN JAWABAN YANG ADA.&nbsp;</li><li>CARA MENJAWABNYA, DENGAN MENEKAN PILIHAN JAWABAN YG DIANGGAP BENAR DAN AKAN LANGSUNG BERPINDAH KE NOMOR SOAL BERIKUTNYA.&nbsp;</li><li>PADA SUBTES INI DIBUTUHKAN KECEPATAN DAN KECERMATAN DALAM MENJAWAB.&nbsp;</li><li>ADA INDIKATOR WAKTU DAN KOLOM DI LAYAR MONITOR MASING-MASING PESERTA</li></ul>', NULL, '2022-10-20 13:02:49', '2022-10-20 13:02:54');
COMMIT;

-- ----------------------------
-- Table structure for ujian
-- ----------------------------
DROP TABLE IF EXISTS `ujian`;
CREATE TABLE `ujian` (
  `id` bigint NOT NULL AUTO_INCREMENT COMMENT ' ',
  `materi` tinyint DEFAULT NULL,
  `waktu` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `deleted_at` (`deleted_at`,`materi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of ujian
-- ----------------------------
BEGIN;
INSERT INTO `ujian` VALUES (35, 1, 60, '2022-11-14 19:22:43', '2022-11-14 19:22:43', NULL);
INSERT INTO `ujian` VALUES (36, 2, 60, '2022-11-14 19:22:46', '2022-11-14 19:22:46', NULL);
COMMIT;

-- ----------------------------
-- Table structure for ujian_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `ujian_pengguna`;
CREATE TABLE `ujian_pengguna` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `ujian_id` bigint DEFAULT NULL,
  `pengguna_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ujian_id` (`ujian_id`),
  CONSTRAINT `ujian_pengguna_ibfk_1` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of ujian_pengguna
-- ----------------------------
BEGIN;
INSERT INTO `ujian_pengguna` VALUES (6, 35, 2, '2022-11-14 19:22:43', '2022-11-14 19:22:43');
INSERT INTO `ujian_pengguna` VALUES (7, 36, 2, '2022-11-14 19:22:46', '2022-11-14 19:22:46');
COMMIT;

-- ----------------------------
-- Table structure for ujian_soal
-- ----------------------------
DROP TABLE IF EXISTS `ujian_soal`;
CREATE TABLE `ujian_soal` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `ujian_id` bigint DEFAULT NULL,
  `materi_satu_id` bigint DEFAULT NULL,
  `materi_dua_id` bigint DEFAULT NULL,
  `materi_tiga_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ujian_id` (`ujian_id`),
  KEY `ujian_soal_ibfk_2` (`materi_satu_id`),
  KEY `ujian_soal_ibfk_3` (`materi_dua_id`),
  CONSTRAINT `ujian_soal_ibfk_1` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ujian_soal_ibfk_2` FOREIGN KEY (`materi_satu_id`) REFERENCES `materi_satu` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `ujian_soal_ibfk_3` FOREIGN KEY (`materi_dua_id`) REFERENCES `materi_dua` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of ujian_soal
-- ----------------------------
BEGIN;
INSERT INTO `ujian_soal` VALUES (68, 35, 1, NULL, NULL, '2022-11-14 19:22:43', '2022-11-14 19:22:43');
INSERT INTO `ujian_soal` VALUES (69, 35, 2, NULL, NULL, '2022-11-14 19:22:43', '2022-11-14 19:22:43');
INSERT INTO `ujian_soal` VALUES (70, 35, 3, NULL, NULL, '2022-11-14 19:22:43', '2022-11-14 19:22:43');
INSERT INTO `ujian_soal` VALUES (71, 35, 4, NULL, NULL, '2022-11-14 19:22:43', '2022-11-14 19:22:43');
INSERT INTO `ujian_soal` VALUES (72, 35, 5, NULL, NULL, '2022-11-14 19:22:43', '2022-11-14 19:22:43');
INSERT INTO `ujian_soal` VALUES (73, 36, NULL, 5, NULL, '2022-11-14 19:22:46', '2022-11-14 19:22:46');
INSERT INTO `ujian_soal` VALUES (74, 36, NULL, 6, NULL, '2022-11-14 19:22:46', '2022-11-14 19:22:46');
INSERT INTO `ujian_soal` VALUES (75, 36, NULL, 7, NULL, '2022-11-14 19:22:46', '2022-11-14 19:22:46');
INSERT INTO `ujian_soal` VALUES (76, 36, NULL, 8, NULL, '2022-11-14 19:22:46', '2022-11-14 19:22:46');
INSERT INTO `ujian_soal` VALUES (77, 36, NULL, 9, NULL, '2022-11-14 19:22:46', '2022-11-14 19:22:46');
COMMIT;

-- ----------------------------
-- Table structure for ujian_waktu
-- ----------------------------
DROP TABLE IF EXISTS `ujian_waktu`;
CREATE TABLE `ujian_waktu` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `pengguna_id` bigint DEFAULT NULL,
  `ujian_id` bigint DEFAULT NULL,
  `waktu` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of ujian_waktu
-- ----------------------------
BEGIN;
INSERT INTO `ujian_waktu` VALUES (1, 2, 35, 53, '2022-11-14 19:40:22', '2022-11-14 19:40:22');
INSERT INTO `ujian_waktu` VALUES (2, 2, 35, 51, '2022-11-14 19:40:24', '2022-11-14 19:40:24');
INSERT INTO `ujian_waktu` VALUES (3, 2, 35, 49, '2022-11-14 19:40:26', '2022-11-14 19:40:26');
INSERT INTO `ujian_waktu` VALUES (4, 2, 35, 46, '2022-11-14 19:40:29', '2022-11-14 19:40:29');
INSERT INTO `ujian_waktu` VALUES (5, 2, 35, 42, '2022-11-14 19:40:33', '2022-11-14 19:40:33');
INSERT INTO `ujian_waktu` VALUES (6, 2, 35, 0, '2022-11-14 19:40:34', '2022-11-14 19:40:34');
INSERT INTO `ujian_waktu` VALUES (7, 2, 35, 36, '2022-11-14 19:40:39', '2022-11-14 19:40:39');
INSERT INTO `ujian_waktu` VALUES (8, 2, 35, 32, '2022-11-14 19:40:43', '2022-11-14 19:40:43');
INSERT INTO `ujian_waktu` VALUES (9, 2, 35, 29, '2022-11-14 19:40:46', '2022-11-14 19:40:46');
INSERT INTO `ujian_waktu` VALUES (10, 2, 35, 0, '2022-11-14 19:40:47', '2022-11-14 19:40:47');
INSERT INTO `ujian_waktu` VALUES (11, 2, 35, 27, '2022-11-14 19:40:48', '2022-11-14 19:40:48');
INSERT INTO `ujian_waktu` VALUES (12, 2, 36, 57, '2022-11-14 19:40:59', '2022-11-14 19:40:59');
INSERT INTO `ujian_waktu` VALUES (13, 2, 36, 55, '2022-11-14 19:41:01', '2022-11-14 19:41:01');
INSERT INTO `ujian_waktu` VALUES (14, 2, 36, 54, '2022-11-14 19:41:02', '2022-11-14 19:41:02');
INSERT INTO `ujian_waktu` VALUES (15, 2, 36, 53, '2022-11-14 19:41:03', '2022-11-14 19:41:03');
INSERT INTO `ujian_waktu` VALUES (16, 2, 36, 52, '2022-11-14 19:41:04', '2022-11-14 19:41:04');
INSERT INTO `ujian_waktu` VALUES (17, 2, 36, 50, '2022-11-16 17:51:58', '2022-11-16 17:51:58');
INSERT INTO `ujian_waktu` VALUES (18, 2, 36, 36, '2022-11-16 17:53:20', '2022-11-16 17:53:20');
INSERT INTO `ujian_waktu` VALUES (19, 2, 36, 30, '2022-11-16 17:54:28', '2022-11-16 17:54:28');
INSERT INTO `ujian_waktu` VALUES (20, 2, 36, 29, '2022-11-16 17:54:29', '2022-11-16 17:54:29');
INSERT INTO `ujian_waktu` VALUES (21, 2, 36, 27, '2022-11-16 17:54:31', '2022-11-16 17:54:31');
INSERT INTO `ujian_waktu` VALUES (22, 2, 36, 0, '2022-11-16 17:55:00', '2022-11-16 17:55:00');
INSERT INTO `ujian_waktu` VALUES (23, 2, 36, 36, '2022-11-16 17:55:35', '2022-11-16 17:55:35');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
