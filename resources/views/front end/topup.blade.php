<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>BUKALENSA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Goggles a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="{{asset('cs/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('cs/css/login_overlay.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('cs/css/style6.css')}}" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="{{asset('cs/css/shop.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('cs/css/owl.carousel.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('cs/css/owl.theme.css')}}" type="text/css" media="all">
	<link href="{{asset('cs/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('cs/css/fontawesome-all.css')}}" rel="stylesheet">
	<!-- <script src="{{asset('cs/js/bootstrap.js')}}"></script> -->

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="{{asset('asset/js/bootstrap-notify.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<link href="{{asset('//fonts.googleapis.com/css?family=Inconsolata:400,700')}}" rel="stylesheet">
	<link href="{{asset('//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800')}}"
	    rel="stylesheet">
</head>

<body>
	<div class="banner-top container-fluid" id="home">
		<!-- header -->
		<header>
			<div class="row">
				<div class="col-md-4 top-info text-left mt-lg-4">
					<h6>Butuh bantuan?</h6>
					<ul>
						<li>
							<i class="fas fa-phone"></i> Whatsapp</li>
						<li class="number-phone mt-3">085736847201</li>
					</ul>
				</div>
				<div class="col-md-4 logo-w3layouts text-center">
					<h1 class="logo-w3layouts">
						<a class="navbar-brand" href="{{url('index')}}">
							BUKALENSA </a>
					</h1>
				</div>
				<div class="col-md-4 top-info-cart text-right mt-lg-4">
					<ul class="cart-inner-info">
						<li><span class="fa fa-money" aria-hidden="true"></span> {{'Rp ' . number_format($saldo, 2)}}</li> 
						<li class="button-log" style="margin-left: 0;">
							<!-- <a class="btn-open" href="">
								<span class="fa fa-user" aria-hidden="true"> {{ session()->get('nama') }}</span>
							</a> -->
							<div class="dropdown">
								<button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user" aria-hidden="true"></span> {{ session()->get('nama') }}</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<font class="dropdown-item" style="text-transform: none;"><span class="fa fa-user" aria-hidden="true"></span> {{ session()->get('username') }}</font>
									@if(session()->get('level')==3)
									@foreach ($pengguna as $b)
									<a class="dropdown-item" href="{{url ('/transaksi/topup'). '/'.$b->id_pengguna}}" style="text-transform: none;"><span class="fa fa-bitcoin" aria-hidden="true"></span> Top Up</a>
									@endforeach
									@endif
									@if(session()->get('level')==2)
									<a class="dropdown-item" href="{{url ('transaksi/riwayat_transaksi_pelapak')}}" style="text-transform: none;"><span class="fa fa-list" aria-hidden="true"></span> Riwayat Transaksi</a>
									@endif
									@if(session()->get('level')==3)
									<a class="dropdown-item" href="{{url ('transaksi/riwayat_transaksi')}}" style="text-transform: none;"><span class="fa fa-list" aria-hidden="true"></span> Riwayat Transaksi</a>
									@endif
									<a class="dropdown-item" href="{{ url('logout') }}" style="text-transform: none;"><span class="fa fa-power-off" aria-hidden="true"></span> Log Out</a>
								</div>
							</div>
						</li>
						
						<li class="galssescart galssescart2 cart cart box_1">
							@if (session()->get('level') == 2)
							<a href="{{url ('transaksi/transaksi_pelapak').'/'.session()->get('id_pengguna')}}"><button class="top_googles_cart" type="submit" name="submit" value="">
									TRANSAKSI
									<i class="fas fa-cart-arrow-down"></i>
								</button></a>
							@endif
							@if (session()->get('level') == 3)
							<a href="{{url ('transaksi/lihat_transaksi').'/'.session()->get('nama')}}"><button class="top_googles_cart" type="submit" name="submit" value="">
									TRANSAKSI
									<i class="fas fa-cart-arrow-down"></i>
								</button></a>
							@endif
						</li>
					</ul>
					</div>
				</div>
			</div>
			<label class="top-log mx-auto"></label>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-mega mx-auto">
						<li class="nav-item active">
							<a class="nav-link ml-lg-0" href="{{url('index')}}">BERANDA
								<span class="sr-only">(current)</span>
							</a>
						</li>
						@if (session()->get('level') == 2)
						<li class="nav-item">
							<a class="nav-link" href="{{url ('usahaku')}}">USAHAKU</a>
						</li>
						@endif
						<li class="nav-item">
							<a class="nav-link" href="{{url('contact')}}">TENTANG</a>
						</li>
					</ul>

				</div>
			</nav>
		</header>
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">
				</div>
			</div>
		</div>
	</div>
	
    <form class="form-sample" action="{{url('/transaksi/store_topup')}}" method="post">
     <div class="form-group">
      @foreach ($pengguna as $b)
      <input type="hidden" class="form-control" name="id_pengguna" id="Fullname" readonly="" value="{{ $b->id_pengguna }}">
      @endforeach
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Tanggal Pesan</label>
      <input type="text" class="form-control" name="tanggal" id="exampleInputEmail1" readonly="" value="{{ date('m/d/Y') }}">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Pembayaran Melalui:</label>
      <select data-placeholder="pilih pembayaran" name="pembayaran" class="form-control">
      <option value="">pilih pembayaran </option>
      <option>Bank BCA</option>
      <option>Bank BRI</option>
      <option>Bank BNI</option>
      <option>Bank BTN</option>
      <option>Indomaret</option>
      <option>Alfamart</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Jumlah</label>
      <select data-placeholder="saldo sejumlah" name="jumlah" class="form-control">
      <option value="">saldo sejumlah </option>
      <option>500000</option>
      <option>1000000</option>
      <option>1500000</option>
      <option>2000000</option>
      <option>3000000</option>
      <option>5000000</option>
      </select>
    </div>
    <input type="hidden" class="form-control" name="kode" readonly="" value="{{ session()->get('nama') }}">
    {{csrf_field()}}
    <button type="submit" class="btn btn-primary">TAMBAH</button>
  </form>

	<!--CONTENT-->
	
	<footer class="py-lg-5 py-3">
			<div class="container-fluid px-lg-5 px-3">
				<div class="row footer-top-w3layouts">
				</div>
					</div>
				<div class="copyright-w3layouts mt-4">
					<p class="copy-right text-center ">&copy; 2019 BUKALENSA | CREATED
						<a href="http://w3layouts.com/"> BAGUS AND FURQON </a>
					</p>
				</div>
			</div>
		</footer>
	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/classie-search.js"></script>
	<script src="js/demo1-search.js"></script>
	<script src="js/minicart.js"></script>
	<script>
		$(function () {
			@if (session()->has('error'))
			$.notify({
				message: "Saldo Kurang Mohon Top Up Terlebih Dahulu",
			}, {
				type: 'danger',
				timer: 4000,
			});
			@endif
		});
	</script>
	<script>
		googles.render();

		googles.cart.on('googles_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<script>
		$(document).ready(function () {
			$(".button-log a").click(function () {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function () {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<script src="js/simplyCountdown.js"></script>
	<link href="css/simplyCountdown.css" rel='stylesheet' type='text/css' />
	<script>
		var d = new Date();
		simplyCountdown('simply-countdown-custom', {
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
	</script>
	<script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="js/bootstrap.js"></script>
</body>
</html>