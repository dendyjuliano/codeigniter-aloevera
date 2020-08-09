<!-- Begin Page Content -->
<div class="container-fluid noprint">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Reservasi</h1>
	</div>

	<!-- Content Row -->
	<!-- <div class="row">



		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Aviable Room</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $room_row; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-bed fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

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
							<i class="fas fa-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Payment NotChecked</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $payment_row; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Transaction NotChecked</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $transaction_row; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- Content Row -->
	<div class="flash-data3" data-flashdata3="<?= $this->session->flashdata('flash3'); ?>"></div>

	<div class="row">

		<!-- <div class="col-xl-8 col-lg-7">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Room Used</h6>
				</div>
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
											<a class="btn btn-danger tombol-hapus" href="<?= base_url('admin/delete_active/') ?><?= $ad['id'] ?>"><i class="fas fa-trash"></i></a>
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
		</div> -->
		<div class="col-xl-12 col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Room Used</h6>
					<div class="col-md-4 ml-auto">
						<div class="row">
							<select name="" class="form-control col-md-5 mr-2" id="roomStatus">
								<option value="" disabled selected>All</option>
								<option value="0">Diperbaiki</option>
								<option value="1">Kosong</option>
								<option value="2">Booking</option>
								<option value="3">Terisi</option>
							</select>
							<select name="" class="form-control col-md-5" id="roomLantai">
								<option value="" disabled selected>Lantai</option>
								<option value="2">Lantai 2</option>
								<option value="3">Lantai 3</option>
							</select>
						</div>
					</div>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="row ">
						<div class="col-md-10 m-0">
							<div class="row">
								<?php
								$no = 0;
								$no2 = 0;
								$no3 = 0;
								$no4 = 0;
								foreach ($room as $row) :  ?>
									<div class="col-md-3 room-view">
										<div class="dropdown no-arrow text-center">
											<a class="dropdown-toggle kasur text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<?php if ($row['status'] == 1) : ?>
													<i class="fas fa-bed fa-fw text-success"></i>
													<p class="small kode text-dark "> <span class="kode-k"> <?= $row['kode_kamar'] ?> <br> </span> <?= $row['nama_kamar'] ?></p>
													<!-- <p class="nama-kamar"><?= $row['nama_kamar'] ?></p> -->
												<?php elseif ($row['status'] == 0) : ?>
													<i class="fas fa-bed fa-fw text-danger"></i>
													<p class="small kode text-dark"> <span class="kode-k"><?= $row['kode_kamar'] ?></span> <br> <?= $row['nama_kamar'] ?></p>
												<?php else : ?>
													<?php if ($row['status'] == 2) : ?>
														<i class="fas fa-bed fa-fw text-primary"></i>
														<p class="small kode text-dark"> <span class="kode-k"><?= $row['kode_kamar'] ?></span> <br> <?= $row['nama_kamar'] ?></p>
													<?php else : ?>
														<i class="fas fa-bed fa-fw text-warning"></i>
														<p class="small kode text-dark"> <span class="kode-k"><?= $row['kode_kamar'] ?></span> <br> <?= $row['nama_kamar'] ?></p>
													<?php endif; ?>
												<?php endif; ?>
											</a>

											<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
												<?php if ($row['status'] == 1) : ?>
													<div class="row">
														<div class="dropdown-header"><?= $row['nama_kategori'] ?></div>
														<a class="dropdown-item" href="#"><?= $row['nama_kamar'] ?></a>
														<a class="dropdown-item" href="#">IDR <?= number_format($row['harga'], 0, ',', '.') ?></a>
													</div>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item bg-success text-white" id="checkin-one-<?= $no++ ?>" data-id="<?= $row['id'] ?>">Checkin</a>
												<?php elseif ($row['status'] == 2) : ?>
													<?php
													$kamar = $row['id'];
													$user = $this->db->get_where('transaksi', ['id_kamar' => $kamar])->row_array();
													?>
													<div class="row">
														<div class="dropdown-header"><?= $row['nama_kamar'] ?></div>
														<a class="dropdown-item" href="#"> <?= $user['nomor_pesanan'] ?></a>
														<a class="dropdown-item" href="#">Nama :<?= $user['nama_customer'] ?></a>
														<a class="dropdown-item" href="#">Checkin : <?= $user['checkin'] ?></a>
														<a class="dropdown-item" href="#">Checkout : <?= $user['checkout'] ?></a>
														<a class="dropdown-item" href="#">Order Date : <?= strftime("%A %d %B %Y", strtotime($user['tgl_pesanan'])) ?></a>
													</div>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item bg-primary text-white" data-toggle="modal" data-target="#checkin" href="#">Checkin</a>
												<?php elseif ($row['status'] == 3) : ?>
													<?php
													$kamar = $row['id'];
													$query = "SELECT tb_reservasi.*,tb_customer.*,tb_reservasi_room.* from tb_reservasi left join tb_customer on tb_reservasi.customer_id = tb_customer.id left join tb_reservasi_room on tb_reservasi_room.reservasi_id = tb_reservasi.id where tb_reservasi_room.room_id = '$kamar' AND tb_reservasi.status = 1";
													$user = $this->db->query($query)->row_array();
													?>
													<?php if ($user != null) : ?>
														<div class="row">
															<div class="dropdown-header"><?= $row['nama_kamar'] ?></div>
															<a class="dropdown-item" href="#">NIK :<?= $user['nik'] ?></a>
															<a class="dropdown-item" href="#">Nama :<?= $user['nama'] ?></a>
															<a class="dropdown-item" href="#">Kode Reservasi :<?= $user['kode_reservasi'] ?></a>
															<!-- <p id="reservasi_code-<?= $no3++ ?>"><?= $user['kode_reservasi'] ?></p> -->
															<a class="dropdown-item" href="#">Checkin : <?= strftime("%A %d %B %Y", strtotime($user['checkin_date'])) ?></a>
															<a class="dropdown-item" href="#">Checkout : <?= strftime("%A %d %B %Y", strtotime($user['checkout_date'])) ?></a>
															<a class="dropdown-item" href="#">Order Date : <?= strftime("%A %d %B %Y", strtotime($user['tanggal'])) ?></a>
														</div>
														<div class="dropdown-divider"></div>
														<a class="dropdown-item bg-warning text-white" data-toggle="modal" id="checkout-one-<?= $no2++ ?>" data-id="<?= $row['id'] ?>" data-reservasi-code="<?= $user['kode_reservasi'] ?>">Checkout</a>
													<?php endif; ?>
												<?php elseif ($row['status'] == 0) : ?>
													<a class="dropdown-item" href="#">On Repair</a>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<!-- Color Description -->
						<div class="col-md-2 pl-5">
							<div class="row">
								<div class="warna1"></div>
								Kosong
							</div>
							<br>
							<div class="row my-auto text-center">
								<div class="warna2"></div>
								Diperbaiki
							</div>
							<br>
							<div class="row my-auto text-center">
								<div class="warna3"></div>
								Booking
							</div>
							<br>
							<div class="row my-auto text-center">
								<div class="warna4"></div>
								Terisi
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- Request Item -->
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Request Item</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="row">
						<div class="col-md-10">
							<div class="form-group row">
								<label for="staticEmail" class="col-sm-4 col-form-label">Room Number</label>
								<div class="col-sm-8">
									<select name="room" id="room" class="form-control">
										<option value="" disabled selected>Pilih Room</option>
										<?php foreach ($active as $row) : ?>
											<option value="<?= $row['id'] ?>"><?= $row['kode_kamar'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label for="staticEmail" class="col-sm-4 col-form-label">Item</label>
								<div class="col-sm-8">
									<select name="item" id="item" class="form-control">
										<option value="" disabled selected>Pilih Item</option>
										<?php foreach ($item as $row) : ?>
											<option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="staticEmail" class="col-sm-4 col-form-label">Quantity</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" id="qty" value="1">
								</div>
							</div>
							<div class="form-group row tampil-harga">
							</div>
						</div>
						<div class="col-md-2 my-auto">
							<button class="btn btn-primary" id="addItem">Tambah</button>
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table class="table" id="tableItem" width="100%" cellspacing="0">
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
					<hr>
					<button class="btn btn-primary save-item">Submit</button>
				</div>
			</div>
		</div>

		<!-- Pie Chart -->
		<!-- <div class="col-xl-4 col-lg-5">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Calendar</h6>
				</div>
				<div class="card-body">
					<div id="caleandar">

					</div>
				</div>
			</div>
		</div> -->
	</div>

</div>
<!-- /.container-fluid -->

<!-- Modal Reservasi -->
<!-- Modal -->
<div class="modal fade bd-example-modal-lg room_modal " id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content" id="checkin-modal">

		</div>
	</div>
</div>

<div class="modal fade bd-example-modal-lg room_modal " id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content" id="checkout-modal">

		</div>
	</div>
</div>

<!-- Modal -->







<script>
	const $dropdown = $(".dropdown");
	const $dropdownToggle = $(".dropdown-toggle");
	const $dropdownMenu = $(".dropdown-menu");
	const showClass = "show";

	$(window).on("load resize", function() {
		if (this.matchMedia("(min-width: 768px)").matches) {
			$dropdown.hover(
				function() {
					const $this = $(this);
					$this.addClass(showClass);
					$this.find($dropdownToggle).attr("aria-expanded", "true");
					$this.find($dropdownMenu).addClass(showClass);
				},
				function() {
					const $this = $(this);
					$this.removeClass(showClass);
					$this.find($dropdownToggle).attr("aria-expanded", "false");
					$this.find($dropdownMenu).removeClass(showClass);
				}
			);
		} else {
			$dropdown.off("mouseenter mouseleave");
		}
	});

	// function getSelected() {
	// 	var room_length = document.getElementsByClassName('room-view').length;
	// 	var selcbox = [];

	// 	for (var f = 0; f < room_length; f++) {
	// 		var inpfields = document.getElementById('pilih-' + f);
	// 		var nr_inpfields = inpfields.length;
	// 	}

	// 	for (var i = 0; i < nr_inpfields; i++) {
	// 		if (inpfields[i].type == 'checkbox' && inpfields[i].checked == true) selchbox.push(inpfields[i].value);
	// 	}
	// 	return nr_inpfields;

	// }


	$(document).ready(function() {
		var id = 1;

		var tableBody = $('#tableItem');
		var counter = 1;

		//Request Personal Item
		//Change item Name and Price
		$('#item').on('change', function() {
			var item_id = $(this).val()

			if (item_id == null) {
				console.log('gagal')
			} else {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>admin/cari_item",
					data: {
						'item_id': item_id
					},
					success: function(data) {
						$('.tampil-harga').html(data);
					}
				})
			}
		})
		//End
		//Add Item to Table
		$('#addItem').click(function() {
			var idNum = (tableBody.find('tr').length + 1);
			var rowId = 'row-' + idNum;
			// Get Item
			var itemId = $("#item").val();
			var namaItem = $("#nama_item").val();
			var qty = $("#qty").val();
			var harga = $("#harga").val() * $("#qty").val();
			var rowId = 'row-' + idNum;
			var $row = $('<tr id="' + rowId + '" class="isi-table"></tr>');

			var add = true;
			var myTab = document.getElementById('tableItem');
			for (var i = 1; i < myTab.rows.length; i++) {
				if (itemId == myTab.rows[i].cells[1].innerHTML) {
					add = false;
					break;
				}
			}

			var newid = add ? id++ : id;

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
		//End
		//Remove Item from Table
		$("#tableItem").on('click', '.remCF', function() {
			$(this).parent().parent().remove();
		});
		//End
		//Save Item to Database
		$('.save-item').click(function() {
			var room_id = $('#room').val();
			var item_id = [];
			var qty = [];
			var harga = [];

			$('.item_id').each(function() {
				item_id.push($(this).text())
			})
			$('.qty').each(function() {
				qty.push($(this).text())
			})
			$('.harga').each(function() {
				harga.push($(this).text())
			})

			$.ajax({
				url: '<?= base_url('admin/reservasi_addItem') ?>',
				method: "POST",
				data: {
					item_id: item_id,
					qty: qty,
					harga: harga,
					room_id: room_id
				},
				success: function(data) {
					console.log(data)
					$(".isi-table").empty();
					Swal.fire({
						icon: 'success',
						title: 'Berhasil',
						text: 'Item berhasil di tambah Terimakasih ',
					}).then((result) => {
						if (result.value) {
							window.location.reload();
						}
					})
				}
			})
		})
		//End 

		//New Code
		var room_length = document.getElementsByClassName('room-view').length;
		//Checkin
		for (var o = 0; o < room_length; o++) {
			$('#checkin-one-' + o).on('click', function(e) {
				e.preventDefault();
				const id_room = $(this).data('id');
				$.ajax({
					url: '<?= base_url('admin/modal_checkin/') ?>' + id_room,
					dataType: 'html',
					success: function(data) {
						$('#checkin-modal').html(data);
						$('#modal').modal('show');
					}
				})
			})

		}

		for (var v = 0; v < room_length; v++) {
			$('#checkout-one-' + v).on('click', function(e) {
				e.preventDefault();
				const id_room = $(this).data('id');
				const reservasi_code = $(this).data('reservasi-code');
				console.log(reservasi_code)
				$.ajax({
					url: '<?= base_url('admin/modal_checkout/') ?>' + id_room,
					type: 'post',
					data: {
						reservasi_code: reservasi_code
					},
					dataType: 'html',
					success: function(data) {
						$('#checkout-modal').html(data);
						$('#modal2').modal('show');
					}
				})
			})
		}

		$('#btnPilih').on('click', function() {
			var selek = getSelected();
			alert(selek)
		})

		$('#roomStatus').on('change', function() {
			const status = $(this).val();
			$.ajax({
				url: '<?= base_url('admin/reservasi') ?>',
				type: 'post',
				data: {
					status: status
				},
				success: function(data) {
					console.log(data)
				}
			})
		})
		$('#roomLantai').on('change', function() {
			const lantai = $(this).val();
			$.ajax({
				url: '<?= base_url('admin/reservasi') ?>',
				type: 'post',
				data: {
					lantai: lantai
				},
				success: function(data) {
					console.log(data)
				}
			})
		})

	})
</script>
