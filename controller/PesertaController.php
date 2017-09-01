<?php
include "../koneksi.php";
session_start();
if(empty($_SESSION['username'])){
  //header("Location: index.php?session_over=#");
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
      $petugas=  'hnihsan';//$_SESSION['username'];
      $jurusan= new jurusan;
      $idjurusan=$jurusan->getJurusan($nim);
      if(empty($seminar)){
         header("Location: ../TambahPeserta.php?msg=20");
      }else{
        foreach($seminar as $sem){
          $query = "INSERT INTO peserta (id_seminar,nim,fullname,jurusan,phone,email,petugas) VALUES(?,?,?,?,?,?,?)";
          $data = [$sem,$nim,$fullname,$idjurusan,$phone,$email,$petugas];
          /*if ($conn->prepare($query)->execute($data) == TRUE) {
            header("Location: ../Peserta.php?msg=13");
            echo "berhasil, tinggal lempar ke index info<br>";
          }else{
            header("Location: ../Peserta.php?msg=14");
            //echo "gagal, tinggal lempar ke index";
          //  echo $conn->error;
            break;
          } */

          try {
            $conn->prepare($query)->execute($data);
          } catch (Exception $e) {
            switch($e->getCode()){
              case '23000' : header("Location: ../Peserta.php?id=$sem&msg=duplicate"); break;
            }
          }

        }
      }
      break;

    case 'update' :
      $id= $_POST['id'];
      $nim= $_POST['nim'];
      $petugas= "hnihsan";//$_SESSION['username'];
      $fullname= $_POST['fullname'];
      $jurusan= new jurusan;
      $idjurusan=$jurusan->getJurusan($nim);
      $phone= $_POST['phone'];
      $email= $_POST['email'];

      $query = "UPDATE peserta set nim=?, petugas=?, fullname=?, jurusan=?, phone=?, email=? WHERE id=?";
      $data=[$nim,$petugas,$fullname,$idjurusan,$phone,$email,$id];
      if ($conn->prepare($query)->execute($data) == TRUE) {
        header("Location: ../Peserta.php?msg=15");
        //echo "berhasil, tinggal lempar ke index info";
      }else{
        header("Location: ../Peserta.php?msg=16");
        //echo "gagal, tinggal lempar ke index";
      }
      break;

    default :
      echo "Error here ...";
  }
}else{
  echo "Error Here ..";
}
?>
