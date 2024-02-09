<?php include "registrar.php"?>


<?php if ($_settings->chk_flashdata('success')) : ?>
	<script>
		alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
	</script>
<?php endif; ?>
<style>
	.card
	{
		background-color: #0b1a2c !important;

	}
	.content-wrapper{
		background-color: #0b1a2c !important;
	}
	.card-body{
		background-color: white;
	}
</style>  
<div class="card card-outline rounded-0 " >
	<div class="card-header">
		<h3 class="card-title">LIST OF PROGRAMS</h3>
		<?php if ($_SESSION['CURRENT_SROLE'] == "ADMIN") { ?>
			<!-- <div class="card-tools">
				<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-sm btn-primary"><span class="fas fa-plus"></span> Create New</a>
			</div> -->
		<?php } else { ?>
		<?php } ?>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">

				<thead>
					<tr>
						<th>#</th>
						<th>Department</th>
						<th>Name</th>
						<th>Description</th>
						<!-- <?php if ($_SESSION['CURRENT_SROLE'] == "ADMIN") { ?>

					<th>Action</th>
					<?php } else { ?>
					<?php } ?> -->
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT DISTINCT COURSE, PROGRAM_DESC, DEPARTMENT FROM curriculum";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						$i = 1;
						while ($row = mysqli_fetch_assoc($result)) {
							$course = $row['COURSE'];
							$program_desc = $row['PROGRAM_DESC'];
							$department = isset($row['DEPARTMENT']) ? $row['DEPARTMENT'] : 'No Department'; // Error handling for 'DEPARTMENT' key
					?>
							<tr>
								<td class="text-center"><?php echo $i++; ?></td>
								<td><?php echo $row['DEPARTMENT'] ?></td>
								<td><?php echo $row['COURSE'] ?></td>
								<td>
									<p class="m-0 truncate-1"><?= $row['PROGRAM_DESC'] ?></p>
								</td>
								<?php if ($_SESSION['CURRENT_SROLE'] == "ADMIN") { ?>
									<!-- <td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view_data" href="javascript:void(0)" data-id="<?php echo $row['ID'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['ID'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['ID'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td> -->
								<?php } else { ?>
								<?php } ?>

							</tr>
					<?php
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.delete_data').click(function() {
			_conf("Are you sure to delete this Course permanently?", "delete_course", [$(this).attr('data-id')])
		})
		$('#create_new').click(function() {
			uni_modal("<i class='fa fa-plus'></i> Add New Course", "courses/manage_course.php")
		})
		$('#manage_order').click(function() {
			uni_modal("<i class='fa fa-strem'></i> Manage Course Order", "courses/manage_order.php")
		})
		$('.view_data').click(function() {
			uni_modal("<i class='fa fa-eye'></i> Course Details", "courses/view_course.php?id=" + $(this).attr('data-id'))
		})
		$('.edit_data').click(function() {
			uni_modal("<i class='fa fa-edit'></i> Update Course Details", "courses/manage_course.php?id=" + $(this).attr('data-id'))
		})
		$('.table').dataTable({
			columnDefs: [{
				orderable: false,
				targets: [5, 6]
			}],
			order: [0, 'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})

	function delete_course($id) {
		start_loader();
		$.ajax({
			url: _base_url_ + "classes/Master.php?f=delete_course",
			method: "POST",
			data: {
				id: $id
			},
			dataType: "json",
			error: err => {
				console.log(err)
				alert_toast("An error occured.", 'error');
				end_loader();
			},
			success: function(resp) {
				if (typeof resp == 'object' && resp.status == 'success') {
					location.reload();
				} else {
					alert_toast("An error occured.", 'error');
					end_loader();
				}
			}
		})
	}
</script>