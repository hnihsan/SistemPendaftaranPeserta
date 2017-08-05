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
    <a href="admin.php" class="active item">Halaman Admin</a>
    <div class="right menu">
      <a href="#" class="item"><i class="sign out icon"></i> Keluar</a>
    </div>
  </div>
<?php include 'footer.php'; ?>
