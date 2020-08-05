<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/css/search.css'); ?>">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/t-datepicker.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url(); ?>assets/css/themes/t-datepicker-blue.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style-date.css">



	<title><?= $title ?></title>
</head>

<body>
	<div class="jumbotron jumbotron-fluid" id="top">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h5 class="display-4">Javahotel Ciamis</h5>
					<p><i class="fas fa-map-marker-alt"></i> Jln.Jenderal Sudirman, Kab.Ciamis, Kec.Ciamis, Ciamis, Jawa barat, Indonesia</p>
				</div>
			</div>
		</div>
	</div>

	<div class="infopanel1 text-white justify-content-center">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-3">
					<a class="nav-item nav-link text-secondary">1 ROOM SELECTION</a>
				</div>
				<div class="col-md-3">
					<a class="nav-item nav-link text-secondary">2 BOKING DETAIL</a>
				</div>
				<div class="col-md-3">
					<a class="nav-item nav-link text-light active">3 BOKING INFORMATION</a>
				</div>
				<div class="col-md-3">
					<a class="nav-item nav-link text-secondary">4 FINISH</a>
				</div>
			</div>
		</div>
	</div>


	<div class="container">
		<!-- <div class="list col-md-8 justify-content-center mx-auto mt-5">
            <div class="card">
                <div class="card-header">
                    Payment
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name : <?= $this->session->userdata('nama_customer') ?></li>
                        <li class="list-group-item">Email : <?= $this->session->userdata('email_customer') ?></li>
                        <li class="list-group-item">Check In : <?= $this->session->userdata('checkin') ?></li>
                        <li class="list-group-item">Check Out : <?= $this->session->userdata('checkout') ?></li>
                        <li class="list-group-item">Guest : <?= $this->session->userdata('tamu') ?></li>
                        <li class="list-group-item">Night : <?= $this->session->userdata('durasi') ?></li>
                        <li class="list-group-item">Ammount : <?= $this->session->userdata('harga') ?></li>
                        <li class="list-group-item">Order Date : <?= $this->session->userdata('tgl_pesanan') ?></li>
                        <li class="list-group-item">Credit Card : <?= $this->session->userdata('credit_card') ?></li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary btn-block" href="<?= base_url('home/index') ?>">Done</a>
                </div>
			</div> -->
		<?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?>

		<div class="alert alert-success mt-5" role="alert">
			<h4 class="alert-heading">Payment Success</h4>
			<br>
			<p>
				<span>
					Name : <?= $this->session->userdata('nama_customer') ?> <br>
					Email : <?= $this->session->userdata('email_customer') ?> <br>
					Check In : <?= $this->session->userdata('checkin') ?> <br>
					Check Out : <?= $this->session->userdata('checkout') ?> <br>
					Guest : <?= $this->session->userdata('tamu') ?> <br>
					Room : <?= $this->session->userdata('room') ?> <br>
					Night : <?= $this->session->userdata('durasi') ?> <br>
					Ammount : <?= $this->session->userdata('harga') ?> <br>
					Order Date : <?= strftime("%A %d %B %Y", strtotime($this->session->userdata('tgl_pesanan')))  ?> <br>
				</span>
			</p>
			<br>
			<p class="mb-0">Check the <a href="https://www.gmail.com" class="alert-link">e-mail</a> message from the reservation to get the room booking code</p>
			<a class="btn btn-primary btn-block mt-2" href="<?= base_url('home/end') ?>">Done</a>
		</div>
	</div>
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
						<h5 class="warna mt-2"><i class="fas fa-map-marker-alt"></i> JAVAHOTEL <br> <small>Hotel Convention & Busines</small></h5>

					</div>
					<!-- Grid column -->

					<hr class="clearfix w-100 d-md-none pb-3">

					<!-- Grid column -->
					<div class="col-md-3 mb-md-0 mb-3">

						<!-- Links -->
						<h5 class="text-uppercase warna">SITE MAP</h5>

						<ul class="list-unstyled ">
							<li>
								<a href="#!" class="warna">Home</a>
							</li>
							<li>
								<a href="#!" class="warna">Room Type</a>
							</li>
							<li>
								<a href="#!" class="warna">About us</a>
							</li>
						</ul>

					</div>
					<!-- Grid column -->



				</div>
				<!-- Grid row -->

			</div>
			<!-- Footer Links -->

			<!-- Copyright -->
			<div class="footer-copyright text-center py-3 warna">© 2020 Copyright: Dendy
			</div>
			<!-- Copyright -->
		</div>

	</footer>
	<!-- Footer -->



	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Javahotel</h5>
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
						<button type="button" class="btn buton" data-dismiss="modal">Close</button>
						<button type="submit" class="btn buton">Submit</button>
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
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/script.js"></script>

	<script>
		$(function() {
			var dates = $("#from, #to").datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				minDate: '-0d',
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

			var oneday = 24 * 60 * 60 * 1000;
			var one = new Date($("#from").val());
			var two = new Date($("#to").val());


			var hitung = Math.round(Math.round((two.getTime() - one.getTime()) / (oneday)));
			$('#malam').val(hitung + " Night");

		});
	</script>



	<script>
		window.onscroll = function() {
			myFunction()
		};

		var infopanel = document.getElementById("infopanel");
		var panel = document.getElementById("panel");
		var sticky = infopanel.offsetTop;

		function myFunction() {
			if (window.pageYOffset >= sticky) {
				infopanel.classList.add("sticky");
			} else {
				infopanel.classList.remove("sticky");
			}
		}
	</script>

</body>

</html>
