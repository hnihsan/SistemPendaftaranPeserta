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
  <div class="ui stackable top fixed inverted blue menu">
    <div class="item">
      <img src="resources/images/logo_bl.png">
    </div>
    <a href="TambahPeserta.php" class="item">Tambah Peserta</a>
    <a href="PesertaTerdaftar.php" class="active item">Peserta Terdaftar</a>
    <a class="item">Halaman Admin</a>
  </div>
  <div class="ui stackable main container grid">
    <div class="sixteen width column">
      <div class="ui raised yellow segment">
        <h4 class="ui dividing header">Daftar Peserta Terdaftar</h4>
        <table class="ui padded selectable very basic table" id="tabel1">
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
            //ambil data
            $sekarang_gan = date('Y-m-d');
            $sql          = "SELECT calas.nim, calas.nama_depan, calas.nama_belakang, program_studi.program_studi FROM calas, program_studi WHERE calas.id_prodi=program_studi.id_prodi ORDER BY waktu_pendaftaran DESC LIMIT 11";
            $result       = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["nim"]."</td><td>".$row["nama_depan"]." ".$row["nama_belakang"]."</td><td>".$row["program_studi"]."</td></tr>";
              }
            } else {
              echo "<tr><td>0</td><td>Belum Ada Data</td><td></td><td></td><td></td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>
