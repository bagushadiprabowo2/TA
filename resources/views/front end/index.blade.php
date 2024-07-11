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
						<a class="navbar-brand" href="index">
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
									
									@if(session()->get('jumlah_notif')!==null)
									{{session()->get('jumlah_notif')}}
										@endif
									<i class="fas fa-cart-arrow-down"></i>
								</button></a>
							@endif
							@if (session()->get('level') == 3)
							<a href="{{url ('/transaksi/transaksi_detail').'/'.session()->get('nama')}}"><button class="top_googles_cart" type="submit" name="submit" value="">
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
		<!-- //header -->
		<!-- banner -->
		<div class="banner">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<div class="carousel-caption text-center">
							<h3>Mudah
								<span>Ingin pergi berlibur?</span>
							</h3>
						</div>
					</div>
					<div class="carousel-item item2">
						<div class="carousel-caption text-center">
							<h3>SIMPEL
								<span>Tidak tahu cara memfoto yang baik?</span>
							</h3>
						</div>
					</div>
					<div class="carousel-item item3">
						<div class="carousel-caption text-center">
							<h3>PELUANG USAHA
								<span>Buka usaha fotografimu disini</span>
							</h3>
						</div>
					</div>
					<div class="carousel-item item4">
						<div class="carousel-caption text-center">
							<h3>TERPERCAYA
								<span>Transaksi aman dan nyaman</span>
							</h3>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!--//banner -->
		</div>
	</div>
	<!--//banner-sec-->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container-fluid">
			<div class="inner-sec-shop px-lg-4 px-3">
					<form action="{{ url('index') }}" class="row" method="GET">
						<div class="col-4"></div>
						<div class="col">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<select class="form-control bg-primary" name="filter" style="color: #FFF;">
										<option value="nama_usaha">Nama</option>
										<option value="kota">Kota</option>
										<option value="nama_wisata">Wisata</option>
									</select>
								</div>
								<input type="text"  style="text-transform:uppercase" class="form-control" aria-label="Text input with dropdown button" name="kueri" placeholder="">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
								</div>
							</div>
							<br>
							@if (session()->get('notif_pencarian') !== 'hapus')
							<div class="alert alert-danger">{{session()->get('notif_pencarian')}}!</div>
							@endif
						</div>
						<div class="col-4"></div>
					</form>
				<div class="row">
					<!-- /womens -->
					@foreach($usaha as $p)
					<div class="col-md-3 product-men women_two">
						<div class="product-googles-info googles">
							<div class="men-pro-item">
								<div class="men-thumb-item">
									<img style=" size:  80%;" src="{{ url('images/usaha/' . $p->foto1) }}" class="img-fluid" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="usaha/tampil/{{$p->id_usaha}}" class="link-product-add-cart">TAMPILKAN</a>
										</div>
									</div>
								</div>
								<div class="item-info-product">
									<div class="info-product-price">
										<div class="grid_meta">
											<div class="product_price">
												<a href="usaha/tampil/{{$p->id_usaha}}">
													<p style="color: orange; font-size: 20px;">{{ $p->nama_usaha}} </p>
													</a>
												<h4>
													<p class="fa fa-home" style="font-size: 15px;">{{ $p->kota}}</p>
												</h4>
											</div>
											<div class="stars">
											<input type="text" class="ratingEvent rating5" name="rating" readonly value="{{ $p->rating}}" />
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					
				</div>
						</div>
					</div>
				</div>
				<!-- //clients-sec -->
			</div>
		</div>
	</section>
	<!-- about -->
	<!--footer -->
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
		<!-- //footer -->

	<!--jQuery-->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- newsletter modal -->
	<!-- Modal -->
	<!-- Modal -->
	<script>
		$(document).ready(function () {
			// $("#myModal").modal();
		});
	</script>
	<!-- // modal -->

	<!--search jQuery-->
	<script src="{{asset('cs/js/modernizr-2.6.2.min.js')}}"></script>
	<script src="{{asset('cs/js/classie-search.js')}}"></script>
	<script src="{{asset('cs/js/demo1-search.js')}}"></script>
	<!--//search jQuery-->
	<!-- cart-js -->
	<script src="{{asset('cs/js/minicart.js')}}"></script>
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
	<!-- //cart-js -->
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
	<!-- carousel -->
	<!-- Count-down -->
	<script src="{{asset('cs/js/simplyCountdown.js')}}"></script>
	<link href="{{asset('cs/css/simplyCountdown.css')}}" rel='stylesheet' type='text/css' />
	<script>
		var d = new Date();
		simplyCountdown('simply-countdown-custom', {
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
	</script>
	<!--// Count-down -->
	<script src="{{asset('cs/js/owl.carousel.js')}}"></script>
	<script>
		$(document).ready(function () {
			$('.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 2,
						nav: false
					},
					900: {
						items: 3,
						nav: false
					},
					1000: {
						items: 4,
						nav: true,
						loop: false,
						margin: 20
					}
				}
			})
		})
	</script>

	<!-- //end-smooth-scrolling -->


	<!-- dropdown nav -->
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
	<!-- //dropdown nav -->
  <script src="{{asset('cs/js/move-top.js')}}"></script>
    <script src="{{asset('cs/js/easing.js')}}"></script>
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
	
    <script type="text/javascript" src="{{asset('jancok/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('jancok/rating.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('jancok/rating.css')}}" />
    <script type="text/javascript">
        $(function ()
        {
            $('.rating').rating();

            $('.ratingEvent').rating({ rateEnd: function (v) { $('#result').val(v); } });
        });
    </script>
    <!--// end-smoth-scrolling -->

	
	<!-- js file -->
</body>
</html>