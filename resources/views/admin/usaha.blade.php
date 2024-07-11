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
  <link rel="stylesheet" type="text/css" href="{{asset('DataTables/css/dataTables.bootstrap.min.css')}}"/>
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
                  <h4 class="font-weight-bold mb-0">DAFTAR USAHA</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Usaha</p>
                  <div class="table-responsive">
                    <table id="example" class="table table-hover">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Nama Pengguna</th>
                          <th>Nama Usaha</th>
                          <th>Kota</th>
                          <th>Deskripsi</th>
                          <th>Foto</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($usaha as $no=>$p)
    <tr>
      <td>{{ ++$no }}</td>
      <td>{{ $p->nama }}</td>
      <td>{{ $p->nama_usaha }}</td>
      <td>{{ $p->kota }}</td>
      <td style="white-space: normal;">{{ $p->deskripsi }}</td>
      <td><img src="{{ url('images/usaha/' . $p->foto1) }}" style="border-radius: 0%; width: 100px; height: 60px;"></td>
    </tr>
    @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">DAFTAR PAKET</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">ANGGOTA</p>
                  <div class="table-responsive">
                    <table id="example2" class="table table-hover">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Nama Usaha</th>
                          <th>Nama Paket</th>
                          <th>Harga</th>
                          <th>Deskripsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($usaha_paket as $p)
    <tr>
      <td>{{ $p->id }}</td>
      <td>{{ $p->nama_usaha }}</td>
      <td>{{ $p->nama_paket }}</td>
      <td>{{'Rp. '. number_format ($p->harga,2) }}</td>
      <td>{{ $p->deskripsi }}</td>
    </tr>
    @endforeach
                        
                      </tbody>
                    </table>
                  </div>
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
  <script type="text/javascript" src="{{asset('DataTables/js/datatables.min.js')}}"></script>

        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                  fixedHeader: {
                    header: true,
                    footer: true
                  }}
                );
                $('#example2').DataTable({
                  fixedHeader: {
                    header: true,
                    footer: true
                  }}
                );
            });
        </script>
</body>

</html>

