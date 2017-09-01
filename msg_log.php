<?php
include "koneksi.php";
if(!empty($_GET['msg'])){
try {
  $message=$conn->query("SELECT * FROM msg_log where id=".$_GET['msg'])->fetchAll();
  if(sizeof($message)<1){
    $message[0]['type']='negative';
    $message[0]['header']='Ooops';
    $message[0]['body']='Terjadi kesalahan';
  }
} catch (Exception $e) {
  $message[0]['type']='negative';
  $message[0]['header']='Ooops';
  $message[0]['body']='Terjadi kesalahan';
}

  ?>
  <div class="ui <?php echo $message[0]['type']; ?> message">
  <i class="close icon"></i>
  <div class="header">
    <?php echo $message[0]['header']; ?>
  </div>
  <p><?php echo $message[0]['body']; ?>
</p></div>
<?php }
?>
