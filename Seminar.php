<?php
include "head.php";
date_default_timezone_set("Asia/Jakarta");
?>
<script type="text/javascript">
function editSeminar($str) {
 var rowid = $str;
 //menggunakan fungsi ajax untuk pengambilan data
 $.ajax({
     type : 'post',
     url : 'component/seminar-edit-modal.php',
     data :  'id='+ rowid,
     success : function(data){
     $('.fetched-data').html(data);//menampilkan data ke dalam modal
     }
 });
}

function hapusSeminar($str){
  document.getElementById("idhapus").value = $str;
}
</script>
  <!--Menu-->
  <div class="ui stackable main container grid">
    <div class="sixteen width column">
      <div class="ui raised segments">
        <div class="ui yellow attached segment">
          <h4 class="ui dividing header">Daftar Seminar</h4>
          <table class="ui padded selectable very basic table" id="table1">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Seminar</th>
                <th>Waktu</th>
                <th>Tempat</th>
                <th>Kuota</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $seminar=$conn->query("SELECT * FROM seminar");
              if(sizeof($seminar)<1){ ?>
                <tr>
                <td>0</td>
                <td>Belum ada data</td>
                <td>Belum ada data</td>
                <td>Belum ada data</td>
                <td>-</td>
                <td>
                  <a class="ui compact ubah button">Ubah</a>
                  <a class="ui compact negative button">Hapus</a>
                </td>
                </tr>
            <?php  }else{
              foreach($seminar as $row){
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['waktu']."</td>";
                echo "<td>".$row['tempat']."</td>";
                echo "<td>".$row['kuota']."</td>"; ?>
                <td>
                  <button onclick="editSeminar(this.value)" value="<?php echo $row['id']; ?>" class="ui compact ubah button">Ubah</button>
                  <button onclick="hapusSeminar(this.value)" value="<?php echo $row['id']; ?>" class="ui compact hapus negative button">Hapus</button>
                </td>
        <?php  }
            }
              ?>
            </tbody>
          </table>
        </div>
        <div class="ui bottom attached primary tambah button" tabindex="0">Tambah Seminar</div>
      </div>
      <div class="ui modal" id="tambah">
        <i class="close icon"></i>
        <div class="header">
          Tambah Seminar
        </div>
        <div class="content">
          <form class="ui form" action="controller/SeminarController.php" method="post">
            <input type="hidden" name="postSeminar" value="1">
            <input type="hidden" name="type" value="create">
            <div class="field">
              <label for="nm_seminar">Nama Seminar</label>
              <input id="nm_seminar" type="text" name="nama" value="">
            </div>
            <div class="two fields">
              <div class="field">
                <label for="waktu">Waktu</label>
                <input id="waktu" type="datetime-local" name="waktu" required="">
              </div>
              <div class="field">
                <label for="tempat">Tempat</label>
                <input id="tempat" type="text" name="tempat" required="">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label for="kuota">Kuota</label>
                <input id="kuota" type="number" name="kuota" required="" max="300">
              </div>
              <div class="field">
                <label for="email">Narasumber</label>
                <div class="ui action input">
                  <input id="narasumber" type="text" name="narasumber" required="" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
                  <button class="ui button">Pilih</button>
                </div>
              </div>
            </div>
        </div>
        <div class="actions">
          <input class="ui button" type="reset" value="Bersihkan">
          <input class="ui primary right button" type="submit" name="simpan" value="Simpan">
        </div>
      </form>
      </div>
      <div class="ui modal" id="ubah">
        <i class="close icon"></i>
        <div class="header">
          Ubah Seminar
        </div>
        <div class="content">
          <div class="fetched-data"></div>
        </div>
    </div>
    <div class="ui modal" id="hapus">
      <i class="close icon"></i>
      <div class="header">
        Hapus Seminar
      </div>
      <div class="content">
        <form class="ui form" action="controller/SeminarController.php" method="post">
          <input type="hidden" name="postSeminar" value="1">
          <input type="hidden" name="type" value="delete">
          <input type="hidden" id="idhapus" name="id" value="">
          <h4>Yakin ingin menghapus ? </h4>
      <div class="actions">
        <div class="ui default right button">Batal</div>
        <input class="ui negative right button" type="submit" name="simpan" value="Hapus">
      </div>
    </form>
    </div>
  </div>
</div>
</div>
  <script type="text/javascript">

  </script>
<?php include 'footer.php'; ?>
