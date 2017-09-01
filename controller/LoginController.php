<?php
include "../koneksi.php";
session_start();

date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['postLogin'])){
  $username=$_POST['username'];
  $password=md5($_POST['password']);

  $query ="SELECT username, fullname FROM users where username='$username' AND password='$password'";
  if ($conn->query($query)->fetchAll() == TRUE) {
    $data=$conn->query($query)->fetchAll();
    $_SESSION['username']=$data[0]['username'];
    $_SESSION['name']=$data[0]['fullname'];

    header("Location: ../Peserta.php");
  }else{
    header("Location: ../index.php?msg=20");
  }
}else{
  header("Location: ../index.php?msg=20");
}
