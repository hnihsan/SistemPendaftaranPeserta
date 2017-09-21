<?php
include "koneksi.php";
date_default_timezone_set("Asia/Jakarta");
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
        <a href="Peserta.php"><i class="chevron left icon"></i> Kembali</a>
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
<div class="ui stackable main container grid">
    <div class="sixteen width column">
        <div class="ui raised segments">
            <div class="ui yellow attached segment">
                <h4 class="ui dividing header">Kwitansi Pembayaran Seminar</h4>
                <div class="ui relaxed divided list">
                    <div class="item">
                        <div class="header">Nama</div>
                        Ujang
                    </div>
                    <div class="item">
                        <div class="header">Waktu Daftar</div>
                        7 September 2017, pukul 22.28
                    </div>
                    <div class="item">
                        <div class="header">Jurusan</div>
                        Sistem Informasi
                    </div>
                    <div class="item">
                        <div class="header">Fakultas</div>
                        Teknologi Informasi
                    </div>
                    <div class="item">
                        <div class="header">Seminar yang Diikuti</div>
                        <table class="ui celled table">
                            <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Keterangan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>3</td>
                                <td>Seminar Penahan Rasa Cinta</td>
                                <td>5000000</td>
                                <td class="negative">Batal</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Kiat-kiat Melupakan Mantan</td>
                                <td>1000000</td>
                                <td class="positive">Lunas</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <a class="ui bottom attached primary button" tabindex="0" onClick="window.print()">Cetak</a>
        </div>
    </div>
</div>
</body>

