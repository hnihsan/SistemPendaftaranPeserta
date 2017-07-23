<?php
include "../koneksi.php";
date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['postPeserta'])){
  switch($_POST['type']){
    case 'create' :
      $nim= $_POST['nim'];
      $fullname= $_POST['fullname'];
      $jurusan= $_POST['jurusan'];;
      $phone= $_POST['phone'];
      $email= $_POST['email'];

      $query = "INSERT INTO peserta (nim,fullname,jurusan,phone,email) VALUES('$nim','$fullname','$jurusan','$phone','$email')";
      if ($conn->query($query) === TRUE) {
        echo "berhasil, tinggal lempar ke index info";
      }else{
        echo "gagal, tinggal lempar ke index";
        echo $conn->error;
      }
      break;

    case 'update' :
      $id= $_POST['id'];
      $nim= $_POST['nim'];
      $fullname= $_POST['fullname'];
      $jurusan= $_POST['jurusan'];;
      $phone= $_POST['phone'];
      $email= $_POST['email'];

      $query = "UPDATE peserta set nim='$nim', fullname='$fullname', jurusan='$jurusan', phone='$phone', email='$email' WHERE id='$id'";
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
