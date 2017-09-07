<?php

include "../koneksi.php";
$id = $_POST['id'];
$sql = $conn->query("SELECT * FROM seminar where id=" . $id)->fetchAll();
?>

<form class="ui form" action="controller/SeminarController.php" method="post">
    <input type="hidden" name="postSeminar" value="1">
    <input type="hidden" name="type" value="update">
    <div class="field">
        <label for="nm_seminar">Nama Seminar</label>
        <input id="nm_seminar" type="text" name="nama" value="<?php echo $sql[0]['nama'] ?>">
    </div>
    <div class="two fields">
        <div class="field">
            <label for="id">Kode Seminar</label>
            <input id="id" type="text" name="id" readonly="" value="<?php echo $sql[0]['id'] ?>">
        </div>
        <div class="field">
            <label for="tempat">Tempat</label>
            <input id="tempat" type="text" name="tempat" required="" value="<?php echo $sql[0]['tempat'] ?>">
        </div>
    </div>
    <div class="two fields">
        <div class="field">
            <label for="waktu">Waktu</label>
            <input id="waktu" type="datetime-local" name="waktu" required="" value="<?php echo $sql[0]['waktu'] ?>">
        </div>
        <div class="field">
            <label for="tanggal">Tanggal</label>
            <input id="tanggal" type="text" name="date" required="" value="<?php echo $sql[0]['tanggal'] ?>">
        </div>
    </div>
    <div class="two fields">
        <div class="field">
            <label for="kuota">Kuota</label>
            <input id="kuota" type="number" name="kuota" required="" max="300" min="1"
                   value="<?php echo $sql[0]['kuota'] ?>">
        </div>
        <div class="field">
            <label for="email">Narasumber</label>
            <input id="narasumber" type="text" name="narasumber" required=""
                   onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)"
                   value="<?php echo $sql[0]['narasumber'] ?>">
        </div>
    </div>
    </div>
    <div class="actions">
        <input class="ui button" type="reset" value="Bersihkan">
        <input class="ui primary right button" type="submit" name="update" value="Perbarui">
    </div>
</form>
