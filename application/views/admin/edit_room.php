<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data <?= $roomdata['nama_kamar']; ?></h1>
		<div class="buton ml-auto">
			<a href="" class="btn btn-danger btn-sm">Print to PDF</a>
		</div>
	</div>

	<div class="row mt-3">
		<!-- <div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<img src="<?= base_url() . 'uploads/' . $roomdata['image'] ?>" alt="" class="card-img-top">
				</div>
			</div>
		</div> -->
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Form Edit Data Room
				</div>
				<div class="card-body">
					<form action="" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $roomdata['id']; ?>">
						<div class="form-group">
							<label for="name">Room Name</label>
							<input type="text" value="<?= $roomdata['nama_kamar'] ?>" class="form-control" id="name" name="name">
							<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="" class="kategori">Category</label>
							<select class="custom-select " id="kategori" name="kategori">
								<option disabled selected>Select Room Categori</option>
								<?php foreach ($kategori as $k) : ?>
									<?php if ($k['id'] == $roomdata['id_kategori']) : ?>
										<option value="<?= $k['id'] ?>" selected><?= $k['nama_kategori'] ?></option>
									<?php else : ?>
										<option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="name">Room Code</label>
							<input type="text" value="<?= $roomdata['kode_kamar'] ?>" class="form-control" id="roomcode" name="roomcode">
							<?= form_error('roomcode', '<small class="text-danger">', '</small>'); ?>
						</div>

						<button type="submit" class="btn btn-primary btn-sm float-right ml-1">Edit Data</button>
						<a href="<?= base_url('admin/room') ?>" class="btn btn-danger btn-sm float-right">Back</a>
					</form>
				</div>
			</div>
		</div>
	</div>


</div>
