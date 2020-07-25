</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Dendy 2020</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/templates/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/templates/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/templates/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/script2.js'); ?>"></script>
<script src="<?= base_url('assets/js/caleandar.js'); ?>"></script>
<script src="<?= base_url('assets/js/caleandar.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/demo.js'); ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/templates/'); ?>vendor/chart.js/Chart.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/templates/'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/templates/'); ?>js/demo/chart-pie-demo.js"></script>
<!-- Include library Moment JS -->
<script src="<?= base_url(); ?>assets/moment/moment.min.js"></script>
<!-- Include library Datepicker Gijgo -->
<script src="<?= base_url(); ?>assets/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Include file custom.js -->
<script src="<?= base_url(); ?>assets/js/custom.js"></script>

<script>
	$(document).ready(function() {
		$('.data').DataTable();
		$('.data-item').DataTable({
			searching: false,
			ordering: false,
		});
		setDatePicker();
		setDateRangePicker(".startdate", ".enddate");
	});
</script>
<script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
</script>

</body>

</html>
