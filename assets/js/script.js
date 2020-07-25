//sweat alert
const flashdata = $('.flash-data').data('flashdata');
const flashdata2 = $('.flash-data2').data('flashdata2');
const flashdata3 = $('.flash-data3').data('flashdata3');
const flashdata4 = $('.flash-data4').data('flashdata4');
const flashdata5 = $('.flash-data5').data('flashdata5');
const flashdata6 = $('.flash-data6').data('flashdata6');
const flashdata10 = $('.flash-data10').data('flashdata10');
const flashdata9 = $('.flash-data9').data('flashdata9');
const flashdata99 = $('.flash-data99').data('flashdata99');

if (flashdata) {
	Swal.fire({
		icon: 'success',
		title: 'Congeratulation',
		text: 'Your Account is  ' + flashdata
	});
}
if (flashdata2) {
	Swal.fire({
		icon: 'error',
		title: 'Filed',
		text: 'Username is not registered'
	});
}
if (flashdata3) {
	Swal.fire({
		icon: 'error',
		title: 'Filed',
		text: 'Wrong Password'
	});
}
if (flashdata4) {
	Swal.fire({
		icon: 'success',
		title: 'Success',
		text: 'You have been logout'
	});
}
if (flashdata5) {
	Swal.fire({
		icon: 'error',
		title: 'Filed',
		text: 'Username is not registered'
	});
}
if (flashdata6) {
	Swal.fire({
		icon: 'success',
		title: 'Congratulation',
		text: 'Payment Successful'
	});
}
if (flashdata10) {
	Swal.fire({
		icon: 'error',
		title: 'Filed',
		text: 'please order again'
	});
}
if (flashdata9) {
	Swal.fire({
		icon: 'success',
		title: 'Congratulation',
		text: 'Payment Successful Check Your email to get Transaction Number'
	});
}
if (flashdata99) {
	Swal.fire({
		icon: 'error',
		title: 'Gagal',
		text: 'Room yang anda pesan melebihi kapasitas yang tersedia'
	});
}

$('.tombol-hapus').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "Data Mahasiswa akan di Hapus",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

})
