function setDatePicker() {
	$(".datepicker").datetimepicker({
		format: "YYYY-MM-DD",
		useCurrent: false,
		minDate: new Date(),
		defaultDate: new Date(),
	})

	$(".satu").datetimepicker({
		defaultDate: new Date(),
		format: "YYYY-MM-DD",
		useCurrent: false,
		minDate: new Date(),
	})
	$(".dua").datetimepicker({
		defaultDate: "2020-07-11",
		format: "YYYY-MM-DD",
		useCurrent: false,
		minDate: new Date(),
	})
	// $(".enddate").datetimepicker({
	// 	format: "YYYY-MM-DD",
	// 	useCurrent: false,
	// 	defaultDate: new Date(),
	// })
}
function setDateRangePicker(input1, input2) {
	$(input1).datetimepicker({
		format: "YYYY-MM-DD",
		useCurrent: false,
		minDate: new Date(),
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
// function setMonthPicker() {
// 	$(".monthpicker").datetimepicker({
// 		format: "MM",
// 		useCurrent: false,
// 		viewMode: "months"
// 	})
// }
// function setYearPicker() {
// 	$(".yearpicker").datetimepicker({
// 		format: "YYYY",
// 		useCurrent: false,
// 		viewMode: "years"
// 	})
// }
// function setYearRangePicker(input1, input2) {
// 	$(input1).datetimepicker({
// 		format: "YYYY",
// 		useCurrent: false,
// 		viewMode: "years"
// 	})
// 	$(input1).on("change.datetimepicker", function (e) {
// 		$(input2).val("")
// 		$(input2).datetimepicker('minDate', e.date);
// 	})
// 	$(input2).datetimepicker({
// 		format: "YYYY",
// 		useCurrent: false,
// 		viewMode: "years"
// 	})
// }
