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
      $tanggal= $_POST['tanggal'];
      $jam= $_POST['waktu'];
      $waktu=$tanggal.' '.$jam;
      $tempat= $_POST['tempat'];;
      $narasumber= $_POST['narasumber'];
      $kuota= $_POST['kuota'];
      $harga= $_POST['harga'];

      $query = "INSERT INTO seminar (nama,waktu,tempat,narasumber,kuota,harga) VALUES(?,?,?,?,?,?)";
      $data=[$nama,$waktu,$tempat,$narasumber,$kuota,$harga];
      if ($conn->prepare($query)->execute($data) == TRUE) {
        $_SESSION['msg']="102";
        header("Location: ../Seminar.php");

      }else{
        $_SESSION['msg']="202";
        header("Location: ../Seminar.php");
      }
      break;

    case 'update' :
      $id=$_POST['id'];
      $nama= $_POST['nama'];
      $waktu= $_POST['waktu'];
      $tempat= $_POST['tempat'];;
      $narasumber= $_POST['narasumber'];
      $kuota= $_POST['kuota'];
      $harga= $_POST['harga'];

      $query = "UPDATE seminar set nama=?, waktu=?,tempat=?,narasumber=?,kuota=?,harga=? where id=? ";
      $data=[$nama,$waktu,$tempat,$narasumber,$kuota,$harga,$id];
      if ($conn->prepare($query)->execute($data) == TRUE) {
        $_SESSION['msg']="112";
        header("Location: ../Seminar.php");
      }else{
        $_SESSION['msg']="212";
        header("Location: ../Seminar.php");
      }
      break;
    case 'delete' :
      $id=$_POST['id'];
      $query ="DELETE FROM seminar where id=".$id;
      if ($conn->query($query) == TRUE) {
        $_SESSION['msg']="122";
        header("Location: ../Seminar.php");
      }else{
        $_SESSION['msg']="222";
        header("Location: ../Seminar.php");
      }
      break;
    default :
      $_SESSION['msg']="299";
      header("Location: ../Seminar.php");
  }
}else{
  $_SESSION['msg']="299";
  header("Location: ../Seminar.php");
}
?>
