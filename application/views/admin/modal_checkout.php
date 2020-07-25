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
</div>
