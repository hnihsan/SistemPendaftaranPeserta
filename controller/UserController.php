<?php
include "../koneksi.php";

session_start();
if (empty($_SESSION['username'])) {
    header("Location: index.php?msg=300");
}

date_default_timezone_set("Asia/Jakarta");

if (isset($_POST['postUsers'])) {
    switch ($_POST['type']) {
        case 'create' :
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $fullname = $_POST['fullname'];;
            $phone = $_POST['phone'];
            $email = $_POST['email'];

      $query = "INSERT INTO users (username,password,fullname,phone,email) VALUES(?,?,?,?,?)";
      $data = [$username,$password,$fullname,$phone,$email];
      if ($conn->prepare($query)->execute($data) === TRUE) {
        $_SESSION['msg']="101";header("Location: ../Pengguna.php");
      }else{
        $_SESSION['msg']="201";header("Location: ../Pengguna.php");
      }
      break;

        case 'update' :
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $fullname = $_POST['fullname'];;
            $phone = $_POST['phone'];
            $email = $_POST['email'];

      $query = "UPDATE users set password=?, fullname=?, phone=?, email=? WHERE username=?";
      $data = [$password,$fullname,$phone,$email,$username];
      if ($conn->prepare($query)->execute($data) == TRUE) {
        $_SESSION['msg']="111";header("Location: ../Pengguna.php");
      }else{
        $_SESSION['msg']="211";header("Location: ../Pengguna.php");
      }
      break;

        case 'delete' :
            $username = $_POST['username'];

            $query = "DELETE FROM users WHERE username=?";
            $data = [$username];

      if ($conn->prepare($query)->execute($data) == TRUE) {
        $_SESSION['msg']="121";header("Location: ../Pengguna.php");
      }else{
        $_SESSION['msg']="221";header("Location: ../Pengguna.php");
      }
      break;

    default :
    $_SESSION['msg']="299";  header("Location: ../Pengguna.php");
  }
}else{
  $_SESSION['msg']="299";header("Location: ../Pengguna.php");
}
?>
