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
 	<div class="container">
 		<div class="card m-5">
 			<div class="row no-gutters">
 				<div class="col-lg-8">
 					<img src="<?= base_url('uploads/') . $roomCategoryById['image'] ?>" width="100%" class="card-img" alt="...">
 				</div>
 				<div class="col-lg-4">
 					<div class="card-body">
 						<h2 class="card-title"><?= $roomCategoryById['nama_kategori'] ?></h2>
 						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
 						<p class="card-text"><small class="text-muted">Aviable Room <?= $roomCategoryById['jmlkamar'] ?></small></p>
 						<div class="per-night">
 							<span>Rp <?= number_format($roomCategoryById['harga'], 0, ',', '.') ?> <span>/ malam</span></span>
 							<a href="<?= base_url('home/bookRoom/') . $roomCategoryById['id'] ?>" class="btn view-btn1 float-right btn-sm">Book</a>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </main>
