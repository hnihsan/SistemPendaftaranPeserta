<?php session_start();
include "koneksi.php";
if (empty($_SESSION['username'])) {
    $_SESSION['msg'] = '300';
    header("Location: index.php");
}

$a = '';
$b = '';
$c = '';
$d = '';
switch (basename($_SERVER['PHP_SELF'])) {
    case 'Seminar.php':
        $a = 'active';
        break;
    case 'Peserta_Seminar.php':
        $b = 'active';
        break;
    case 'Pengguna.php':
        $c = 'active';
        break;
    case 'LaporanKeuangan.php':
        $d = 'active';
        break;

    default:
        break;
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
    <style media="print">
        @media print {
            body * {
                visibility: hidden;
            }

            #section-to-print, #section-to-print * {
                visibility: visible;
            }

            #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
    <script src="resources/js/sweetalert2.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Universitas Budi Luhur</title>
</head>
<body>
<br><br><br>
<?php include "msg_log.php"; ?>
<div class="ui stackable top fixed container inverted borderless blue menu">
    <div class="item">
        <img src="resources/images/logo_bl.png">
    </div>
    <a href="TambahPeserta.php" class="item">Peserta</a>
    <div class="ui dropdown item">Peserta Terdaftar <i class="dropdown icon"></i>
        <div class="menu">
            <?php
            $listSeminar = $conn->query("SELECT * FROM seminar")->fetchAll();
            if (sizeof($listSeminar) > 0) { ?>
                <a href="<?php echo 'Peserta.php' ?>"
                   class="<?php if (basename($_SERVER['PHP_SELF']) == 'Peserta.php' && empty($_GET['id'])) echo 'active'; ?> item">Seluruh
                    Peserta</a>
                <?php
                foreach ($listSeminar as $row) {
                    if ($b != '' && !empty($_GET['id'])) {
                        if ($row['id'] == $_GET['id']) $bid = 'active';
                    } ?>
                    <a href="<?php echo "Peserta_Seminar.php?id=" . $row['id']; ?>" class="<?php echo $bid;
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
            <a href="LaporanKeuangan.php" class="<?php echo $d; ?> item">Laporan Keuangan</a>
        </div>
    </div>
    <div class="right menu">
        <div class="ui dropdown item"><?php echo "Hi, " . $_SESSION['nickname']; ?> <i class="dropdown icon"></i>
            <div class="menu">
                <form action="controller/LoginController.php" method="post">
                    <input type="hidden" name="postLogout" value="1">
                    <input type="submit" class="ui button item" name="Keluar" value="Keluar">
                </form>
            </div>
        </div>
    </div>
</div>
