<?php
include "head.php";
date_default_timezone_set("Asia/Jakarta");
?>
<script type="text/javascript">
    function editPeserta($str) {
        var rowid = $str;
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type: 'post',
            url: 'component/peserta-edi<?php echo $row['id']; ?>t-modal.php',
            data: 'id=' + rowid,
            success: function (data) {
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
    }
</script>
<div class="ui stackable main container grid">
    <div class="sixteen width column">
        <form class="ui form" action="controller/PesertaController.php" method="post">
            <div class="ui raised segments">
                <div class="ui yellow segment">
                    <h4 class="ui dividing header">Tambah Peserta</h4>
                    <input type="hidden" name="postPeserta" value="1">
                    <input type="hidden" name="type" value="create">
                    <div class="two fields">
                        <div class="field">
                            <label for="nim">Nomor Induk Mahasiswa</label>
                            <input id="nim" type="text" name="nim" required="" minlength="10" maxlength="10"
                                   onkeypress="return event.charCode >= 48 && event.charCode <= 57">
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
                    <div class="field">
                        <label for="seminar">Nama Seminar</label>
                        <select class="ui fluid search dropdown" name="seminar[]" multiple>
                            <?php $Seminar = $conn->query("SELECT id,nama from seminar");
                            $i = 0;
                            foreach ($Seminar as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="ui two bottom attached buttons">
                    <input class="ui button" type="reset" value="Bersihkan">
                    <input class="ui primary button" type="submit" name="simpan" value="Simpan">
                </div>
            </div>
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>
