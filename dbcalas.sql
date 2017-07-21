-- -----------------------------------------------
-- @author 			: Fathalfath30
-- @created 		: 08/17/2016
-- @last_edit		: 08/17/2016
-- @version			: v1.0
-- @mysql_version 	: v5.6.5
-- -----------------------------------------------

-- drop database
DROP DATABASE IF EXISTS `ict_calas`;

-- create database
CREATE DATABASE `ict_calas`;

-- use database
USE `ict_calas`;

-- craete table fakultas 
CREATE TABLE `fakultas` (
    `kode_fakultas` VARCHAR(5) NOT NULL,
    `nama_fakultas` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`kode_fakultas`),
    UNIQUE (`kode_fakultas`)
)  ENGINE=INNODB;
-- data for table fakultas
INSERT INTO fakultas ( `kode_fakultas`, `nama_fakultas` ) VALUES
('ASTRI', 'Akademi Sekretari'),
('FE', 'Fakultas Ekonomi'),
('FIKOM', 'Fakultas Ilmu Komputer'),
('FISIP', 'Fakultas Ilmu Sosial dan Ilmu Politik'),
('FT', 'Fakultas Teknik'),
('FTI', 'Fakultas Teknologi Informasi');

-- create table program_studi
CREATE TABLE `program_studi` (
    `id_prodi` TINYINT(2) UNSIGNED NOT NULL AUTO_INCREMENT,
    `kode_fakultas` VARCHAR(5) NOT NULL,
    `program_studi` VARCHAR(50) NOT NULL,
    `gelar` CHAR(2) NOT NULL,
    PRIMARY KEY (`id_prodi` , `kode_fakultas`),
    CONSTRAINT `FK_FAKULTAS_1` FOREIGN KEY (`kode_fakultas`)
        REFERENCES `fakultas` (`kode_fakultas`)
        ON UPDATE CASCADE ON DELETE CASCADE
)  ENGINE=INNODB;
-- data for talbe program_studi
INSERT INTO `program_studi` (`kode_fakultas`, `program_studi`, `gelar`) VALUES
('ASTRI', 'ASTRI Kesekretarisan', 'D3'),
('FE', 'Manajemen Keuangan', 'S1'),
('FE', 'Manajemen Pemasaran', 'S1'),
('FE', 'Akuntansi', 'S1'),
('FIKOM', 'Public Relation', 'S1'),
('FIKOM', 'Broadcast Jurnalism', 'S1'),
('FIKOM', 'Visual Communication', 'S1'),
('FIKOM', 'Creative Advertising', 'S1'),
('FISIP', 'Hubungan International', 'S1'),
('FISIP', 'Kriminologi', 'S1'),
('FT', 'Arsitektur', 'S1'),
('FT', 'Elektro', 'S1'),
('FTI', 'Teknik Informatika', 'S1'),
('FTI', 'Sistem Informasi', 'S1'),
('FTI', 'Sistem Komputer', 'S1'),
('FTI', 'Manajemen Informatika', 'D3'),
('FTI', 'Komputerisasi Akuntasi', 'D3');

-- create table calas
CREATE TABLE `calas` (
    `nim` CHAR(10) NOT NULL,
    `nama_depan` VARCHAR(35) NOT NULL,
    `nama_belakang` VARCHAR(35) NOT NULL,
    `kode_fakultas` VARCHAR(5) NOT NULL,
    `id_prodi` TINYINT(2) UNSIGNED NOT NULL,
    `telephone` VARCHAR(17) NOT NULL,
    `alamat_email` VARCHAR(100) NOT NULL,
    `angkatan` YEAR NOT NULL DEFAULT '2016',
    `gelombang` TINYINT(1) NOT NULL DEFAULT '1',
    `waktu_pendaftaran` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP (),
    PRIMARY KEY (`nim` , `kode_fakultas` , `id_prodi`),
    UNIQUE (`nim`),
    CONSTRAINT `FK_FAKULTAS_2` FOREIGN KEY (`kode_fakultas`)
        REFERENCES `fakultas` (`kode_fakultas`)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT `FK_PRODI_1` FOREIGN KEY (`id_prodi`)
        REFERENCES `program_studi` (`id_prodi`)
        ON UPDATE CASCADE ON DELETE CASCADE
)  ENGINE=INNODB;