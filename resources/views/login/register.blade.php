<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RoyalUI Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('asset/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('asset/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('asset/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('asset/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <h1 class="logo-w3layouts text-center" style="font-size: 35px;">BUKALENSA </h1>
              </div>

              <section class="main-section">
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

              <form class="form-sample" action="registerPost" method="post">
                {{csrf_field()}}
                <div class="form-group">
                  <label>Nama Pengguna</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="nama" class="form-control form-control-lg border-left-0" placeholder="Masukkan nama anda">
                  </div>
                </div>
                <div class="form-group">
                  <label>Kota Asal</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-home text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="kota_asal" class="form-control form-control-lg border-left-0" placeholder="Masukkan kota asal anda">
                  </div>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-email text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="username" class="form-control form-control-lg border-left-0" placeholder="Masukkan username anda">
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="password" class="form-control form-control-lg border-left-0" placeholder="Masukkan password anda">                        
                  </div>
                </div>

                <div class="form-group">
                  <label>DAFTAR SEBAGAI?</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                          <div class="form-check">
                              <label style="color: black;" class="form-check-label">
                                <input type="radio" class="form-check-input" name="id_level" id="membershipRadios1" value="2" checked>
                                Pelapak
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="id_level" id="membershipRadios2" value="3">
                                Pelanggan
                              </label>
                            </div>
                          </div>
                        </div>
                </div>
                
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>
                <div class="mt-3">
                  <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="login">LOGIN</a>
                </div>
              </form>
            </section>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018 || BUKALENSA</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{url('asset/js/off-canvas.js')}}"></script>
  <script src="{{url('asset/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('asset/js/template.js')}}"></script>
  <script src="{{url('asset/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>
