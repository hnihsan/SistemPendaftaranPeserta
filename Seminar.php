<?php
include "head.php";
date_default_timezone_set("Asia/Jakarta");
?>
<script type="text/javascript">
    function editSeminar($str) {
        var rowid = $str;
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type: 'post',
            url: 'component/seminar-edit-modal.php',
            data: 'id=' + rowid,
            success: function (data) {
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
    }
</script>
<div class="ui stackable main container grid">
    <div class="sixteen wide column">
        <div class="ui raised segments">
            <div class="ui yellow segment">
                <h4 class="ui dividing header">Daftar Seminar</h4>
                <table class="ui padded selectable basic table" id="table1">
                    <thead>
                    <tr class="center aligned">
                        <th>Kode</th>
                        <th>Nama Seminar</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Tempat</th>
                        <th>Kuota</th>
                        <th>HTM</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM seminar";
                    $seminar = $conn->query($query)->fetchAll();
                    if (sizeof($seminar) == 0) { ?>
                        <tr>
                            <td>0</td>
                            <td>Belum ada data</td>
                            <td>Belum ada data</td>
                            <td>Belum ada data</td>
                            <td>Belum ada data</td>
                            <td>Belum ada data</td>
                            <td>-</td>
                            <td>
                                <a class="ui compact ubah disabled button">Ubah</a>
                                <a class="ui compact negative disabled button">Hapus</a>
                            </td>
                        </tr>
                    <?php } else {
                        foreach ($seminar as $row) {
                            $waktu = explode(' ', $row['waktu']);
                            $tgl = date_create($waktu[0]);
                            $jam = date_create($waktu[1]);
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . date_format($tgl, "l, d F Y") . "</td>";
                            echo "<td>" . date_format($jam, "H.i") . "</td>";
                            echo "<td>" . $row['tempat'] . "</td>";
                            echo "<td class='right aligned'>" . number_format($row['kuota'], 0, '', '.') . "</td>";
                            echo "<td class='right aligned'>Rp" . number_format($row['harga'], 0, '', '.') . ",00</td>"; ?>
                            <td>
                                <button class="ui compact ubah button" onclick="editSeminar(this.value)"
                                        value="<?php echo $row['id']; ?>">Ubah
                                </button>
                                <button class="ui compact hapus negative button" onclick="deleteSeminar(this.value)"
                                        value="<?php echo $row['id']; ?>">Hapus
                                </button>
                            </td>
                        <?php }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="ui bottom attached primary tambah button" tabindex="0">Tambah Seminar</div>
        </div>
        <div class="ui modal" id="tambah">
            <div class="header">
                Tambah Seminar
            </div>
            <div class="content">
                <form class="ui form" action="controller/SeminarController.php" method="post">
                    <input type="hidden" name="postSeminar" value="1">
                    <input type="hidden" name="type" value="create">
                    <div id="form-element">
                        <div class="field">
                            <label for="nm_seminar">Nama Seminar</label>
                            <input id="nm_seminar" type="text" name="nama" value="">
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <label for="tempat">Tempat</label>
                                <input id="tempat" type="text" name="tempat" required="">
                            </div>
                            <div class="field">
                                <label for="tanggal">Tanggal</label>
                                <input id="tanggal" type="date" name="tanggal" required="">
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <label for="waktu">Waktu</label>
                                <input id="waktu" type="time" name="waktu" required="">
                            </div>
                            <div class="field">
                                <label for="harga">Harga Tiket</label>
                                <div class="ui right labeled input">
                                    <label for="harga" class="ui label">Rp</label>
                                    <input id="harga" type="number" name="harga" min="0" required="">
                                    <div class="ui basic label">,00</div>
                                </div>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <label for="kuota">Kuota</label>
                                <input id="kuota" type="number" name="kuota" required="" min="1">
                            </div>
                            <div class="field">
                                <label for="narasumber">Narasumber</label>
                                <input id="narasumber" type="text" name="narasumber" required="">
                            </div>
                        </div>
                        <input class="ui button" type="reset" value="Bersihkan">
                        <input class="ui primary right button" type="submit" name="simpan" value="Simpan">
                    </div>
                </form>
            </div>
            <div class="ui modal" id="ubah">
                <div class="header">
                    Ubah Seminar
                </div>
                <div class="content">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript">
        function deleteSeminar($str) {
            swal({
                title: 'Yakin?',
                text: 'Data yang dihapus tidak bisa dikembalikan.',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak, simpan data.'
            }).then(function () {
                $.post("controller/SeminarController.php",
                    {
                        postSeminar: "1",
                        type: "delete",
                        id: $str
                    },
                    function () {
                        window.location.href = "Seminar.php?msg=122";
                    });

            }, function (dismiss) {
                // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Dibatalkan',
                        'Data tetap aman :)',
                        'error'
                    )
                }
            })

        };
    </script>
