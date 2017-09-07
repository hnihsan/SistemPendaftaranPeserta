<?php
include "../koneksi.php";

session_start();
if (empty($_SESSION['username'])) {
    header("Location: index.php?msg=300");
}

date_default_timezone_set("Asia/Jakarta");

if (isset($_POST['postUsers'])) {
    switch ($_POST['type']) {
        case 'create' :
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $fullname = $_POST['fullname'];;
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            $query = "INSERT INTO users (username,password,fullname,phone,email) VALUES(?,?,?,?,?)";
            $data = [$username, $password, $fullname, $phone, $email];
            if ($conn->prepare($query)->execute($data) === TRUE) {
                header("Location: ../Pengguna.php?msg=101");
            } else {
                header("Location: ../Pengguna.php?msg=201");
            }
            break;

        case 'update' :
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $fullname = $_POST['fullname'];;
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            $query = "UPDATE users set password=?, fullname=?, phone=?, email=? WHERE username=?";
            $data = [$password, $fullname, $phone, $email, $username];
            if ($conn->prepare($query)->execute($data) == TRUE) {
                header("Location: ../Pengguna.php?msg=111");
            } else {
                header("Location: ../Pengguna.php?msg=211");
            }
            break;

        case 'delete' :
            $username = $_POST['username'];

            $query = "DELETE FROM users WHERE username=?";
            $data = [$username];

            if ($conn->prepare($query)->execute($data) == TRUE) {
                header("Location: ../Pengguna.php?msg=121");
            } else {
                header("Location: ../Pengguna.php?msg=221");
            }
            break;

        default :
            header("Location: ../Pengguna.php?msg=299");
    }
} else {
    header("Location: ../Pengguna.php?msg=299");
}
?>
