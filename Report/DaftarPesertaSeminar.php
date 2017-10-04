<?php
include "head.php";
if(!empty($_GET['id'])){
  $id=$_GET['id'];
}else{
  header("Location: ../Peserta.php");
}
date_default_timezone_set("Asia/Jakarta");
$Seminar=$conn->query("SELECT * FROM seminar WHERE id=$id")->fetchAll();
$Peserta=$conn->query("SELECT b.fullname as nama, b.nim FROM peserta_seminar a JOIN peserta b ON a.nim=b.nim JOIN seminar c ON a.id_seminar=c.id WHERE a.id_seminar=$id ");
?>
<!--Menu-->
<div id="section-to-print" class="ui main container" >
    <h4  class="ui center aligned header">Daftar Hadir Peserta</h4>
    <h1  class="ui center aligned header"><?php echo $Seminar[0]['nama'] ?></h1>
    <hr>
      <table class="ui celled table">
          <thead>
          <tr class="center aligned">
              <th>No.</th>
              <th>NIM</th>
              <th>Nama Lengkap</th>
              <th colspan="2">Paraf</th>
          </tr>
          </thead>
          <tbody>
            <?php
            $i=1;
            foreach($Peserta as $row){ ?>
            <tr class="center aligned">
              <td ><?php echo $i; $i++ ?></td>
              <td ><?php echo $row['nim']; ?></td>
              <td ><?php echo $row['nama'] ?></td>
              <td ></td>
              <td></td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
</div>
<div id="tombolprint" class="center aligned ui container">
  <br>
  <a class="ui bottom attached primary button" tabindex="0" onClick="window.print()">Cetak</a>
  <a href="../Peserta_Seminar.php?id=<?php echo $_GET['id'] ?>">Kembali</a>
</div>
<?php include 'footer.php'; ?>
