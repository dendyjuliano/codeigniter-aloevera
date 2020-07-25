<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Role</h1>
		<div class="buton ml-auto">
			<a href="" class="btn btn-danger btn-sm">Print to PDF</a>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Form Edit Data Role
				</div>
				<div class="card-body">
					<form action="" method="POST">
						<input type="hidden" name="id" value="<?= $role['id']; ?>">
						<div class="form-group">
							<label for="name">Role Name</label>
							<input type="text" value="<?= $role['role']; ?>" class="form-control" id="name" name="role">
							<?= form_error('role', '<small class="text-danger">', '</small>'); ?>
						</div>

						<button type="submit" class="btn btn-primary btn-sm float-right ml-1">Edit Data</button>
						<a href="<?= base_url('admin/role') ?>" class="btn btn-danger btn-sm float-right">Back</a>
					</form>
				</div>
			</div>
		</div>
	</div>


</div>
