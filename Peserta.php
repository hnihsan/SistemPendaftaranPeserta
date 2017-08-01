<?php
include "koneksi.php";
include "head.php";
date_default_timezone_set("Asia/Jakarta");
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
        <li class="tab"><a class="active waves-effect" href="#TambahPeserta">Tambah Peserta</a></li>
        <li class="tab"><a class="waves-effect" href="#PesertaTerdaftar">Peserta Terdaftar</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div id="TambahPeserta">
        <div class="col m6 s12">
          <form class="form-horizontal" action="TambahPeserta.php" method="post">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Data Diri</span>
                <div class="container-fluid">
                  <div class="row">
                    <div class="input-field col m6 s12">
                      <input id="nim" type="text" name="nim" class="validate" required="" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                      <label for="nim">Nomor Induk Mahasiswa</label>
                    </div>
                    <div class="input-field col m6 s12">
                      <input id="username" type="text" name="username" class="validate" required="" maxlength="35" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 96 && event.charCode <= 122) || (event.charCode >= 32 && event.charCode <= 32)">
                      <label for="username">Nama Peserta</label>
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
                  <p>
                    <input type="checkbox" class="filled-in" id="seminar1" name="seminar" class="orange">
                    <label for="seminar1">Seminar 1</label>
                  </p>
                  <p>
                    <input type="checkbox" class="filled-in" id="seminar2" name="seminar" class="orange">
                    <label for="seminar2">Seminar 2</label>
                  </p>
                  <p>
                    <input type="checkbox" class="filled-in" id="seminar3" name="seminar" class="orange">
                    <label for="seminar3">Seminar 3</label>
                  </p>
                  <p>
                    <input type="checkbox" class="filled-in" id="seminar4" name="seminar" class="orange">
                    <label for="seminar4">Seminar 4</label>
                  </p>
                </div>
              </div>
              <div class="card-action right-align">
                <button class="btn-flat waves-effect" type="clear" name="clear">Bersihkan</button>
                <button class="btn-flat waves-effect orange-text" type="submit" name="simpan" onclick="loadDoc">Simpan</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col m6 s12">
          <div class="card">
            <div class="card-content">
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
      <div id="PesertaTerdaftar">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Pendaftar Terkini (<?php echo date('d-m-Y') ?>)</span>
              <div class="container-fluid">
                <table class="bordered highlight responsive-table">
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
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php'; ?>
