<?php
include "../koneksi.php";

session_start();
if(empty($_SESSION['username'])){
  //header("Location: index.php?msg=session_over");
}

date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['postUsers'])){
  switch($_POST['type']){
    case 'create' :
      $username= $_POST['username'];
      $password= md5($_POST['password']);
      $fullname= $_POST['fullname'];;
      $phone= $_POST['phone'];
      $email= $_POST['email'];

      $query = "INSERT INTO users (username,password,fullname,phone,email) VALUES(?,?,?,?,?)";
      $data = [$username,$password,$fullname,$phone,$email];
      if ($conn->prepare($query)->execute($data) === TRUE) {
        header("Location: ../Pengguna.php?msg=1");
      //  echo "Berhasil";
      }else{
        header("Location: ../Pengguna.php?msg=2");
      //  echo "gagal, tinggal lempar ke index";
      }
      break;

    case 'update' :
      $username= $_POST['username'];
      $password= md5($_POST['password']);
      $fullname= $_POST['fullname'];;
      $phone= $_POST['phone'];
      $email= $_POST['email'];

      $query = "UPDATE users set password=?, fullname=?, phone=?, email=? WHERE username=?";
      $data = [$password,$fullname,$phone,$email,$username];
      if ($conn->prepare($query)->execute($data) == TRUE) {
        header("Location: ../Pengguna.php?msg=3");
        // echo "berhasil, tinggal lempar ke index info";
      }else{
        header("Location: ../Pengguna.php?msg=4");
        //echo "gagal, tinggal lempar ke index<br>";
        // echo $conn->error;
      }
      break;

    case 'delete' :
      $username= $_POST['username'];

      $query="DELETE FROM users WHERE username=?";
      $data = [$username];
      if ($conn->prepare($query)->execute($data) == TRUE) {
        header("Location: ../Pengguna.php?msg=5");
        //echo "berhasil, tinggal lempar ke index info";
      }else{
        header("Location: ../Pengguna.php?msg=6");
        // echo "gagal, tinggal lempar ke index";
      }
      break;

    default :
      echo "Error here ...(Wrong type)";
  }
}else{
  echo "Error Here ..";
}
?>
