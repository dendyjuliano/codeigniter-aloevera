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
					<h5 class="display-4">EDOTEL ALOEVERA</h5>
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
					<a class="nav-item nav-link  text-light active">2 BOKING DETAIL</a>
				</div>
				<div class="col-md-3">
					<a class="nav-item nav-link text-secondary">3 BOKING INFORMATION</a>
				</div>
				<div class="col-md-3">
					<a class="nav-item nav-link text-secondary">4 FINISH</a>
				</div>
			</div>
		</div>
	</div>




	<!-- Info Panel -->
	<div class="justify-content-center">
		<div class="col-md-12 info-panel" id="infopanel">
			<div class="isi">
				<form action="<?= base_url('home/search') ?>" method="POST" id="pencarian">
					<div class="form-row">
						<div class="form-row mx-auto justify-content-center">
							<div class="col-md-2 text-center">
								<label for="" class="label">Check-In</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
									</div>
									<input disabled type="text" class="form-control" autocomplete="off" name="checkin" id="from" placeholder="" value="<?= $this->session->userdata('checkin') ?>">
								</div>
							</div>
							<div class="col-md-2  text-center">
								<label for="" class="label">Check-Out </label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-check"></i></span>
									</div>
									<input disabled type="text" class="form-control" autocomplete="off" name="checkout" id="to" value="<?= $this->session->userdata('checkout') ?>">
								</div>
							</div>
							<div class="col-md-2 text-center">
								<label for="" class="label">Guest</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-users"></i></span>
									</div>
									<input disabled type="text" class="form-control" autocomplete="off" name="guest" id="tamu" value="<?= $this->session->userdata('tamu') ?>">
								</div>
							</div>
							<div class="col-md-2 text-center">
								<label for="" class="label">Room</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-bed"></i></span>
									</div>
									<input disabled type="text" class="form-control" autocomplete="off" id="room" value="<?= $this->session->userdata('room') ?>">
								</div>
							</div>
							<div class="col-md-2 text-center">
								<label> Night </label>
								<input class="form-control" disabled name="malam" type="text" id="malam" value="">
							</div>

						</div>
					</div>
			</div>
			</form>
		</div>
	</div>


	<div class="detail mt-5 text-center">
		<h2>BOOKING SUMMARY</h2>

		<div class="container">
			<table class="table mt-5">
				<thead class="thead-dark">
					<tr>
						<th scope="col">RATE</th>
						<th scope="col">GUEST</th>
						<th scope="col">CHECK IN</th>
						<th scope="col">CHECK OUT</th>
						<th scope="col">NIGHT</th>
						<th scope="col">AMMOUNT</th>
					</tr>
				</thead>
				<tbody>
					<!-- <?php
							$harga =  $room['harga'];
							$malam = $this->session->userdata('night');
							$tamu = $this->session->userdata('tamu');
							$ruangan = $this->session->userdata('room');

							$jadi = $harga * $ruangan * $malam;
							?> -->
					<tr>
						<th scope="row"><?= $room['nama_kamar'] ?></th>
						<td><?= $this->session->userdata('tamu') ?> Adult</td>
						<td><?= $this->session->userdata('checkin') ?></td>
						<td><?= $this->session->userdata('checkout') ?></td>
						<td id="malam4"></td>
						<td id="hasil"></td>
						<input class="form-control" disabled name="malam" type="hidden" id="malam2" value="">
						<input class="form-control" disabled name="harga" type="hidden" id="harga" value="<?= $room['harga'] ?>">
						<input class="form-control" disabled name="harga" type="hidden" id="hasil" value="">
					</tr>

				</tbody>
			</table>

			<table class="table mt-5">
				<thead class="thead-dark">
					<tr>
						<th>GRAND TOTAL</th>
						<th id="hasil3"></th>
					</tr>
				</thead>
			</table>

		</div>

	</div>


	<div class="information mt-5 text-center justify-content-center">
		<h2>BOOKING INFORMATION</h2>

		<div class="container mt-5">
			<form action="" method="POST">
				<div class="form-group row">
					<div class="col-sm-2">
						<input type="hidden" class="form-control text-center" name="kode" readonly value="<?= $kode; ?>" id="kode">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Full Name</label>
					<div class="col-sm-8">
						<input type="text" autocomplete="of" class="form-control" name="name" id="name">
					</div>
					<?= form_error('name', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="email" placeholder="email@example.com">
					</div>
					<?= form_error('email', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">City</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="city">
					</div>
					<?= form_error('city', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="phone">
					</div>
					<?= form_error('phone', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="form-group row">
					<label for="staticEmail" autocomplete="of" class="col-sm-2 col-form-label">Address</label>
					<div class="col-sm-8">
						<textarea class="form-control" id="exampleFormControlTextarea1" name="address" rows="3"></textarea>
					</div>
					<?= form_error('address', '<small class="text-danger">', '</small>') ?>
				</div>


				<input type="text" class="form-control" hidden name="id_room" value="<?= $room['id'] ?>">
				<input type="text" class="form-control" hidden name="checkin" value="<?= $this->session->userdata('checkin') ?>">
				<input type="text" class="form-control" hidden name="checkout" value="<?= $this->session->userdata('checkout') ?>">
				<input type="text" class="form-control" hidden name="guest" value="<?= $this->session->userdata('tamu') ?> Guest">
				<input type="text" class="form-control" hidden name="room" value="<?= $this->session->userdata('room') ?>">
				<input type="hidden" class="form-control" id="malam3" name="night" value="">
				<input class="form-control bg-dark text-white" name="harga" type="hidden" id="hasil222" value="">

				<button type="submit" class="btn btn-primary mt-5">Confirm Reservation</button>
			</form>
		</div>
	</div>

	<!-- Footer -->
	<footer class="page-footer font-small blue pt-4 mt-5">
		<div class="container">

			<!-- Footer Links -->
			<div class="container-fluid text-center text-md-left">
				<!-- Grid row -->
				<div class="row">
					<!-- Grid column -->
					<div class="col-md-6 mt-md-0 mt-3">
						<!-- Content -->
						<h4 class="text-uppercase text-light">ADDRESS</h4>
						<h5 class="text-light mt-2"><i class="fas fa-map-marker-alt"></i> Edotel <br> <small>Hotel Convention & Busines</small></h5>
					</div>
					<!-- Grid column -->
					<hr class="clearfix w-100 d-md-none pb-3">
					<!-- Grid column -->
					<div class="col-md-3 mb-md-0 mb-3">
						<!-- Links -->
						<h5 class="text-uppercase text-light">SITE MAP</h5>
						<ul class="list-unstyled ">
							<li>
								<a href="#!" class="text-light">Home</a>
							</li>
							<li>
								<a href="#!" class="text-light">Room Type</a>
							</li>
							<li>
								<a href="#!" class="text-light">About us</a>
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
			© 2020 Copyright: Dendy
		</div>
		<!-- Copyright -->

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
			$('#malam2').val(hitung);
			$('#malam3').val(hitung + " Night");
			$('#malam4').html(hitung + " Night");

			var malam = $('#malam2').val();
			var room = $('#room').val();
			var buy = $('#harga').val();

			if (malam > 0) {
				var hitung2 = buy * malam * room;
			} else {
				var hitung2 = buy * room;
			}

			var number_string = hitung2.toString(),
				sisa = number_string.length % 3,
				rupiah = number_string.substr(0, sisa),
				ribuan = number_string.substr(sisa).match(/\d{3}/g);

			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			$('#hasil').html("IDR " + rupiah);
			$('#hasil22').val("IDR " + rupiah);
			$('#hasil222').val("IDR " + rupiah);
			$('#hasil3').html("IDR " + rupiah);
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
