<?php include 'head.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col m6 offset-m3">
          <form class="" action="" method="post">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Masuk ke Sistem Pendaftaran</span>
                <div class="row">
                  <div class="col s12">
                    <div class="input-field col s12">
                      <input id="username" name="username" type="text" class="validate">
                      <label for="username">Nama Admin</label>
                    </div>
                  </div>
                  <div class="col s12">
                    <div class="input-field col s12">
                      <input id="password" name="password" type="password" class="validate">
                      <label for="password">Kata Sandi</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-action right-align">
                <button class="btn-flat waves-effect waves-dark" type="clear" name="clear">Bersihkan</button>
                <button class="btn-flat waves-effect waves-dark orange-text" type="submit" name="simpan" onclick="loadDoc">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
