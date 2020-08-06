function setDatePicker() {
	$(".datepicker").datetimepicker({
		format: "YYYY-MM-DD",
		useCurrent: false,
		minDate: new Date(),
		defaultDate: new Date(),
	})
}
function setDateRangePicker(input1, input2) {
	$(input1).datetimepicker({
		format: "YYYY-MM-DD",
		useCurrent: false,
		minDate: new Date(),
		// defaultDate: new Date(),
	})
	$(input1).on("change.datetimepicker", function (e) {
		$(input2).val("")
		$(input2).datetimepicker('minDate', e.date);
	})
	$(input2).datetimepicker({
		format: "YYYY-MM-DD",
		useCurrent: false,
		// defaultDate: new Date(),
	})
}
