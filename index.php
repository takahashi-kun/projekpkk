<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="templates/vendors/feather/feather.css">
  <link rel="stylesheet" href="templates/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="templates/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="templates/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="templates/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="templates/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="templates/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="templates/images/favicon.png" />

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="templates/images/logo-login-removebg-preview.png" alt="logo" style="width: 200px;">
              </div>
              <h4>Selamat Datang Kembali</h4>
              <h6 class="fw-light">Senang Bertemu dengan anda!</h6>
              <form class="pt-3" action="aksi_login.php" method="post">
                <div class="form-group">
                  <label for="username">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="username" name="username" required placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" ype="password" id="password" name="password" required placeholder="Password">                        
                  </div>
                </div>
                <div class="my-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">LOGIN</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
          </div>
        </div>
      </div>

    </div>

  </div>

  <script src="templates/vendors/js/vendor.bundle.base.js"></script>
  <script src="templates/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

  <script src="templates/js/off-canvas.js"></script>
  <script src="templates/js/hoverable-collapse.js"></script>
  <script src="templates/js/template.js"></script>
  <script src="templates/js/settings.js"></script>
  <script src="templates/js/todolist.js"></script>

</body>
</html>
