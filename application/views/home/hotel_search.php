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
					<a class="nav-item nav-link text-light active">1 ROOM SELECTION</a>
				</div>
				<div class="col-md-3">
					<a class="nav-item nav-link text-secondary">2 BOKING DETAIL</a>
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


	<div class="flash-data99" data-flashdata99="<?= $this->session->flashdata('flash99'); ?>"></div>

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
									<input type="text" class="form-control" autocomplete="off" name="checkin" id="from" placeholder="" value="<?= $this->session->userdata('checkin') ?>">
								</div>
							</div>
							<div class="col-md-2  text-center">
								<label for="" class="label">Check-Out </label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-check"></i></span>
									</div>
									<input type="text" class="form-control" autocomplete="off" name="checkout" id="to" value="<?= $this->session->userdata('checkout') ?>">
								</div>
							</div>
							<div class="col-md-2 text-center">
								<label for="" class="label">Guest</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-users"></i></span>
									</div>
									<select class="custom-select " id="guest" name="guest">
										<option selected value="<?= $this->session->userdata('tamu') ?>"><?= $this->session->userdata('tamu') ?></option>
										<option value="1">1</option>
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
										<option selected value="<?= $this->session->userdata('room') ?>"><?= $this->session->userdata('room') ?></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
							</div>
							<div class="col-md-2 text-center">
								<label> Night </label>
								<input class="form-control" readonly name="malam" type="text" id="malam" value="<?= $this->session->userdata('night') ?>">
							</div>
							<div class="col-md-2">
								<button type="submit" id="tombol" class="form-control btn buton2 ">
									Change Date</button>
							</div>
						</div>
					</div>
			</div>
			</form>
		</div>
	</div>
	</div>

	<?php
	$tamu    = $this->session->userdata('tamu');
	$query = "SELECT `tb_kategori`.*,`tb_kamar`.* FROM `tb_kategori` LEFT JOIN `tb_kamar` ON `tb_kamar`.`id_kategori` = `tb_kategori`.`id` WHERE `tb_kamar`.`active` = 0";
	$kamar = $this->db->query($query)->result_array();

	?>

	<div class="room mt-5">
		<div class="container">
			<h5>CHOSE YOUR ROOM</h5>

			<?php if (count($kamar) > 0) { ?>
				<div class="row mt-3">
					<?php foreach ($kamar as $ht) : ?>
						<div class="col-md-12" id="jmlKamar">
							<div class="card mt-3">
								<div class="card-header">
									<?= $ht['nama_kamar'] ?>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-8">
											<img class="card-img-top img-fluid" src="<?= base_url() . 'uploads/' . $ht['image'] ?>" width="400" alt="">
										</div>
										<div class="col-md-4 my-auto">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="fas fa-bed"></i></span>
												</div>
												<input type="text" readonly value="<?= $ht['nama_kategori'] ?>" class="form-control">
											</div>
											<?php

											$id_kategori = $ht['id_kategori'];
											$query2 = "SELECT tb_kategori.*, tb_kamar.* from tb_kategori join tb_kamar on tb_kamar.id_kategori = tb_kategori.id where tb_kamar.id_kategori = $id_kategori and tb_kamar.active = 0";

											$roomCount = $this->db->query($query2)->num_rows();
											?>
											<div class="row">
												<div class="kategori">
													<h6>Max Occupancy</h6>
													<i class="fas fa-user-friends"></i> <?= $ht['tamu'] ?>
												</div>
												<div class="kategori ml-2">
													<h6>Max Room</h6>
													<i class="fas fa-bed"></i> <span class="roomCount"><?= $roomCount ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="card-footer text-muted">
									<div class="tombol float-right">
										<h5 id="harga"> IDR <?= number_format($ht['harga'], 0, ',', '.')  ?> </h5>
										<a id="select" class="btn buton4" href="<?= base_url('home/select_room/') ?><?= $ht['id_kategori'] ?>/<?= $roomCount ?>" id="select">SELECT</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>

				<?php } else { ?>
					<div class="row mt-3">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">

								</div>
								<div class="card-body">
									<h1>No Room Result</h1>
								</div>
								<div class="card-footer text-muted">
									<div class="tombol float-right">
										<h5>0</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
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

			});

			$(document).ready(function() {
				$selectRoom = $('#room').val();
			})
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
