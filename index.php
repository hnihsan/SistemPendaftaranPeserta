<?php session_start();
include "koneksi.php";

if(!empty($_SESSION['username'])){
  header("Location: TambahPeserta.php");
}
 ?>

<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <!-- Site Properties -->
  <title>Masuk ke Sistem Pendaftaran Seminar</title>
  <link rel="stylesheet" type="text/css" href="resources/semantic/semantic.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="resources/semantic/semantic.min.js"></script>
  <link rel="stylesheet" type="text/css" href="resources/css/sweetalert2.min.css">
  <script src="resources/js/sweetalert2.min.js"></script>

  <style type="text/css">
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
  <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
                },
                {
                  type   : 'email',
                  prompt : 'Please enter a valid e-mail'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password'
                },
                {
                  type   : 'length[6]',
                  prompt : 'Your password must be at least 6 characters'
                }
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
</head>
<body>
<?php include "msg_log.php";?>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui blue image header">
      <img src="resources/images/logo_bl.png" class="image">
      <div class="content">
        Sistem Pendaftaran Seminar
      </div>
    </h2>
    <form action="controller/LoginController.php" method="post" class="ui large form">
      <input type="hidden" name="postLogin" value="1">
      <div class="ui raised segments">
        <div class="ui yellow attached segment">
          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <input type="text" name="username" placeholder="Nama Pengguna">
            </div>
          </div>
          <div class="field">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input type="password" name="password" placeholder="Kata Sandi">
            </div>
          </div>
        </div>
        <div class="ui bottom attached primary button" tabindex="0">Masuk</div>
      </div>
      <div class="ui error message"></div>
    </form>
  </div>
</div>
</body>
</html>
