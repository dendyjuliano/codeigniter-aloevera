<div class="modal-body noprint" id="defaultForm">
	<div class="row">
		<div class="col-md-4 my-auto">
			<img src="<?= base_url('assets/img/logoAloevera.png') ?>" width="400" class="img-fluid" alt="">
		</div>
		<div class="col-md-8">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="name">Kode Kamar</label>
					<input type="text" class="form-control" id="kode_kamar" name="kode_kamar" readonly value="<?= $room_row['kode_kamar'] ?>">
					<!-- <input type="text" class="form-control" id="id_kamar" name="id" hidden value="<?= $room_row['id'] ?>"> -->
				</div>
				<div class=" form-group col-md-6">
					<label for="name">Kategori</label>
					<input type="text" class="form-control" id="nama_kamar" name="nama_kamar" readonly value="<?= $room_row['nama_kategori'] ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="name">Harga</label>
					<input type="text" class="form-control" readonly value="IDR <?= number_format($subtotal, 0, ',', '.') ?>">
					<input type="hidden" class="form-control" id="harga_kamar" name="harga" readonly value="<?= $subtotal ?>">
				</div>
				<div class="form-group col-md-6">
					<label>Checkin - Checkout</label>
					<div class="input-group">
						<input type="text" class="form-control datetimepicker-input" data-toggle="datetimepicker" name="checkin" id="checkin" autocomplete="off" value="<?= date("d-m-Y", strtotime($room_row['checkin_date'])) ?>" />
						<div class="input-group-append">
							<span class="input-group-text">s/d</span>
						</div>
						<input type="text" class="form-control datetimepicker-input" name="checkout" autocomplete="off" id="checkout" value="<?= date("d-m-Y", strtotime($room_row['checkout_date'])) ?>" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>NIK</th>
				<th>Nama</th>
				<th>Email</th>
				<th>NoHp</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?= $room_row['nik'] ?></td>
				<td><?= $room_row['nama'] ?></td>
				<td><?= $room_row['email'] ?></td>
				<td><?= $room_row['no_hp'] ?></td>
			</tr>
		</tbody>
	</table>
	<?php if ($requestItem != null) : ?>
		<table class="table" id="tableItem">
			<thead>
				<tr>
					<th>Nama Item</th>
					<th>Quantity</th>
					<th class="text-right">Harga</th>
				</tr>
			</thead>
			<tbody id="bodyItem">
				<?php foreach ($requestItem as $row_item) : ?>
					<tr>
						<td><?= $row_item['nama'] ?></td>
						<td><?= $row_item['qty'] ?></td>
						<td class="text-right"><?= $row_item['total_bayar'] ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php else : ?>
		<table class="table">
			<thead>
				<tr class="text-center">
					<th>No Item</th>
				</tr>
			</thead>
		</table>
	<?php endif; ?>
	<table class="table">
		<tr class="bg-primary text-white">
			<th>TOTAL</th>
			<th class="text-right" id="total">0</th>
		</tr>
	</table>

	<div class="tombol float-right">
		<button class="btn btn-primary" id="btnCheckout" data-kode-kamar="<?= $room_row['kode_kamar'] ?>" data-kode-reservasi="<?= $room_row['kode_reservasi'] ?>">Checkout</button>
	</div>
</div>


<script>
	$(document).ready(function() {
		$('#tableItem thead th').each(function() {
			countRow();
		})
	})

	function countRow() {
		var subtotal = 0;
		var hargaKamar = $('#harga_kamar').val();
		$('table tr').each(function() {
			var value = parseInt($('td', this).eq(2).html());
			if (!isNaN(value)) {
				subtotal += value;
			}
		})

		var total = parseInt(hargaKamar) + subtotal;
		var reverse = total.toString().split('').reverse().join(''),
			ribuan = reverse.match(/\d{1,3}/g);
		ribuan = ribuan.join('.').split('').reverse().join('');
		$('#total').html('Rp.' + ribuan);
	}

	$('#btnCheckout').on('click', function() {
		const kode_kamar = $(this).data('kode-kamar');
		const kode_reservasi = $(this).data('kode-reservasi');
		const totalHarga = $('#total').html();

		$.ajax({
			url: '<?= base_url('admin/checkout') ?>',
			method: 'post',
			data: {
				kode_kamar: kode_kamar,
				kode_reservasi: kode_reservasi,
				totalHarga: totalHarga
			},
			success: function(data) {
				printData(data)
				// window.location.replace("<?= base_url('admin/printCheckout/') ?>" + kode_kamar + "/" + kode_reservasi + "/" + totalHarga);
				window.location.reload()

			}
		})
	})

	function printData(data) {
		var mywindow = window.open('');
		mywindow.document.write(data);
		mywindow.print();
		mywindow.close();
		return true;
	}
</script>
