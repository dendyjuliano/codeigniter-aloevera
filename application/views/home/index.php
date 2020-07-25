<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<!-- <link href="<?= base_url(); ?>assets/css/t-datepicker.min.css" rel="stylesheet" type="text/css"> -->
	<link href="<?= base_url(); ?>assets/css/themes/t-datepicker-blue.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style-date.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Abhaya+Libre&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">

	<title><?= $title ?></title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top">
		<div class="container">
			<a class="navbar-brand text-light" href="#">
				ALOEVERA
			</a>
			<button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div id="navigation-bar">
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav ml-auto">
						<a class="nav-item nav-link text-light" href="<?= base_url('home') ?>">Home <span class="sr-only">(current)</span></a>
						<a class="nav-item nav-link text-light" href="<?= base_url('home/room_i') ?>">Room Type</a>
						<a class="nav-item nav-link text-light" href="#about">About</a>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<!-- Jumbotron -->
	<div class="bd-example">
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="<?= base_url(); ?>assets/img/img1.jpg" class="d-block w-100 img-fluid" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h1 class="ml5">
							<span class="text-wrapper">
								<span class="line line1"></span>
								<h1 class="ml2 display-4 letters letters-left"><?php
																				date_default_timezone_set("Asia/Jakarta");
																				$jam = date("H:i:s");
																				$a = date("H");
																				if (($a >= 6) && ($a <= 11)) {
																					echo "Good Morning, ";
																				} elseif (($a >= 11) && ($a <= 15)) {
																					echo "Good Afternoon, ";
																				} elseif (($a > 15) && ($a <= 18)) {
																					echo "Good Evening, ";
																				} else {
																					echo "Good Night, ";
																				}
																				?></h1>
								<span class="line line2"></span>
							</span>
						</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="<?= base_url(); ?>assets/img/img2.jpg" class="d-block w-100 img-fluid" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h1 class="ml11 display-4">
							<span class="text-wrapper">
								<span class="line line1"></span>
								<span class="letters">Beautiful Scenery</span>
							</span>
						</h1>
					</div>
				</div>
				<div class="carousel-item">
					<img src="<?= base_url(); ?>assets/img/img3.jpg" class="d-block w-100 img-fluid" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h1 class="ml14">
							<span class="text-wrapper2">
								<span class="letters2">Comfortable hotel</span>
								<span class="line2"></span>
							</span>
						</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<!-- Akhir Jumbotron -->



	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('flash2'); ?>"></div>
	<div class="flash-data3" data-flashdata3="<?= $this->session->flashdata('flash3'); ?>"></div>
	<div class="flash-data4" data-flashdata4="<?= $this->session->flashdata('flash4'); ?>"></div>
	<div class="flash-data5" data-flashdata5="<?= $this->session->flashdata('flash5'); ?>"></div>
	<div class="flash-data6" data-flashdata6="<?= $this->session->flashdata('flash6'); ?>"></div>
	<div class="flash-data10" data-flashdata10="<?= $this->session->flashdata('flash10'); ?>"></div>
	<div class="flash-data9" data-flashdata9="<?= $this->session->flashdata('flash9'); ?>"></div>

	<!-- Info Panel -->
	<div class="container">
		<div class="col-md-8 mx-auto">
			<div class="info-panel" id="infopanel">
				<div class="isi">
					<form action="<?= base_url('home/search') ?>" method="POST" id="pencarian">
						<div class="form-row">
							<div class="form-row mx-auto justify-content-center">
								<!-- <div class="col-md-3 text-center">
									<label for="" class="label">Check-In</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
										</div>
										<input type="text" class="form-control" name="checkin" id="from" placeholder="" value="">
									</div>
								</div>
								<div class="col-md-3 text-center">
									<label for="" class="label">Check-Out </label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-check"></i></span>
										</div>
										<input type="text" class="form-control" name="checkout" id="to" value="">
									</div>
								</div> -->
								<div class="form-group col-md-6 ">
									<label>Checkin - Checkout</label>
									<div class="input-group ">
										<input type="text" class="form-control startdate datetimepicker-input satu" data-toggle="datetimepicker" data-target=".startdate" name="checkin" id="checkin" autocomplete="off" />
										<div class="input-group-append">
											<span class="input-group-text">s/d</span>
										</div>
										<input type="text" class="form-control enddate datetimepicker-input dua" data-toggle="datetimepicker" data-target=".enddate" name="checkout" autocomplete="off" />
									</div>
								</div>
								<input class="form-control" readonly name="malam" type="hidden" id="malam" value="">
								<div class="col-md-2 text-center">
									<label for="" class="label">Guest</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-users"></i></span>
										</div>
										<select class="custom-select " id="guest" name="guest">
											<option value="1" selected>1</option>
											<option value="2">2</option>

										</select>
									</div>
								</div>
								<div class="col-md-2 text-center">
									<label for="" class="label">Room</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1"><i class="fas fa-bed"></i></span>
										</div>
										<select class="custom-select " id="room" name="room">
											<option value="1" selected>1</option>
											<option value="2">2</option>
											<option value="3">3</option>

										</select>
									</div>
								</div>
								<div class="col-md-2">
									<button type="submit" id="btn" class="form-control btn buton2"><i class="fas fa-search"></i>
										Book Now</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Akhir Info Panel -->


	<div class="container">
		<div class="content1">
			<h5 class="text-center warna">Why book with Edotel</h5>
			<div class="row mt-5">
				<div class="col-md-3 text-center">
					<img src="<?= base_url(); ?>assets/img/icon/24hours.png" width="170" alt="workingspace" class="img-fluid">
					<h5 class="isi">24 Hours Assistance</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus aliquid</p>
				</div>
				<div class="col-md-3 text-center">
					<img src="<?= base_url(); ?>assets/img/icon/Service.png" width="170" alt="workingspace" class="img-fluid">
					<h5 class="isi">Customer Service</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus aliquid</p>
				</div>
				<div class="col-md-3 text-center">
					<img src="<?= base_url(); ?>assets/img/icon/additionalprice.png" width="170" alt="workingspace" class="img-fluid">
					<h5 class="isi">No Additional Costs</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus aliquid</p>
				</div>
				<div class="col-md-3 text-center">
					<img src="<?= base_url(); ?>assets/img/icon/FastProses.png" width="170" alt="workingspace" class="img-fluid">
					<h5 class="isi">The Payment prosess is fast</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus aliquid</p>
				</div>
			</div>
		</div>
		<div class="content2">
			<div class="row workingspace">
				<div class="col-lg-6">
					<img src="<?= base_url(); ?>assets/img/room.jpg" alt="workingspace" class="img-fluid">
				</div>
				<div class="col-lg-5">
					<h3>Room type</h3>
					<p>We have suitable room for your need. 17 rooms with variety of accomodation : superior, deluxe, and twin.</p>
					<a href="<?= base_url('home/room_i') ?>" class="btn buton">Read More</a>
				</div>
			</div>
		</div>
	</div>

	<div id="about"></div>
	<div class="informasi">
		<div class="container">
			<div class="isi text-center">
				<h3>Hotel Information</h3>
				<hr class="garis1">
				<p class="judul1">.......Share Us Your Dream Events.........</p>
				<P class="warna3">Meeting | Incentive | Convention | Exhibitions | Request for Quotations</P>
				<div class="row mt-5">
					<div class="col-md-4 text-center">
						<h1 class="icon"><i class="fas fa-stopwatch"></i></h1>
						<h5 class="icon2">2 Km</h5>
						<h5 class="icon3">Alun-Alun Ciamis</h5>
					</div>
					<div class="col-md-4 text-center">
						<h1 class="icon"><i class="fas fa-shield-alt"></i></h1>
						<h5 class="icon2">0.1 Km</h5>
						<h5 class="icon3">POLRES Ciamis</h5>
					</div>
					<div class="col-md-4 text-center">
						<h1 class="icon"><i class="fas fa-shopping-cart"></i></h1>
						<h5 class="icon2">0.3 Km</h5>
						<h5 class="icon3">Alfamart</h5>
					</div>
				</div>
			</div>
		</div>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2353.0062464826246!2d108.32656849045729!3d-7.323648454492968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6588c6b0896a0f%3A0xed07ddb6798298ea!2sSMK%20Negeri%201%20Ciamis!5e0!3m2!1sid!2sid!4v1582207713823!5m2!1sid!2sid" class="mt-3" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	</div>


	<!-- Footer -->
	<footer class="page-footer font-small blue pt-4">
		<div class="container">

			<!-- Footer Links -->
			<div class="container-fluid text-center text-md-left">

				<!-- Grid row -->
				<div class="row">

					<!-- Grid column -->
					<div class="col-md-6 mt-md-0 mt-3">

						<!-- Content -->
						<h4 class="text-uppercase warna">ADDRESS</h4>
						<h5 class="warna mt-2"><i class="fas fa-map-marker-alt"></i> Edotel <br> <small>Hotel Convention & Busines</small></h5>

					</div>
					<!-- Grid column -->

					<hr class="clearfix w-100 d-md-none pb-3">

					<!-- Grid column -->
					<div class="col-md-3 mb-md-0 mb-3">

						<!-- Links -->
						<h5 class="text-uppercase warna">SITE MAP</h5>

						<ul class="list-unstyled ">
							<li>
								<a href="#!" class="warna3">Home</a>
							</li>
							<li>
								<a href="#!" class="warna3">Room Type</a>
							</li>
							<li>
								<a href="#!" class="warna3">About us</a>
							</li>
						</ul>

					</div>
					<!-- Grid column -->



				</div>
				<!-- Grid row -->

			</div>
			<!-- Footer Links -->

		</div>
		<!-- Copyright -->
		<div class="footer-copyright text-center py-3 warna2">
			© 2020 Copyright: Kelompok6
		</div>
		<!-- Copyright -->

	</footer>
	<!-- Footer -->



	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title warna4" id="exampleModalLabel">ALOEVERA</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('auth/login') ?>" method="post">
					<div class="modal-body">
						<h4 class="text-center">Login Here</h4>
						<br>
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
					</div>
					<div class="modal-footer">
						<div class="dafter mr-auto">
							<a href="<?= base_url('auth/register') ?>" class="text-warning">do you not have an account ?</a>
						</div>
						<div class="boton float-right">
							<button type="button" class="btn buton" data-dismiss="modal">Close</button>
							<button type="submit" class="btn buton">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Select "Logout" below if you are ready to end your current session.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
					<a href="<?= base_url('auth/logout') ?>" type="button" class="btn btn-danger">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/script.js"></script>
	<!-- Include library Moment JS -->
	<script src="<?= base_url(); ?>assets/moment/moment.min.js"></script>
	<!-- Include library Datepicker Gijgo -->
	<script src="<?= base_url(); ?>assets/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Include file custom.js -->
	<script src="<?= base_url(); ?>assets/js/custom.js"></script>
	<script>
		$(document).ready(function() {
			setDatePicker();
			setDateRangePicker(".startdate", ".enddate");
			setMonthPicker();
			setYearPicker();
			setYearRangePicker(".startyear", ".endyear");
		})

		$(window).on('scroll', function() {
			if ($(window).scrollTop()) {
				$('nav').addClass('bg-white container col-md-10 putih');
				$('.nav-link').removeClass('text-light');
				$('.navbar-brand').removeClass('text-light');
			} else {
				$('nav').removeClass('bg-white container col-md-10 putih');
				$('.nav-link').addClass('text-light');
				$('.navbar-brand').addClass('text-light');
			}
		});
	</script>

	<script>
		// Wrap every letter in a span
		var textWrapper = document.querySelector('.ml11 .letters');
		textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");

		anime.timeline({
				loop: true
			})
			.add({
				targets: '.ml11 .line',
				scaleY: [0, 1],
				opacity: [0.5, 1],
				easing: "easeOutExpo",
				duration: 700
			})
			.add({
				targets: '.ml11 .line',
				translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 630],
				easing: "easeOutExpo",
				duration: 700,
				delay: 100
			}).add({
				targets: '.ml11 .letter',
				opacity: [0, 1],
				easing: "easeOutExpo",
				duration: 600,
				offset: '-=775',
				delay: (el, i) => 34 * (i + 1)
			}).add({
				targets: '.ml11',
				opacity: 0,
				duration: 1000,
				easing: "easeOutExpo",
				delay: 1000
			});
	</script>

	<!-- <script>
		$(function() {
			var dates = $("#from, #to").datepicker({
				defaultDate: "+1w",
				minDate: '-0d',
				changeMonth: true,
				numberOfMonths: 1,
				onSelect: function(selectedDate) {
					var option = this.id == "from" ? "minDate" : "maxDate",
						instance = $(this).data("datepicker"),
						date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
					dates.not(this).datepicker("option", option, date);
				}
			});
			var date = new Date();

			var day = date.getDate();
			var day2 = date.getDate() + 1;
			var month = date.getMonth() + 1;
			var year = date.getFullYear();

			if (month < 10) month = "0" + month;
			if (day < 10) day = "0" + day;

			var today = month + "/" + day + "/" + year;
			var today2 = month + "/" + day2 + "/" + year;

			var oneday = 24 * 60 * 60 * 1000;
			var one = new Date($("#from").val());
			var two = new Date($("#to").val());


			var hitung = Math.round(Math.round((two.getTime() - one.getTime()) / (oneday)));
			$('#malam').val(hitung + " Night");


			document.getElementById('from').value = today;
			document.getElementById('to').value = today2;
		});
	</script> -->

	<script>
		anime.timeline({
				loop: true
			})
			.add({
				targets: '.ml5 .line',
				opacity: [0.5, 1],
				scaleX: [0, 1],
				easing: "easeInOutExpo",
				duration: 700
			}).add({
				targets: '.ml5 .line',
				duration: 800,
				easing: "easeOutExpo",
				translateY: (el, i) => (-0.625 + 0.625 * 2 * i) + "em"
			}).add({
				targets: '.ml5 .ampersand',
				opacity: [0, 1],
				scaleY: [0.5, 1],
				easing: "easeOutExpo",
				duration: 600,
				offset: '-=600'
			}).add({
				targets: '.ml5 .letters-left',
				opacity: [0, 1],
				translateX: ["0.5em", 0],
				easing: "easeOutExpo",
				duration: 600,
				offset: '-=300'
			}).add({
				targets: '.ml5 .letters-right',
				opacity: [0, 1],
				translateX: ["-0.5em", 0],
				easing: "easeOutExpo",
				duration: 800,
				offset: '-=600'
			}).add({
				targets: '.ml5',
				opacity: 0,
				duration: 1000,
				easing: "easeOutExpo",
				delay: 1000
			});
	</script>

	<script>
		// Wrap every letter in a span
		var textWrapper2 = document.querySelector('.ml14 .letters2');
		textWrapper2.innerHTML = textWrapper2.textContent.replace(/\S/g, "<span class='letter2'>$&</span>");

		anime.timeline({
				loop: true
			})
			.add({
				targets: '.ml14 .line2',
				scaleX: [0, 1],
				opacity: [0.5, 1],
				easing: "easeInOutExpo",
				duration: 900
			}).add({
				targets: '.ml14 .letter2',
				opacity: [0, 1],
				translateX: [40, 0],
				translateZ: 0,
				scaleX: [0.3, 1],
				easing: "easeOutExpo",
				duration: 800,
				offset: '-=600',
				delay: (el, i) => 150 + 25 * i
			}).add({
				targets: '.ml14',
				opacity: 0,
				duration: 1000,
				easing: "easeOutExpo",
				delay: 800
			});
	</script>
	<!-- <script>
        window.onscroll = function() {
            myFunction()
        };

        var infopanel = document.getElementById("infopanel");
        var sticky = infopanel.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                infopanel.classList.add("sticky");
            } else {
                infopanel.classList.remove("sticky");
            }
        }
    </script> -->
</body>

</html>
