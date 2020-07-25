<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data <?= $title ?></h1>
		<div class="buton ml-auto">
			<a href="<?= base_url('admin/pdf_history') ?>" class="btn btn-danger btn-sm">Print to PDF</a>
		</div>
	</div>

	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<?= form_error('name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>', '</div>'); ?>
	<?= form_error('username', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>', '</div>'); ?>
	<?= form_error('password', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>', '</div>'); ?>

	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table data text-center" width="100%" cellspacing="0">
					<thead class="bg-primary text-white">
						<tr>
							<th>No</th>
							<th>Booking Code</th>
							<th>Customer Name</th>
							<th>Checkin</th>
							<th>Checkout</th>
							<th>Durasi</th>
							<th>Price</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($historydata as $ad) :
						?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $ad['nomor_pesanan'] ?></td>
								<td><?= $ad['nama_customer'] ?></td>
								<td><?= $ad['checkin'] ?></td>
								<td><?= $ad['checkout'] ?></td>
								<td><?= $ad['durasi'] ?></td>
								<td><?= $ad['harga'] ?></td>
								<td><?= strftime("%A %d %B %Y", strtotime($ad['tgl_pesanan'])) ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
