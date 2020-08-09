<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Customer</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $customer_row; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Aviable Room</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $room_row; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Category Room</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $category_row; ?></div>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Transaction NotChecked</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-comments fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Content Row -->

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-8 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Room Used</h6>
				</div>
				<!-- Card Body -->
				<?php if (count($active) > 0) : ?>
					<div class="card-body">
						<table class="table text-center" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Room</th>
									<th>Name Room</th>
									<th>Name</th>
									<th>Checkout</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($active as $ad) :
								?>
									<tr>
										<td><img class="img-fluid" src="<?= base_url() . 'uploads/' . $ad['image'] ?>" width="100" alt=""></td>
										<td><?= $ad['nama_kamar'] ?></td>
										<td><?= $ad['nama_customer'] ?></td>
										<td><?= $ad['checkout'] ?></td>
										<td>
											<a class="btn btn-danger tombol-hapus" href="<?= base_url('admin/delete_active/') ?><?= $ad['id'] ?>/<?= $ad['nomor_pesanan'] ?>"><i class="fas fa-trash"></i></a>
											<a class="btn btn-success" href="<?= base_url('admin/detail_active/') ?><?= $ad['id'] ?>"><i class="fas fa-share-square"></i></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php else : ?>
					<div class="card-body">
						<table class="table text-center" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Room</th>
									<th>Name Room</th>
									<th>Name</th>
									<th>Checkout</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="5">No Room Acitve Result</td>
								</tr>
							</tbody>
						</table>
					</div>
				<?php endif; ?>
			</div>

		</div>

		<!-- Pie Chart -->
		<!-- Pie Chart -->
		<div class="col-xl-4 col-lg-5">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Calendar</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div id="caleandar">

					</div>
				</div>
			</div>

		</div>
	</div>

</div>
<!-- /.container-fluid -->
