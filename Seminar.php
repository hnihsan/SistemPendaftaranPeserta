<?php
include "head.php";
date_default_timezone_set("Asia/Jakarta");
?>
  <!--Menu-->
  <div class="ui stackable top fixed inverted borderless blue menu">
    <div class="item">
      <img src="resources/images/logo_bl.png">
    </div>
    <a href="TambahPeserta.php" class="item">Tambah Peserta</a>
    <a href="PesertaTerdaftar.php" class="item">Peserta Terdaftar</a>
    <div class="ui dropdown item">Halaman Admin <i class="dropdown icon"></i>
      <div class="menu">
        <a href="Seminar.php" class="active item">Seminar</a>
        <a href="Pengguna.php" class="item">Pengguna</a>
      </div>
    </div>
    <div class="right menu">
      <a href="#" class="item"><i class="sign out icon"></i> Keluar</a>
    </div>
  </div>
  <div class="ui stackable main container grid">
    <div class="sixteen width column">
      <div class="ui grid">
        <div class="four wide column">
          <div class="ui secondary vertical pointing menu">
            <a class="active item" href="Seminar.php">Seminar</a>
            <a class="item" href="Pengguna.php">Pengguna</a>
          </div>
        </div>
        <div class="twelve wide stretched column">
          <div class="ui raised segments">
            <div class="ui yellow attached segment">
              <h4 class="ui dividing header">Daftar Seminar</h4>
              <table class="ui padded selectable very basic table" id="table1">
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
                    <td><a href="#">Ubah</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="ui bottom attached primary button" tabindex="0">Tambah Seminar</div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>
