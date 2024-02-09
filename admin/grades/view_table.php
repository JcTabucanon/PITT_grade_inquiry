<link rel="stylesheet" href="../assets/modal.css">
<?php
$get_ID = $_GET['ID'] ?? '';
include_once '../dbConnection/db.php';

$sql = "SELECT * FROM listing l JOIN grade g ON l.SCHOOL_ID = g.SCHOOL_ID WHERE l.SCHOOL_ID = '$get_ID'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

function generateTableRows($result)
{
    $modalCounter = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $SY = $row['SY'];
        $COURSE = $row['COURSE'];
        $YLEVEL = $row['YLEVEL'];
        $SEMESTER = $row['SEMESTER'];
        $FIRSTNAME = $row['FIRSTNAME'];
        $LASTNAME = $row['LASTNAME'];
        $MI = $row['MI'];
        $ID = $row['ID'];
        $MID_TERM = $row['MID_TERM'];
        $FINAL_TERM = $row['FINAL_TERM'];
        $COURSE_CODE = $row['COURSE_CODE'];
        $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
        $TOTAL_UNITS = $row['TOTAL_UNITS'];
        $GEN_AVE = $row['GEN_AVE'];

        $MID_TERM = empty($MID_TERM) ? 'No Data' : $MID_TERM;
        $FINAL_TERM = empty($FINAL_TERM) ? 'No Data' : $FINAL_TERM;

        $avg = $GEN_AVE;
        $remarks = '';

        if ($avg >= 1.0 && $avg <= 3.2) {
            $remarks = 'Passed';
        } else if ($avg >= 3.3 && $avg <= 4.2) {
            $remarks = 'Conditional';
        } else if ($avg >= 4.3 && $avg <= 5.0) {
            $remarks = 'Failed';
        }
        ?>

        <tr>
            <td style="text-align: left"><?= $COURSE_CODE ?></td>
            <td style="text-align: left"><?= $DESCRIPTIVE_TITLE ?></td>
            <td><?= $TOTAL_UNITS ?></td>
            <td><?= $MID_TERM ?></td>
            <td><?= $FINAL_TERM ?></td>
            <td width="100"><?= $GEN_AVE ?></td>
            <td><?= $remarks ?></td>
            <?php if ($_SESSION['CURRENT_SROLE'] == "ADMIN") { ?>

            <td class="act" width="100">
                <button type="button" class="btn btn-success edit_data" data-toggle="modal" data-target="#editModal<?= $modalCounter ?>">
                    <i class="icon-pencil icon-large"></i>EDIT
                </button>
            </td>
            <?php } else { ?>
              <?php } ?>
        </tr>

        <!-- Edit Modal for each row -->
        <div class="modal" id="editModal<?= $modalCounter ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Grade</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="">
                            <input type="hidden" name="ID" value="<?= $ID ?>">
                            <input type="hidden" name="SY" value="<?= $SY ?>">
                            <input type="hidden" name="COURSE" value="<?= $COURSE ?>">
                            <input type="hidden" name="SEMESTER" value="<?= $SEMESTER ?>">
                            <input type="hidden" name="COURSE_CODE" value="<?= $COURSE_CODE ?>">

                            <div class="form-group">
                                <label class="control-label" for="courseCode"><?= $COURSE_CODE ?></label>
                            </div>
                            <div class="form-group">
                                <label for="midTerm">Mid-Term:</label>
                                <input type="text" class="form-control" name="MID_TERM" id="midTerm<?= $modalCounter ?>" step="0.1" min="1.0" max="5.0" value="<?= $MID_TERM ?>" oninput="computeFinalGrade(this)">
                            </div>
                            <div class="form-group">
                                <label for="finalTerm">Final Term:</label>
                                <input type="text" class="form-control" name="FINAL_TERM" id="finalTerm<?= $modalCounter ?>" step="0.1" min="1.0" max="5.0" class="form-control" value="<?= $FINAL_TERM ?>" oninput="computeFinalGrade(this)">
                            </div>
                            <div class="form-group">
                                <label for="genAve">General Average:</label>
                                <input type="text" class="form-control" name="GEN_AVE" id="genAve<?= $modalCounter ?>" step="0.1" min="1.0" max="5.0" class="form-control" value="<?= $GEN_AVE ?>" readonly>
                            </div>

                            <script>
                                // Function to compute the final grade
                                function computeFinalGrade(input) {
                                    var midTerm = parseFloat(document.getElementById("midTerm<?= $modalCounter ?>").value);
                                    var finalTerm = parseFloat(document.getElementById("finalTerm<?= $modalCounter ?>").value);
                                    var ave = ((midTerm + finalTerm) / 2).toFixed(1);
                                    document.getElementById("genAve<?= $modalCounter ?>").value = ave;
                                }

                                computeFinalGrade(); // call the function to compute the initial value
                            </script>

                            <div class="form-group">
                                <button type="submit" name="edit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $modalCounter++;
    }
}

function displayTableData($result)
{
    if (mysqli_num_rows($result) > 0) {
        generateTableRows($result);
    } else {
        echo "<tr><td colspan='9'>No data available</td></tr>";
    }
}

?>
<style>
    input[type="text"] {
        height: 40px !important;
        border: 2px solid #333;
        width: 100% !important;
    }
</style>

<table cellpadding="0" cellspacing="0" style="border:0;" class="table table-bordered" id="example">
  <thead>

    <tr data-id="<?= $ID ?>">
      <th width="100">CODE</th>
      <th width="300">COURSE</th>
      <th>UNITS</th>
      <th>MID</th>
      <th>FINAL</th>
      <th width="125">FINAL GRADE</th>
      <th>REMARKS</th>
      <?php if ($_SESSION['CURRENT_SROLE'] == "ADMIN") { ?>
      <th class="act">ACTION</th>
      <?php } ?>
    </tr>
  </thead>
  <th colspan="8">
  <span><strong>
    <?php
        echo $YLEVEL.' - '.$SEMESTER;
    ?>
</strong></span>

         
      </th>
  <tbody>
    <?php displayTableData($result); ?>
  </tbody>
 
</table>


<script src="assets/script/grade.js"></script>

<?php
if (isset($_POST['edit'])) {
    $SY = $_POST['SY'];
    $ID = $_POST['ID'];
    $COURSE = $_POST['COURSE'];
    $GEN_AVE = $_POST['GEN_AVE'];
    $SEMESTER = $_POST['SEMESTER'];
    $MID_TERM = $_POST['MID_TERM'];
    $FINAL_TERM = $_POST['FINAL_TERM'];
    $COURSE_CODE = $_POST['COURSE_CODE'];

    if ($GEN_AVE >= 1.0 && $GEN_AVE <= 3.2) {
        $REMARKS = "Passed";
    } elseif ($GEN_AVE >= 3.3 && $GEN_AVE <= 4.2) {
        $ave = 4.0;
        $REMARKS = "Conditional";
    } elseif ($GEN_AVE >= 4.3 && $GEN_AVE <= 5.0) {
        $REMARKS = "Failed";
    }

    $update_query = "UPDATE grade SET GEN_AVE='$GEN_AVE', REMARKS='$REMARKS', MID_TERM='$MID_TERM', FINAL_TERM='$FINAL_TERM' WHERE ID = '$ID'";
    $update_result = mysqli_query($conn, $update_query);

    if (!$update_result) {
        die("Update failed: " . mysqli_error($conn));
    }

    echo "<script>alert('Grade updated successfully');window.location.href='admin/?page=grades&<?php echo 'ID'; ?>';</script>";
    }


mysqli_close($conn);
?>
