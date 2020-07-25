<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data <?= $title ?></h1>
		<div class="buton ml-auto">
			<a href="<?= base_url('admin/pdf_customer') ?>" class="btn btn-danger btn-sm">Print to PDF</a>
			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addData">
				Add <?= $title ?> data
			</button>
		</div>
	</div>

	<?php
	$kamar    = $transaksi['id_kamar'];
	$query = "SELECT `tb_kamar`.*,`transaksi`.* FROM `tb_kamar` LEFT JOIN `transaksi` ON `transaksi`.`id_kamar` = `tb_kamar`.`id` WHERE `tb_kamar`.`id` = $kamar";
	$room = $this->db->query($query)->row_array();


	$kamar2 = $room['id_kamar'];
	$query2 = "SELECT `tb_kategori`.*,`tb_kamar`.* FROM `tb_kategori` LEFT JOIN `tb_kamar` ON `tb_kamar`.`id_kategori` = `tb_kategori`.`id` WHERE `tb_kamar`.`id` = $kamar2 ";
	$room2 = $this->db->query($query2)->row_array();
	setlocale(LC_ALL, 'id-ID', 'id_ID');
	?>

	<div class="row">
		<div class="col-md-8">
			<div class="card shadow mb-4">
				<div class="card-header">
					<h5 class="mt-2">Send Email to <?= $transaksi['nama_customer'] ?> </h5>
				</div>
				<div class="card-body">
					<form action="<?= base_url('admin/send') ?>" method="post">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Email</label>
								<input type="text" class="form-control" name="email" readonly value="<?= $transaksi['email_customer'] ?>">
								<input type="hidden" class="form-control" name="name" readonly value="<?= $transaksi['nama_customer'] ?>">
								<input type="hidden" class="form-control" name="id_user" readonly value="<?= $transaksi['id'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4">Booking Code</label>
								<input type="text" class="form-control" name="kode" readonly value="<?= $transaksi['nomor_pesanan'] ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Check In</label>
								<input type="text" class="form-control" name="checkin" readonly value="<?= $transaksi['checkin'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4">Check Out</label>
								<input type="text" class="form-control" name="checkout" readonly value="<?= $transaksi['checkout'] ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">No Telephon</label>
								<input type="text" class="form-control" name="telp" readonly value="<?= $transaksi['no_customer'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4">Price</label>
								<input type="text" class="form-control" name="price" readonly value="<?= $transaksi['harga'] ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputCity">Night</label>
								<input type="text" class="form-control" name="durasi" readonly value="<?= $transaksi['durasi'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="inputCity">Order Date</label>
								<input type="text" name="order" class="form-control" readonly value="<?= strftime("%A %d %B %Y", strtotime($transaksi['tgl_pesanan'])) ?>">
							</div>
						</div>
						<div class=" form-group">
							<label for="inputAddress2">Address</label>
							<input type="text" class="form-control" name="alamat" readonly value="<?= $transaksi['alamat_customer'] ?>">
						</div>
						<div class=" form-group">
							<label for="inputAddress2">Room</label>
							<input type="text" class="form-control" name="kamar" readonly value="<?= $room['nama_kamar'] ?>">
							<input type="hidden" class="form-control" name="id_kamar" readonly value="<?= $room['id_kamar'] ?>">
							<input type="hidden" class="form-control" name="check" readonly value="1">
						</div>

						<button type="submit" class="btn btn-primary">Send</button>
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card shadow mb-4">
				<div class="card-header">
					<h6 class="mt-2"><?= $room2['nama_kategori'] ?></h6>
				</div>
				<div class="card-body">
					<h4><?= $room['nama_kamar'] ?></h4>
					<img class="img-fluid" src="<?= base_url() . 'uploads/' . $room['image'] ?>" width="300" alt="">
					<div class="ketegori mt-3">
						<div class="row">
							<div class="col-md-6">
								<p> Max Guest <?= $room2['tamu'] ?></p>
							</div>
							<div class="col-md-6">
								<p></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



</div>
