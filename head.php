<?php session_start();
include "koneksi.php";
if (empty($_SESSION[username])) {
    header("Location: index.php?msg=300");
}

$a = '';
$b = '';
$c = '';
switch (basename($_SERVER['PHP_SELF'])) {
    case 'Seminar.php':
        $a = 'active';
        break;
    case 'Peserta.php':
        $b = 'active';
        break;
    case 'Pengguna.php':
        $c = 'active';
        break;
    default:
        break;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" type="text/css" href="resources/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
    <link rel="stylesheet" type="text/css" href="resources/css/sweetalert2.min.css">
    <script src="resources/js/sweetalert2.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sistem Pendaftaran Seminar Universitas Budi Luhur</title>
</head>
<body>
<!--Menu-->
<?php include "msg_log.php"; ?>
<div class="ui stackable top fixed inverted borderless blue menu">
    <div class="item">
        <img src="resources/images/logo_bl.png">
    </div>
    <div class="ui dropdown item">Peserta Terdaftar <i class="dropdown icon"></i>
        <div class="menu">
            <?php
            // TODO: tambah menu untuk menampilkan peserta dari semua seminar
            $listSeminar = $conn->query("SELECT * FROM seminar")->fetchAll();
            if (sizeof($listSeminar) > 0) {
                foreach ($listSeminar as $row) {
                    if ($b != '' && !empty($_GET['id'])) {
                        if ($row['id'] == $_GET['id']) $bid = 'active';
                    } ?>
                    <a href="<?php echo "Peserta.php?id=" . $row['id']; ?>" class="<?php echo $bid;
                    $bid = '' ?> item"><?php echo $row['nama']; ?></a>
                <?php }
            } else { ?>
                <a href="Seminar.php" class="<?php echo $b; ?> item">Tambah Seminar</a>
            <?php }
            ?>
        </div>
    </div>
    <div class="ui dropdown item">Halaman Admin <i class="dropdown icon"></i>
        <div class="menu">
            <a href="Seminar.php" class="<?php echo $a; ?> item">Seminar</a>
            <a href="Pengguna.php" class="<?php echo $c; ?> item">Pengguna</a>
            <a href="LapKeuangan.php" class="item">Laporan Keuangan</a>
        </div>
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
