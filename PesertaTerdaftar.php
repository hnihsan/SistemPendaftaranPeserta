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
    <a href="PesertaTerdaftar.php" class="active item">Peserta Terdaftar</a>
    <a href="admin.php" class="item">Halaman Admin</a>
    <div class="right menu">
      <a href="#" class="item"><i class="sign out icon"></i> Keluar</a>
    </div>
  </div>
  <div class="ui stackable main container grid">
    <div class="sixteen width column">
      <div class="ui piled yellow segment">
        <h4 class="ui dividing header">Daftar Peserta Terdaftar</h4>
        <table class="ui padded selectable very basic table" id="table_id">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Program Studi</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>0</td>
              <td>Belum ada data</td>
              <td>Belum ada data</td>
              <td>-</td>
              <td><a href="#">Ubah</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>
