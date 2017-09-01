<?php
include "head.php";
date_default_timezone_set("Asia/Jakarta");
?>
<!--Menu-->
<div class="ui stackable top fixed inverted borderless blue menu">
    <div class="item">
        <img src="resources/images/logo_bl.png">
    </div>
    <div class="ui dropdown item">Peserta Terdaftar <i class="dropdown icon"></i>
        <div class="menu">
            <a href="Peserta.php" class="item">Peserta Seminar 1</a>
        </div>
    </div>
    <div class="ui dropdown item">Halaman Admin <i class="dropdown icon"></i>
        <div class="menu">
            <a href="Seminar.php" class="active item">Seminar</a>
            <a href="Pengguna.php" class="item">Pengguna</a>
        </div>
    </div>
    <div class="right menu">
        <div class="ui dropdown item">Admin <i class="dropdown icon"></i>
            <div class="menu">
                <a href="index.php" class="item">Keluar</a>
            </div>
        </div>
    </div>
</div>
<div class="ui stackable main container grid">
    <div class="sixteen width column">
        <div class="ui raised segments">
            <div class="ui yellow attached segment">
                <h4 class="ui dividing header">Daftar Seminar</h4>
                <table class="ui padded selectable very basic unstackable table" id="table1">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Seminar</th>
                        <th>Waktu</th>
                        <th>Tempat</th>
                        <th>Kuota</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>0</td>
                        <td>Belum ada data</td>
                        <td>Belum ada data</td>
                        <td>Belum ada data</td>
                        <td>-</td>
                        <td>
                            <a class="ui compact ubah button">Ubah</a>
                            <a class="ui compact negative button">Hapus</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="ui bottom attached primary tambah button" tabindex="0">Tambah Seminar</div>
        </div>
        <div class="ui modal" id="tambah">
            <i class="close icon"></i>
            <div class="header">
                Tambah Seminar
            </div>
            <div class="content">
                <form class="ui form" action="Seminar.php" method="post">
                    <div class="two fields">
                        <div class="field">
                            <label for="id">Kode Seminar</label>
                            <input id="id" type="text" name="id" readonly="">
                        </div>
                        <div class="field">
                            <label for="nm_seminar">Nama Seminar</label>
                            <input id="nm_seminar" type="text" name="nm_seminar" value="">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label for="waktu">Waktu</label>
                            <input id="waktu" type="datetime-local" name="waktu" required="">
                        </div>
                        <div class="field">
                            <label for="tempat">Tempat</label>
                            <input id="tempat" type="text" name="tempat" required="">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label for="kuota">Kuota</label>
                            <input id="kuota" type="number" name="kuota" required="" max="300">
                        </div>
                        <div class="field">
                            <label for="narasumber">Narasumber</label>
                            <input id="narasumber" type="text" name="narasumber" required=""
                                   onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
                        </div>
                    </div>
                </form>
            </div>
            <div class="actions">
                <input class="ui button" type="reset" value="Bersihkan">
                <input class="ui primary right button" type="submit" name="simpan" value="Simpan">
            </div>
        </div>
        <div class="ui modal" id="ubah">
            <i class="close icon"></i>
            <div class="header">
                Ubah Seminar
            </div>
            <div class="content">
                <form class="ui form" action="Seminar.php" method="post">
                    <div class="two fields">
                        <div class="field">
                            <label for="id">Kode Seminar</label>
                            <input id="id" type="text" name="id" readonly="">
                        </div>
                        <div class="field">
                            <label for="nm_seminar">Nama Seminar</label>
                            <input id="nm_seminar" type="text" name="nm_seminar" value="">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label for="waktu">Waktu</label>
                            <input id="waktu" type="datetime-local" name="waktu" required="">
                        </div>
                        <div class="field">
                            <label for="tempat">Tempat</label>
                            <input id="tempat" type="text" name="tempat" required="">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label for="kuota">Kuota</label>
                            <input id="kuota" type="number" name="kuota" required="" max="300">
                        </div>
                        <div class="field">
                            <label for="email">Narasumber</label>
                            <input id="narasumber" type="text" name="narasumber" required=""
                                   onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
                        </div>
                    </div>
                </form>
            </div>
            <div class="actions">
                <input class="ui button" type="reset" value="Bersihkan">
                <input class="ui primary right button" type="submit" name="update" value="Perbarui">
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
