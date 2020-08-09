<!-- Preloader Start -->
<div id="preloader-active">
	<div class="preloader d-flex align-items-center justify-content-center">
		<div class="preloader-inner position-relative">
			<div class="preloader-circle"></div>
			<div class="preloader-img pere-text">
				<strong>Edotel</b>
			</div>
		</div>
	</div>
</div>
<!-- Preloader Start -->

<main>
	<!-- Booking Room Start-->
	<div class="booking-area">
		<div class="container">
			<div class="row ">
				<div class="col-12">
					<div class="booking-wrap d-flex justify-content-between align-items-center">

						<!-- select in date -->
						<div class="single-select-box mb-30">
							<!-- select out date -->
							<div class="boking-tittle">
								<span> Check In Date:</span>
							</div>
							<div class="boking-datepicker">
								<input id="datepicker1" name="checkinDate" value="<?= $checkinDate ?>" />
							</div>
						</div>
						<!-- Single Select Box -->
						<div class="single-select-box mb-30">
							<!-- select out date -->
							<div class="boking-tittle">
								<span>Check OutDate:</span>
							</div>
							<div class="boking-datepicker">
								<input id="datepicker2" name="checkoutDate" value="<?= $checkoutDate ?>" />
							</div>
						</div>
						<!-- Single Select Box -->
						<div class="single-select-box mb-30">
							<div class="boking-tittle">
								<span>Adults:</span>
							</div>
							<div class="select-this">
								<div class="select-itms">
									<select name="adults" id="select1">
										<?php for ($noA = 1; $noA < 6; $noA++) : ?>
											<?php if ($noA == $adults) : ?>
												<option value="<?= $noA ?>" selected><?= $noA ?></option>
											<?php else : ?>
												<option value="<?= $noA ?>"><?= $noA ?></option>
											<?php endif; ?>
										<?php endfor; ?>
									</select>
								</div>
							</div>
						</div>
						<!-- Single Select Box -->
						<div class="single-select-box mb-30">
							<div class="boking-tittle">
								<span>Children:</span>
							</div>
							<div class="select-this">
								<div class="select-itms">
									<select name="children" id="select2">
										<?php for ($noC = 0; $noC < 6; $noC++) : ?>
											<?php if ($noC == $children) : ?>
												<option value="<?= $noC ?>" selected><?= $noC ?></option>
											<?php else : ?>
												<option value="<?= $noC ?>"><?= $noC ?></option>
											<?php endif; ?>
										<?php endfor; ?>
									</select>
								</div>
							</div>
						</div>
						<!-- Single Select Box -->
						<div class="single-select-box mb-30">
							<div class="boking-tittle">
								<span>Rooms:</span>
							</div>
							<div class="select-this">
								<div class="select-itms">
									<select name="room" id="select3">
										<?php for ($noR = 1; $noR < 6; $noR++) : ?>
											<?php if ($noR == $room) : ?>
												<option value="<?= $noR ?>" selected><?= $noR ?></option>
											<?php else : ?>
												<option value="<?= $noR ?>"><?= $noR ?></option>
											<?php endif; ?>
										<?php endfor; ?>
									</select>
								</div>
							</div>
						</div>
						<!-- Single Select Box -->
						<div class="single-select-box pt-45 mb-30">
							<a onclick="getDateReservation()" class="btn select-btn">Change</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Booking Room End-->

	<div class="container">
		<div class="card shadow my-4" style="background-color: #ffffff;">
			<div class="card-body">
				<h2 class="card-title text-center">RINGKASAN PESANAN</h2>
				<div class="table-responsive">
					<table class="table mt-5">
						<thead style="background-color: #dca73a;font-size: 14px;">
							<tr>
								<th>RATE</th>
								<th>CHECKIN</th>
								<th>CHECKOUT</th>
								<th class="text-right">AMMOUNT</th>
							</tr>
						</thead>
						<tbody style="background-color: #fff;font-size: 14px;">
							<?php for ($i = 1; $i < 2; $i++) : ?>
								<tr>
									<td>DELUXE TWIN ROOM ONLY - FLASH DEAL</td>
									<td>07/08/2020</td>
									<td>08/08/2020</td>
									<td class="text-right">IDR 473,763</td>
								</tr>
								<tr>
									<td colspan="3">SUB TOTAL</td>
									<td class="text-right">IDR 473,763</td>
								</tr>
								<tr style="background-color: #f1f2f6;">
									<td colspan="3"><b>TOTAL</b></td>
									<td class="text-right"><b>IDR 473,763</b></td>
								</tr>
							<?php endfor; ?>
						</tbody>
					</table>
				</div>
				<table class="table table-striped">
					<thead style="background-color: #dca73a;font-size: 14px;">
						<tr>
							<th>GRAND TOTAL</th>
							<th class="text-right">IDR 473,763</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
		<div class="card shadow my-4" style="background-color: #ffffff;">
			<div class="card-body">
				<h2 class="card-title text-center mt-3">INFORMASI PESANAN</h2>

				<div class="col-md-12 mt-5">
					<form action="" method="post">
						<div class="form-group">
							<label for="">Nama Lengkap</label>
							<input class="form-control" name="subject" id="subject" type="text">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input class="form-control" name="subject" id="subject" type="text">
						</div>
						<div class="form-group">
							<label for="">Alamat</label>
							<textarea class="form-control w-100" name="message" id="message" cols="30" rows="7" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
						</div>
						<div class="form-group">
							<label for="">Kota</label>
							<input class="form-control" name="subject" id="subject" type="text">
						</div>
						<div class="form-group">
							<label for="">No Hp</label>
							<input class="form-control" name="subject" id="subject" type="text">
						</div>
						<div class="form-group text-center mt-5">
							<a class="btn">Confirm Reservation</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>

<script>
	function getDateReservation() {
		const checkinDate = $('#datepicker1').val();
		const checkoutDate = $('#datepicker2').val();
		const adults = $('#select1').val();
		const children = $('#select2').val();
		const room = $('#select3').val();
		const urlSelectRoom = "<?= base_url('home/selectRoom/') ?>";

		$.ajax({
			url: urlSelectRoom,
			method: "GET",
			data: {
				checkinDate: checkinDate,
				checkoutDate: checkoutDate,
				adults: adults,
				children: children,
				room: room,
			},
			dataType: 'JSON',
			success: function(data) {
				window.location.replace("<?= base_url('home/searchRoom/') ?>" + data.checkinDate + "/" + data.checkoutDate + "/" + data.adults + "/" + data.children + "/" + data.room);

			}
		})
	}
</script>
