<div class="modal-body" id="defaultForm">
	<div class="row">
		<div class="col-md-4 my-auto">
			<img src="<?= base_url('assets/img/Logo.jpg') ?>" class="img-fluid" alt="">
		</div>
		<div class="col-md-8">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="name">Kode Kamar</label>
					<input type="text" class="form-control" id="kode_kamar" name="kode_kamar" readonly value="<?= $room_row['kode_kamar'] ?>">
					<input type="text" class="form-control" id="id_kamar" name="id" hidden value="<?= $room_row['id'] ?>">
				</div>
				<div class=" form-group col-md-6">
					<label for="name">Kategori</label>
					<input type="text" class="form-control" id="nama_kamar" name="nama_kamar" readonly value="<?= $room_row['nama_kategori'] ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="name">Harga</label>
					<input type="text" class="form-control" readonly value="IDR <?= number_format($room_row['harga'], 0, ',', '.') ?>">
					<input type="text" hidden class="form-control" id="harga_kamar" name="harga" readonly value="<?= $room_row['harga'] ?>">
				</div>
				<div class="form-group col-md-6">
					<label>Checkin - Checkout</label>
					<div class="input-group">
						<input type="text" class="form-control startdate datetimepicker-input" data-toggle="datetimepicker" data-target=".startdate" name="checkin" id="checkin" autocomplete="off" />
						<div class="input-group-append">
							<span class="input-group-text">s/d</span>
						</div>
						<input type="text" class="form-control enddate datetimepicker-input" data-toggle="datetimepicker" data-target=".enddate" name="checkout" autocomplete="off" id="checkout" />
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Nav tabs -->
	<ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user-plus mr-1"></i>
				Tambah Customer</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user mr-1"></i>
				Cari Customer</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#panel9" role="tab"><i class="fas fa-luggage-cart mr-1"></i>
				Tambah Item</a>
		</li>
	</ul>

	<!-- Tab panels -->
	<div class="tab-content">
		<!--Panel 7-->
		<div class="tab-pane fade in show active" id="panel7" role="tabpanel">
			<!--Body-->
			<div class="modal-body mb-1 mt-3">
				<div class="form-group">
					<input type="text" class="form-control" id="nik" name="input_nik" placeholder="NIK">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="nama" name="input_nama" placeholder="Nama">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="email" name="input_email" placeholder="Email">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="noHp" name="input_noHp" placeholder="NoHp">
				</div>
			</div>

		</div>
		<!--/.Panel 7-->

		<!--Panel 8-->
		<div class="tab-pane fade" id="panel8" role="tabpanel">
			<!--Body-->
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table data-item" width="100%" cellspacing="0">
						<thead class="bg-primary text-white">
							<tr>
								<th><b>Select</b></th>
								<th>NIK</th>
								<th>Name</th>
								<th>Email</th>
								<th>NoHp</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<?php foreach ($customer as $rod) : ?>
								<tr>
									<td>
										<input class="form-check-input" name="customer_id" type="checkbox" value="<?= $rod['id'] ?>">
									</td>
									<td><?= $rod['nik'] ?></td>
									<td><?= $rod['nama'] ?></td>
									<td><?= $rod['email'] ?></td>
									<td><?= $rod['no_hp'] ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!--/.Panel 8-->

		<!--Panel 9-->
		<div class="tab-pane fade" id="panel9" role="tabpanel">
			<!--Body-->
			<div class="modal-body mt-3">
				<div class="row p-0">
					<div class="col-md-10 my-auto">
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-4 col-form-label">Item</label>
							<div class="col-sm-8">
								<select name="barang" id="barang2" class="form-control">
									<option value="" disabled selected>Pilih Item</option>
									<?php foreach ($item as $ros) : ?>
										<option value="<?= $ros['id'] ?>"><?= $ros['nama'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-4 col-form-label">Quantity</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="quantity" value="1">
							</div>
						</div>
						<div class="form-group row show-harga">
						</div>
					</div>
					<div class="col-md-2 my-auto">
						<a class="btn btn-primary text-white" id="tambahBarang">Tambah</a>
					</div>
				</div>
				<hr>
				<div class="table-responsive">
					<table class="table" id="tablePilihItem" width="100%" cellspacing="0">
						<thead class="bg-primary text-white">
							<tr>
								<th>No</th>
								<th>Item</th>
								<th>Quantity</th>
								<th>Harga</th>
								<th>Remove</th>
							</tr>
						</thead>

					</table>
				</div>
			</div>
		</div>
		<!--/.Panel 9-->
		<!--Footer-->
		<div class="modal-buttom float-right">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary" id="btn-checkin">Submit</button>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		//this is datePicker for Checkin and Checkout
		setDateRangePicker(".startdate", ".enddate");
		$('.data-item').DataTable({
			searching: false,
			ordering: false,
		});

		//this is code for search items where id
		$('#barang2').on('change', function() {
			var barang_id = $(this).val();
			if (barang_id == null) {
				console.log('gagal')
			} else {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>admin/cari_barang",
					data: {
						'barang_id': barang_id,
					},
					success: function(data) {
						$('.show-harga').html(data);
						console.log(data)
					}
				})
			}
		})

		//this code for add item to table
		var id_kamar = $('#id_kamar2').val();
		var id = 1;
		var tableBody = $('#tablePilihItem');
		$('#tambahBarang').click(function() {
			var idNum = (tableBody.find('tr').length + 1);
			var rowId = 'row-' + idNum;
			// Get Item
			var itemId = $("#barang2").val();
			var namaItem = $("#nama_barang").val();
			var qty = $("#quantity").val();
			var harga = $("#harga_barang").val() * $("#quantity").val();
			var rowId = 'row-' + idNum;
			var $row = $('<tr id="' + rowId + '" class="isi-table"></tr>');

			var add = true;
			var myTab = document.getElementById('tablePilihItem');
			for (var i = 1; i < myTab.rows.length; i++) {
				if (itemId == myTab.rows[i].cells[1].innerHTML) {
					add = false;
					break;
				}
			}

			var newid = add ? id++ : id;
			//
			/* Add the table cells $row.append('<td class="idCell">' + idNum + '</td>'); */
			$row.append('<td class="no">' + newid + '</td>');
			$row.append('<td hidden class="item_id">' + itemId + '</td>');
			$row.append('<td class="nama_item">' + namaItem + '</td>');
			$row.append('<td class="qty">' + qty + '</td>');
			$row.append('<td class="harga">' + harga + '</td>');
			$row.append('<td width="100px"><a href="javascript:void(0);" class="remCF btn btn-danger">Remove</a></td>');
			/* Append the row to the table body */

			if (add) {
				tableBody.append($row);
			} else {
				for (var i = 1; i < myTab.rows.length; i++) {
					if (myTab.rows[i].cells[1].innerHTML == itemId) {
						var quantity = myTab.rows[i].cells[3].innerHTML = parseInt(myTab.rows[i].cells[3].innerHTML) + parseInt(qty);
						myTab.rows[i].cells[4].innerHTML = parseInt(quantity) * parseInt(harga);
						break;
					}
				}
			}

		})

		$("#tablePilihItem").on('click', '.remCF', function() {
			$(this).parent().parent().remove();
		});

		//code for button checkin
		$('#btn-checkin').click(function() {
			//Room Reservasion
			var id_kamar = $('#id_kamar').val();
			var tgl_checkin = $('#checkin').val();
			var tgl_checkout = $('#checkout').val();
			var harga_kamar = $('#harga_kamar').val();
			//Customer
			var id_customer = [];
			$.each($("input[name='customer_id']:checked"), function() {
				id_customer.push($(this).val());
			})

			var nik = $('#nik').val();
			var nama = $('#nama').val();
			var email = $('#email').val();
			var noHp = $('#noHp').val();
			//Request Item Reservasion
			var id_barang = [];
			var quantity = [];
			var harga_barang = [];

			$('.item_id').each(function() {
				id_barang.push($(this).text())
			})
			$('.qty').each(function() {
				quantity.push($(this).text())
			})
			$('.harga').each(function() {
				harga_barang.push($(this).text())
			})

			if (tgl_checkin != '' && tgl_checkout != '') {
				$.ajax({
					url: '<?= base_url('admin/cek_reservasi') ?>',
					method: "POST",
					data: {
						id_kamar: id_kamar,
						tgl_checkin: tgl_checkin,
						tgl_checkout: tgl_checkout,
						harga_kamar: harga_kamar,
						id_customer: id_customer,
						nik: nik,
						nama: nama,
						email: email,
						noHp: noHp,
						id_barang: id_barang,
						quantity: quantity,
						harga_barang: harga_barang
					},
					success: function(data) {
						console.log(data)
						Swal.fire({
							icon: 'success',
							title: 'Berhasil',
							text: 'Terimakasih telah melakukan Checkin '
						}).then((result) => {
							if (result.value) {
								$(".isi-tableItem").empty();
								$('input:checkbox').removeAttr('checked');
								window.location.reload();
							}
						})
					},
					error: function(data) {
						console.log(data)
						Swal.fire({
							icon: 'error',
							title: 'Gagal',
							text: 'Terjadi Kesalahan'
						});
					}
				})
			} else {
				Swal.fire({
					icon: 'error',
					title: 'Gagal',
					text: 'Checkin dan Checkout belum Terisi'
				});
			}

		})


	})
</script>
