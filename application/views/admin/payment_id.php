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
	$kamar    = $payment_id['id_kamar'];
	$query = "SELECT `tb_kamar`.*,`transaksi`.* FROM `tb_kamar` LEFT JOIN `transaksi` ON `transaksi`.`id_kamar` = `tb_kamar`.`id` WHERE `tb_kamar`.`id` = $kamar";
	$room = $this->db->query($query)->row_array();


	$kamar2 = $room['id_kamar'];
	$query2 = "SELECT `tb_kategori`.*,`tb_kamar`.* FROM `tb_kategori` LEFT JOIN `tb_kamar` ON `tb_kamar`.`id_kategori` = `tb_kategori`.`id` WHERE `tb_kamar`.`id` = $kamar2 ";
	$room2 = $this->db->query($query2)->row_array();

	$metode = $payment_id['id_metode'];
	$query3 = "SELECT `tb_metode_pembayaran`.* from `tb_metode_pembayaran` WHERE `id` = $metode";
	$metode2 = $this->db->query($query3)->row_array();

	$payment = $payment_id['id_pilih'];
	$query4 = "SELECT `tb_pilih_pembayaran`.* FROM `tb_pilih_pembayaran` WHERE `id` = $payment";
	$payment2 = $this->db->query($query4)->row_array();
	?>

	<div class="row">
		<div class="col-md-8">
			<div class="card shadow mb-4">
				<div class="card-header">
					<h5 class="mt-2">Send Email to <?= $payment_id['nama_customer'] ?> </h5>
				</div>
				<div class="card-body">
					<form action="" method="post">
						<div class=" form-group">
							<label for="inputAddress2">Payment Code</label>
							<input type="text" class="form-control" name="code_payment" readonly value="<?= $payment_id['kode_pembayaran'] ?>">
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Email</label>
								<input type="text" class="form-control" name="email" readonly value="<?= $payment_id['email_customer'] ?>">
								<label for="inputEmail4">Boking Code</label>
								<input type="text" class="form-control" name="code_boking" readonly value="<?= $payment_id['nomor_pesanan'] ?>">
								<input type="hidden" class="form-control" name="name" readonly value="<?= $payment_id['nama_customer'] ?>">
								<input type="hidden" class="form-control" name="id_transaksi" readonly value="<?= $payment_id['id'] ?>">
								<input type="hidden" class="form-control" name="qr_code" readonly value="<?= $payment_id['qr_code'] ?>">
							</div>
							<div class="form-group col-md-6">
								<img src="<?= base_url() . 'uploads/' . $payment_id['qr_code'] ?>" width="150" alt="">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Check In</label>
								<input type="text" class="form-control" name="checkin" readonly value="<?= $payment_id['checkin'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4">Check Out</label>
								<input type="text" class="form-control" name="checkout" readonly value="<?= $payment_id['checkout'] ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">No Telephon</label>
								<input type="text" class="form-control" name="telp" readonly value="<?= $payment_id['no_customer'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4">Price</label>
								<input type="text" class="form-control" name="price" readonly value="<?= $payment_id['harga'] ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputCity">Night</label>
								<input type="text" class="form-control" name="durasi" readonly value="<?= $payment_id['durasi'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="inputCity">Order Date</label>
								<input type="text" name="order" class="form-control" readonly value="<?= strftime("%A %d %B %Y", strtotime($payment_id['tgl_pesanan']))  ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputCity">Payment Metode</label>
								<input type="text" class="form-control" name="metode" readonly value="<?= $metode2['nama_metode'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="inputCity">Payment</label>
								<input type="text" name="pembayaran" class="form-control" readonly value="<?= $payment2['pembayaran']  ?>">
							</div>
						</div>
						<div class=" form-group">
							<label for="inputAddress2">Address</label>
							<input type="text" class="form-control" name="alamat" readonly value="<?= $payment_id['alamat_customer'] ?>">
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
