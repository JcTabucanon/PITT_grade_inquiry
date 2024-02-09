<?php include "registrar.php"?>
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
</div><?php if ($_settings->chk_flashdata('success')) : ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success');
    </script>
<?php endif; ?>

<div class="card card-outline rounded-0 card">
    <div class="card-header">
        <h3 class="card-title">STUDENTS LIST</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-hover table-striped table-bordered" id="list">
                <thead>
                    <tr>
                        <th>SCHOOL_ID</th>
                        <th>PROFILE</th>
                        <th>NAME</th>
                        <th>COURSE</th>
                        <th>LEVEL</th>
                        <th>CURRICULUM</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
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
                    $grade_query = mysqli_query($conn, "SELECT * FROM listing WHERE SROLE = 'STUDENT' ORDER BY LASTNAME, FIRSTNAME ASC");
                    while ($row = mysqli_fetch_array($grade_query)) {
                        if (empty($row['YLEVEL'])) {
                            $row['YLEVEL'] = 'NAN';
                        }
                        $ID = $row['SCHOOL_ID'];
                        $user_query = mysqli_query($conn, "SELECT PHOTO FROM users WHERE ID='$ID'");
                        $user_row = mysqli_fetch_array($user_query);
                        $photo = !empty($user_row['PHOTO']);
                        $photoSrc = !empty($user_row['PHOTO']) ? $user_row['PHOTO'] : '../PITT/user.png';
                    ?>
                        <tr class="del<?php echo $ID ?>">
                            <td><?php echo $row['SCHOOL_ID']; ?></td>
                            <td >
                                <img src="<?php echo $photoSrc; ?>" width="30" height="30" class="img-circle" style="align-items: center; justify-content:center;display:flex">
                            </td>
                            <td><?php echo $row['LASTNAME'] . ", " . $row['FIRSTNAME']; ?></td>
                            <td width="80"><?php echo $row['COURSE']; ?></td>
                            <td width="80"><?php echo $row['YLEVEL']; ?></td>
                            <td width="80"><?php echo $row['AY']; ?></td>
                            <td width="80" style="color: <?php echo ($row['STATUS'] == 1) ? 'green' : 'red'; ?>">
                                <?php echo ($row['STATUS'] == 1) ? 'ACTIVE' : 'INACTIVE'; ?>
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <a rel="tooltip" title="View Grade" id="v<?php echo $ID; ?>" href="<?php echo base_url . 'admin/?page=grades&ID=' . $ID; ?>" class="btn btn-success">
                                        <i class="fas fa-list icon-large"></i> View
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function filterStudents() {
        var course = document.getElementsByName('COURSE')[0].value;
        var ay = document.getElementsByName('AY')[0].value;
        var ylevel = document.getElementsByName('YLEVEL')[0].value;
        var table = document.getElementById('list');
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

    $(document).ready(function() {
        $('.delete_data').click(function() {
            _conf("Are you sure you want to delete this student permanently?", "delete_student", [$(this).attr('data-id')]);
        });

        $('#manage_order').click(function() {
            uni_modal("<i class='fa fa-strem'></i> Manage Students Order", "students/manage_order.php");
        });

        $('.view_data').click(function() {
            uni_modal("<i class='fa fa-eye'></i> Students Grade", "<?php echo base_url . 'admin/?page=grades' ?>?id=" + $(this).attr('data-id'));
        });

        $('.edit_data').click(function() {
            uni_modal("<i class='fa fa-edit'></i> Update Students Details", "students/manage_students.php?id=" + $(this).attr('data-id'));
        });

        $('#list').dataTable({
            columnDefs: [
                { orderable: false, targets: [4, 5] }
            ],
            order: [0, 'asc']
        });

        $('.dataTable td, .dataTable th').addClass('py-1 px-2 align-middle');
    });

    function delete_student($id) {
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=delete_student",
            method: "POST",
            data: { id: $id },
            dataType: "json",
            error: err => {
                console.log(err);
                alert_toast("An error occurred.", 'error');
                end_loader();
            },
            success: function(resp) {
                if (typeof resp == 'object' && resp.status == 'success') {
                    location.reload();
                } else {
                    alert_toast("An error occurred.", 'error');
                    end_loader();
                }
            }
        });
    }
</script>
