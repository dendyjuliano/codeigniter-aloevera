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

	<!-- Room Start -->
	<section class="room-area my-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-8">
					<!--font-back-tittle  -->
					<div class="font-back-tittle mb-45">
						<div class="archivment-front">
							<h3>Our Rooms</h3>
						</div>
						<h3 class="archivment-back">Our Rooms</h3>
					</div>
				</div>
			</div>
			<!-- <div class="row">
				<?php foreach ($roomCategory as $rc) : ?>
					<div class="col-xl-4 col-lg-6 col-md-6">
						<div class="single-room mb-50">
							<div class="room-img">
								<a href="rooms.html"><img src="<?= base_url('uploads/' . $rc['image']) ?>" alt=""></a>
							</div>
							<div class="room-caption">
								<h3><a href="rooms.html"><?= $rc['nama_kategori'] ?></a></h3>
								<div class="per-night">
									<span><u>Rp </u><?= number_format($rc['harga'], 0, ',', '.') ?> <span>/ malam</span></span>
									<input type="hidden" id="idCategory" value="<?= $rc['id'] ?>">
									<a class="btn view-btn1 float-right btn-sm trigger" onclick="getDateReservation('<?= $rc['id'] ?>');">Select</a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div> -->
			<div class="row">
				<div class="col-md-8">
					<?php $no = 0;
					$no1 = 0;
					$no2 = 0;
					foreach ($roomCategory as $rc) : ?>
						<div class="col-md-12 roomDisplay">
							<div class="card my-3">
								<div class="row no-gutters">
									<div class="col-lg-8">
										<img src="<?= base_url('uploads/') . $rc['image'] ?>" style="height: 300px; object-fit: cover;" width="100%" class="card-img" alt="...">
									</div>
									<div class="col-lg-4">
										<div class="card-body">
											<h2 class="card-title"><?= $rc['nama_kategori'] ?></h2>
											<input type="hidden" id="idCategory" value="<?= $rc['id'] ?>">
											<p class="card-text">This is a wider card with supporting text below </p>
											<p class="card-text">Tersedia <span id="aviableRoom-<?= $no++ ?>" class="jmlKamar"><?= $rc['jmlkamar'] ?></span> Ruangan<br><small class="text-danger" id="error-<?= $no1++ ?>"></small></p>
											<div class="per-night">
												<span>Rp <?= number_format($rc['harga'], 0, ',', '.') ?> <span>/ malam</span></span>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<button class="btn view-btn1 float-right btn-sm" onclick="countRoom('<?= $rc['id_kategori'] ?>')" id="book-<?= $no2++ ?>" disabled>Book</button>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="col-md-4 my-3">
					<form action="<?= base_url('home/bookingInformation') ?>" method="post">
						<div class="tampilan" id="viewRoomCount">
							<div class="roomEmpity card">
								<div class="card-header text-center">
									<h5><i class="fas fa-shopping-cart"></i> &nbsp; No Room Selected</h5>
								</div>
								<div class="card-body text-center">
									PLEASE CHOSE ACCOMODATION
								</div>
							</div>
						</div>
						<div class="total text-center card pt-3 pb-2 my-auto">
							<input name="checkinDate" hidden value="<?= $checkinDate ?>" />
							<input name="checkoutDate" hidden value="<?= $checkoutDate ?>" />
							<input name="adults" hidden value="<?= $adults ?>" />
							<input name="children" hidden value="<?= $children ?>" />
							<input name="room" hidden value="<?= $room ?>" />
							<div class="row ">
								<div class="col-md-6">
									<h4><b>TOTAL</b></h4>
								</div>
								<div class="col-md-6">
									<h4><b></b></h4>
								</div>
							</div>
						</div>
						<button type="submit" class="btn view-btn1 float-right btn-sm btn-block" id="book">NEXT</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Room End -->
</main>


<!-- <script>
	function getDateReservation(idCategory) {
		const checkinDate = $('#datepicker1').val();
		const checkoutDate = $('#datepicker2').val();
		const adults = $('#select1').val();
		const children = $('#select2').val();
		const room = $('#select3').val();
		// const idCategory = $('#idCategory').val();
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
				idCategory: idCategory
			},
			dataType: 'JSON',
			success: function(data) {
				console.log(data.status)
				window.location.replace("<?= base_url('home/viewSelectRoom/') ?>" + data.idCategory + "/" + data.checkinDate + "/" + data.checkoutDate + "/" + data.adults + "/" + data.children + "/" + data.room);

			}
		})
	}
</script> -->

<script>
	const arry = [];
	var totalPrice = 0;

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

	function getTotal() {
		totalPrice += parseInt($('#viewRoomCount .select:last-child .row div:nth-child(2) h4 span').html().replace(/\./g, ''));
		var reverse = totalPrice.toString().split('').reverse().join(''),
			ribuan = reverse.match(/\d{1,3}/g);
		ribuan = ribuan.join('.').split('').reverse().join('');
		$('.total .row div:last-child h4 b').html('Rp ' + ribuan)
	}

	function numberRoom() {
		var room_length = document.getElementsByClassName('roomDisplay').length;
		for (var i = 0; i < room_length; i++) {
			const userRoom = $('#select3').val();
			const aviableRoom = $('#aviableRoom-' + i).html();
			const errorTag = $('#error-' + i);
			const btnBook = $('#book-' + i);

			if (userRoom > aviableRoom) {
				errorTag.html('Tidak tersedia untuk ' + userRoom + ' kamar');
				btnBook.prop('disabled', true);
			} else {
				btnBook.prop('disabled', false);
			}
		}
	}

	function countRoom(idCategory) {
		const checkinDate = $('#datepicker1').val();
		const checkoutDate = $('#datepicker2').val();
		const adults = $('#select1').val();
		const children = $('#select2').val();
		const room = $('#select3').val();
		const urlCountRoom = "<?= base_url('home/countRoom/') ?>";

		$.ajax({
			url: urlCountRoom,
			method: "POST",
			data: {
				checkinDate: checkinDate,
				checkoutDate: checkoutDate,
				adults: adults,
				children: children,
				room: room,
				idCategory: idCategory
			},
			success: function(data) {
				$('#viewRoomCount').append(data);
				$('.roomEmpity').hide();
				$('#book').fadeIn();
				$('.total').fadeIn();
				getTotal()
				arry.push(parseInt(idCategory));
			}
		})
	}

	$(document).ready(function() {
		numberRoom();
		$('#book').hide();
		$('.total').hide();

		$('.tampilan').on('click', '.removeRoom', function(e) {
			e.preventDefault();

			var rows = $(this).parent().parent();
			totalPrice -= parseInt(rows.find('div:nth-child(2) h4 span').html().replace(/\./g, ''));
			var reverse = totalPrice.toString().split('').reverse().join(''),
				ribuan = reverse.match(/\d{1,3}/g);
			ribuan = ribuan.join('.').split('').reverse().join('');
			$('.total .row div:last-child h4 b').html('Rp ' + ribuan)
			if (ribuan == 0) {
				$('#book').hide();
				$('.total').hide();
				$('.roomEmpity').fadeIn();
			}
			arry.splice(arry.indexOf($(this).data('category-id')));
			rows.parent().remove();
		})
	})
</script>
