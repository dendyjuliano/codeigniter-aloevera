<!-- Gallery img Start-->
<div class="gallery-area fix">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-md-12">
				<div class="gallery-active owl-carousel">
					<?php foreach ($roomCategory as $rc) : ?>
						<div class="gallery-img">
							<img src="<?= base_url('uploads/') . $rc['image'] ?>" style="width: 100%;
								height: 200px;
								object-fit: cover;" alt="">
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Gallery img End-->

<footer>
	<!-- Footer Start-->
	<div class="footer-area black-bg footer-padding">
		<div class="container">
			<div class="row d-flex justify-content-between">
				<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
					<div class="single-footer-caption mb-30">
						<!-- logo -->
						<div class="footer-logo">
							<!-- <a href="index.html"><img src="<?= base_url() ?>assets/layout/img/logo/logo2_footer.png" alt=""></a> -->
							<h1 class="text-warning">Edotel</h1>
						</div>
						<div class="footer-social footer-social2">
							<a href="#"><i class="fab fa-facebook-f"></i></a>
							<a href="#"><i class="fab fa-twitter"></i></a>
							<!-- <a href="#"><i class="fas fa-youtube"></i></a> -->
							<a href="#"><i class="fab fa-instagram"></i></a>
						</div>
						<div class="footer-pera">
							<p>
								Copyright &copy;<script>
									document.write(new Date().getFullYear());
								</script> All rights reserved <i class="ti-heart" aria-hidden="true"></i> by Dendy
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-5">
					<div class="single-footer-caption mb-30">
						<div class="footer-tittle">
							<h4>Quick Links</h4>
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Service</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
					<div class="single-footer-caption mb-30">
						<div class="footer-tittle">
							<h4>Reservations</h4>
							<ul>
								<li><a href="#">Tel: 081313078365</a></li>
								<li><a href="#">reservations@hotelEdotel.com</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-4  col-sm-5">
					<div class="single-footer-caption mb-30">
						<div class="footer-tittle">
							<h4>Our Location</h4>
							<ul>
								<li><a href="#">Jl. Jenderal Sudirman No. 269 RT 13/RW 09, Desa Sindangrasa, Sindangrasa, Kec. Ciamis, Kabupaten Ciamis, Jawa Barat 46215</a></li>
								<!-- <li><a href="#">Suite 721 New York NY 10016</a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer End-->
</footer>

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->

<script src="<?= base_url() ?>assets/layout/js/vendor/modernizr-3.5.0.min.js"></script>

<!-- Jquery, Popper, Bootstrap -->
<script src="<?= base_url() ?>assets/layout/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/layout/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="<?= base_url() ?>assets/layout/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="<?= base_url() ?>assets/layout/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/layout/js/slick.min.js"></script>
<!-- Date Picker -->
<script src="<?= base_url() ?>assets/layout/js/gijgo.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="<?= base_url() ?>assets/layout/js/wow.min.js"></script>
<script src="<?= base_url() ?>assets/layout/js/animated.headline.js"></script>
<script src="<?= base_url() ?>assets/layout/js/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="<?= base_url() ?>assets/layout/js/jquery.scrollUp.min.js"></script>
<script src="<?= base_url() ?>assets/layout/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url() ?>assets/layout/js/jquery.sticky.js"></script>

<!-- contact js -->
<script src="<?= base_url() ?>assets/layout/js/contact.js"></script>
<script src="<?= base_url() ?>assets/layout/js/jquery.form.js"></script>
<script src="<?= base_url() ?>assets/layout/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/layout/js/mail-script.js"></script>
<script src="<?= base_url() ?>assets/layout/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="<?= base_url() ?>assets/layout/js/plugins.js"></script>
<script src="<?= base_url() ?>assets/layout/js/main.js"></script>



</body>

</html>
