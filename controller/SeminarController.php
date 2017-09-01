<?php
include "../koneksi.php";
session_start();
if(empty($_SESSION['username'])){
//  header("Location: index.php?session_over=#");
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
        header("Location: ../Seminar.php?msg=7");
        //echo "berhasil, tinggal lempar ke index info";
      }else{
        header("Location: ../Seminar.php?msg=8");
        //echo "gagal, tinggal lempar ke index";
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
        header("Location: ../Seminar.php?msg=9");
      }else{
        header("Location: ../Seminar.php?msg=10");
        echo $conn->error;
      }
      break;
    case 'delete' :
      $id=$_POST['id'];
      $query ="DELETE FROM seminar where id=".$id;      
      if ($conn->query($query) == TRUE) {
        header("Location: ../Seminar.php?msg=11");
      }else{
        header("Location: ../Seminar.php?msg=12");
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
