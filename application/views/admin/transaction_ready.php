<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data <?= $title ?></h1>
		<div class="buton ml-auto">
			<a href="<?= base_url('admin/pdf_customer') ?>" class="btn btn-danger btn-sm">Print to PDF</a>
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
		<div class="card-header text-primary">
			Already Checked
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table data text-center" width="100%" cellspacing="0">
					<thead class="bg-primary text-white">
						<tr>
							<th>No</th>
							<th>Nomor Pesanan</th>
							<th>Order Date</th>
							<th>Name Pesanan</th>
							<th>Email Pesanan</th>
							<th>No Hp</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						setlocale(LC_ALL, 'id-ID', 'id_ID');
						$no = 1;
						foreach ($transactiondata_ready as $ad) :
						?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $ad['nomor_pesanan'] ?></td>
								<td><?= strftime("%A %d %B %Y", strtotime($ad['tgl_pesanan']))  ?></td>
								<td><?= $ad['nama_customer'] ?></td>
								<td><?= $ad['email_customer'] ?></td>
								<td><?= $ad['no_customer'] ?></td>
								<td>
									<a class="btn btn-danger tombol-hapus" href="<?= base_url('admin/delete_transaction/') ?><?= $ad['id'] ?>"><i class="fas fa-trash"></i></a>
									<a class="btn btn-primary" href="<?= base_url('admin/detail_transaction/') ?><?= $ad['id'] ?>"><i class="fas fa-search-plus"></i></a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	<div class="card shadow mb-4">
		<div class="card-header text-primary">
			Not Checked
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table data text-center" width="100%" cellspacing="0">
					<thead class="bg-primary text-white">
						<tr>
							<th>No</th>
							<th>Nomor Pesanan</th>
							<th>Order Date</th>
							<th>Name Pesanan</th>
							<th>Email Pesanan</th>
							<th>No Hp</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($transactiondata_not as $ad) :
						?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $ad['nomor_pesanan'] ?></td>
								<td><?= strftime("%A %d %B %Y", strtotime($ad['tgl_pesanan']))  ?></td>
								<td><?= $ad['nama_customer'] ?></td>
								<td><?= $ad['email_customer'] ?></td>
								<td><?= $ad['no_customer'] ?></td>
								<td>
									<a class="btn btn-danger tombol-hapus" href="<?= base_url('admin/delete_transaction/') ?><?= $ad['id'] ?>"><i class="fas fa-trash"></i></a>
									<a class="btn btn-success" href="<?= base_url('admin/send_email/') ?><?= $ad['id'] ?>"><i class="fas fa-edit"></i></a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->