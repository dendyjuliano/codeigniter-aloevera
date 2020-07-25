<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data <?= $title ?></h1>
		<div class="buton ml-auto">
			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addData">
				Add <?= $title ?> data
			</button>
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
				<table class="table data" width="100%" cellspacing="0">
					<thead class="bg-primary text-white">
						<tr>
							<th>No</th>
							<th>Name Category</th>
							<th>Guest</th>
							<th>Price</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($kategori as $ad) :
						?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $ad['nama_kategori'] ?></td>
								<td><?= $ad['tamu'] ?></td>
								<td>IDR <?= number_format($ad['harga'], 0, ',', '.') ?></td>
								<td><img src="<?= base_url('uploads/') . $ad['image']  ?>" width="100" alt=""></td>
								<td>
									<a class="btn btn-danger tombol-hapus" href="<?= base_url('admin/delete_category/') ?><?= $ad['id'] ?>"><i class="fas fa-trash"></i></a>
									<a class="btn btn-success" href="<?= base_url('admin/edit_category/') ?><?= $ad['id'] ?>"><i class="fas fa-edit"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Data <?= $title ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/insert_category') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Input Name">
					</div>
					<div class="form-group">
						<label for="username">Guest</label>
						<input type="number" class="form-control" id="username" name="guest" value="1">
					</div>
					<div class="form-group">
						<label for="username">Price</label>
						<input type="number" class="form-control" id="username" name="harga">
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

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
