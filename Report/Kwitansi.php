<?php
include "head.php";
if(!empty($_GET['id'])){
  $id=$_GET['id'];
}else{
  header("Location: ../Peserta.php");
}
date_default_timezone_set("Asia/Jakarta");
$Peserta=$conn->query("SELECT * FROM peserta WHERE nim=$id")->fetchAll();
$Jurusan=$conn->query("SELECT nama, fakultas FROM jurusan WHERE id='".$Peserta[0]['jurusan']."'")->fetchAll();
switch ($Jurusan[0]['fakultas']) {
  case 'FTI': $Fakultas="Fakultas Teknologi Informasi";break;
  case 'FT' : $Fakultas="Fakultas Teknik";break;
  case 'FEB' : $Fakultas="Fakultas Ekonomi dan Bisnis";break;
  case 'FISIP' : $Fakultas="Fakultas Ilmu Sosial dan Ilmu Politik";break;
  case 'FIKOM' : $Fakultas="Fakultas Ilmu Komunikasi";break;
  case 'ASTRI' : $Fakultas="Akademi Sekretari";break;
  case 'PAS' : $Fakultas="Pascasarjana";break;
  case '-' : $Fakultas="Umum";break;
  default:
    $Fakultas='Umum';
    break;
}
$Seminar=$conn->query("SELECT * FROM seminar a JOIN peserta_seminar b ON id_seminar WHERE a.id=b.id_seminar AND b.nim=$id AND b.status=1");
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- Site Properties -->
    <title>Sistem Pendaftaran Seminar Universitas Budi Luhur</title>
    <link rel="stylesheet" type="text/css" href="resources/semantic/semantic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="resources/semantic/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" href="resources/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
    <script src="resources/js/sweetalert2.min.js"></script>
</head>
<body>
<!--Menu-->
<div class="ui stackable top fixed inverted borderless blue menu">
    <div class="item">
        <a href="../Peserta.php"><i class="chevron left icon"></i> Kembali</a>
    </div>
    <div class="right menu">
        <div class="ui dropdown item"><?php echo "Hai, " . $_SESSION['nickname']; ?> <i class="dropdown icon"></i>
            <div class="menu">
                <form action="controller/LoginController.php" method="post" class="ui form">
                    <input type="hidden" name="postLogout" value="1" class="item">
                    <button type="submit" class="ui basic fluid button" name="Keluar">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--body-->
<div id="section-to-print" class="ui main container ">
  <br>
  <h3  class="ui center aligned header">Kwitansi Pendaftaran</h3>
  <h5 class="ui center aligned header"><?php echo date("j F Y,")." pukul ".date("H:i") ?></h5>
  <div class="ui relaxed divided list">
      <div class="item">
          <div class="header">Nama</div>
          <?php echo $Peserta[0]['fullname']; ?>
      </div>
      <div class="item">
          <div class="header">Jurusan</div>
          <?php echo $Jurusan[0]['nama'] ?>
      </div>
      <div class="item">
          <div class="header">Fakultas</div>
          <?php echo $Fakultas; ?>
      </div>
      <div class="item">
          <div class="header">Seminar yang Diikuti</div>
          <table class="ui celled table">
              <thead>
              <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Harga</th>
              </tr>
              </thead>
              <tbody>
    <?php $total=0;
    foreach($Seminar as $row) {?>
              <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <td><?php echo "Rp.".number_format($row['harga'],0,',','.') ?></td>
              </tr>
    <?php $total+=$row['harga']; } ?>
              <tr>
                <td colspan="2" class="ui center aligned">Total</td>
                <td><?php echo number_format($total,0,',','.') ?></td>
              </tr>
              </tbody>
          </table>
      </div>
  </div>
</div>
</body>
<?php include 'footer.php'; ?>
