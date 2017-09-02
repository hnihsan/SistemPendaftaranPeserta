<?php

include "../koneksi.php";
$id=$_POST['id'];
$sql=$conn->query("SELECT * FROM users where username='".$id."'")->fetchAll();
?>

<form class="ui form" action="controller/UserController.php" method="post">
  <input type="hidden" name="postUsers" value="1">
  <input type="hidden" name="type" value="update">
  <input type="hidden" name="username" value="<?php echo $sql[0]['username'] ?>">
  <div class="field">
    <label for="fullname">Nama Pengguna</label>
    <input id="fullname" value="<?php echo $sql[0]['fullname'] ?>" type="text" name="fullname" required="" maxlength="50" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
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
      <input id="phone" type="text" name="phone" value="<?php echo $sql[0]['phone'] ?>" required="" maxlength="17" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
    </div>
    <div class="field">
      <label for="email">Email</label>
      <input id="email" type="email" name="email" required="" maxlength="100" value="<?php echo $sql[0]['email'] ?>">
    </div>
  </div>
</div>
  <div class="actions">
    <input class="ui button" type="reset" value="Bersihkan">
    <input class="ui primary right button" type="submit" name="update" value="Perbarui">
  </div>
</form>
