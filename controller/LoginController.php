<?php
include "../koneksi.php";
session_start();

date_default_timezone_set("Asia/Jakarta");

if (isset($_POST['postLogin'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

  $query ="SELECT username, fullname FROM users where username='$username' AND password='$password'";
  if ($conn->query($query)->fetchAll() == TRUE) {
    $data=$conn->query($query)->fetchAll();
    $_SESSION['username']=$data[0]['username'];
    $_SESSION['fullname']=$data[0]['fullname'];
    $nick=explode(' ',$data[0]['fullname']);
    $_SESSION['nickname']=$nick[0];
      header("Location: ../TambahPeserta.php");
  }else{
    $_SESSION['msg']="301";header("Location: ../index.php");
  }
}else if(isset($_POST['postLogout'])){
  session_unset();
  session_destroy();
  header("Location: ../index.php");
}else{
  $_SESSION['msg']="300";header("Location: ../index.php");
}
