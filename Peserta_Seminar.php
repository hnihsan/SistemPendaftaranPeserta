<?php
include "head.php";
date_default_timezone_set("Asia/Jakarta");
if(!empty($_GET['id'])) $id=$_GET['id'];

?>
<script type="text/javascript">
function editPeserta($str) {
 var rowid = $str;
 //menggunakan fungsi ajax untuk pengambilan data
 $.ajax({
     type : 'post',
     url : 'component/pesertaseminar-edit-modal.php?id=<?php echo $id; ?>',
     data :  {id:rowid,sem:'<?php echo $id; ?>'},
     processData : true,
     success : function(data){
     $('.fetched-data').html(data);
     }
 });
}
</script>
  <div id="section-to-print" class="ui stackable main container grid">
    <div class="row">
      <div class="ui sixteen width column">
        <div class="ui raised segments">
          <div class="ui yellow segment">
            <h4 class="ui dividing header">Daftar Peserta Terdaftar</h4>
            <table class="ui padded selectable very basic table" id="table1">
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
                if(!empty($_GET['id'])){
                  $query="SELECT * FROM peserta a WHERE a.nim IN (SELECT b.nim FROM peserta_seminar b WHERE b.id_seminar='$id')";
                }else{
                  header("Location: Peserta.php");
                }
                if($conn->query($query)){
                  $peserta=$conn->query($query)->fetchAll();
                  if(sizeof($peserta)>0){
                    foreach($peserta as $row){
                      if(empty($id)){
                        $status='-';
                      } else{
                        $statid=$conn->query("SELECT status FROM peserta_seminar WHERE id_seminar='$id' AND nim='$row[nim]'")->fetchAll();
                        if($statid[0]['status']==1){$status='Hadir';}else{$status='Cancel';}
                      }
                      ?>
                      <tr>
                        <td><?php echo $row['nim'] ?></td>
                        <td><?php echo $row['fullname'] ?></td>
                        <?php  $jurusan=$conn->query("SELECT nama FROM jurusan where id=".$row['jurusan'])->fetchAll(); ?>
                        <td><?php echo $jurusan[0]['nama'] ?></td>
                        <td><?php echo $status; ?></td>
                        <td>
                          <button onclick="editPeserta(this.value)" value="<?php echo $row['nim']; ?>" class="ui compact ubah button">Ubah</button>
                        </td>
                      </tr>
                      <?php  }
                    }else{ ?>
                      <tr>
                        <td>0</td>
                        <td>Belum ada data</td>
                        <td>Belum ada data</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>
                      <?php  }
                    }else{
                      header("Location: Peserta.php");
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
    </div>
  </div>
  <div class="ui modal" id="ubah">
    <i class="close icon"></i>
    <div class="header">
      Ubah Status Kehadiran
    </div>
    <div class="content">
      <div class="fetched-data"></div>
    </div>
  </div>
  <div class="ui container">
    <br>
    <a class="ui bottom attached primary button" tabindex="0" onClick="window.open('Report/DaftarPesertaSeminar.php?id=<?php echo $id ?>')">Cetak</a>
  </div>
<?php include 'footer.php'; ?>
