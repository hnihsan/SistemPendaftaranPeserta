<?php
include "../koneksi.php";
session_start();
if(empty($_SESSION['username'])){
  header("Location: index.php?msg=300");
}

date_default_timezone_set("Asia/Jakarta");
class jurusan{
  function getJurusan($nim){
    $conn=connect_db();
    $kode=substr($nim, 2,2); $cbg=substr($nim, 4,2);
    if(empty($id=$conn->query("SELECT id from jurusan where kode='".$kode."' AND cabang='".$cbg."'")->fetch(PDO::FETCH_ASSOC))){
      return "21";
    }else{
      return $id['id'];
    }
  }
}

if(isset($_POST['postPeserta'])){
  switch($_POST['type']){
    case 'create' :
      $seminar=$_POST['seminar'];
      $nim= $_POST['nim'];
      $fullname= $_POST['fullname'];
      $phone= $_POST['phone'];
      $email= $_POST['email'];
      $petugas=  $_SESSION['username'];
      $jurusan= new jurusan;
      $idjurusan=$jurusan->getJurusan($nim);
      if(empty($seminar)){
         header("Location: ../Peserta.php?msg=299");
      }else{
        foreach($seminar as $sem){
          $query = "INSERT INTO peserta (id_seminar,nim,fullname,jurusan,phone,email,petugas) VALUES(?,?,?,?,?,?,?)";
          $data = [$sem,$nim,$fullname,$idjurusan,$phone,$email,$petugas];
          try {
            $conn->prepare($query)->execute($data);
            header("Location: ../Peserta.php?id=$sem&msg=103");
          } catch (Exception $e) {
            switch($e->getCode()){
              case '23000' : header("Location: ../Peserta.php?id=$sem&msg=233"); break;
              default : header("Location: ../Peserta.php?id=$sem&msg=203"); break;
            }
          }

        }
      }
      break;

    case 'update' :
      $id= $_POST['id'][0];
      $nim= $_POST['nim'];
      $petugas= $_SESSION['username'];
      $fullname= $_POST['fullname'];
      $jurusan= new jurusan;
      $idjurusan=$jurusan->getJurusan($nim);
      $phone= $_POST['phone'];
      $email= $_POST['email'];
      $sem=$_POST['id'][1];
      $status=$_POST['status'];

      $query = "UPDATE peserta set nim=?, status=?, petugas=?, fullname=?, jurusan=?, phone=?, email=? WHERE id=?";
      $data=[$nim,$status,$petugas,$fullname,$idjurusan,$phone,$email,$id];
      if ($conn->prepare($query)->execute($data) == TRUE) {
        header("Location: ../Peserta.php?id=$sem&msg=113");
      }else{
        header("Location: ../Peserta.php?id=$sem&msg=213");
      }
      break;

    default :
      header("Location: ../Peserta.php?msg=299");
  }
}else{
  header("Location: ../Peserta.php?isg=299");
}
?>
