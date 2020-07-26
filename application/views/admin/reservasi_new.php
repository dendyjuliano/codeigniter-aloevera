<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
		</div>
		<div class="card-body">
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
	</div>
	<div class="card shadow-bottom p-3 my-auto">
		<div class="col-md-12 mx-auto">
			<div class="row">
				<div class="col-md-5">
					<div class="table-responsive">
						<table class="table" width="100%" cellspacing="0" id="table_aviable">
							<thead>
								<tr>
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
					<button class="btn btn-primary btn-block" id="btn_batal">Batal</button>
				</div>
				<div class="col-md-5">
					<table class="table" id="table_selected" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Kode Kamar</th>
								<th>Nama</th>
								<th>Tamu</th>
								<th>Harga</th>
							</tr>
						</thead>
						<tbody id="selected_room" class="text-center">

						</tbody>
					</table>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		//Data Aviable Room
		var selected = [];
		var table;
		var table2;
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
			"rowCallback": function(row, data) {
				if ($.inArray(data.DT_RowId, selected) !== -1) {
					$(row).addClass('selected');
				}
			},
			"ajax": {
				url: "<?= base_url('admin/search_room') ?>",
				type: "POST",
				data: function(e) {
					e.TYPE = $('#type_room').val();
				}
			},
		});

		table2 = $('#table_selected').DataTable({
			"paging": false,
			"ordering": false,
			"info": false,
			"searching": false,
			order: [
				[1, "ASC"]
			],
			"rowCallback": function(row, data) {
				if ($.inArray(data.DT_RowId, selected) !== -1) {
					$(row).addClass('selected');
					$(row).addClass('batal');
				}
			},
		})



		$('#type_room').on('change', function() {
			var type_room = $(this).val();
			table.ajax.reload();
		});

		$('#table_aviable tbody').on('click', 'tr', function() {
			$(this).toggleClass('selected');
		});
		$('#table_selected tbody').on('click', 'tr', function() {
			$(this).toggleClass('selected');
		});

		$('#btn_pilih').click(function() {
			// alert(table.rows('.selected').data().length + ' row(s) selected');
			var data_room = table.rows('.selected').data();
			table2.rows.add(data_room).draw();
			table.rows('.selected').remove().draw(false);
		});

		$('#btn_batal').click(function() {
			var data_selected = table2.rows('.batal').data();
			console.log(data_selected)
			table.rows.add(data_selected).draw();
		})


	})



	// $(document).ready(function() {
	// 	var table = $('#example').DataTable();
	// 	$('#example tbody').on('click', 'tr', function() {
	// 		if ($(this).hasClass('selected')) {
	// 			$(this).removeClass('selected');
	// 		} else {
	// 			table.$('tr.selected').removeClass('selected');
	// 			$(this).addClass('selected');
	// 		}
	// 	});
	// 	$('#button').click(function() {
	// 		table.row('.selected').remove().draw(false);
	// 	});
	// });
</script>
