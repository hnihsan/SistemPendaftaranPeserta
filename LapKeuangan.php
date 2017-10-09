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
<!--Menu-->

<div class="ui stackable main container grid">
    <div class="sixteen wide column">
        <div class="ui raised segments">
            <div class="ui yellow attached segment">
                <h4 class="ui dividing header">Laporan Keuangan Seminar Penahan Rasa Cinta</h4>
                <div class="ui relaxed divided list">
                    <div class="item">
                        <table class="ui celled table" id="table1">
                            <thead>
                            <tr>
                                <th>Nama Peserta</th>
                                <th>Status Pembayaran</th>
                                <th>Jumlah Bayar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Tukiyem</td>
                                <td class="positive">Lunas</td>
                                <td>5000000</td>
                            </tr>
                            <tr>
                                <td>Ujang</td>
                                <td class="negative">Batal</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Asep</td>
                                <td class="positive">Lunas</td>
                                <td>5000000</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="item">
                        Total pendapatan: 500000
                    </div>
                </div>
            </div>
            <a class="ui bottom attached primary button" tabindex="0" onClick="window.print()">Cetak</a>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
