<?php
include "../koneksi.php";
date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['postPeserta'])){
  switch($_POST['type']){
    case 'create' :
      $seminar=$_POST['seminar'];
      $nim= $_POST['nim'];
      $fullname= $_POST['fullname'];
      $jurusan= $_POST['jurusan'];;
      $phone= $_POST['phone'];
      $email= $_POST['email'];

      if(empty($seminar)){
        echo "Kosong, lempar ke index";
      }else{
        $N= count($seminar);

        for($i=0;$i<$N;$i++){
          $query = "INSERT INTO peserta (id_seminar,nim,fullname,jurusan,phone,email) VALUES('$id_seminar[$i]','$nim','$fullname','$jurusan','$phone','$email')";
          if ($conn->query($query) === TRUE) {
            echo "berhasil, tinggal lempar ke index info<br>";
          }else{
            echo "gagal, tinggal lempar ke index";
            echo $conn->error;
            break;
          }
        }
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
