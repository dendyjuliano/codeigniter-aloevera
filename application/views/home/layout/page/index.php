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
					<!-- <form action="<?= base_url('home/searchRoom') ?>" method="GET"> -->
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
										<?php for ($no = 1; $no < 5; $no++) : ?>
											<?php if ($no == 1) : ?>
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
											<?php if ($noC == 0) : ?>
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
									<select name="roomNumber" id="select3">
										<?php for ($noR = 1; $noR < 5; $noR++) : ?>
											<?php if ($noR == 1) : ?>
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
					<!-- </form> -->
				</div>
			</div>
		</div>
	</div>
	<!-- Booking Room End-->

	<!-- Make customer Start-->
	<section class="make-customer-area customar-padding fix">
		<div class="container-fluid p-0">
			<div class="row">
				<div class="col-xl-5 col-lg-6">
					<div class="customer-img mb-120">
						<img src="<?= base_url() ?>assets/img/room.jpg" class="customar-img1" alt="">
						<img src="<?= base_url() ?>assets/layout/img/customer/customar2.png" class="customar-img2" alt="">
						<div class="service-experience heartbeat">
							<h3>Rasakan pelayanan <br>Terbaru</h3>
						</div>
					</div>
				</div>
				<div class=" col-xl-4 col-lg-4">
					<div class="customer-caption">
						<!-- <span>About our company</span> -->
						<h2>Make the customer the hero of your story</h2>
						<div class="caption-details">
							<p class="pera-dtails">Lorem ipsum dolor sit amet, consectetur adipisic- ing elit, sed do eiusmod tempor inc. </p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. </p>
							<!-- <a href="#" class="btn more-btn1">Learn More <i class="ti-angle-right"></i> </a> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Make customer End-->

	<!-- Room Start -->
	<section class="room-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-8">
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
									<a href="<?= base_url('home/selectRoom/') . $rc['id'] ?>" class="btn btn-warning float-right btn-sm">Read</a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="row justify-content-center">
				<div class="room-btn pt-70">
					<a href="<?= base_url('home/searchRoom') ?>" class="btn view-btn1">Selengkapnya <i class="ti-angle-right"></i> </a>
				</div>
			</div>
		</div>

	</section>
	<!-- Room End -->

	<hr>

	<!-- Dining Start -->
	<div class="dining-area dining-padding-top">
		<!-- Single Left img -->
		<div class="single-dining-area left-img">
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-lg-8 col-md-8">
						<div class="dining-caption">
							<span>Restoran kami</span>
							<h3>Makanan & Minuman</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br> tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br>veniam, quis nostrud.</p>
							<a href="#" class="btn border-btn">Learn More <i class="ti-angle-right"></i> </a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single Right img -->
		<!-- <div class="single-dining-area right-img">
			<div class="container">
				<div class="row justify-content-start">
					<div class="col-lg-8 col-md-8">
						<div class="dining-caption text-right">
							<span>Our Pool</span>
							<h3>Swimming Pool</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br> tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br>veniam, quis nostrud.</p>
							<a href="#" class="btn border-btn">Learn More <i class="ti-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>
	<!-- Dining End -->

	<!-- Testimonial Start -->
	<div class="testimonial-area testimonial-padding">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-9 col-lg-9 col-md-9">
					<div class="h1-testimonial-active">
						<!-- Single Testimonial -->
						<div class="single-testimonial pt-65">
							<!-- Testimonial tittle -->
							<div class="font-back-tittle mb-105">
								<div class="archivment-front">
									<img src="<?= base_url() ?>assets/img/kepsek.jpg" style="border-radius: 50%;  width: 115px;height: 115px; object-fit: cover;" alt="">
								</div>
								<h3 class="archivment-back">Testimonials</h3>
							</div>
							<!-- Testimonial Content -->
							<div class="testimonial-caption text-center">
								<p>Dengan hadirnya situs SMK Negeri 1 Ciamis ini,
									semoga dapat memberikan informasi
									kepada khalayak tentang SMK Negeri 1 Ciamis.
									SMK Bisa, SMKN 1 Ciamis Yakin Bisa.
								</p>
								<!-- Rattion -->
								<div class="testimonial-ratting">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
								<div class="rattiong-caption">
									<span>Dra. Hj. Ika Karniati Sardi, MM.Pd <span>Kepala SMKN 1 CIAMIS</span> </span>
								</div>
							</div>
						</div>
						<div class="single-testimonial pt-65">
							<!-- Testimonial tittle -->
							<div class="font-back-tittle mb-105">
								<div class="archivment-front">
									<img src="<?= base_url() ?>assets/img/Rusdiharto.jpg" style="border-radius: 50%;  width: 115px;height: 115px; object-fit: cover;" alt="">
								</div>
								<h3 class="archivment-back">Testimonials</h3>
							</div>
							<!-- Testimonial Content -->
							<div class="testimonial-caption text-center">
								<p>UNS telah berkembang luas biasa, pengembangan program studi, bukan hanya sebagai pusat pengembangan pembelajaran, tetapi pusat riset juga, baik di bidang ilmu sosial, ilmu teknik dan sebagainya.
								</p>
								<!-- Rattion -->
								<div class="testimonial-ratting">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
								<div class="rattiong-caption">
									<span>Rusdiharto, spd <span> Wakil Kepala Sekolah</span> </span>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Testimonial End -->

	<!-- Blog Start -->
	<!-- <div class="blog-area blog-padding">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-8">
					<div class="font-back-tittle mb-50">
						<div class="archivment-front">
							<h3>Our Blog</h3>
						</div>
						<h3 class="archivment-back">Recent News</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-6">
					<div class="single-blog mb-30">
						<div class="blog-img">
							<a href="single-blog.html"><img src="<?= base_url() ?>assets/layout/img/our_blog/blog-img1.jpg" alt=""></a>
						</div>
						<div class="blog-caption">
							<div class="blog-cap-top d-flex justify-content-between mb-40">
								<span>news</span>
								<ul>
									<li>by<a href="#"> Jhon Guru</a></li>
								</ul>
							</div>
							<div class="blog-cap-mid">
								<p><a href="single-blog.html">5 Simple Tricks for Getting Stellar Hotel Service Wherever You Are</a></p>
							</div>
							<div class="blog-cap-bottom d-flex justify-content-between">
								<span>Feb 28, 2020</span>
								<span><img src="<?= base_url() ?>assets/layout/img/our_blog/blog-comments-icon.jpg" alt="">3</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- Blog End -->

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
				console.log(data.status)
				window.location.replace("<?= base_url('home/searchRoom/') ?>" + data.checkinDate + "/" + data.checkoutDate + "/" + data.adults + "/" + data.children + "/" + data.room);

			}
		})
	}
</script>
