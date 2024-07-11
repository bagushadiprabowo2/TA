<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BUKALENSA</title>
        <link rel="stylesheet" href="{{url('asset/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('asset/vendors/base/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{url('asset/css/style.css')}}">
  <link rel="shortcut icon" href="{{url('asset/images/favicon.png')}}" />
  <!-- <link href="{{asset('css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' /> -->
  <link rel="stylesheet" type="text/css" href="{{asset('DataTables/css/dataTables.bootstrap.min.css')}}"/>
        
</head>
<body>
  <div class="container-scroller">
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
    <div class="container-fluid page-body-wrapper">
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
                  <p class="card-title mb-0">TRANSAKSI</p>
                  <div class="box-content">
                    <table id="example" class="table table-striped table-bordered bootstrap-datatable datatable">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Tanggal pesan</th>
                          <th>Nama Usaha</th>
                          <th>Harga</th>
                          <th>Tanggal Pesan</th>
                          <th>Deskripsi</th>
                          <th>Status</th>
                          <th>Option</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($transaksi as $no=>$p)
                        <tr>
                          <td>{{ ++$no }}</td>
                          <td>{{ $p->tanggal_pesan }}</td>
                          <td>{{ $p->id_usaha }}</td>
                          <td>{{'Rp. '. number_format ($p->harga,2) }}</td>
                          <td>{{ $p->tanggal_hunting }}</td>
                          <td>{{ $p->deskripsi }}</td>
                          <td>
                            <label class="badge badge-warning">{{ $p->status == '1' ? 'Proses' : ''}}</label>
                            <label class="badge badge-danger">{{ $p->status == '2' ? 'Batal' : ''}}</label>
                            <label class="badge badge-success">{{ $p->status == '3' ? 'Selesai' : ''}}</label>
                            </td>
                          <td>
                            <a class="btn btn-primary" href="{{url ('transaksi/detail').'/'.$p->id_transaksi}}">Detail</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">DAFTAR TOP UP</h4>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">TOP UP</p>
                  <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable" id="example2">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Nama Pengguna</th>
                          <th>Membayar Melalui</th>
                          <th>Kode Generate</th>
                          <th>Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($topup as $no=>$t)
                        <tr>
                          <td>{{ ++$no }}</td>
                          <td>{{ $t->nama }}</td>
                          <td>{{ $t->pembayaran }}</td>
                          <td>{{ $t->kode }}</td>
                          <td>{{ $t->jumlah}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.templatewatch.com/" target="_blank">Templatewatch</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <script src="{{url('asset/vendors/base/vendor.bundle.base.js')}}"></script>
  <script src="{{url('asset/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{url('asset/js/off-canvas.js')}}"></script>
  <script src="{{url('asset/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('asset/js/template.js')}}"></script>
  <script src="{{url('asset/js/todolist.js')}}"></script>
  <script src="{{url('asset/js/dashboard.js')}}"></script>
        <!-- <script src="{{asset('js/bootstrap.min.js')}}"></script> -->
        <!-- <script type="text/javascript" src="{{asset('DataTables/js/jquery.dataTables.js')}}"></script> -->
        <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script> -->
        <!-- <script type="text/javascript" src="{{asset('DataTables/js/dataTables.bootstrap.js')}}"></script> -->
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

