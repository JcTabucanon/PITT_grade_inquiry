<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline rounded-0 card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Department</h3>
		<?php if ($_SESSION['CURRENT_SROLE'] == "ADMIN") { ?>

		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-sm btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
		<?php } else { ?>
                      <?php } ?>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="list">
				
				<thead>
					<tr>
						<th>#</th>
						<th>DEPARTMENT NAME</th>
    <?php if ($_SESSION['CURRENT_SROLE'] == "ADMIN") { ?>

						<th>Action</th>
						<?php } else { ?>
                      <?php } ?>
					</tr>
				</thead>
				<tbody>
				<?php
                    $i = 1;
                    $qry = $conn->query("SELECT * from listing ");
                    $departments = array(); // Store unique departments
                    while ($row = $qry->fetch_assoc()) :
                        $department = $row['DEPARTMENT'];
                        if (in_array($department, $departments)) {
                            continue; // Skip if the department already exists
                        }
                        $departments[] = $department; // Add department to the list
                    ?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $row['DEPARTMENT'] ?></td>
    <?php if ($_SESSION['CURRENT_SROLE'] == "ADMIN") { ?>
							
							<td align="center">
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
							</td>
							<?php } else { ?>
                      <?php } ?>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Department permanently?","delete_department",[$(this).attr('data-id')])
		})
		$('#create_new').click(function(){
			uni_modal("<i class='fa fa-plus'></i> Add New Department","departments/manage_department.php")
		})
		$('#manage_order').click(function(){
			uni_modal("<i class='fa fa-strem'></i> Manage Department Order","departments/manage_order.php")
		})
		$('.view_data').click(function(){
			uni_modal("<i class='fa fa-eye'></i> Department Details","departments/view_department.php?id="+$(this).attr('data-id'))
		})
		$('.edit_data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Update Department Details","departments/manage_department.php?id="+$(this).attr('data-id'))
		})
		$('.table').dataTable({
			columnDefs: [
					{ orderable: false, targets: [4,5] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})
	function delete_department($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_department",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>