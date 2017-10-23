<?php session_start();
include "../koneksi.php";
if (empty($_SESSION['username'])) {
    $_SESSION['msg'] = '300';
    header("Location: ../index.php");
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
    <link rel="stylesheet" type="text/css" href="../resources/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/style.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/sweetalert2.min.css">
    <style media="print">
        @media print {
            #tombolprint * {
                visibility: hidden;
            }

            .menu * {
                visibility: hidden;
            }
        }
    </style>
    <script src="../resources/js/sweetalert2.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Universitas Budi Luhur</title>
</head>
<body onload="window.print()">
