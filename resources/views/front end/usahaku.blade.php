<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>BUKALENSA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
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
	<link rel="stylesheet" href="{{asset('cs/css/owl.carousel.css')}}" type="text/css" media="all" />
	<link rel="stylesheet" href="{{asset('cs/css/owl.theme.css')}}" type="text/css" media="all"/>
	<link rel="stylesheet" type="text/css" href="{{asset('cs/css/jquery-ui1.css')}}" />
	<link href="{{asset('cs/css/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="{{asset('cs/css/flexslider.css')}}" type="text/css" media="screen" />
	<link href="{{asset('cs/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('cs/css/fontawesome-all.css')}}" rel="stylesheet" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet" />
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet" />
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

									<a class="dropdown-item" href="{{url ('transaksi/riwayat_transaksi')}}" style="text-transform: none;"><span class="fa fa-list" aria-hidden="true"></span> Riwayat Transaksi</a>

									<a class="dropdown-item" href="{{ url('logout') }}" style="text-transform: none;"><span class="fa fa-power-off" aria-hidden="true"></span> Log Out</a>
								</div>
							</div>
						</li>
						<li class="galssescart galssescart2 cart cart box_1">
							<a href="{{url ('transaksi/lihat_transaksi').'/'.session()->get('nama')}}"><button class="top_googles_cart" type="submit" name="submit" value="">
									TRANSAKSI
									@if(session()->get('jumlah_notif')!==null)
									{{session()->get('jumlah_notif')}}
										@endif
									<i class="fas fa-cart-arrow-down"></i>
								</button></a>
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
							<a class="nav-link" href="{{url('usahaku')}}">USAHAKU</a>
						</li>
						@endif
						<li class="nav-item">
							<a class="nav-link" href="{{url('contact')}}">TENTANG</a>
						</li>
					</ul>

				</div>
			</nav>
		</header>	
		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">
				</div>
			</div>

		</div>
		
	</div>
		<!--//banner -->
		<!--/shop-->


		@foreach ($tampilkan as $b)
		<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container">
				<div class="inner-sec-shop pt-lg-4 pt-3">
					<div class="row">
							<div class="col-lg-4 single-right-left ">
									<div class="grid images_3_of_2">
										<div class="flexslider1">
					
											<ul class="slides">
												<li data-thumb="{{ url('images/usaha/' . $b->foto1) }}">
													<div class="thumb-image"> <img src="{{ url('images/usaha/' . $b->foto1) }}" data-imagezoom="true" class="img-fluid" alt=" "> </div>
												</li>
												@if ($b->foto2 != '')
												<li data-thumb="{{ url('images/usaha/' . $b->foto2) }}">
													<div class="thumb-image"> <img src="{{ url('images/usaha/' . $b->foto2) }}" data-imagezoom="true" class="img-fluid" alt=" "> </div>
												</li>
												@endif
												@if ($b->foto3 != '')
												<li data-thumb="{{ url('images/usaha/' . $b->foto3) }}">
													<div class="thumb-image"> <img src="{{ url('images/usaha/' . $b->foto3) }}" data-imagezoom="true" class="img-fluid" alt=" "> </div>
												</li>
												@endif
												
											</ul>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-8 single-right-left simpleCart_shelfItem">
									<h3>{{$b->nama_usaha}}</h3>
									<div class="rating1">
										<ul class="stars">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="occasional">
										<h5>PAKET :</h5>
										@foreach ($paket as $p)
										<div class="colr" style="margin: 1px; padding: 6px; width: 33%;">
											<label class="radio">
												<i></i>
												"{{ $p->nama_paket }}"
												<p style="margin: 0; line-height: 1em; font-size: 1em;">
												{{'Rp.'.number_format($p->harga,2) }}</p>
												<br>
												<p style="margin: 0; line-height: 1em; font-size: .9em;">{{ $p->deskripsi }}</p>
											</label>
										</div>
										@endforeach
										<div class="clearfix"> </div>
									</div>
									<button type="button"><a href="{{url('/usaha/tambah_paket_pelapak') . '/'.$b->id_usaha}}" class="btn btn-primary">TAMBAH PAKET
									</a></button>
									<button type="button"><a href="{{url('usaha/edit_usaha_pelapak') . '/'.$b->id_usaha}}" class="btn btn-danger">EDIT USAHA
									</a></button>  									
								</div>
								<div class="clearfix"> </div>
								<!--/tabs-->
								<div class="responsive_tabs">
									<div id="horizontalTab">
										<ul class="resp-tabs-list">
											<li>Deskripsi</li>
											<li>Komentar</li>
										</ul>
										<div class="resp-tabs-container" style="width: 100%;">
											<!--/tab_one-->
											<div class="tab1">
					
												<div class="single_page" style="width: 100%;">
													<h6>INFORMASI TENTANG {{$b->nama_usaha}}</h6>
													<p style="width: 100%;">{{$b->deskripsi}}</p>
												</div>
											</div>
													
									<div class="tab2">
					
												{{--<div class="single_page" style="width: 100%;">
													<h6>LIST KOMENTAR {{$b->nama_usaha}}</h6>
													@foreach($komen as $h)
													<p style="width: 100%;">{{$h->komen}}</p>
													@endforeach
												</div>--}}
											</div>
											<!--//tab_one-->
											
									</div>
								</div>
								<!--//tabs-->
					
					</div>
				</div>
			</div>
		</section>
		@endforeach
		








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
		<script src="{{asset('cs/js/jquery-2.2.3.min.js')}}"></script>
		<!-- newsletter modal -->
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
		<!-- price range (top products) -->
		<script src="{{asset('cs/js/jquery-ui.js')}}"></script>
		<script>
			//<![CDATA[ 
			$(window).load(function () {
				$("#slider-range").slider({
					range: true,
					min: 0,
					max: 9000,
					values: [50, 6000],
					slide: function (event, ui) {
						$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
					}
				});
				$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

			}); //]]>
		</script>
		<!-- //price range (top products) -->

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

		<!-- single -->
		<script src="{{asset('cs/js/imagezoom.js')}}"></script>
		<!-- single -->
		<!-- script for responsive tabs -->
		<script src="{{asset('cs/js/easy-responsive-tabs.js')}}"></script>
		<script>
			function sethargapaket(evt){
				var d =evt.options[evt.selectedIndex].text;
				var h = d.split(' - ');
    			document.getElementById('harga_paket').value = h[1];
			}
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true, // 100% fit in a container
					closed: 'accordion', // Start closed if in accordion view
					activate: function (event) { // Callback function if tab is switched
						var $tab = $(this);
						var $info = $('#tabInfo');
						var $name = $('span', $info);
						$name.text($tab.text());
						$info.show();
					}
				});
				$('#verticalTab').easyResponsiveTabs({
					type: 'vertical',
					width: 'auto',
					fit: true
				});
			});
		</script>
		<!-- FlexSlider -->
		<script src="{{asset('cs/js/jquery.flexslider.js')}}"></script>
		<script>
			// Can also be used with $(document).ready()
			$(window).load(function () {
				$('.flexslider1').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				});
			});
		</script>
		<!-- //FlexSlider-->

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
    <!--// end-smoth-scrolling -->


		<script src="{{asset('cs/js/bootstrap.js')}}"></script>
		<!-- js file -->
</body>

</html>