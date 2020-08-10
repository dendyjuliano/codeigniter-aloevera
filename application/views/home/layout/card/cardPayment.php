<div class="card p-3 select">
	<div class="row justify-content-center">
		<div class="col-md-5">
			<h3 class="card-title"><?= $roomName ?></h3>
		</div>
		<div class="col-md-6">
			<h4 class="card-title">Rp <span id="subTotal"><?= $subtotalPrice ?></span></h4>
		</div>
		<div class="col-md-1 pl-2">
			<a href="#" class="removeRoom" data-category-id="<?= $idCategory ?>">
				<input type="text" name="selectCategory[]" hidden value="<?= $idCategory ?>">
				<h4 class="text-danger card-title "><i class="fas fa-times"></i></h4>
			</a>
		</div>
		<div class="col-md-12">
			<p class="card-text text-danger"><small>Jangka Waktu Tinggal <?= $days ?> malam</small></p>
		</div>
	</div>
</div>
