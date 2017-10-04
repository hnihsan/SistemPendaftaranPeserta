<?php
include "head.php";
date_default_timezone_set("Asia/Jakarta");
?>
<script type="text/javascript">
  function availSeminar($str){
    if($str.length==10){
      var rowid = $str;
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
        type : 'post',
        url : 'component/tambahpeserta-registered.php',
        data :  'id='+ rowid,
        success : function(data){
          $('#form-element').html(data);//menampilkan data ke dalam modal
        }
      });

      $.ajax({
        type : 'post',
        url : 'component/tambahpeserta-availseminar.php',
        data :  'id='+ rowid,
        success : function(data){
          $('#availablesem').html(data);//menampilkan data ke dalam modal
        }
      });
    }else{
      var rowid = $str;
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
        type : 'post',
        url : 'component/tambahpeserta-original.php',
        data :  'id='+ rowid,
        success : function(data){
          $('#form-element').html(data);//menampilkan data ke dalam modal
        }
      });

      $.ajax({
        type : 'post',
        url : 'component/tambahpeserta-availseminarori.php',
        data :  'id='+ rowid,
        success : function(data){
          $('#availablesem').html(data);//menampilkan data ke dalam modal
        }
      });
    }
  }
</script>
<div class="ui stackable main container grid">
  <div class="eight wide column">
    <div class="ui raised segments">
      <div class="ui yellow segment">
        <h4 class="ui dividing header">Tambah Peserta</h4>
        <form class="ui form" action="controller/PesertaController.php" method="post">
          <input type="hidden" name="postPeserta" value="1">
          <input type="hidden" name="type" value="create">
            <div id="form-element">
              <div class="two fields">
                <div class="field">
                  <label for="nim">Nomor Induk Mahasiswa</label>
                  <input id="nim" type="text" name="nim" required="" minlength="10" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57;" onchange="availSeminar(this.value)">
                </div>
                <div class="field">
                  <label for="fullname">Nama Peserta</label>
                  <input id="fullname" type="text" name="fullname" required="" maxlength="50" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
                </div>
              </div>
              <div class="two fields">
                <div class="field">
                  <label for="phone">Nomor Telepon</label>
                  <input id="phone" type="text" name="phone" required="" maxlength="17" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                </div>
                <div class="field">
                  <label for="email">Alamat Email</label>
                  <input id="email" type="text" name="email" required="" maxlength="100">
                </div>
              </div>
            </div>
                <div class="field">
                  <label for="seminar">Nama Seminar</label>
                  <select id="availablesem" class="ui fluid search dropdown" name="seminar[]" multiple>
                    <?php
                    $Seminar=$conn->query("SELECT a.nama, a.id FROM seminar a");
                    foreach($Seminar as $row){ ?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['nama'] ?></option> <?php
                    }
                    ?>
                  </select>
                </div>

              <input type="submit" class="ui bottom attached primary tambah button" tabindex="0" name="simpan" value="Simpan">
        </form>
      </div>
    </div>
  </div>

  <div class="eight wide column">
    <div class="ui raised segments">
      <div class="ui yellow segment">
        <h4 class="ui dividing header">Daftar Peserta Terdaftar</h4>
        <table class="ui padded selectable very basic unstackable table" id="table1">
          <thead>
            <tr>
              <th>No.</th>
              <th>NIM</th>
              <th>Nama</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query="SELECT DISTINCT nim, fullname FROM peserta ";
              $peserta=$conn->query($query)->fetchAll();
              if(sizeof($peserta)>0){
                $i=1;
                foreach($peserta as $row){
                  ?>
                  <tr>
                    <td><?php echo $i; $i++; ?></td>
                    <td><?php echo $row['nim'] ?></td>
                    <td><?php echo $row['fullname'] ?></td>
                  </tr>
                  <?php  }
              }else{ ?>
                    <tr>
                      <td></td>
                      <td>Belum ada data</td>
                      <td>Belum ada data</td>
                    </tr>
      <?php  } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
