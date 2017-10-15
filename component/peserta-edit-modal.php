<?php

include "../koneksi.php";
$id=$_POST['id'];
$sql=$conn->query("SELECT * FROM peserta where nim=".$id)->fetchAll();
?>

<form class="ui form" action="controller/PesertaController.php" method="post">
  <input type="hidden" name="postPeserta" value="1">
  <input type="hidden" name="type" value="update">
  <div class="two fields">
    <div class="field">
      <label for="nim">Nomor Induk Mahasiswa</label>
      <input id="nim" type="text" name="nim" required="" value="<?php echo $sql[0]['nim']; ?>" minlength="10" maxlength="10" readonly onkeypress="return event.charCode >= 48 && event.charCode <= 57">
    </div>
    <div class="field">
      <label for="fullname">Nama Peserta</label>
      <input id="fullname" type="text" name="fullname" value="<?php echo $sql[0]['fullname']; ?>" required="" maxlength="50" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
    </div>
  </div>
  <div class="two fields">
    <div class="field">
      <label for="phone">Nomor Telepon</label>
      <input id="phone" type="text" name="phone" value="<?php echo $sql[0]['phone']; ?>" required="" maxlength="17" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
    </div>
    <div class="field">
      <label for="email">Alamat Email</label>
      <input id="email" type="text" value="<?php echo $sql[0]['email']; ?>" name="email" required="" maxlength="100">
    </div>
  </div>
  <div class="field">
    <label for="status">Status Kehadiran</label>
    <table class="ui padded selectable very basic table" >
      <tbody>
        <?php $Seminar=$conn->query("SELECT b.nama, a.id_seminar as id, a.status FROM peserta_seminar a JOIN seminar b ON a.id_seminar=b.id WHERE a.nim='$id'");
        foreach($Seminar as $sem){ ?>
          <tr>
            <td><?php echo $sem['nama'] ?></td>
            <td>
              <div class="inline fields">
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value='1' name="sem[<?php echo $sem['id'] ?>]" <?php if($sem['status']==1) echo 'checked="checked"'?>>
                    <label>Hadir</label>
                  </div>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" value='0' name="sem[<?php echo $sem['id'] ?>]" <?php if($sem['status']==0) echo 'checked="checked"'?>>
                    <label>Batal</label>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        <?php }
         ?>
      </tbody>
    </table>
  </div>
<div class="actions">
  <input class="ui button" type="reset" value="Bersihkan">
  <input class="ui primary right button" type="submit" name="update" value="Perbarui">
</div>
</form>
