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
 										<?php for ($no = 1; $no < 5; $no++) : ?>
 											<?php if ($no == $adults) : ?>
 												<option value="<?= $no ?>" selected><?= $no ?></option>
 											<?php else : ?>
 												<option value="<?= $no ?>"><?= $no ?></option>
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
 									<select name="room" class="room" id="select3">
 										<?php for ($noR = 1; $noR < 5; $noR++) : ?>
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
 		<div class="row">
 			<div class="col-md-8">
 				<div class="card my-3">
 					<div class="row no-gutters">
 						<div class="col-lg-8">
 							<img src="<?= base_url('uploads/') . $roomCategoryById['image'] ?>" width="100%" class="card-img" alt="...">
 						</div>
 						<div class="col-lg-4">
 							<div class="card-body">
 								<h2 class="card-title"><?= $roomCategoryById['nama_kategori'] ?></h2>
 								<input type="hidden" id="idCategory" value="<?= $roomCategoryById['id_kategori'] ?>">
 								<p class="card-text">This is a wider card with supporting text below </p>
 								<p class="card-text">Aviable Room <span id="aviableRoom"><?= $roomCategoryById['jmlkamar'] ?></span><br><small class="text-danger" id="error"></small></p>
 								<div class="per-night">
 									<span>Rp <?= number_format($roomCategoryById['harga'], 0, ',', '.') ?> <span>/ malam</span></span>
 								</div>
 							</div>
 						</div>
 					</div>
 					<div class="card-footer">
 						<button class="btn view-btn1 float-right btn-sm" onclick="countRoom()" id="book" disabled>Book</button>
 					</div>
 				</div>
 			</div>
 			<div class="col-md-4" id="viewRoomCount">

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
 		const idCategory = $('#idCategory').val();
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

 	function numberRoom() {
 		const userRoom = $('#select3').val();
 		const aviableRoom = $('#aviableRoom').html();
 		const errorTag = $('#error');
 		const btnBook = $('#book');

 		if (userRoom > aviableRoom) {
 			errorTag.html('Ruangan tidak tersedia untuk ' + userRoom + ' kamar');
 			btnBook.prop('disabled', true);
 		} else {
 			btnBook.prop('disabled', false);
 		}
 	}

 	function countRoom() {
 		const checkinDate = $('#datepicker1').val();
 		const checkoutDate = $('#datepicker2').val();
 		const adults = $('#select1').val();
 		const children = $('#select2').val();
 		const room = $('#select3').val();
 		const idCategory = $('#idCategory').val();
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
 				$('#viewRoomCount').html(data);
 			}
 		})
 	}

 	$(document).ready(function() {
 		numberRoom();
 	})
 </script>
