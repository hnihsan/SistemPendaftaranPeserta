<?php
include "../koneksi.php";
$Seminar=$conn->query("SELECT a.nama, a.id FROM seminar a");
foreach($Seminar as $row){ ?>
  <option value="<?php echo $row['id']; ?>"><?php echo $row['nama'] ?></option> <?php
}
?>
