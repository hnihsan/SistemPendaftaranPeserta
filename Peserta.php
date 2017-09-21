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
        <div class="ui raised segments">
            <div class="ui yellow segment">
                <h4 class="ui dividing header">Daftar Peserta Terdaftar</h4>
                <table class="ui padded selectable very basic unstackable table" id="table1">
                    <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($_GET['id'])) {
                        $query = "SELECT * FROM peserta where id_seminar=" . $_GET['id'];
                    } else {
                        $query = "SELECT * FROM peserta";
                    }
                    if ($conn->query($query)) {
                        $peserta = $conn->query($query)->fetchAll();
                        if (sizeof($peserta) > 0) {
                            foreach ($peserta as $row) { ?>
                                <tr>
                                    <td><?php echo $row['nim'] ?></td>
                                    <td><?php echo $row['fullname'] ?></td>
                                    <?php $jurusan = $conn->query("SELECT nama FROM jurusan where id=" . $row['jurusan'])->fetchAll(); ?>
                                    <td><?php echo $jurusan[0]['nama'] ?></td>
                                    <?php if ($row['status'] == 1) {
                                        $status = 'Hadir';
                                    } else {
                                        $status = 'Batal';
                                    } ?>
                                    <td><?php echo $status; ?></td>
                                    <td>
                                        <button onclick="editPeserta(this.value)" value="<?php echo $row['id']; ?>"
                                                class="ui compact ubah button">Ubah
                                        </button>
                                        <a class="ui compact primary button"
                                           value="<?php echo $row['id']; ?>">Kwitansi</a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td>0</td>
                                <td>Belum ada data</td>
                                <td>Belum ada data</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        <?php }
                    } else {
                        header("Location: Peserta.php");
                    } ?>
                    </tbody>
                </table>
            </div>
            <div class="ui bottom attached primary tambah button" tabindex="0">Tambah Peserta</div>
        </div>
        <div class="ui modal" id="ubah">
            <div class="header">
                Ubah Peserta
            </div>
            <div class="content">
                <div class="fetched-data"></div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
