<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Category</h1>
		<div class="buton ml-auto">
			<a href="" class="btn btn-danger btn-sm">Print to PDF</a>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<img src="<?= base_url() . 'uploads/' . $kategori_id['image'] ?>" alt="" class="card-img-top">
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Form Edit Data Category
				</div>
				<div class="card-body">
					<form action="" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $kategori_id['id']; ?>">
						<div class="form-group">
							<label for="name">Category Name</label>
							<input type="text" value="<?= $kategori_id['nama_kategori']; ?>" class="form-control" id="name" name="name">
						</div>
						<div class="form-group">
							<label for="username">Guest</label>
							<input type="number" value="<?= $kategori_id['tamu']; ?>" class="form-control" id="username" name="tamu">
						</div>
						<div class="form-group">
							<label for="username">Price</label>
							<input type="number" value="<?= $kategori_id['harga']; ?>" class="form-control" id="username" name="harga">
						</div>
						<div class="form-group row">
							<div class="col-sm">
								<p>Image</p>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="image" name="gambar">
									<label class="custom-file-label" for="image">Choose file</label>
								</div>
							</div>
						</div>

						<button type="submit" class="btn btn-primary btn-sm float-right ml-1">Edit Data</button>
						<a href="<?= base_url('admin/category') ?>" class="btn btn-danger btn-sm float-right">Back</a>
					</form>
				</div>
			</div>
		</div>
	</div>


</div>
