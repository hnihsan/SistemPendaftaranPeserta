<?php
include "koneksi.php";
include "head.php";
date_default_timezone_set("Asia/Jakarta");
// proses input
if (isset($_POST['simpan'])) {
  $t                 = time();
  $nim               = $_POST['nim'];
  $nama_depan        = $_POST['nama_depan'];
  $nama_belakang     = $_POST['nama_belakang'];
  $kode_fakultas     = $_POST['kode_fakultas'];
  $id_prodi          = $_POST['id_prodi'];
  $telephone         = $_POST['telephone'];
  $alamat_email      = $_POST['alamat_email'];
  $angkatan          = date("Y", $t);
  $waktu_pendaftaran = date("Y-m-d H:i:s", $t);
  if (substr("$nim", 0, 2) == 16) {
    $gelombang = "1";
  } else {
    $gelombang = "3";
  }
  // insert ke tabel
  $query = "INSERT INTO calas VALUES('$nim','$nama_depan','$nama_belakang','$kode_fakultas','$id_prodi','$telephone','$alamat_email','$angkatan','$gelombang','$waktu_pendaftaran')";
  if ($conn->query($query) === TRUE) {
    // echo "<div class='alert alert-success' role='alert' id='notif'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data berhasil ditambahkan</div>";
    ?>
    <script type="text/javascript">
      alert("Data telah berhasil di tambahkan!");
      document.location= "index.php";
    </script>
    <?php
  } else {
    //echo "<div class='alert alert-warning' role='alert' id='notif'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Data gagal ditambahkan</div>";
    ?>
    <script type="text/javascript">
      alert("Data gagal ditambahkan!");
      document.location= "index.php";
    </script>
    <?php
  }
}
?>
  <!--Menu-->
  <nav class="nav-extended indigo darken-4">
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo waves-effect">Universitas Budi Luhur</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse waves-effect"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html" class="waves-effect">Keluar</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html" class="waves-effect">Keluar</a></li>
      </ul>
    </div>
    <div class="nav-content container">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a class="active waves-effect" href="TambahPeserta.php">Tambah Peserta</a></li>
        <li class="tab"><a href="#test2" class="waves-effect">Daftar Peserta</a></li>
        <li class="tab"><a href="#test4" class="waves-effect">Daftar Peserta yang Sudah Bayar</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col m7">
        <form class="form-horizontal" action="TambahPeserta.php" method="post">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Data Diri</span>
              <div class="container-fluid">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="nim" type="text" name="nim" class="validate" required="" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    <label for="nim">Nomor Induk Mahasiswa</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <input id="nama_depan" type="text" name="nama_depan" class="validate" required="" maxlength="35" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
                    <label for="nama_depan">Nama Depan</label>
                  </div>
                  <div class="input-field col m6 s12">
                    <input id="nama_belakang" type="text" name="nama_belakang" class="validate" required="" maxlength="35" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
                    <label for="nama_belakang">Nama Belakang</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col m6 s12">
                    <input id="telephone" type="text" name="telephone" class="validate" required="" maxlength="17" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
                    <label for="telephone">Nomor Telepon</label>
                  </div>
                  <div class="input-field col m6 s12">
                    <input id="alamat_email" type="text" name="alamat_email" class="validate" required="" maxlength="100" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
                    <label for="alamat_email">Alamat Email</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-action right-align">
              <button class="btn-flat waves-effect" type="clear" name="clear">Bersihkan</button>
              <button class="btn-flat waves-effect orange-text" type="submit" name="simpan" onclick="loadDoc">Simpan</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col m5">
        <div class="card">
          <div class="card content">
            <span class="card-title">Pendaftar Terkini (<?php echo date('d-m-Y') ?>)</span>
            <div class="container-fluid">
              <table class="bordered highlight responsive-table">
                <thead>
                  <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //ambil data
                  $sekarang_gan = date('Y-m-d');
                  $sql          = "SELECT calas.nim, calas.nama_depan, calas.nama_belakang, program_studi.program_studi FROM calas, program_studi WHERE calas.id_prodi=program_studi.id_prodi ORDER BY waktu_pendaftaran DESC LIMIT 11";
                  $result       = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr><td>".$row["nim"]."</td><td>".$row["nama_depan"]." ".$row["nama_belakang"]."</td><td>".$row["program_studi"]."</td></tr>";
                    }
                  } else {
                    echo "<tr><td>0</td><td>Belum Ada Data</td><td></td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>
