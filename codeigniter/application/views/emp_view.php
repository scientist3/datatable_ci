<!DOCTYPE html>
<html>

<head>
	<title>DataTables AJAX Pagination with Search and Sort in CodeIgniter</title>

	<!-- Datatable CSS -->
	<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

	<!-- jQuery Library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Datatable JS -->
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>

<body>


	<!-- Table -->
	<table id='empTable' class='display dataTable'>

		<thead>
			<tr>
				<th>Employee name</th>
				<th>Email</th>
				<th>Gender</th>
				<th>Salary</th>
				<th>City</th>
			</tr>
		</thead>

	</table>

	<!-- Script -->
	<script type="text/javascript">
		$(document).ready(function() {
			// This example show how to implement server side search functionality on when then user hits enter but not on key press
			var dt = $('#empTable').DataTable({
				'processing': true,
				'serverSide': true,
				'serverMethod': 'post',
				'ajax': {
					'url': '<?= base_url() ?>index.php/Employee/empList'
				},
				'columns': [{
						data: 'emp_name'
					},
					{
						data: 'email'
					},
					{
						data: 'gender'
					},
					{
						data: 'salary'
					},
					{
						data: 'city'
					},
				],
				"initComplete": function(settings, json) {
					$('#empTable_filter input').unbind();
					$('#empTable_filter input').bind('keyup', function(e) {
						if (e.keyCode == 13) {
							dt.search(this.value).draw();
						}
					});
				}
			});

			// var oTable = $('#empTable_filter').dataTable({
			// 	"bPaginate": true,
			// 	"bLengthChange": true,
			// 	"bFilter": true,
			// 	"bSort": true,
			// 	"bInfo": true,
			// 	"bAutoWidth": true
			// });
			// $('#empTable_filter input').unbind();
			// $('#empTable_filter input').bind('keyup', function(e) {
			// 	if (e.keyCode == 13) {
			// 		dt.fnFilter(this.value);
			// 	}
			// });
		});
	</script>
</body>

</html>