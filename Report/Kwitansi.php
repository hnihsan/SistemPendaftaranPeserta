<?php
include "head.php";
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ../Peserta.php");
}
date_default_timezone_set("Asia/Jakarta");
$Peserta = $conn->query("SELECT * FROM peserta WHERE nim=$id")->fetchAll();
$Jurusan = $conn->query("SELECT nama, fakultas FROM jurusan WHERE id='" . $Peserta[0]['jurusan'] . "'")->fetchAll();
switch ($Jurusan[0]['fakultas']) {
    case 'FTI':
        $Fakultas = "Fakultas Teknologi Informasi";
        break;
    case 'FT' :
        $Fakultas = "Fakultas Teknik";
        break;
    case 'FEB' :
        $Fakultas = "Fakultas Ekonomi dan Bisnis";
        break;
    case 'FISIP' :
        $Fakultas = "Fakultas Ilmu Sosial dan Ilmu Politik";
        break;
    case 'FIKOM' :
        $Fakultas = "Fakultas Ilmu Komunikasi";
        break;
    case 'ASTRI' :
        $Fakultas = "Akademi Sekretari";
        break;
    case 'PAS' :
        $Fakultas = "Pascasarjana";
        break;
    case '-' :
        $Fakultas = "Umum";
        break;
    default:
        $Fakultas = 'Umum';
        break;
}
$Seminar = $conn->query("SELECT * FROM seminar a JOIN peserta_seminar b ON id_seminar WHERE a.id=b.id_seminar AND b.nim=$id AND b.status=1");
?>
<style type="text/css">
    body {
        padding-top: 1em;
    }
</style>
<!--Menu-->
<div class="ui stackable top fixed inverted borderless blue menu" id="tombolprint">
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
    <h2 class="ui center aligned blue image dividing header">
        <img src="../resources/images/logo_bl.png" class="image">
        <div class="content">
            Laporan Keuangan
        </div>
        <div class="sub header">Dicetak pada <?php echo date("d-m-Y") ?>, pukul <?php echo date("H.i") ?></div>
    </h2>
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
                <tr class="center aligned">
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                </tr>
                </thead>
                <tbody>
                <?php $total = 0;
                foreach ($Seminar as $row) { ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td class="right aligned">Rp<?php echo number_format($row['harga'], 0, ',', '.') ?>,00</td>
                    </tr>
                    <?php $total += $row['harga'];
                } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="2" class="center aligned">Total</th>
                    <th class="right aligned">Rp<?php echo number_format($total, 0, ',', '.') ?>,00</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</body>
<?php include 'footer.php'; ?>
