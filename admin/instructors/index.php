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
<?php include "registrar.php"?>

<?php 
if ($_settings->chk_flashdata('success')) : ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
    </script>
<?php endif; ?>
<div class="card card-outline rounded-0">
    <div class="card-header">
        <h3 class="card-title">Instructors</h3>
        
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-hover table-striped table-bordered" id="list">
               
                <thead>
                    <tr>
                    <th>SCHOOL_ID</th>
                            <th>PROFILE</th>
                            <th>NAME</th>
                            <th>DEPARTMENT</th>
                            <th>STATUS</th>
                            <?php if ($_SESSION['CURRENT_SROLE'] == "ADMIN") { ?>

<th>ACTION</th>
<?php } else { ?>
<?php } ?>
                    </tr>
                </thead>
                <tbody id="student-table-body">
                <?php
                        $where = '';
                        if (isset($_POST['status'])) {
                            $status = $_POST['status'];
                            if ($status != '') {
                                $where = "WHERE STATUS = '$status'";
                            }
                        }
                        if (isset($_POST['COURSE']) && !empty($_POST['COURSE'])) {
                            $course = $_POST['COURSE'];
                            $where .= empty($where) ? "WHERE" : " AND";
                            $where .= " COURSE = '$course'";
                        }
                        if (isset($_POST['YLEVEL']) && !empty($_POST['YLEVEL'])) {
                            $ylevel = $_POST['YLEVEL'];
                            $where .= empty($where) ? "WHERE" : " AND";
                            $where .= " YLEVEL = '$ylevel'";
                        }
                        if (isset($_POST['AY']) && !empty($_POST['AY'])) {
                            $ay = $_POST['AY'];
                            $where .= empty($where) ? "WHERE" : " AND";
                            $where .= " AY = '$ay'";
                        }
                        if (isset($_POST['STUDENT_STATUS']) && !empty($_POST['STUDENT_STATUS'])) {
                            $student_status = $_POST['STUDENT_STATUS'];
                            $where .= empty($where) ? "WHERE" : " AND";
                            $where .= " STUDENT_STATUS = '$student_status'";
                        }
                        $grade_query = mysqli_query($conn, "SELECT * FROM listing WHERE SROLE = 'INSTRUCTOR' ORDER BY LASTNAME, FIRSTNAME ASC");
                        while ($row = mysqli_fetch_array($grade_query)) {
                            if (empty($row['YLEVEL'])) {
                                $row['YLEVEL'] = 'NAN';
                            }
                            $ID = $row['SCHOOL_ID'];
                           
                            ?>
                           <?php
                                $user_query = mysqli_query($conn, "SELECT PHOTO FROM users WHERE ID='$ID'");
                                $user_row = mysqli_fetch_array($user_query);
                                $photo = !empty($user_row['PHOTO']);
                                $photoSrc = !empty($user_row['PHOTO']) ? $user_row['PHOTO'] : '../PITT/user.png';
                                ?>
                                <tr class="del<?php echo $ID ?>">
                                    <td><?php echo $row['SCHOOL_ID']; ?></td>
                                    <td width="60">
                                        <img src="<?php echo $photoSrc; ?>" width="30" height="30" class="img-circle">
                                    </td>
                                    <td><?php echo $row['LASTNAME'] . ", " . $row['FIRSTNAME']; ?></td>
                                    <td ><?php echo $row['DEPARTMENT']; ?></td>
                                    <td width="80" style="color: <?php echo ($row['STATUS'] == 1) ? 'green' : 'red'; ?>">
                                        <?php echo ($row['STATUS'] == 1) ? 'ACTIVE' : 'INACTIVE'; ?>
                                    </td>
                                    <?php if ($_SESSION['CURRENT_SROLE'] == "ADMIN") { ?>
                                    <td align="center">
                                        <!-- <button type="button" class="btn btn-flat p-1 btn-default btn-sm edit_data" data-id="<?php echo $row['ID'] ?>">
                                            <span class="fa fa-edit text-primary"></span> 
                                        </button> -->
                                        <button type="button" class="btn  delete_data" data-id="<?php echo $row['ID'] ?>">
                                            <span class="fa fa-trash text-danger"></span>  Delete
                                        </button>
                                    </td>
                                    <?php } else { ?>
                      <?php } ?>
                                   
                                </tr>

                        <?php }  ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
<script>
    function filterStudents() {
        var Department = document.getElementsByName('DEPARTMENT')[0].value;
        var table = document.getElementById('example');
        var rows = table.getElementsByTagName('tr');
        for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            var courseCell = cells[3];
            var ayCell = cells[5];
            var ylevelCell = cells[4];
            if ((course === '' || courseCell.innerHTML === course) &&
                (ay === '' || ayCell.innerHTML === ay) &&
                (ylevel === '' || ylevelCell.innerHTML === ylevel)) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('.delete_data').click(function() {
            _conf("Are you sure to delete this Students permanently?", "delete_instructor", [$(this).attr('data-id')])
        })
       
        $('#manage_order').click(function() {
            uni_modal("<i class='fa fa-strem'></i> Manage Instructors Order", "instructors/manage_order.php")
        })
        $('.view_data').click(function() {
           

			uni_modal("<i class='fa fa-eye'></i> Department Details","departments/view_department.php?id="+$(this).attr('data-id'))
		})
		$('.edit_data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Update Instructors Details","students/manage_instructor.php?id="+$(this).attr('data-id'))
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