<?php
include "head.php";
date_default_timezone_set("Asia/Jakarta");
$Seminar=$conn->query("SELECT * FROM seminar");
?>
<div id="section-to-print" class="ui main container">
    <h1  class="ui center aligned header">Laporan Keuangan</h1>
    <hr>
      <table class="ui fixed celled table">
          <thead>
          <tr class="center aligned">
              <th >Nama Seminar</th>
              <th>Jumlah Peserta</th>
              <th>Harga Tiket (Rp.)</th>
              <th>Total (Rp.)</th>
          </tr>
          </thead>
          <tbody>
            <?php
            $total=0;
            foreach($Seminar as $sem){
              $Peserta=$conn->query("SELECT COUNT(nim) as jumlah FROM peserta_seminar WHERE id_seminar=$sem[id]")->fetchAll();
              ?>
            <tr>
              <td ><?php echo $sem['nama'] ?></td>
              <td class="center aligned"><?php echo $Peserta[0]['jumlah'] ?></td>
              <td class="center aligned"><?php echo number_format($sem['harga'],0,',','.') ?></td>
              <td class="center aligned"><?php echo number_format($sem['harga']*$Peserta[0]['jumlah'],0,',','.') ?></td>
            </tr>
            <?php $total+=$sem['harga']*$Peserta[0]['jumlah']; }
            ?>
          </tbody>
      </table>
      <table class="ui fixed celled table">
        <thead>
          <tr>
            <th class="center aligned" colspan="3"><h4>Total Pemasukan :</h4></th>
            <th class="center aligned"><h4><?php echo number_format($total,0,',','.'); ?></h4></th>
          </tr>
        </thead>
      </table>
</div>
<div class="ui container">
  <br>
  <a class="ui bottom attached primary button" tabindex="0" onClick="window.print()">Cetak</a>
</div>
<?php include 'footer.php'; ?>
