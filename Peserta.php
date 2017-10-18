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
            url: 'component/peserta-edit-modal.php',
            data: 'id=' + rowid,
            success: function (data) {
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
    }
</script>
<div class="ui stackable main container grid">
    <div class="row">
        <div class="ui sixteen width column">
            <div class="ui raised segments">
                <div class="ui yellow segment">
                    <h4 class="ui dividing header">Daftar Peserta Terdaftar</h4>
                    <table class="ui selectable basic table" id="table1">
                        <thead>
                        <tr class="center aligned">
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM peserta";
                        if ($peserta = $conn->query($query)) {
                            if (sizeof($peserta) > 0) {
                                foreach ($peserta as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['nim'] ?></td>
                                        <td><?php echo $row['fullname'] ?></td>
                                        <?php $jurusan = $conn->query("SELECT nama FROM jurusan where id=" . $row['jurusan'])->fetchAll(); ?>
                                        <td><?php echo $jurusan[0]['nama'] ?></td>
                                        <td class="center aligned">
                                            <button onclick="editPeserta(this.value)" value="<?php echo $row['nim']; ?>"
                                                    class="ui compact ubah button">Ubah
                                            </button>
                                            <a href="Report/Kwitansi.php?id=<?php echo $row['nim'] ?>"
                                               class="ui compact primary button">
                                                Cetak Kwitansi
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td>0</td>
                                    <td>Belum ada data</td>
                                    <td>Belum ada data</td>
                                    <td class="center aligned">
                                        <button class="ui compact disabled button">Ubah</button>
                                        <button class="ui compact disabled primary button">Cetak Kwitansi</button>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="4">Terjadi Kesalahan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ui modal " id="ubah">
    <div class="header">
        Ubah Peserta
    </div>
    <div class="content">
        <div class="fetched-data"></div>
    </div>
</div>
<?php include 'footer.php'; ?>
