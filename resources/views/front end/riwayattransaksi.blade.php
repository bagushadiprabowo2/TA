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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<link href="{{asset('//fonts.googleapis.com/css?family=Inconsolata:400,700')}}" rel="stylesheet">
	<link href="{{asset('//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800')}}"
	    rel="stylesheet">
		<style>
			.notification {
				position: relative;
				display: inline-block;
			}
	
			.notification .notif-box {
				display: none;
				position: absolute;
				right: 0;
				background-color: #f9f9f9;
				min-width: 200px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				z-index: 1;
			}
	
			.notification .notif-box a {
				color: black;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
			}
	
			.notification .notif-box a:hover {
				background-color: #f1f1f1;
			}
	
			.notification .badge {
				position: absolute;
				top: -10px;
				right: -10px;
				padding: 5px 10px;
				border-radius: 50%;
				background-color: red;
				color: white;
			}
		</style>
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
									<a class="dropdown-item" href="{{ url('logout') }}" style="text-transform: none;"><span class="fa fa-power-off" aria-hidden="true"></span> Log Out</a>
								</div>
							</div>
						</li>
						
						<li class="galssescart galssescart2 cart cart box_1">
							<div class="notification" data-notification-id="{{ session()->get('id_pengguna') }}">
								<i class="fas fa-bell" id="notif-icon" style="font-size: 24px; cursor: pointer;"></i>
									@if($notifikasiCounts)
										<span class="badge" id="notif-count">
											{{ $notifikasiCounts->total }}
										</span>
									@endif
								<div class="notif-box" id="notif-box">
									@foreach($notifications as $notification)
										@if (session()->get('level') == 2)
									 		<a href="{{url ('transaksi/transaksi_pelapak').'/'.session()->get('id_pengguna')}}">{{$notification->message}}</a>
										@elseif (session()->get('level') == 3)
											<a href="{{url ('/transaksi/transaksi_detail').'/'.session()->get('nama')}}">{{$notification->message}}</a>
										@endif
									@endforeach
								</div>
							</div>
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
							<a class="nav-link ml-lg-0" href="{{url(('index'))}}">BERANDA
								<span class="sr-only">(current)</span>
							</a>
						</li>
						@if(session()->get('level')==2)
						<li class="nav-item">
							<a class="nav-link" href="{{url ('transaksi/riwayat_transaksi_pelapak')}}" style="text-transform: none;"> RIWAYAT TRANSAKSI</a>
						</li>
						@endif
						@if(session()->get('level')==3)
						<li class="nav-item">
							<a class="nav-link" href="{{url ('transaksi/riwayat_transaksi')}}" style="text-transform: none;"> RIWAYAT TRANSAKSI</a>
						</li>
						@endif
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
		<!-- banner -->
		<div class="banner_inner">
			<div class="services-breadcrumb">
				<div class="inner_breadcrumb">
				</div>
			</div>

		</div>
		<!--//banner -->
	</div>
	<!--// header_top -->
	<!-- top Products -->
	@if (session()->get('level') == 3)
	<ul style="text-align: center;">
		<li><hr>
			<a class="btn btn-primary" href="riwayat_transaksi">TRANSAKSI</a>
			<a class="btn btn-danger" href="riwayat_topup">TOP UP</a>
		</li>
	</ul>
	@endif
	<br>
	<div class="main-panel">
        <div class="content-wrapper">
        	<h4 class="text-center">RIWAYAT TRANSAKSI</h4>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>Tanggal pesan</th>
                          <th>Nama Pelanggan</th>
                          <th>Harga</th>
                          <th>Tanggal Pesan</th>
                          <th>Deskripsi</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($riwayat_transaksi as $no=>$p)
                        <tr>
                          <td>{{ ++$no }}</td>
                          <td>{{ $p->tanggal_pesan }}</td>
                          <td>{{ $p->id_pelanggan }}</td>
                          <td>{{'Rp. '. number_format ($p->harga,2) }}</td>
                          <td>{{ $p->tanggal_hunting }}</td>
                          <td>{{ $p->deskripsi }}</td>
                          <td>
                            <label class="badge badge-warning">{{ $p->status == '1' ? 'Proses' : ''}}</label>
                            <label class="badge badge-danger">{{ $p->status == '2' ? 'Batal' : ''}}</label>
                            <label class="badge badge-success">{{ $p->status == '3' ? 'Selesai' : ''}}</label>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
      
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
    <!--// end-smoth-scrolling -->

	<!--// notif-script -->
	<script>
        document.getElementById('notif-icon').onclick = function() {
            var notifBox = document.getElementById('notif-box');
            if (notifBox.style.display === "block") {
                notifBox.style.display = "none";
            } else {
                notifBox.style.display = "block";
            }
        };

        // Close the notification box if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('#notif-icon')) {
                var notifBox = document.getElementById('notif-box');
                if (notifBox.style.display === "block") {
                    notifBox.style.display = "none";
                }
            }
        };
    </script>

	<script>
		$(document).ready(function() {
			$('.notification').on('click', function() {
				var notificationId = $(this).data('notification-id');
				var url = '{{ route("reset.notification", ":id") }}';
				url = url.replace(':id', notificationId);
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
					type: 'POST',
					data: {// change data to this object
						_token : $('meta[name="csrf-token"]').attr('content'),
					},
					url: url,
					success: function(response) {
						// Tambahkan logika atau tindakan setelah notifikasi berhasil diupdate
						console.log(response.message);
						// Contoh: hilangkan notifikasi dari tampilan
						$('#notif-count').remove();
						$(this).fadeOut();
					},
					error: function(error) {
						console.error('Error:', error);
						// Handle error jika ada
					}
				});
			});
		});
	</script>
	<!--// notif-script -->
	
	<!-- js file -->
</body>
</html>