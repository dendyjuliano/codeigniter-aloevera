<!-- slider Area Start-->
<div class="slider-area ">
	<div class="slider-active dot-style">
		<div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="<?= base_url() ?>assets/layout/img/hero/h1_hero.jpg">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-xl-9">
						<div class="h1-slider-caption">
							<h1 data-animation="fadeInUp" data-delay=".4s"><?php
																			date_default_timezone_set("Asia/Jakarta");
																			$jam = date("H:i:s");
																			$a = date("H");
																			if (($a >= 6) && ($a <= 11)) {
																				echo "Good Morning ";
																			} elseif (($a >= 11) && ($a <= 15)) {
																				echo "Good Afternoon ";
																			} elseif (($a > 15) && ($a <= 18)) {
																				echo "Good Evening ";
																			} else {
																				echo "Good Night ";
																			}
																			?></h1>
							<h3 data-animation="fadeInDown" data-delay=".4s">Hotel & Restoran</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="single-slider  hero-overly slider-height d-flex align-items-center" data-background="<?= base_url() ?>assets/img/img1.jpg">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-xl-9">
						<div class="h1-slider-caption">
							<h1 data-animation="fadeInUp" data-delay=".4s">Edukasi Perhotelan</h1>
							<h3 data-animation="fadeInDown" data-delay=".4s">Hotel & Restoran</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- slider Area End-->
