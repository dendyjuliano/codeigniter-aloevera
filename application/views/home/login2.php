<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->

	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/login2.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title><?= $title ?></title>
</head>

<body class="asw">
	<div class="flash-data3" data-flashdata3="<?= $this->session->flashdata('flash3'); ?>"></div>
	<div class="flash-data4" data-flashdata4="<?= $this->session->flashdata('flash4'); ?>"></div>

	<div class="card kotak col-md-6 mx-auto">
		<div class="card-body">
			<form action="" method="post">
				<div class="row">
					<div class="col-md-8">
						<h3 class="judul">ALOEVERA</h3>
						<!-- <h5 class="display-4">Login Account</h5> -->
						<br>
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="username" class="text-secondary">Username</label>
								<input type="text" class="form-control" autocomplete="off" name="username" id="username" placeholder=".............">
								<?= form_error('username', '<small class="text-danger">', '</small>') ?>
							</div>

						</div>
						<div class="form-group">
							<label for="password" class="text-secondary">Password</label>
							<input type="password" class="form-control" name="password" id="name" placeholder=".............">
							<?= form_error('password', '<small class="text-danger">', '</small>') ?>
						</div>
						<div class="form-row button">
							<div class="form-group col-md-6">
								<button class="btn buton float-left text-light" type="submit">Submit</button>
							</div>
						</div>
					</div>
					<div class="col-md-4 my-auto">
						<div class="float-left">
							<img src="<?= base_url(); ?>assets/img/register2.png" alt="" width="200">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/script.js"></script>
</body>

</html>
