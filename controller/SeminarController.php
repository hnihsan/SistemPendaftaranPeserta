<?php
include "../koneksi.php";
session_start();
if(empty($_SESSION['username'])){
  header("Location: index.php?msg=300");
}

date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['postSeminar'])){
  switch($_POST['type']){
    case 'create' :
      $nama= $_POST['nama'];
      $waktu= $_POST['waktu'];
      $tempat= $_POST['tempat'];;
      $narasumber= $_POST['narasumber'];
      $kuota= $_POST['kuota'];

      $query = "INSERT INTO seminar (nama,waktu,tempat,narasumber,kuota) VALUES(?,?,?,?,?)";
      $data=[$nama,$waktu,$tempat,$narasumber,$kuota];
      if ($conn->prepare($query)->execute($data) == TRUE) {
        header("Location: ../Seminar.php?msg=102");
      }else{
        header("Location: ../Seminar.php?msg=202");
      }
      break;

    case 'update' :
      $id=$_POST['id'];
      $nama= $_POST['nama'];
      $waktu= $_POST['waktu'];
      $tempat= $_POST['tempat'];;
      $narasumber= $_POST['narasumber'];
      $kuota= $_POST['kuota'];

      $query = "UPDATE seminar set nama=?, waktu=?,tempat=?,narasumber=?,kuota=? where id=? ";
      $data=[$nama,$waktu,$tempat,$narasumber,$kuota,$id];
      if ($conn->prepare($query)->execute($data) == TRUE) {
        header("Location: ../Seminar.php?msg=112");
      }else{
        header("Location: ../Seminar.php?msg=212");
      }
      break;
    case 'delete' :
      $id=$_POST['id'];
      $query ="DELETE FROM seminar where id=".$id;
      if ($conn->query($query) == TRUE) {
        header("Location: ../Seminar.php?msg=122");
      }else{
        header("Location: ../Seminar.php?msg=222");
      }
      break;
    default :
      header("Location: ../Seminar.php?msg=299");
  }
}else{
  header("Location: ../Seminar.php?msg=299");
}
?>
