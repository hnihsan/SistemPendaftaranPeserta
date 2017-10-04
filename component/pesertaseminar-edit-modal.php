<?php

include "../koneksi.php";
$id=$_POST['id'];
$sem=$_POST['sem'];
?>

<form class="ui form" action="controller/PesertaController.php?id=<?php echo $_GET['id'] ?>" method="post">
  <input type="hidden" name="postPeserta" value="1">
  <input type="hidden" name="type" value="updateStatus">
  <input type="hidden" name="id_seminar" value="<?php echo $sem; ?>">
  <input type="hidden" name="nim" value="<?php echo $id; ?>">
  <div class="two field">
    <div class="field">
      <label for="status">Status Kehadiran</label>
    </div>
    <?php $Seminar=$conn->query("SELECT a.status FROM peserta_seminar a JOIN seminar b ON a.id_seminar=b.id WHERE a.nim='$id' AND a.id_seminar='$sem'")->fetchAll(); ?>
    <div class="inline fields">
      <div class="field">
        <div class="ui radio checkbox">
          <input type="radio" value='1' name="status" <?php if($Seminar[0]['status']==1) echo 'checked="checked"'?>>
          <label>Hadir</label>
        </div>
      </div>
      <div class="field">
        <div class="ui radio checkbox">
          <input type="radio" value='0' name="status" <?php if($Seminar[0]['status']==0) echo 'checked="checked"'?>>
          <label>Batal</label>
        </div>
      </div>
    </div>
  </div>
<div class="actions">
  <input class="ui button" type="reset" value="Bersihkan">
  <input class="ui primary right button" type="submit" name="update" value="Perbarui">
</div>
</form>
