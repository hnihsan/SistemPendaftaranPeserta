<?php
include "koneksi.php";
date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['postUsers'])){
  switch($_POST['type']){
    case 'create' :
      $username= $_POST['username'];
      $password= $_POST['password'];
      $fullname= $_POST['fullname'];;
      $photo= $_POST['photo'];
      $phone= $_POST['phone'];
      $email= $_POST['email'];

      $query = "INSERT INTO users VALUES('$username','$password','$fullname','$photo','$phone','$email','','')";
      if ($conn->query($query) === TRUE) {
        echo "berhasil, tinggal lempar ke index info";
      }else{
        echo "gagal, tinggal lempar ke index";
      }
      break;

    case 'update' :
      $username= $_POST['username'];
      $password= $_POST['password'];
      $fullname= $_POST['fullname'];;
      $photo= $_POST['photo'];
      $phone= $_POST['phone'];
      $email= $_POST['email'];

      $query = "UPDATE users set password='$password', fullname='$fullname', photo='$photo', phone='$phone', email='$email' WHERE username='$username'";
      if ($conn->query($query) === TRUE) {
        echo "berhasil, tinggal lempar ke index info";
      }else{
        echo "gagal, tinggal lempar ke index";
      }
      break;

    case 'delete' :
      $username= $_POST['username'];

      $query="DELETE FROM users WHERE username='$username'";
      if ($conn->query($query) === TRUE) {
        echo "berhasil, tinggal lempar ke index info";
      }else{
        echo "gagal, tinggal lempar ke index";
      }
      break;

    default :
      echo "Error here ...";
  }
}else{
  echo "Error Here ..";
}
?>
