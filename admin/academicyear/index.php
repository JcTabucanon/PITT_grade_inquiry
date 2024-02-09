<?php
include "dbConnection/db.php";

// Fetch the current academic year and semester from the database
$query = "SELECT * FROM academic_year WHERE ID = 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentYear = $_POST['current_year'];
    $currentSemester = $_POST['current_sem'];

    $query = "UPDATE academic_year SET CURRENT_SY = '$currentYear', CURRENT_SEM = '$currentSemester' WHERE ID = 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }
}
?>
<?php include "registrar.php"?>

<style>
	.content-wrapper
	{
		background-color:#0c1e35 !important;

	}
	body{
		background-color: #0c1e35 !important;
	}

</style>
<div class="contact py-3">
    <div class="card card-outline " style="background-color: transparent; border: 1px solid transparent; margin-top: 50px;">
        <div class="card-header">
            <h5 class="card-title"><b>Set Academic Year</b></h5>
        </div>
        <div class="card-body" style="background-color: transparent;">
            <div class="container-fluid">
                <form action="" method="POST" id="academic_year">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="current_year" class="control-label">Current Year</label>
                                <select name="current_year" id="current_year" class="form-control form-control-sm rounded-0" required>
                                    <option value="" hidden>Select Year</option>
                                    <?php
                                    $currentYear = (int)date('Y');
                                    for ($i = $currentYear; $i <= $currentYear + 10; $i++) {
                                        $yearOption = $i . '-' . ($i + 1);
                                        $selected = ($row['CURRENT_SY'] == $yearOption) ? 'selected' : '';
                                        echo "<option value=\"$yearOption\" $selected>$yearOption</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="current_sem" class="control-label">Current Semester</label>
                                <select name="current_sem" id="current_sem" class="form-control form-control-sm rounded-0" required>
                                    <option value="" hidden>Select Semester</option>
                                    <option value="1st" <?= ($row['CURRENT_SEM'] == '1st') ? 'selected' : '' ?>>First Semester</option>
                                    <option value="2nd" <?= ($row['CURRENT_SEM'] == '2nd') ? 'selected' : '' ?>>Second Semester</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-1 text-right" style="background-color: transparent;">
                        <button class="btn btn-primary btn-flat" type="submit"><i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
