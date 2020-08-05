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
 <!-- ================ contact section start ================= -->
 <section class="contact-section">
 	<div class="container">
 		<div class="d-none d-sm-block mb-5 pb-4">
 			<div id="map" style="height: 480px; position: relative; overflow: hidden;">
 				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15829.077386566167!2d108.3266922!3d-7.3236134!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaf882382d9de1508!2sSMK%20Negeri%201%20Ciamis!5e0!3m2!1sid!2sid!4v1596526472322!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
 			</div>
 		</div>


 		<div class="row">
 			<div class="col-12">
 				<h2 class="contact-title">Get in Touch</h2>
 			</div>
 			<div class="col-lg-8">
 				<form action="<?= base_url('home/contactProcess') ?>" method="post">
 					<div class="row">
 						<div class="col-12">
 							<div class="form-group">
 								<textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
 							</div>
 						</div>
 						<div class="col-sm-6">
 							<div class="form-group">
 								<input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
 							</div>
 						</div>
 						<div class="col-sm-6">
 							<div class="form-group">
 								<input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
 							</div>
 						</div>
 						<div class="col-12">
 							<div class="form-group">
 								<input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
 							</div>
 						</div>
 					</div>
 					<div class="form-group mt-3">
 						<button type="submit" class="button button-contactForm boxed-btn">Send</button>
 					</div>
 				</form>
 			</div>
 			<div class="col-lg-3 offset-lg-1">
 				<div class="media contact-info">
 					<span class="contact-info__icon"><i class="ti-home"></i></span>
 					<div class="media-body">
 						<h3>Jawa Barat, Indonesia.</h3>
 						<p>Ciamis, CA 91770</p>
 					</div>
 				</div>
 				<div class="media contact-info">
 					<span class="contact-info__icon"><i class="ti-tablet"></i></span>
 					<div class="media-body">
 						<h3>081313078365</h3>
 						<p>Mon to Fri 9am to 6pm</p>
 					</div>
 				</div>
 				<div class="media contact-info">
 					<span class="contact-info__icon"><i class="ti-email"></i></span>
 					<div class="media-body">
 						<h3>reservasi@gmail.com</h3>
 						<p>Send us your query anytime!</p>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <!-- ================ contact section end ================= -->
