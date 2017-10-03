<?php
include "../koneksi.php";
session_start();
$_SESSION['username']='administrator';
if(empty($_SESSION['username'])){
  header("Location: index.php");
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
    $nim=$_POST['nim'];
      if(empty($nim)){
        $nim="0000".''.rand(100000,999999);
      }
      $peserta=$conn->query("SELECT * FROM peserta WHERE nim='".$nim."'")->fetchAll();
      if(empty($peserta[0]['fullname'])){
        $fullname= $_POST['fullname'];
        $phone= $_POST['phone'];
        $email= $_POST['email'];
        $jurusan= new jurusan;
        $idjurusan=$jurusan->getJurusan($nim);

        $query = "INSERT INTO peserta (nim,fullname,jurusan,phone,email) VALUES(?,?,?,?,?)";
        $data = [$nim,$fullname,$idjurusan,$phone,$email];
        if ($conn->prepare($query)->execute($data) != TRUE) {
          $_SESSION['msg']="203";
          header("Location: ../TambahPeserta.php");
        }
      }
      $seminar=$_POST['seminar'];
      if(empty($seminar)){
        $_SESSION['msg']="299";
         header("Location: ../TambahPeserta.php");
      }else{
        $petugas= $_SESSION['username'];
        foreach($seminar as $sem){
          $query = "INSERT INTO peserta_seminar (id_seminar,nim,petugas) VALUES(?,?,?)";
          $data = [$sem,$nim,$petugas];
          try {
            $conn->prepare($query)->execute($data);
            $_SESSION['msg']="103";
             header("Location: ../TambahPeserta.php");
          } catch (Exception $e) {
            switch($e->getCode()){
              case '23000' : $_SESSION['msg']="233";header("Location: ../TambahPeserta.php"); break;
              default : $_SESSION['msg']="203";header("Location: ../TambahPeserta.php"); break;
            }
          }
        }
      }
      break;

    case 'update' :
      $nim= $_POST['nim'];
      $petugas= $_SESSION['username'];
      $fullname= $_POST['fullname'];
      $jurusan= new jurusan;
      $idjurusan=$jurusan->getJurusan($nim);
      $phone= $_POST['phone'];
      $email= $_POST['email'];
      $sem=$_POST['id'][1];
      $status=$_POST['status'];

      $query = "UPDATE peserta set status=?, petugas=?, fullname=?, jurusan=?, phone=?, email=? WHERE nim=?";
      $data=[$status,$petugas,$fullname,$idjurusan,$phone,$email,$nim];
      if ($conn->prepare($query)->execute($data) == TRUE) {
        $_SESSION['msg']="113";
        header("Location: ../Peserta.php");
      }else{
        $_SESSION['msg']="213";
        header("Location: ../Peserta.php");
      }
      break;

    default :
    $_SESSION['msg']="299";
      header("Location: ../TambahPeserta.php");
  }
}else{
  $_SESSION['msg']="299";
  header("Location: ../TambahPeserta.php");
}
?>
