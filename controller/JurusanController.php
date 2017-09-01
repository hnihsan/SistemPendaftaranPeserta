<?php
include "../koneksi.php";
session_start();
if(!isset($_SESSION[username])){
  header("Location: index.php?session_over=#");
}

date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['postJurusan'])){
  switch($_POST['type']){
    case 'create' :
      $id= $_POST['id'];
      $nama= $_POST['nama'];
      $fakultas= $_POST['fakultas'];

      $query = "INSERT INTO jurusan (id,nama,fakultas) VALUES('$id','$nama','$fakultas')";
      if ($conn->query($query) === TRUE) {
        echo "berhasil, tinggal lempar ke index info";
      }else{
        echo "gagal, tinggal lempar ke index";
      }
      break;

    case 'update' :
      $id= $_POST['id'];
      $nama= $_POST['nama'];
      $fakultas= $_POST['fakultas'];

      $query = "UPDATE jurusan set nama='$nama', fakultas='$fakultas' WHERE id='$id'";
      if ($conn->query($query) === TRUE) {
        echo "berhasil, tinggal lempar ke index info";
      }else{
        echo "gagal, tinggal lempar ke index";
      }
      break;

    case 'delete' :
      $id= $_POST['id'];

      $query="DELETE FROM jurusan WHERE id='$id'";
      if ($conn->query($query) === TRUE) {
        echo "berhasil, tinggal lempar ke index info";
      }else{
        echo "gagal, tinggal lempar ke index";
      }
      break;

    default :
      echo "Error here ...(Wrong type)";
  }
}else{
  echo "Error Here ..";
}
?>
