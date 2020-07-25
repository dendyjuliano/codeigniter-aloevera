<div class="container-fluid">
	<div class="card shadow pt-3">
		<div class="col-md-12 mx-auto">
			<div class="form-row">
				<div class="form-group row col-md-6 mr-2">
					<label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Mulai</label>
					<div class="col-sm-9">
						<input type="text" class="form-control form-control-sm datepicker datetimepicker-input" data-toggle="datetimepicker" data-target=".datepicker" id="start_date" />
					</div>
				</div>
				<div class="form-group row col-md-6">
					<label for="inputEmail3" class="col-sm-3 col-form-label">Malam</label>
					<div class="col-sm-9">
						<input type="number" class="form-control form-control-sm" value="1" id="night">
					</div>
				</div>
				<div class="form-group row col-md-6 mr-2">
					<label for="inputEmail3" class="col-sm-3 col-form-label">Tipe Kamar</label>
					<div class="col-sm-9">
						<select class="form-control form-control-sm" id="type_room">
							<option selected disabled>--Tipe Kamar--</option>
							<?php foreach ($kategori as $k) : ?>
								<option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row col-md-6">
					<label for="inputEmail3" class="col-sm-3 col-form-label">Tamu</label>
					<div class="col-sm-9">
						<input type="number" class="form-control form-control-sm" value="1" id="guest">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card shadow p-3 mt-2">
		<div class="col-md-12 mx-auto">
			<div class="row">
				<div class="col-md-5">
					<div class="table-responsive">
						<table class="table" width="100%" cellspacing="0" id="table_aviable">
							<thead>
								<tr>
									<th>Pilih</th>
									<th>Kode_Kamar</th>
									<th>Nama</th>
									<th>Tamu</th>
									<th>Harga</th>
								</tr>
							</thead>
							<tbody id="aviable_room" class="text-center">

							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-2 text-center my-auto">
					<button class="btn btn-primary btn-block" id="btn_pilih">Pilih</button>
					<button class="btn btn-primary btn-block">Batal</button>
				</div>
				<div class="col-md-5">
					<table class="table" id="table_selected">
						<thead>
							<tr>
								<th>Kode Kamar</th>
								<th>Nama</th>
								<th>Tamu</th>
							</tr>
					</table>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	// var table1 = $('#aviable_room').DataTable();
	// var table2 = $('#selected_room').DataTable();
	$('#table_aviable tbody').on('click', 'btn_pilih', function() {
		var row = table1.row($(this).parents('tr'));
		var rowNode = row.node();
		row.remove();
		table2.row.add(rowNode).draw();
	});







	$(document).ready(function() {
		//Data Aviable Room
		var table;
		table = $('#table_aviable').DataTable({
			"processing": true,
			"serverSide": true,
			"paging": false,
			"ordering": false,
			"info": false,
			"searching": false,
			order: [
				[1, "ASC"]
			],
			"ajax": {
				url: "<?= base_url('admin/search_room') ?>",
				type: "POST",
				data: function(e) {
					e.TYPE = $('#type_room').val();
				}
			},
		});

		$('#type_room').on('change', function() {
			var type_room = $(this).val();
			table.ajax.reload();
		});

	})
</script>
