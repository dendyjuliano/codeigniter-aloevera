<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="<?= base_url('assets/templates/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>css/dashboard.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>css/styleNew.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

	<title>Bukti Transaksi</title>
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="<?= base_url('assets/img/logoAloevera.png') ?>" width="300" class="img-fluid" alt="">
			</div>
			<div class="col-md-6 my-auto">
				<div class="tulisan float-right">
					<h3>RECEIP</h3>
					<p>Reservasi Kode : <?= $room_row['kode_reservasi'] ?> <br> Date : <?= $room_row['tanggal'] ?></p>
				</div>
			</div>
		</div>

		<div class="page-customer mt-5">
			<h5>CUSTOMER DETAIL</h5>
			<p>
				NIK : <?= $room_row['nik'] ?> <br>
				Nama : <?= $room_row['nama'] ?> <br>
				Email : <?= $room_row['email'] ?> <br>
				NoHp : <?= $room_row['no_hp'] ?>
			</p>
		</div>

		<div class="page-room mt-5">
			<h5>ROOM DETAIL</h5>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Kategori</th>
						<th>Kode Kamar</th>
						<th>perMalam</th>
						<th>Total Rp</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?= 1 ?></td>
						<td><?= $room_row['nama_kategori'] ?></td>
						<td><?= $room_row['kode_kamar'] ?></td>
						<td><?= $days ?> Malam</td>
						<td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="page-request-item mt-5">
			<h5>REQUEST ITEM</h5>
			<?php if ($requestItem != null) : ?>
				<table class="table table-bordered" id="tableItem">
					<thead>
						<tr>
							<th>Nama Item</th>
							<th>Quantity</th>
							<th class="text-right">Harga</th>
						</tr>
					</thead>
					<tbody id="bodyItem">
						<?php foreach ($requestItem as $row_item) : ?>
							<tr>
								<td><?= $row_item['nama'] ?></td>
								<td><?= $row_item['qty'] ?></td>
								<td class="text-right"><?= $row_item['total_bayar'] ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php else : ?>
				<table class="table">
					<thead>
						<tr class="text-center">
							<th>No Item</th>
						</tr>
					</thead>
				</table>
			<?php endif; ?>
		</div>
		<table class="table">
			<tr class="">
				<th>TOTAL</th>
				<th class="text-right" id="total"><?= $totalHarga ?></th>
			</tr>
		</table>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets/templates/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/templates/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/templates/'); ?>js/sb-admin-2.min.js"></script>
	<script src="<?= base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/script2.js'); ?>"></script>
	<script src="<?= base_url('assets/js/caleandar.js'); ?>"></script>
	<script src="<?= base_url('assets/js/caleandar.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/demo.js'); ?>"></script>

</body>

</html>
