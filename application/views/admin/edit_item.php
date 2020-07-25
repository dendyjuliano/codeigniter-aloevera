<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Item</h1>
		<!-- <div class="buton ml-auto">
			<a href="" class="btn btn-danger btn-sm">Print to PDF</a>
		</div> -->
	</div>

	<div class="row mt-3">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Form Edit Data Item
				</div>
				<div class="card-body">
					<form action="" method="POST">
						<input type="hidden" name="id" value="<?= $item['id']; ?>">
						<div class="form-group">
							<label for="name">Nama Item</label>
							<input type="text" value="<?= $item['nama']; ?>" class="form-control" id="name" name="nama">
							<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="harga">Harga</label>
							<input type="number" value="<?= $item['harga']; ?>" class="form-control" id="harga" name="harga">
							<?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label for="stok">Stok</label>
							<input type="number" value="<?= $item['stok']; ?>" class="form-control" id="stok" name="stok">
							<?= form_error('stok', '<small class="text-danger">', '</small>'); ?>
						</div>

						<button type="submit" class="btn btn-primary btn-sm float-right ml-1">Edit Data</button>
						<a href="<?= base_url('admin/item') ?>" class="btn btn-danger btn-sm float-right">Back</a>
					</form>
				</div>
			</div>
		</div>
	</div>


</div>
