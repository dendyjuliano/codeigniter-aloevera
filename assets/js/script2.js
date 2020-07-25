const flashData = $('.flash-data').data('flashdata');
const flashData2 = $('.flash-data2').data('flashdata2');
const flashData3 = $('.flash-data3').data('flashdata3');

if (flashData) {
	Swal.fire({
		icon: 'success',
		title: 'Data',
		text: 'Succesfull ' + flashData
	});
}
if (flashData3) {
	Swal.fire({
		icon: 'success',
		title: 'Pemesanan Berhasil',
		text: 'kode reservasi kamu ' + flashData3
	});
}
if (flashData2) {
	Swal.fire({
		icon: 'error',
		title: 'Gagal input data',
		text: flashData2
	});
}

$('.tombol-hapus').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Are you Sure ?',
		text: "Deleted this Data",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Delete'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});
