CREATE DATABASE SeminaryRegist;
USE SeminaryRegist;

CREATE TABLE users (
  username char(100) NOT NULL,
  password char(32) NOT NULL,
  fullname varchar(255) NOT NULL,
  phone varchar(17),
  email varchar(255),
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (username)
);
## ADMIN Login
INSERT INTO users (username,password,fullname) VALUES(
  'administrator','200ceb26807d6bf99fd6f4f0d1ca54d4', 'Administrator'
);

CREATE TABLE seminar (
  id int(11) NOT NULL AUTO_INCREMENT,
  nama varchar(100) NOT NULL,
  waktu DATETIME NOT NULL,
  tempat varchar(255) NOT NULL,
  narasumber text,
  kuota int(3),
  harga int(11),
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

CREATE TABLE peserta (
  nim char(10) NOT NULL,
  fullname varchar(255) NOT NULL,
  jurusan int(2) NOT NULL,
  phone varchar(17),
  email varchar(255),
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(nim)
);

CREATE TABLE peserta_seminar(
  id_seminar int(11) NOT NULL,
  nim char(10) NOT NULL,
  petugas char(100) NOT NULL,
  status tinyint(1) DEFAULT 1,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

  UNIQUE KEY `nim_per_idseminar` (`id_seminar`,`nim`)
);

CREATE TABLE jurusan (
  id int(2) NOT NULL AUTO_INCREMENT,
  kode char(2) NOT NULL,
  nama varchar(255) NOT NULL,
  fakultas enum('FTI','FEB','FISIP','FIKOM','D3', 'ASTRI', 'PAS','FT', '-'),
  cabang char(2) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

##DATA FOR jurusan
INSERT INTO jurusan (kode,nama,fakultas,cabang) VALUES
('13', 'Sistem Komputer', 'FTI', '50'),
('13', 'Sistem Komputer', 'FTI', '30'),
('63', 'Magister Ilmu Komputer', 'PAS', '60'),
('61', 'Magister Akuntansi', 'PAS', '60'),
('62', 'Magister Manajemen', 'PAS', '60'),
('51', 'Arsitektur', 'FT', '50'),
('52', 'Teknik Elektro', 'FT', '50'),
('14', 'Komputerisasi Akuntansi', 'FTI', '30'),
('32', 'Akuntansi', 'FEB', '50'),
('42', 'Hubungan Internasional', 'FISIP', '50'),
('11', 'Teknik Informatika', 'FTI', '50'),
('12', 'Sistem Informasi', 'FTI', '50'),
('12', 'Manajemen Informatika', 'FTI','50'),
('14', 'Komputerisasi Akuntansi', 'FTI', '50'),
('31', 'Manajemen', 'FEB', '50'),
('41', 'Ilmu Komunikasi (FISIP)', 'FISIP', '50'),
('21', 'Sekretari', 'ASTRI', '30'),
('71', 'Ilmu Komunikasi', 'FIKOM', '50'),
('64', 'Magister Ilmu Komunikasi', 'PAS','60'),
('43', 'Kriminologi', 'FISIP', '50'),
('00', 'Umum', '-', '00')
;

CREATE TABLE msg_log(
  id int(3) NOT NULL,
  type enum('warning','success','error','info'),
  header varchar(255),
  body varchar(255),
  PRIMARY KEY (id)
);

##DATA UNTUK msg_log
INSERT INTO msg_log (id,type,header,body) VALUES
(101,'success','Yeay !','Berhasil menambah Pengguna.'),
(102,'success','Yeay !','Berhasil menambah Seminar.'),
(103,'success','Yeay !','Berhasil menambah Peserta.'),

(111,'success', 'Yeay !', 'Data Pengguna telah berhasil diubah.'),
(112,'success', 'Yeay !', 'Data Seminar telah berhasil diubah.'),
(113,'success', 'Yeay !', 'Data Peserta telah berhasil diubah.'),

(121,'success','Berhasil !','Data Pengguna telah dihapus.'),
(122,'success','Berhasil !','Data Seminar telah dihapus.'),
(123,'success','Berhasil !','Data Peserta telah dihapus.'),

(201,'error', 'Oops :(', 'Gagal menambah Pengguna, terjadi kesalahan.'),
(202,'error', 'Oops :(', 'Gagal menambah Seminar, terjadi kesalahan.'),
(203,'error', 'Oops :(', 'Gagal menambah Peserta, terjadi kesalahan.'),

(211,'error', 'Oops :(', 'Data Pengguna gagal diubah, terjadi kesalahan.'),
(212,'error', 'Oops :(', 'Data Seminar gagal diubah, terjadi kesalahan.'),
(213,'error', 'Oops :(', 'Data Peserta gagal diubah, terjadi kesalahan.'),

(221,'error', 'Oops :(', 'Gagal menghapus Pengguna, terjadi kesalahan.'),
(222,'error', 'Oops :(', 'Gagal menghapus Seminar, terjadi kesalahan.'),
(223,'error', 'Oops :(', 'Gagal menghapus Peserta, terjadi kesalahan.') ,
(233,'warning', 'Hmm..', 'Peserta tersebut sudah terdaftar.') ,


(299,'error', 'Oops :(', 'Gagal menambah data, Isi kembali dengan benar'),

(300,'error', 'Oops :(', 'Login terlebih dahulu !'),
(301,'error', 'Oops :(', 'Kombinasi Username dan Password salah');

###############################################
#  FOREIGN_KEY #
###############################################

ALTER TABLE peserta
  ADD CONSTRAINT FK_JURUSAN FOREIGN KEY (jurusan) REFERENCES jurusan (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE peserta_seminar
  ADD CONSTRAINT FK_SEMINAR FOREIGN KEY (id_seminar) REFERENCES seminar (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE peserta_seminar
  ADD CONSTRAINT FK_PETUGAS FOREIGN KEY (petugas) REFERENCES users (username) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE peserta_seminar
  ADD CONSTRAINT FKTrx_PESERTA FOREIGN KEY (nim) REFERENCES peserta (nim) ON DELETE CASCADE ON UPDATE CASCADE;
