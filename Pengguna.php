<?php
include "head.php";
date_default_timezone_set("Asia/Jakarta");
?>
  <div class="ui stackable main container grid">
    <div class="sixteen width column">
      <div class="ui raised segments">
        <div class="ui yellow segment">
          <h4 class="ui dividing header">Daftar Pengguna</h4>
          <table class="ui padded selectable very basic table" id="table1">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Pengguna</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $users=$conn->query("SELECT * FROM users");
              if(sizeof($users)<1){ ?>
                <tr>
                  <td>0</td>
                  <td>Belum ada data</td>
                  <td>Belum ada data</td>
                  <td>Belum ada data</td>
                  <td><a href="#">Ubah</a></td>
                </tr>
              <?php }else{
                foreach($users as $user){
                  echo "<tr>";
                  echo "<td>".$user['username']."</td>";
                  echo "<td>".$user['fullname']."</td>";
                  echo "<td>".$user['phone']."</td>";
                  echo "<td>".$user['email']."</td>";
                  echo "<td><a href='#'>Ubah</a></td>";
                  echo "</tr>";
                }
              } ?>
            </tbody>
          </table>
        </div>
        <div class="ui bottom attached primary tambah button" tabindex="0">Tambah Pengguna</div>
      </div>
      <div class="ui modal" id="tambah">
        <i class="close icon"></i>
        <div class="header">
          Tambah Pengguna
        </div>
        <div class="content">
          <form class="ui form" action="controller/UserController.php" method="post">
            <input type="hidden" name="postUsers" value="1" readonly>
            <input type="hidden" name="type" value="create">
            <div class="two fields">
              <div class="field">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" required="" maxlength="50" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
              </div>
              <div class="field">
                <label for="fullname">Nama Lengkap</label>
                <input id="fullname" type="text" name="fullname" required maxlength="100" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label for="password">Kata Sandi</label>
                <input id="password" type="password" name="password" required="" maxlength="32">
              </div>
              <div class="field">
                <label for="valid_pass">Konfirmasi Kata Sandi</label>
                <input id="valid_pass" type="password" name="valid_pass" required="" maxlength="32">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label for="phone">Telepon</label>
                <input id="phone" type="text" name="phone" required="" maxlength="17" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
              </div>
              <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required="" maxlength="100">
              </div>
            </div>
        </div>
        <div class="actions">
          <input class="ui button" type="reset" value="Bersihkan">
          <input class="ui primary right button" type="submit" name="simpan" value="Simpan">
        </div>
      </form>
      </div>
      <div class="ui modal" id="ubah">
        <i class="close icon"></i>
        <div class="header">
          Ubah Pengguna
        </div>
        <div class="content">
          <form class="ui form" action="Pengguna.php" method="post">
            <div class="field">
              <label for="username">Nama Pengguna</label>
              <input id="username" type="text" name="username" required="" maxlength="50" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
            </div>
            <div class="two fields">
              <div class="field">
                <label for="password">Kata Sandi</label>
                <input id="password" type="password" name="password" required="" maxlength="32">
              </div>
              <div class="field">
                <label for="valid_pass">Konfirmasi Kata Sandi</label>
                <input id="valid_pass" type="password" name="valid_pass" required="" maxlength="32">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label for="phone">Telepon</label>
                <input id="phone" type="text" name="phone" required="" maxlength="17" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
              </div>
              <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required="" maxlength="100">
              </div>
            </div>
        </div>
        <div class="actions">
          <input class="ui button" type="reset" value="Bersihkan">
          <input class="ui primary right button" type="submit" name="update" value="Perbarui">
        </div>
      </form>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>
