<div class="card my-3">
	<div class="card-body">
		<div class="row">
			<div class="col-md-5">
				<h3 class="card-title"><?= $roomName ?></h3>
			</div>
			<div class="col-md-7">
				<h4 class="card-title">Rp <span id="subTotal"><?= $subtotalPrice ?></span></h4>
			</div>
		</div>
		<p class="card-text text-danger">Jangka Waktu Tinggal <?= $days ?> malam</p>
		<button class="btn view-btn1 float-right btn-sm btn-block" onclick="paymentRoom()" id="book">NEXT</button>
	</div>
</div>
