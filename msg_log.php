<?php
if(!empty($_GET['msg'])){
try {
  $message=$conn->query("SELECT * FROM msg_log where id=".$_GET['msg'])->fetchAll();
  if(sizeof($message)<1){
    $message[0]['type']='error';
    $message[0]['header']='Ooops :(';
    $message[0]['body']='Terjadi kesalahan';
  }
} catch (Exception $e) {
  $message[0]['type']='error';
  $message[0]['header']='Ooops :(';
  $message[0]['body']='Terjadi kesalahan';
}

  ?>
<script type="text/javascript">
  swal('<?php echo $message[0]['header'] ?>', '<?php echo $message[0]['body'] ?>', '<?php echo $message[0]['type'] ?>')
</script>
<?php }
?>
