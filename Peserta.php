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
        <a href="Peserta.php" class="active item">Peserta Seminar 1</a>
      </div>
    </div>
    <div class="ui dropdown item">Halaman Admin <i class="dropdown icon"></i>
      <div class="menu">
        <a href="Seminar.php" class="item">Seminar</a>
        <a href="Pengguna.php" class="item">Pengguna</a>
      </div>
    </div>
    <div class="right menu">
      <a href="#" class="item"><i class="sign out icon"></i> Keluar</a>
    </div>
  </div>
  <div class="ui stackable main container grid">
    <div class="sixteen width column">
      <div class="ui raised segments">
        <div class="ui yellow segment">
          <h4 class="ui dividing header">Daftar Peserta Terdaftar</h4>
          <table class="ui padded selectable very basic table" id="table1">
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
        <div class="ui bottom attached primary tambah button" tabindex="0">Tambah Peserta</div>
      </div>
      <div class="ui modal">
        <i class="close icon"></i>
        <div class="header">
          Tambah Peserta
        </div>
        <div class="content">
          <form class="ui form" action="Peserta.php" method="post">
            <div class="two fields">
              <div class="field">
                <label for="nim">Nomor Induk Mahasiswa</label>
                <input id="nim" type="text" name="nim" required="" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
              </div>
              <div class="field">
                <label for="fullname">Nama Peserta</label>
                <input id="fullname" type="text" name="fullname" required="" maxlength="50" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label for="phone">Nomor Telepon</label>
                <input id="phone" type="text" name="phone" required="" maxlength="17" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
              </div>
              <div class="field">
                <label for="email">Alamat Email</label>
                <input id="email" type="text" name="email" required="" maxlength="100">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label for="fakultas">Fakultas</label>
                <input id="fakultas" type="text" name="fakultas" required="" readonly>
              </div>
              <div class="field">
                <label for="jurusan">Jurusan</label>
                <input id="jurusan" type="text" name="jurusan" required="" readonly>
              </div>
            </div>
            <div class="inline field">
              <label for="seminar">Nama Seminar</label>
              <select class="ui fluid search dropdown" name="seminar" multiple>
                <option value="">Pilih Seminar</option>
                <option value="seminar1">Seminar 1</option>
                <option value="seminar2">Seminar 2</option>
                <option value="seminar3">Seminar 3</option>
                <option value="seminar4">Seminar 4</option>
              </select>
            </div>
          </form>
        </div>
        <div class="actions">
          <input class="ui button" type="reset" value="Bersihkan">
          <input class="ui primary right button" type="submit" name="simpan" value="Simpan">
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>
