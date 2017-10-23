<?php
include "../koneksi.php";
$id = $_POST['id'];
$Seminar = $conn->query("SELECT a.nama, a.id FROM seminar a WHERE a.id NOT IN (SELECT b.id_seminar FROM peserta_seminar b WHERE b.nim='$id')");
foreach ($Seminar as $row) { ?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['nama'] ?></option> <?php
}
?>
