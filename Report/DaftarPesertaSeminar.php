<?php
include "head.php";
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: ../Peserta.php");
}
date_default_timezone_set("Asia/Jakarta");
$Seminar = $conn->query("SELECT * FROM seminar WHERE id=$id")->fetchAll();
$Peserta = $conn->query("SELECT b.fullname as nama, b.nim FROM peserta_seminar a JOIN peserta b ON a.nim=b.nim JOIN seminar c ON a.id_seminar=c.id WHERE a.id_seminar=$id ");
?>
<!--Menu-->
<div class="ui stackable top fixed inverted borderless blue menu">
    <div class="item">
        <a href="../Peserta_Seminar.php?id=<?php echo $id; ?>"><i class="chevron left icon"></i> Kembali</a>
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
<!--Menu-->
<div class="ui main container grid">
    <div id="section-to-print" class="ui sixteen wide column">
        <h2 class="ui blue image dividing header">
            <img src="../resources/images/logo_bl.png" class="image">
            <div class="content">
                Daftar Hadir Peserta Seminar <?php echo $Seminar[0]['nama'] ?>
            </div>
            <div class="sub header">Dicetak pada <?php echo date("d-m-Y") ?>, pukul <?php echo date("H.i") ?></div>
        </h2>
        <table class="ui fixed celled table">
            <thead>
            <tr class="center aligned">
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Paraf</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($Peserta as $row) { ?>
                <tr>
                    <td><?php echo $i;
                        $i++ ?></td>
                    <td><?php echo $row['nim']; ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div id="tombolprint" class="sixteen wide column">
        <a class="ui fluid primary button" tabindex="0" onClick="window.print()">Cetak</a>
    </div>
</div>
<?php include 'footer.php'; ?>
