<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data <?= $title ?></h1>
		<div class="buton ml-auto">
			<a href="<?= base_url('admin/pdf_room') ?>" class="btn btn-danger btn-sm">Print to PDF</a>
			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addData">
				Add <?= $title ?> data
			</button>
		</div>
	</div>

	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('flash2'); ?>"></div>

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
							<th>Name</th>
							<th>Room Category</th>
							<th>Room Code</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($roomdata as $ad) :
						?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $ad['nama_kamar'] ?></td>
								<td><?= $ad['nama_kategori'] ?></td>
								<td><?= $ad['kode_kamar'] ?></td>
								<td>IDR <?= number_format($ad['harga'], 0, ',', '.') ?></td>
								<td>
									<a class="btn btn-danger tombol-hapus btn-sm" href="<?= base_url('admin/delete_room/') ?><?= $ad['id'] ?>"><i class="fas fa-trash"></i></a>
									<a class="btn btn-success btn-sm" href="<?= base_url('admin/edit_room/') ?><?= $ad['id'] ?>"><i class="fas fa-edit"></i></a>
									<!-- <?php if ($ad['status'] != 0) : ?>
										<a class="btn btn-success btn-sm" href="<?= base_url('admin/rusak_room/') ?><?= $ad['id'] ?>">Good</i></a>
									<?php else : ?>
										<a class="btn btn-danger btn-sm" href="<?= base_url('admin/tidak_rusak_room/') ?><?= $ad['id'] ?>">Repair</i></a>
									<?php endif; ?> -->
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
				<?= form_open_multipart('admin/insert_room'); ?>
				<div class="form-group">
					<label for="username">Name Room</label>
					<input type="text" class="form-control" id="nameroom" name="nameroom" placeholder="Input Name">
				</div>
				<div class="form-group">
					<label for="" class="label">Category</label>
					<select class="custom-select " id="guest" name="kategori">
						<option disabled selected>Select Room Categori</option>
						<?php foreach ($kategori as $k) : ?>
							<option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="username">Room Code</label>
					<input type="text" class="form-control" id="roomcode" name="roomcode" placeholder="Input Room Code">
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
