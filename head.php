<?php session_start();
include "koneksi.php";
if(empty($_SESSION[username])){
  header("Location: index.php");
}
 ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <link rel="stylesheet" type="text/css" href="resources/semantic/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="resources/css/style.css">
  <link rel="stylesheet" type="text/css" href="resources/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="resources/css/dataTables.semanticui.min.css">
  <link rel="stylesheet" type="text/css" href="resources/css/sweetalert2.min.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Universitas Budi Luhur</title>
</head>
<body>
  <!--Menu-->
  <div class="ui stackable top fixed inverted borderless blue menu">
    <div class="item">
      <img src="resources/images/logo_bl.png">
    </div>
    <div class="ui dropdown item">Peserta Terdaftar <i class="dropdown icon"></i>
      <div class="menu">
        <?php
        $listSeminar=$conn->query("SELECT * FROM seminar")->fetchAll();
        if(sizeof($listSeminar)>0){
          foreach($listSeminar as $row) { ?>
            <a href="<?php echo "Peserta.php?id=".$row['id']; ?>" class="active item"><?php echo $row['nama'];?></a>
          <?php } }else{ ?>
          <a href="Peserta.php" class="active item">Tambah Seminar</a>
        <?php }
        ?>
      </div>
    </div>
    <div class="ui dropdown item">Halaman Admin <i class="dropdown icon"></i>
      <div class="menu">
        <a href="Seminar.php" class="item">Seminar</a>
        <a href="Pengguna.php" class="item">Pengguna</a>
      </div>
    </div>
    <div class="right menu">
      <a href="#" class="item"><i class="sign out icon"></i> Keluar</a>
    </div>
  </div>
