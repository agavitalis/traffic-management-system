<!DOCTYPE html>
<html lang="en">

<head>
	<title>Traffic| Safety</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Traffic Safety"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" media="all" />
	<!-- Owl-Carousel-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //Web-Fonts -->

</head>

<body>
	<!-- header -->
	<header>
		<!-- navigation -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="/">
				<i class="fas fa-ambulance mr-2"></i>Traffic Safety</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
			    aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto text-center mr-lg-5">
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="/">Home
							
						</a>
					</li>
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="/traffic_signs">Traffic Signs</a>
					</li>
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="traffic_rules">Rules and Penalties</a>
					</li>
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="/login">Login</a>
					</li>
					
				</ul>
				<form class="navbar-form" role="search" action="#" method="post">
					<div class="input-group">
						<input type="search" class="form-control pull-right" placeholder="Search" required="">
						<span class="input-group-btn">
							<button type="reset" class="btn btn-default">
								<span class="glyphicon fas fa-times">
									<span class="sr-only">Close</span>
								</span>
							</button>
							<button type="submit" class="btn btn-default">
								<span class="fas fa-search">
									<span class="sr-only">Search</span>
								</span>
							</button>
						</span>
					</div>
				</form>
			</div>
		</nav>
		<!-- //navigation -->
		<!-- inner banner -->
		<div class="inner-banner text-center text-white">
			<ul class="w3_short">
				<li>
					<a href="/">Home</a>
					<i>||</i>
				</li>
				<li>Rules and Penalties</li>
			</ul>
		</div>
		<!-- //inner banner -->
	</header>
	<!-- //header -->

	<!-- services -->
	<div class="services py-sm-5 py-4">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title mb-lg-5 mb-sm-4 mb-3">
				<span>T</span>raffic
				<span>R</span>ules</h3>
			<div class="row w3-services-grids mt-md-5 mt-3">
				@foreach($rules as $rule)
					<div class="col-md-4 w3l-services-grid">
						<div class="w3ls-services-img">
							<i class="fa fa-shield-alt"></i>	{{$rule->rule_id}}
						</div>
						<div class="agileits-services-info">
							<h4 class="my-sm-3 my-2">{{$rule->rule_name}}</h4>
							<p>{{$rule->rule_description}} </p>
						</div>
						
						<div class="style-agile2 p-4">
							<h4 class="mb-md-4 mb-3">Penalty:N{{$rule->rule_penalty}}</h4>
							<p class="text-justify">{{$rule->penalty_description}}</p>
						</div>
					</div>
				@endforeach
						
			</div>
			
		</div>
	</div>
	<!-- //services -->

	<!-- middle section -->
	<div class="middle-w3l py-sm-5 py-4">
		<div class="container py-xl-5 py-lg-3">
			<h2>reach your destination 100% sure and safe</h2>
			<p class="my-md-4 my-2">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim.</p>
			<a href="/contact" class="btn btn-secondary btn-lg button2-w3l mt-4" role="button" aria-pressed="true">Report an emergency</a>
		</div>
	</div>
	<!-- //middle section -->

	<!-- footer -->
	<footer class="py-md-5 py-4">
		<div class="container">
			<div class="row w3ls_footer_grid text-lg-left text-center pb-lg-5 pb-4 mt-xl-4 mt-1 mb-xl-5 mb-4">
				<div class="col-lg-5 footer-w3l">
					<h5>World wide Traffic Safety round the clock</h5>
				</div>
				<div class="col-lg-7 w3ls_footer_grid1_right text-lg-right text-center">
					<ul>

						<li class="mr-3">
							<a href="/" class="active">Home</a>
						</li>
						<li class="mr-3">
							<a href="/traffic_signs">Traffic Signs</a>
						</li>
						<li class="mr-3">
							<a href="/traffic_rules">Rules and Penalties</a>
						</li>
						<li>
							<a href="/login">Sign In</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-6 w3ls_footer_grid_right">
					<h1>
						<a href="/">
							<i class="fas fa-ambulance"></i>Traffic Safety</a>
					</h1>
				</div>
			
				<div class="col-lg-6 w3ls_footer_grid1_left mt-lg-2 mt-4 text-lg-right text-center">
					<p>&copy; 2018 Traffic Safety. All rights reserved | Design by
						<a href="http://jakomita.com/">Jakomita</a>
					</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- //footer -->

	<!-- Js files -->
	<!-- JavaScript -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<!-- Default-JavaScript-File -->

	<script src="js/bootstrap.js"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	<!-- search -->
	<script src="js/search.js"></script>

	<!-- Owl-Carousel-JavaScript -->
	<script src="js/owl.carousel.js"></script>
	<script>
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			items: 3,
			loop: true,
			margin: 10,
			autoplay: true,
			autoplayTimeout: 1000,
			autoplayHoverPause: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 3
				}
			}
		});
		$('.play').on('click', function () {
			owl.trigger('play.owl.autoplay', [1000])
		})
		$('.stop').on('click', function () {
			owl.trigger('stop.owl.autoplay')
		})
	</script>
	<!-- //Owl-Carousel-JavaScript -->


	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smooth scrolling -->

	<!-- start-smoth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->

	<!-- smooth scrolling-bottom-to-top -->
	<script>
		$(document).ready(function () {
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
	<a href="#" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>
	<!-- //smooth scrolling-bottom-to-top -->
	<!-- //Js files -->

</body>

</html>