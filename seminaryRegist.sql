CREATE DATABASE SeminaryRegist;
USE SeminaryRegist;

CREATE TABLE peserta (
  id BIGINT(8) NOT NULL AUTO_INCREMENT,
  nim char(10),
  fullname varchar(255) NOT NULL,
  jurusan char(2) NOT NULL,
  phone varchar(17),
  email varchar(255),
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
);

CREATE TABLE users (
  username char(100) NOT NULL,
  password char(32) NOT NULL,
  fullname varchar(255) NOT NULL,
  photo varchar(255),
  phone varchar(17),
  email varchar(255),
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (username)
);

CREATE TABLE jurusan (
  id char(2) NOT NULL,
  nama varchar(255) NOT NULL,
  fakultas enum('FTI','FEB','FISIP','FIKOM','D3', 'ASTRI'),
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);
###############################################
#  FOREIGN_KEY #
###############################################

ALTER TABLE peserta
  ADD CONSTRAINT FK_JURUSAN FOREIGN KEY (jurusan) REFERENCES jurusan (id) ON DELETE CASCADE ON UPDATE CASCADE
