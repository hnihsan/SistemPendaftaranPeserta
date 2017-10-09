<?php
include "../koneksi.php";
session_start();
if (empty($_SESSION['username'])) {
    header("Location: index.php");
}

date_default_timezone_set("Asia/Jakarta");

class jurusan
{
    function getJurusan($nim)
    {
        $conn = connect_db();
        $kode = substr($nim, 2, 2);
        $cbg = substr($nim, 4, 2);
        if (empty($id = $conn->query("SELECT id from jurusan where kode='" . $kode . "' AND cabang='" . $cbg . "'")->fetch(PDO::FETCH_ASSOC))) {
            return "21";
        } else {
            return $id['id'];
        }
    }
}

if (isset($_POST['postPeserta'])) {
    switch ($_POST['type']) {
        case 'create' :
            $nim = $_POST['nim'];
            if (empty($nim)) {
                $nim = "0000" . '' . rand(100000, 999999);
            }
            $peserta = $conn->query("SELECT * FROM peserta WHERE nim='" . $nim . "'")->fetchAll();
            if (empty($peserta[0]['fullname'])) {
                $fullname = $_POST['fullname'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $jurusan = new jurusan;
                $idjurusan = $jurusan->getJurusan($nim);
                $query = "INSERT INTO peserta (nim,fullname,jurusan,phone,email) VALUES(?,?,?,?,?)";
                $data = [$nim, $fullname, $idjurusan, $phone, $email];
                if ($conn->prepare($query)->execute($data) != TRUE) {
                    $_SESSION['msg'] = "203";
                    header("Location: ../TambahPeserta.php");
                }
            }
            $seminar = $_POST['seminar'];
            if (empty($seminar)) {
                $_SESSION['msg'] = "299";
                header("Location: ../TambahPeserta.php");
            } else {
                $petugas = $_SESSION['username'];
                foreach ($seminar as $sem) {
                    $query = "INSERT INTO peserta_seminar (id_seminar,nim,petugas) VALUES(?,?,?)";
                    $data = [$sem, $nim, $petugas];
                    try {
                        $conn->prepare($query)->execute($data);
                        $_SESSION['msg'] = "103";
                        header("Location: ../TambahPeserta.php");
                    } catch (Exception $e) {
                        switch ($e->getCode()) {
                            case '23000' :
                                $_SESSION['msg'] = "233";
                                header("Location: ../TambahPeserta.php");
                                break;
                            default :
                                $_SESSION['msg'] = "203";
                                header("Location: ../TambahPeserta.php");
                                break;
                        }
                    }
                }
            }
            break;

        case 'update' :
            $nim = $_POST['nim'];
            $petugas = $_SESSION['username'];
            $fullname = $_POST['fullname'];
            $jurusan = new jurusan;
            $idjurusan = $jurusan->getJurusan($nim);
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $seminar = $_POST['sem'];
            $query = "UPDATE peserta set fullname=?, jurusan=?, phone=?, email=? WHERE nim=?";
            $data = [$fullname, $idjurusan, $phone, $email, $nim];
            if ($conn->prepare($query)->execute($data) == TRUE) {
                foreach ($seminar as $key => $value) {
                    $id_seminar = $key;
                    $status = $value;
                    $query = "UPDATE peserta_seminar set petugas=?, status=? WHERE id_seminar=? AND nim=?";
                    $data = [$petugas, $status, $id_seminar, $nim];
                    if ($conn->prepare($query)->execute($data) != TRUE) {
                        echo "Update status seminar error";
                    };
                }
                $_SESSION['msg'] = "113";
                header("Location: ../Peserta.php");
            } else {
                $_SESSION['msg'] = "213";
                header("Location: ../Peserta.php");
            }
            break;

        case 'updateStatus' :
            $petugas = $_SESSION['username'];
            $status = $_POST['status'];
            $id_seminar = $_POST['id_seminar'];
            $nim = $_POST['nim'];
            $query = "UPDATE peserta_seminar set petugas=?, status=? WHERE id_seminar=? AND nim=?";
            $data = [$petugas, $status, $id_seminar, $nim];
            if ($conn->prepare($query)->execute($data) != TRUE) {
                $_SESSION['msg'] = "213";
                header("Location: ../Peserta_Seminar.php?id=" . $_GET['id']);
            } else {
                $_SESSION['msg'] = "113";
                header("Location: ../Peserta_Seminar.php?id=" . $_GET['id']);
            }
            break;
        default :
            $_SESSION['msg'] = "299";
            header("Location: ../TambahPeserta.php");
    }
} else {
    $_SESSION['msg'] = "299";
    header("Location: ../TambahPeserta.php");
}
?>
