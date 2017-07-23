<?php include 'head.php'; ?>
  <div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form class="" action="" method="post">
        <div class="panel panel-primary">
          <div class="panel-heading">Masuk ke Sistem Pendaftaran</div>
          <div class="panel-body">
            <div class="form-group label-floating">
              <label class="control-label" for="username">Nama Admin</label>
              <input class="form-control" id="username" type="text">
            </div>
            <div class="form-group label-floating">
              <label class="control-label" for="password">Kata Sandi</label>
              <input class="form-control" id="password" type="password">
            </div>
          </div>
          <div class="panel-footer text-right">
            <button class="btn btn-default" type="clear" name="clear">Bersihkan</button>
            <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php include 'footer.php'; ?>
