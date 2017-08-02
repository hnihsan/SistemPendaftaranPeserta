<?php
include "koneksi.php";
include "head.php";
date_default_timezone_set("Asia/Jakarta");
?>
  <!--Menu-->
  <div class="ui stackable top fixed inverted borderless blue menu">
    <div class="item">
      <img src="resources/images/logo_bl.png">
    </div>
    <a href="TambahPeserta.php" class="active item">Tambah Peserta</a>
    <a href="PesertaTerdaftar.php" class="item">Peserta Terdaftar</a>
    <a href="admin.php" class="item">Halaman Admin</a>
    <div class="right menu">
      <a href="#" class="item"><i class="sign out icon"></i> Keluar</a>
    </div>
  </div>
  <div class="ui stackable main container grid">
    <div class="eight wide column">
      <form class="ui form" action="TambahPeserta.php" method="post">
        <div class="ui piled segments">
          <div class="ui yellow segment">
            <h4 class="ui dividing header">Data Diri</h4>
            <div class="two fields">
              <div class="field">
                <label for="nim">Nomor Induk Mahasiswa</label>
                <input id="nim" type="text" name="nim" required="" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
              </div>
              <div class="field">
                <label for="fullname">Nama Peserta</label>
                <input id="fullname" type="text" name="fullname" required="" maxlength="35" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label for="phone">Nomor Telepon</label>
                <input id="phone" type="text" name="phone" required="" maxlength="17" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
              </div>
              <div class="field">
                <label for="email">Alamat Email</label>
                <input id="email" type="text" name="email" required="" maxlength="100" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label for="fakultas">Fakultas</label>
                <input id="fakultas" type="text" name="fakultas" required="" readonly maxlength="17" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
              </div>
              <div class="field">
                <label for="jurusan">Jurusan</label>
                <input id="jurusan" type="text" name="jurusan" required="" readonly maxlength="100" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
              </div>
            </div>
            <div class="inline field">
              <div class="ui checkbox">
                <input type="checkbox" tabindex="0" id="seminar1" name="seminar">
                <label for="seminar1">Seminar 1</label>
              </div>
            </div>
            <div class="inline field">
              <div class="ui checkbox">
                <input type="checkbox" tabindex="0" id="seminar2" name="seminar">
                <label for="seminar2">Seminar 2</label>
              </div>
            </div>
            <div class="inline field">
              <div class="ui checkbox">
                <input type="checkbox" tabindex="0" id="seminar3" name="seminar">
                <label for="seminar3">Seminar 3</label>
              </div>
            </div>
            <div class="inline field">
              <div class="ui checkbox">
                <input type="checkbox" tabindex="0" id="seminar4" name="seminar">
                <label for="seminar4">Seminar 4</label>
              </div>
            </div>
          </div>
          <div class="ui two bottom attached buttons">
            <button class="ui button" type="clear" name="clear">Bersihkan</button>
            <button class="ui primary button" type="submit" name="simpan" onclick="loadDoc">Simpan</button>
          </div>
        </div>
      </form>
    </div>
    <div class="eight wide column">
      <div class="ui piled yellow segment">
        <h4 class="ui dividing header">Pendaftar Terkini (<?php echo date('d-m-Y') ?>)</h4>
        <table class="ui padded selectable very basic table">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Program Studi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>0</td>
              <td>Belum ada data</td>
              <td>-</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>
