<?php
include "head.php";
date_default_timezone_set("Asia/Jakarta");
$Seminar = $conn->query("SELECT * FROM seminar");
?>
<div class="ui main container grid">
    <div id="section-to-print" class="ui sixteen wide column">
        <h2 class="ui center aligned blue image dividing header">
            <img src="resources/images/logo_bl.png" class="image">
            <div class="content">
                Laporan Keuangan
            </div>
            <div class="sub header">Dicetak pada <?php echo date("d-m-Y") ?>, pukul <?php echo date("H.i") ?></div>
        </h2>
        <table class="ui fixed celled table">
            <thead>
            <tr class="center aligned">
                <th>Nama Seminar</th>
                <th>Jumlah Peserta</th>
                <th>Harga Tiket</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
            foreach ($Seminar as $sem) {
                $Peserta = $conn->query("SELECT COUNT(nim) as jumlah FROM peserta_seminar WHERE id_seminar=$sem[id]")->fetchAll();
                ?>
                <tr>
                    <td><?php echo $sem['nama'] ?></td>
                    <td class="right aligned"><?php echo $Peserta[0]['jumlah'] ?></td>
                    <td class="right aligned">Rp<?php echo number_format($sem['harga'], 0, ',', '.') ?>,00</td>
                    <td class="right aligned">
                        Rp<?php echo number_format($sem['harga'] * $Peserta[0]['jumlah'], 0, ',', '.') ?>,00
                    </td>
                </tr>
                <?php $total += $sem['harga'] * $Peserta[0]['jumlah'];
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <th class="center aligned" colspan="3">Total Pemasukan</th>
                <th class="right aligned">Rp<?php echo number_format($total, 0, ',', '.'); ?>,00</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="sixteen wide column">
        <a class="ui fluid primary button" tabindex="0" onClick="window.print()">Cetak</a>
    </div>
</div>
<?php include 'footer.php'; ?>
