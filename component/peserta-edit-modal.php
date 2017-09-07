<?php

include "../koneksi.php";
$id = $_POST['id'];
$sql = $conn->query("SELECT * FROM peserta where id=" . $id)->fetchAll();
?>

<form class="ui form" action="controller/PesertaController.php" method="post">
    <input type="hidden" name="postPeserta" value="1">
    <input type="hidden" name="type" value="update">
    <input type="hidden" name="id[0]" value="<?php echo $sql[0]['id']; ?>">
    <input type="hidden" name="id[1]" value="<?php echo $sql[0]['id_seminar']; ?>">
    <div class="two fields">
        <div class="field">
            <label for="nim">Nomor Induk Mahasiswa</label>
            <input id="nim" type="text" name="nim" required="" value="<?php echo $sql[0]['nim']; ?>" minlength="10"
                   maxlength="10" readonly onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </div>
        <div class="field">
            <label for="fullname">Nama Peserta</label>
            <input id="fullname" type="text" name="fullname" value="<?php echo $sql[0]['fullname']; ?>" required=""
                   maxlength="50"
                   onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
        </div>
    </div>
    <div class="two fields">
        <div class="field">
            <label for="phone">Nomor Telepon</label>
            <input id="phone" type="text" name="phone" value="<?php echo $sql[0]['phone']; ?>" required=""
                   maxlength="17" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </div>
        <div class="field">
            <label for="email">Alamat Email</label>
            <input id="email" type="text" value="<?php echo $sql[0]['email']; ?>" name="email" required=""
                   maxlength="100">
        </div>
    </div>
    <div class="field">
        <label for="status">Status Pembayaran</label>
        <select class="ui dropdown" name="status" id="select">
            <option value="">Pilih Status</option>
            <option value="1" selected>Hadir</option>
            <option value="0">Batal Hadir</option>
        </select>
    </div>
    </div>
    <div class="actions">
        <input class="ui button" type="reset" value="Bersihkan">
        <input class="ui primary right button" type="submit" name="update" value="Perbarui">
    </div>
</form>
<script type="text/javascript">
    $('#select').dropdown();
</script>
