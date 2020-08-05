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
 					<form action="<?= base_url('home/searchRoom') ?>" method="POST">
 						<div class="booking-wrap d-flex justify-content-between align-items-center">

 							<!-- select in date -->
 							<div class="single-select-box mb-30">
 								<!-- select out date -->
 								<div class="boking-tittle">
 									<span> Check In Date:</span>
 								</div>
 								<div class="boking-datepicker">
 									<input id="datepicker1" name="checkinDate" value="<?= date("m/d/Y") ?>" />
 								</div>
 							</div>
 							<!-- Single Select Box -->
 							<div class="single-select-box mb-30">
 								<!-- select out date -->
 								<div class="boking-tittle">
 									<span>Check OutDate:</span>
 								</div>
 								<div class="boking-datepicker">
 									<input id="datepicker2" name="checkoutDate" value="<?= date('m/d/Y', strtotime('+1 day')) ?>" />
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
 											<option value="1" selected>1</option>
 											<option value="2">2</option>
 											<option value="3">3</option>
 											<option value="4">4</option>
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
 											<option value="0" selected>0</option>
 											<option value="1">1</option>
 											<option value="2">2</option>
 											<option value="3">3</option>
 											<option value="4">4</option>
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
 										<select name="roomNumber" id="select3">
 											<option value="1" selected>1</option>
 											<option value="2">2</option>
 											<option value="3">3</option>
 											<option value="4">4</option>
 										</select>
 									</div>
 								</div>
 							</div>
 							<!-- Single Select Box -->
 							<div class="single-select-box pt-45 mb-30">
 								<button type="submit" class="btn select-btn">Book Now</button>
 							</div>
 						</div>
 					</form>
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
 			<div class="row">
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
 									<a href="" class="btn view-btn1 float-right btn-sm">Select</a>
 								</div>
 							</div>
 						</div>
 					</div>
 				<?php endforeach; ?>
 			</div>
 		</div>

 	</section>
 	<!-- Room End -->
 </main>
