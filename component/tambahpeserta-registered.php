<?php
include "../koneksi.php";
$id = $_POST['id'];
$Biodata = $conn->query("SELECT * from peserta WHERE nim='$id'")->fetchAll();
if (sizeof($Biodata) > 0) { ?>
    <div class="two fields">
        <div class="field">
            <label for="nim">Nomor Induk Mahasiswa</label>
            <input id="nim" type="text" name="nim" required="" minlength="10" maxlength="10"
                   onkeypress="return event.charCode >= 48 && event.charCode <= 57;" onchange="availSeminar(this.value)"
                   value="<?php echo $id; ?>">
        </div>
        <div class="field">
            <label for="fullname">Nama Peserta</label>
            <input id="fullname" type="text" name="fullname" readonly="" maxlength="50"
                   value="<?php echo $Biodata[0]['fullname'] ?>">
        </div>
    </div>
    <div class="two fields">
        <div class="field">
            <label for="phone">Nomor Telepon</label>
            <input id="phone" type="text" name="phone" readonly maxlength="17"
                   value="<?php echo $Biodata[0]['phone'] ?>">
        </div>
        <div class="field">
            <label for="email">Alamat Email</label>
            <input id="email" type="text" name="email" readonly="" maxlength="100"
                   value="<?php echo $Biodata[0]['email'] ?>">
        </div>
    </div>
<?php } else { ?>
    <div class="two fields">
        <div class="field">
            <label for="nim">Nomor Induk Mahasiswa</label>
            <input id="nim" type="text" name="nim" value="<?php echo $id; ?>" required="" minlength="10" maxlength="10"
                   onkeypress="return event.charCode >= 48 && event.charCode <= 57;"
                   onchange="availSeminar(this.value)">
        </div>
        <div class="field">
            <label for="fullname">Nama Peserta</label>
            <input id="fullname" type="text" name="fullname" required="" maxlength="50"
                   onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
        </div>
    </div>
    <div class="two fields">
        <div class="field">
            <label for="phone">Nomor Telepon</label>
            <input id="phone" type="text" name="phone" required="" maxlength="17"
                   onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </div>
        <div class="field">
            <label for="email">Alamat Email</label>
            <input id="email" type="text" name="email" required="" maxlength="100">
        </div>
    </div>
<?php }
?>
