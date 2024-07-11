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
  <style type="text/css">
    table, tr, td {
      border: 1px solid black;
    }
  </style>
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('asset/images/favicon.png')}}" />
</head>
<body>
 <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="col-md-2 logo-w3layouts text-center" href="admin">
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
                  <h4 class="font-weight-bold mb-0">DAFTAR TRANSAKSI</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Transaksi</p>
                  <div class="row">
                    <div class="col">
                      <div class="thumb-image"> <img src="{{ url('images/usaha/' . $foto[0]->foto1) }}" class="img-fluid"  alt=" " style="width: 100%;"> </div>
                    </div>
                    <div class="col">
                      <table class="table">
                        <tr>
                          <td style="background:lightblue; font-weight:bold;">No</td>
                          <td>{{$transaksi[0]->id_transaksi}}</td>
                          <td style="background:lightblue; font-weight:bold;">Tanggal Pesan</td>
                          <td>{{$transaksi[0]->tanggal_pesan}}</td>
                        </tr>
                        <tr>
                          <td style="background:lightblue; font-weight:bold;">Nama Usaha</td>
                          <td>{{$transaksi[0]->id_usaha}}</td>
                            <td style="background:lightblue; font-weight:bold;">Nama pelapak</td>
                          <td>{{$transaksi[0]->nama_pelapak}}</td>
                        
                        </tr>
                          <td style="background:lightblue; font-weight:bold;">Nama Pelanggan</td>
                          <td>{{$transaksi[0]->id_pelanggan}}</td>
                          <td style="background:lightblue; font-weight:bold;">Tanggal Hunting</td>
                          <td>{{$transaksi[0]->tanggal_hunting}}</td>
                        </tr>
                        <tr>
                          <td style="background:lightblue; font-weight:bold;">Deskripsi</td>
                          <td>{{$transaksi[0]->deskripsi}}</td>
                          <td style="background:lightblue; font-weight:bold;">Paket</td>
                          <td>{{$transaksi[0]->nama_paket}}</td>
                        </tr>
                        <tr>
                          <td style="background:lightblue; font-weight:bold;">Harga</td>
                          <td>{{$transaksi[0]->harga}}</td>
                          <td style="background:lightblue; font-weight:bold;">Status</td>
                          <td>{{$transaksi[0]->nama_status}}</td>
                        </tr>

                        </table>
                        <br>
                        <a href="{{url('admin')}}">
                        <input type="button" style="margin-left: 600px;" class="btn btn-primary" value="Kembali"></a>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
                  <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
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
  <!-- Plugin js for this page-->
  <script src="{{url('asset/vendors/chart.js/Chart.min.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{url('asset/js/off-canvas.js')}}"></script>
  <script src="{{url('asset/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('asset/js/template.js')}}"></script>
  <script src="{{url('asset/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('asset/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
</body>

</html>

