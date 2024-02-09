<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline rounded-0 card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Users</h3>
		
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered">
				
				<thead>
					<tr>
						<th>#</th>
						<th>PROFILE</th>

						<th>Name</th>
						<th>Username</th>
						<th>Type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
						$i=1;
                        $user_query = mysqli_query($conn, "SELECT * FROM users") or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($user_query)) {
                            $USER_ID = $row['USER_ID'];
                        ?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td>
                                    <?php if (!empty($row['PHOTO'])) { ?>
                                        <img src="<?php echo $row['PHOTO']; ?>" width="30" height="30" class="img-circle">
                                    <?php } else { ?>
                                        <img src="../PITT/user.png" width="30" height="30" class="img-circle">
                                    <?php } ?>
                                </td>
								<td><?php echo $row['FIRSTNAME'] .', '. $row['LASTNAME']; ?></td>
							<td><p class="m-0 truncate-1"><?= $row['USERNAME'] ?></p></td>
							<td><p class="m-0 truncate-1"><?= $row['SROLE']?></p></td>
							<td align="center">
                                <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Action
                                <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['ID'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['ID'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
                                </div>
							</td>
						</tr>
						<?php } ?>

				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
        $('#create_new').click(function(){
            uni_modal("Add New User","user/manage_user.php")
        })
        $('.edit_data').click(function(){
            uni_modal("Update User Account","user/manage_user.php?id="+$(this).attr('data-id'))
        })
        $('.delete_data').click(function(){
            _conf("Are you sure to delete this user permanently?","delete_user",[$(this).attr('data-id')])
        })
		$('.table').dataTable({
			columnDefs: [
					{ orderable: false, targets: [5] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})
    function delete_user($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Users.php?f=delete_user",
			method:"POST",
			data:{id: $id},
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(resp == 1){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
	
</script>