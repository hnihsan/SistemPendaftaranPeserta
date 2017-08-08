<?php
include "../koneksi.php";
date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['postSeminar'])){
  switch($_POST['type']){
    case 'create' :
      $nama= $_POST['nama'];
      $waktu= $_POST['waktu'];
      $tempat= $_POST['tempat'];;
      $narasumber= $_POST['narasumber'];
      $kuota= $_POST['kuota'];

      $query = "INSERT INTO seminar (nama,waktu,tempat,narasumber,kuota) VALUES('$nama','$waktu','$tempat','$narasumber','$kuota')";
      if ($conn->query($query) === TRUE) {
        echo "berhasil, tinggal lempar ke index info";
      }else{
        echo "gagal, tinggal lempar ke index";
        echo $conn->error;
      }
      break;

    case 'update' :
      $id=$_POST['id'];
      $nama= $_POST['nama'];
      $waktu= $_POST['waktu'];
      $tempat= $_POST['tempat'];;
      $narasumber= $_POST['narasumber'];
      $kuota= $_POST['kuota'];

      $query = "UPDATE seminar set nama='$nama', waktu='$waktu',tempat='$tempat',narasumber='$narasumber',kuota='$kuota' where id='$id' ";
      if ($conn->query($query) === TRUE) {
        echo "berhasil, tinggal lempar ke index info";
      }else{
        echo "gagal, tinggal lempar ke index";
        echo $conn->error;
      }
      break;

    default :
      echo "Error here ...";
  }
}else{
  echo "Error Here ..";
}
?>
