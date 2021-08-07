var dt = $("#empTable").DataTable({
	processing: true,
	serverSide: true,
	serverMethod: "post",
	ajax: {
		url: "<?= base_url() ?>index.php/Employee/empList",
	},
	columns: [
		{
			data: "emp_name",
		},
		{
			data: "email",
		},
		{
			data: "gender",
		},
		{
			data: "salary",
		},
		{
			data: "city",
		},
	],
	initComplete: function (settings, json) {
		$("#empTable_filter input").unbind();
		$("#empTable_filter input").bind("keyup", function (e) {
			if (e.keyCode == 13) {
				dt.search(this.value).draw();
			}
		});
	},
});
