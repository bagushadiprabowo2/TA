<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BUKALENSA</title>
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
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="col-md-2 logo-w3layouts text-center" href="{{url('admin')}}">
          <h1 class="logo-w3layouts" style="font-size: 35px;">BUKALENSA </a>
          </h1>
        </div>
        </a>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin')}}">
              <i class="ti-clipboard menu-icon"></i>
              <span class="menu-title">TRANSAKSI</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('kota')}}">
              <i class="ti-home menu-icon"></i>
              <span class="menu-title">KOTA</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('wisata')}}">
              <i class="ti-agenda menu-icon"></i>
              <span class="menu-title">WISATA</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{url('pengguna')}}">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">PENGGUNA</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('usaha')}}">
              <i class="ti-view-list-alt menu-icon"></i>
              <span class="menu-title">USAHA</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('logout')}}">
              <i class="ti-power-off menu-icon"></i>
              <span class="menu-title">LOGOUT</span>
            </a>
          </li>
        </ul>
      </nav>
      
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">FORM EDIT PENGGUNA</h4>
                </div>
              </div>
            </div>
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Pengguna</h4>
                  @foreach ($pengguna as $p)
                  <form class="form-sample" action="update" method="post">
                    {{csrf_field()}}
                    <p class="card-description">
                      Info Diri
                    </p>
                    <input type="hidden" name="id_pengguna" value="{{ $p->id_pengguna }}"> 
                    <br/>
  
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Pengguna</label>
                          <div class="col-sm-9">
                            <input type="text" name="nama" value="{{$p->nama}}" class="form-control" />
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kota Asal</label>
                          <div class="col-sm-9">
                            <input type="text" name="kota_asal" value="{{$p->kota_asal}}" class="form-control"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input type="text" name="username" value="{{$p->username}}" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                          <input type="text" name="password" value="{{$p->password}}" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    
                      <div class="col-md-7">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Status</label>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="id_level" id="membershipRadios1" value="1" checked>
                                Admin
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="id_level" id="membershipRadios2" value="2">
                                Pelapak
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="id_level" id="membershipRadios3" value="3" checked>
                                Pelanggan
                              </label>
                            </div>
                          </div>
                         <div class="pull-right">
                          <button type="submit" class="btn btn-primary">TAMBAH</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.templatewatch.com/" target="_blank">Templatewatch</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{url('asset/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{url('asset/js/off-canvas.js')}}"></script>
  <script src="{{url('asset/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('asset/js/template.js')}}"></script>
  <script src="{{url('asset/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('asset/js/file-upload.js')}}"></script>
  <!-- End custom js for this page-->
</body>

</html>
